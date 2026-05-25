<?php

namespace App\Http\Controllers;

use App\Models\Codeqr;
use App\Models\Student;
use App\Models\Worker;
use App\Models\Visitor;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    /**
     * Muestra la vista del buscador
     */
    public function index()
    {
        return view('buscar.buscar');
    }

    /**
     * Busca información del usuario por token QR o ID manual
     */
    public function buscar(Request $request)
    {
        // Validación del identificador
        $request->validate([
            'identificador' => 'required|string|max:500',
        ]);

        $identificador = trim($request->input('identificador'));
        
        // Variable para almacenar los datos del usuario
        $userData = null;
        $tipo = null;
        $userId = null;

        // Determinar si es un token QR o una matrícula manual
        if ($this->esTokenQR($identificador)) {
            // Búsqueda por token QR
            $result = $this->buscarPorToken($identificador);
            if ($result) {
                $userData = $result['data'];
                $tipo = $result['tipo'];
                $userId = $result['user_id'];
            }
        } else {
            // Búsqueda por matrícula/ID manual
            $result = $this->buscarPorIdManual($identificador);
            if ($result) {
                $userData = $result['data'];
                $tipo = $result['tipo'];
                $userId = $result['user_id'];
            }
        }

        // Si no se encontró el usuario
        if (!$userData) {
            return response()->json([
                'error' => 'Usuario no encontrado en el sistema.'
            ], 404);
        }

        // Registrar el ingreso (operación rápida)
        $this->registrarIngreso($tipo, $userId);

        // Retornar los datos del usuario
        return response()->json($userData);
    }

    /**
     * Verifica si el identificador es un token QR válido
     */
    private function esTokenQR($identificador)
    {
        // Si es una URL completa, extraer el token
        if (filter_var($identificador, FILTER_VALIDATE_URL)) {
            $parts = parse_url($identificador);
            if (isset($parts['query'])) {
                parse_str($parts['query'], $params);
                if (isset($params['token'])) {
                    return true;
                }
            }
            return false;
        }
        
        // Si es un token de 64 caracteres hexadecimales (hash SHA256)
        return preg_match('/^[a-f0-9]{64}$/', $identificador) === 1;
    }

    /**
     * Busca usuario por token QR
     */
    private function buscarPorToken($identificador)
    {
        // Extraer el token de la URL si es necesario
        $token = $this->extraerToken($identificador);
        
        if (!$token) {
            return null;
        }

        // Buscar el token en la tabla codeqrs
        $codeqr = Codeqr::where('access_token', $token)
                       ->where('is_revoked', false)
                       ->first();

        if (!$codeqr) {
            return null;
        }

        // Determinar qué tipo de usuario es
        if ($codeqr->id_student) {
            $student = Student::with(['school', 'rol', 'offer'])
                              ->find($codeqr->id_student);
            
            if ($student) {
                return [
                    'tipo' => 'student',
                    'user_id' => $student->id,
                    'data' => [
                        'tipo' => 'student',
                        'nombre' => $student->nombre,
                        'apellido_paterno' => $student->apellido_paterno,
                        'apellido_materno' => $student->apellido_materno,
                        'id_offer' => $student->offer->nombre ?? 'No asignada',
                        'school' => $student->school->plantel ?? 'No asignado',
                        'rol' => $student->rol->rol ?? 'Sin rol',
                        'fotografia' => $student->fotografia,
                    ]
                ];
            }
        }

        if ($codeqr->id_worker) {
            $worker = Worker::with(['school', 'rol', 'offer'])
                            ->find($codeqr->id_worker);
            
            if ($worker) {
                return [
                    'tipo' => 'worker',
                    'user_id' => $worker->id,
                    'data' => [
                        'tipo' => 'worker',
                        'nombre' => $worker->nombre,
                        'apellido_paterno' => $worker->apellido_paterno,
                        'apellido_materno' => $worker->apellido_materno,
                        'id_offer' => $worker->offer->nombre ?? 'No asignada',
                        'school' => $worker->school->plantel ?? 'No asignado',
                        'rol' => $worker->rol->rol ?? 'Sin rol',
                        'fotografia' => $worker->fotografia,
                    ]
                ];
            }
        }

        if ($codeqr->id_visitor) {
            $visitor = Visitor::find($codeqr->id_visitor);
            
            if ($visitor) {
                return [
                    'tipo' => 'visitor',
                    'user_id' => $visitor->id,
                    'data' => [
                        'tipo' => 'visitor',
                        'nombre' => $visitor->nombre,
                        'apellido_paterno' => $visitor->apellido_paterno,
                        'apellido_materno' => $visitor->apellido_materno ?? '',
                        'motivo' => $visitor->motivo,
                        'es_menor' => $visitor->es_menor,
                    ]
                ];
            }
        }

        return null;
    }

    /**
     * Busca usuario por ID manual (matrícula)
     * Soporta formatos: 220111279, 286554001, V20240001
     */
    private function buscarPorIdManual($identificador)
    {
        // Limpiar el identificador
        $id = trim($identificador);
        
        // Si parece ser una URL, extraer solo el ID numérico
        if (filter_var($id, FILTER_VALIDATE_URL)) {
            if (preg_match('/datos=([^=]+)=/', $id, $matches)) {
                $id = $matches[1];
            } elseif (preg_match('/(\d+)/', $id, $matches)) {
                $id = $matches[1];
            }
        }

        // Buscar en students (id_institucional)
        $student = Student::with(['school', 'rol', 'offer'])
                          ->where('id_institucional', $id)
                          ->first();
        
        if ($student) {
            return [
                'tipo' => 'student',
                'user_id' => $student->id,
                'data' => [
                    'tipo' => 'student',
                    'nombre' => $student->nombre,
                    'apellido_paterno' => $student->apellido_paterno,
                    'apellido_materno' => $student->apellido_materno,
                    'id_offer' => $student->offer->nombre ?? 'No asignada',
                    'school' => $student->school->plantel ?? 'No asignado',
                    'rol' => $student->rol->rol ?? 'Sin rol',
                    'fotografia' => $student->fotografia,
                ]
            ];
        }

        // Buscar en workers (id_institucional)
        $worker = Worker::with(['school', 'rol', 'offer'])
                        ->where('id_institucional', $id)
                        ->first();
        
        if ($worker) {
            return [
                'tipo' => 'worker',
                'user_id' => $worker->id,
                'data' => [
                    'tipo' => 'worker',
                    'nombre' => $worker->nombre,
                    'apellido_paterno' => $worker->apellido_paterno,
                    'apellido_materno' => $worker->apellido_materno,
                    'id_offer' => $worker->offer->nombre ?? 'No asignada',
                    'school' => $worker->school->plantel ?? 'No asignado',
                    'rol' => $worker->rol->rol ?? 'Sin rol',
                    'fotografia' => $worker->fotografia,
                ]
            ];
        }

        // Buscar en visitors (id_visitante)
        $visitor = Visitor::where('id_visitante', $id)->first();
        
        if ($visitor) {
            return [
                'tipo' => 'visitor',
                'user_id' => $visitor->id,
                'data' => [
                    'tipo' => 'visitor',
                    'nombre' => $visitor->nombre,
                    'apellido_paterno' => $visitor->apellido_paterno,
                    'apellido_materno' => $visitor->apellido_materno ?? '',
                    'motivo' => $visitor->motivo,
                    'es_menor' => $visitor->es_menor,
                ]
            ];
        }

        return null;
    }

    /**
     * Extrae el token de una URL o devuelve el token directamente
     */
    private function extraerToken($identificador)
    {
        // Si es una URL, extraer el parámetro token
        if (filter_var($identificador, FILTER_VALIDATE_URL)) {
            $parts = parse_url($identificador);
            if (isset($parts['query'])) {
                parse_str($parts['query'], $params);
                return $params['token'] ?? null;
            }
            return null;
        }
        
        // Si no es URL, asumir que es el token directamente
        return $identificador;
    }

    /**
     * Registra el ingreso del usuario en la tabla incomes
     */
    private function registrarIngreso($tipo, $userId)
    {
        try {
            $data = [];
            
            switch ($tipo) {
                case 'student':
                    $data = [
                        'con_student' => 1,
                        'id_student' => $userId
                    ];
                    break;
                case 'worker':
                    $data = [
                        'con_worker' => 1,
                        'id_worker' => $userId
                    ];
                    break;
                case 'visitor':
                    $data = [
                        'con_visitor' => 1,
                        'id_visitor' => $userId
                    ];
                    break;
            }
            
            if (!empty($data)) {
                Income::create($data);
            }
        } catch (\Exception $e) {
            // No interrumpir el flujo si falla el registro de ingreso
            Log::error('Error al registrar ingreso: ' . $e->getMessage(), [
                'tipo' => $tipo,
                'user_id' => $userId
            ]);
        }
    }
}
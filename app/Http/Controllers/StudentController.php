<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\School;
use App\Models\Rol;
use App\Models\Offer;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Genera el QR
use Carbon\Carbon;
use App\Models\Codeqr;
use App\Http\Requests\CodeqrRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{


    /**
     * Mostrar una lista del recurso.
     * 
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Obtener trabajadores ordenados por nombre y paginados
        $students = Student::orderBy('nombre', 'asc')->paginate(10);

        return view('student.index', compact('students'))
            ->with('i', ($request->input('page', 1) - 1) * $students->perPage());
    }


    /**
     * Mostrar el formulario para crear un nuevo recurso.
     * 
     * @return View
     */
    public function create(): View
    {
        $student = new Student();

        // Obtener datos de referencia para los selectores
        $schools = School::pluck('plantel', 'id');
        // Solo roles de estudiantes
        $rols = Rol::where('id_department', 8)->pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('student.create', compact('student', 'schools', 'rols', 'offers'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     * 
     * @param StudentRequest $request
     * @return RedirectResponse
     */
    public function store(StudentRequest $request): RedirectResponse
    {
        // Validar la solicitud con reglas personalizadas
        $validated = $request->validate([
            'id_institucional' => ['required', 'string', 'size:9'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'email_institucional' => ['nullable', 'email', 'max:255'],
            'id_school' => ['required', 'exists:schools,id'],
            'id_rol' => ['required', 'exists:rols,id'],
            'id_offer' => ['required', 'exists:offers,id'],
            'estado' => ['required', 'in:activo,inactivo,suspendido'],

            // Campos médicos
            'tipo_sangre' => ['nullable', 'string', 'max:10'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'telefono_emergencia' => ['nullable', 'regex:/^\d{3}-\d{4}-\d{4}$|^\d+$'],
            'alergias' => ['nullable', 'string'],

            // Campos adicionales
            'telefono_personal' => ['nullable', 'regex:/^\d+$'],
            'documento_identidad' => ['nullable', 'numeric'],
        ]);

        // Crear el estudiante en la base de datos
        $student = student::create($validated);

        // Manejar subida de imagen si existe
        if ($request->hasFile('fotografia_path')) {
            $this->handleImageUpload($request, $student);
        }

        return redirect()->route('student.index')
            ->with('success', 'Trabajador creado correctamente.');
    }

    /**
     * Mostrar el recurso especificado.
     * 
     * @param Student $student
     * @return View
     */
    public function show(Student $student): View
    {

        return view('student.show', compact('student'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     * 
     * @param Student $student
     * @return View
     */
    public function edit(Student $student): View
    {
        $schools = School::pluck('plantel', 'id');
        // Solo roles de estudiantes
        $rols = Rol::where('id_department', 8)->pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');        

        return view('student.edit', compact('student', 'schools', 'rols', 'offers'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     * 
     * @param Request $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(Request $request, student $student): RedirectResponse
    {
        // Validar la solicitud con reglas personalizadas
        $validated = $request->validate([
            'id_institucional' => ['required', 'string', 'size:9'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'email_institucional' => ['nullable', 'email', 'max:255'],
            'id_school' => ['required', 'exists:schools,id'],
            'id_rol' => ['required', 'exists:rols,id'],
            'id_offer' => ['required', 'exists:offers,id'],
            'estado' => ['required', 'in:activo,inactivo,suspendido'],

            // Campos médicos
            'tipo_sangre' => ['nullable', 'string', 'max:10'],
            'fecha_nacimiento' => ['nullable', 'date'],
            'telefono_emergencia' => ['nullable', 'regex:/^\d{3}-\d{4}-\d{4}$|^\d+$'],
            'alergias' => ['nullable', 'string'],

            // Campos adicionales
            'telefono_personal' => ['nullable', 'regex:/^\d+$'],
            'documento_identidad' => ['nullable', 'numeric'],
        ]);

        // Actualizar datos en la base de datos
        $student->update($validated);

        // Manejar subida o cambio de imagen si existe
        if ($request->hasFile('fotografia_path')) {
            $this->handleImageUpload($request, $student);
        }

        return redirect()->route('student.index', $student)
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Elimina un recurso de la base de datos y su imagen asociada.
     * 
     * @param Student $student
     * @return RedirectResponse
     */
    public function destroy(student $student): RedirectResponse
    {
        // Eliminar imagen si existe
        if ($student->fotografia_path) {
            Storage::disk('public')->delete($student->fotografia_path);
        }

        // Eliminar el trabajador de la base de datos
        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'Trabajador eliminado correctamente.');
    }

    /**
     * Maneja la subida y almacenamiento seguro de imágenes.
     * 
     * @param Request $request
     * @param Student $student
     * @return void
     */
    private function handleImageUpload(Request $request, Student $student): void
    {
        // Validar que el archivo sea una imagen válida
        $file = $request->file('fotografia_path');

        if (!$file) {
            return;
        }

        // Verificar tipo de archivo permitido (solo imágenes)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $extension = strtolower($file->getClientOriginalExtension());

        if (!in_array($extension, $allowedExtensions)) {
            throw new \Exception('Solo se permiten archivos de imagen (JPG, PNG, GIF, WEBP).');
        }

        // Verificar tamaño máximo del archivo (5MB)
        $maxSize = 5 * 1024 * 1024; // 5 MB en bytes
        if ($file->getSize() > $maxSize) {
            throw new \Exception('El tamaño de la imagen no puede exceder 5MB.');
        }

        // Obtener el ID institucional para crear la carpeta correspondiente
        $institutionId = $student->id_institucional;

        // Crear directorio seguro basado en id_institucional
        $directoryPath = 'year_2026/students/' . $this->sanitizeDirectory($institutionId);

        // Verificar si el directorio existe, si no, crearlo
        if (!Storage::disk('public')->exists($directoryPath)) {
            Storage::disk('public')->makeDirectory($directoryPath);
        }

        // Generar nombre seguro para el archivo (evitar inyecciones)
        $fileName = $this->generateSafeFileName($file, $student->id);

        // Subir la imagen al almacenamiento público
        $path = $request->file('fotografia_path')->storeAs(
            $directoryPath,
            $fileName,
            'public'
        );

        // Actualizar el trabajador con la nueva ruta de la imagen
        if ($student->fotografia_path) {
            Storage::disk('public')->delete($student->fotografia_path);
        }

        $student->update([
            'fotografia_path' => $path,
        ]);

        // Crea su código QR
        $this->generateQrFile($student);         
    }    

    /**
     * Genera un nombre seguro para el archivo de imagen.
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param int $idStudent
     * @return string
     */
    private function generateSafeFileName(\Illuminate\Http\UploadedFile $file, int $idStudent): string
    {
        // Generar nombre único basado en timestamp + ID del trabajador
        $timestamp = time();
        $uniqueId = md5($timestamp . $idStudent);

        // Extraer la extensión del archivo original (sin el punto)
        $extension = strtolower($file->getClientOriginalExtension());

        return sprintf('%s_%s.%s', $uniqueId, $file->getClientOriginalName(), $this->sanitizeFileName($extension));
    }

    /**
     * Limpia y normaliza el nombre de extensión del archivo.
     * 
     * @param string $extension
     * @return string
     */
    private function sanitizeFileName(string $extension): string
    {
        // Normalizar extensión a minúsculas
        return strtolower($extension);
    }

    /**
     * Limpia y normaliza el nombre de directorio para evitar inyecciones.
     * 
     * @param string $directoryName
     * @return string
     */
    private function sanitizeDirectory(string $directoryName): string
    {
        // Reemplazar caracteres especiales con guiones bajos
        return str_replace(['/', '\\', ':', '*', '?', '"', '<', '>', '|'], '_', $directoryName);
    }    

    private function generateQrFile(Student $student)
    {
        // ID de la tabla student
        $studentId = $student->id;

        // Matrícula institucional
        $institutionalId = $student->id_institucional;

        // Carpeta base: storage/app/public/year_2026/
        $baseDir = 'year_2026';
        $type = "students";
        $subDir = $type;

        // Crear directorios si no existen
        Storage::disk('public')->makeDirectory("{$baseDir}/{$subDir}/{$institutionalId}", 755, true);

        // Nombre del archivo: QR_[tipo]_[matricula].png
        $filename = "QR_{$type}_{$institutionalId}.svg";

        // Generar token y guardar en DB
        $token = bin2hex(random_bytes(32));
        $hash = hash( 'sha256', "{$token}_{$studentId}_" . Carbon::now()->toIso8601String());

        // =========================================
        // INSERTAR QR EN DB
        // =========================================
        DB::table('codeqrs')->insert([
            'id_student'   => $studentId,
            'id_worker'    => null,
            'id_visitor'   => null,
            'access_token' => $token,
            'token_hash'   => $hash,
            'is_revoked'   => false,
            'qr_image'     => "{$baseDir}/{$subDir}/{$institutionalId}/{$filename}",
        ]);

        // URL QR
        $qrData ="https://registroescolar.uacm.edu.mx/scan?token={$token}&sig=". hash('sha256', "{$studentId}_{$type}");

        // Generar SVG
        $qrImage = QrCode::format('svg')
            ->size(300)
            ->color(10, 58, 86)
            ->backgroundColor(255, 255, 255)
            ->generate($qrData);

        // Guardar QR
        Storage::disk('public')->put(
            "{$baseDir}/{$subDir}/{$institutionalId}/{$filename}",
            $qrImage
        );

        return "storage/app/public/{$baseDir}/{$subDir}/{$institutionalId}/{$filename}";
    }    
}

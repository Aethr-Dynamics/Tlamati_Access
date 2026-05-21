<?php

namespace App\Http\Controllers;

use App\Models\Codeqr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CodeqrRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Genera el QR
use Carbon\Carbon;

class CodeqrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $codeqrs = Codeqr::paginate();

        return view('codeqr.index', compact('codeqrs'))
            ->with('i', ($request->input('page', 1) - 1) * $codeqrs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $codeqrs = new Codeqr();
        
        // Variables para mostrar en vista (inicialmente null)
        return view('codeqr.create', compact('codeqrs'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        // Validación del formulario (sin regla de unicidad)
        $validated = $request->validate([
            'id_institucional' => 'required|numeric',
        ]);

        $institutionalId = $validated['id_institucional'];

        // Buscar estudiante o trabajador
        $student = DB::table('students')
            ->where('id_institucional', $institutionalId)
            ->first();

        $worker = DB::table('workers')
            ->where('id_institucional', $institutionalId)
            ->first();

        // Determinar tipo de usuario y carpeta destino
        if ($student || $worker) {
            $type = $student ? 'students' : 'workers';
            $user = $student ?: $worker;
            
            return redirect()->back()
                ->with('success', "Código QR generado correctamente para {$user->nombre} {$user->apellido_paterno} {$user->apellido_materno}")
                ->with('qr_path', $this->generateQrFile($user, $type));
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors(['id_institucional' => 'Matrícula no encontrada en el sistema']);
        }
    }

    private function generateQrFile($user, $type)
    {
        // Carpeta base: storage/app/public/year_2026/
        $baseDir = 'year_2026';
        $subDir = $type;
        $institutionalId = $user->id_institucional;

        // Crear directorios si no existen
        Storage::disk('public')->makeDirectory("{$baseDir}/{$subDir}", 755, true);

        // Nombre del archivo: QR_[tipo]_[matricula].png
        $filename = "QR_{$type}_{$institutionalId}.svg";
        $path = "storage/app/public/{$baseDir}/{$subDir}/{$institutionalId}/{$filename}";

        // Generar token y guardar en DB
        $token = bin2hex(random_bytes(32));
        $hash = hash('sha256', "{$token}_{$user->id_institucional}_" . Carbon::now()->toIso8601String());

        // Si existe, reutilizas el QR existente en lugar de generar uno nuevo.
        $existingQr = DB::table('codeqrs')
            ->where('id_student', $type === 'students' ? $user->id : null)
            ->where('id_worker', $type === 'workers' ? $user->id : null)
            ->first();

        DB::table('codeqrs')->insert([
            'id_student' => $type === 'students' ? $user->id : null,
            'id_worker' => $type === 'workers' ? $user->id : null,
            'id_visitor' => null,

            'access_token' => $token,
            'token_hash' => $hash,
            'is_revoked' => false,
        ]);

        // Generar imagen QR
        $qrData = "https://registroescolar.uacm.edu.mx/scan?token={$token}&sig=" . hash('sha256', "{$user->id_institucional}_{$type}");

        // Generar QR
        $qrImage = QrCode::format('svg')
            ->size(300)
            ->color(10, 58, 86) // #0a3a56
            ->backgroundColor(255, 255, 255)
            ->generate($qrData);

        // Guardar imagen
        Storage::disk('public')->put(
            "{$baseDir}/{$subDir}/{$institutionalId}/{$filename}",
            $qrImage
        );


        return "storage/app/public/{$baseDir}/{$subDir}/{$filename}";
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $codeqr = Codeqr::find($id);

        return view('codeqr.show', compact('codeqr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $codeqr = Codeqr::find($id);

        return view('codeqr.edit', compact('codeqr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CodeqrRequest $request, Codeqr $codeqr): RedirectResponse
    {
        $codeqr->update($request->validated());

        return Redirect::route('codeqrs.index')
            ->with('success', 'Codeqr updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Codeqr::find($id)->delete();

        return Redirect::route('codeqr.index')
            ->with('success', 'Codeqr deleted successfully');
    }
}

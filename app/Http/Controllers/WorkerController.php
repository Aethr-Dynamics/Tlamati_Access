<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\WorkerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\School;
use App\Models\Rol;
use App\Models\Offer;

/**
 * Controller para la gestión de trabajadores (estudiantes/profesores)
 * 
 * @package App\Http\Controllers
 */
class WorkerController extends Controller
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
        $workers = Worker::orderBy('nombre', 'asc')->paginate(10);

        return view('worker.index', compact('workers'))
            ->with('i', ($request->input('page', 1) - 1) * $workers->perPage());
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     * 
     * @return View
     */
    public function create(): View
    {
        $worker = new Worker();
        
        // Obtener datos de referencia para los selectores
        $schools = School::pluck('plantel', 'id');
        $rols = Rol::pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('worker.create', compact('worker', 'schools', 'rols', 'offers'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     * 
     * @param WorkerRequest $request
     * @return RedirectResponse
     */
    public function store(WorkerRequest $request): RedirectResponse
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

        // Crear el trabajador en la base de datos
        $worker = Worker::create($validated);

        // Manejar subida de imagen si existe
        if ($request->hasFile('fotografia_path')) {
            $this->handleImageUpload($request, $worker);
        }

        return redirect()->route('worker.index')
            ->with('success', 'Trabajador creado correctamente.');
    }

    /**
     * Mostrar el recurso especificado.
     * 
     * @param Worker $worker
     * @return View
     */
    public function show(Worker $worker): View
    {
        return view('worker.show', compact('worker'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     * 
     * @param Worker $worker
     * @return View
     */
    public function edit(Worker $worker): View
    {
        // Obtener datos de referencia para los selectores
        $schools = School::pluck('plantel', 'id');
        $rols = Rol::pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('worker.edit', compact('worker', 'schools', 'rols', 'offers'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     * 
     * @param Request $request
     * @param Worker $worker
     * @return RedirectResponse
     */
    public function update(Request $request, Worker $worker): RedirectResponse
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
        $worker->update($validated);

        // Manejar subida o cambio de imagen si existe
        if ($request->hasFile('fotografia_path')) {
            $this->handleImageUpload($request, $worker);
        }

        return redirect()->route('worker.index', $worker)
            ->with('success', 'Datos actualizados correctamente.');
    }

    /**
     * Elimina un recurso de la base de datos y su imagen asociada.
     * 
     * @param Worker $worker
     * @return RedirectResponse
     */
    public function destroy(Worker $worker): RedirectResponse
    {
        // Eliminar imagen si existe
        if ($worker->fotografia_path) {
            Storage::disk('public')->delete($worker->fotografia_path);
        }

        // Eliminar el trabajador de la base de datos
        $worker->delete();

        return redirect()->route('worker.index')
            ->with('success', 'Trabajador eliminado correctamente.');
    }

    /**
     * Maneja la subida y almacenamiento seguro de imágenes.
     * 
     * @param Request $request
     * @param Worker $worker
     * @return void
     */
    private function handleImageUpload(Request $request, Worker $worker): void
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
        $institutionId = $worker->id_institucional;

        // Crear directorio seguro basado en id_institucional
        $directoryPath = 'year_2026/workers/' . $this->sanitizeDirectory($institutionId);

        // Verificar si el directorio existe, si no, crearlo
        if (!Storage::disk('public')->exists($directoryPath)) {
            Storage::disk('public')->makeDirectory($directoryPath);
        }

        // Generar nombre seguro para el archivo (evitar inyecciones)
        $fileName = $this->generateSafeFileName($file, $worker->id);

        // Subir la imagen al almacenamiento público
        $path = $request->file('fotografia_path')->storeAs(
            $directoryPath,
            $fileName,
            'public'
        );

        // Actualizar el trabajador con la nueva ruta de la imagen
        if ($worker->fotografia_path) {
            Storage::disk('public')->delete($worker->fotografia_path);
        }

        $worker->update([
            'fotografia_path' => $path,
        ]);
    }

    /**
     * Genera un nombre seguro para el archivo de imagen.
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param int $idWorker
     * @return string
     */
    private function generateSafeFileName(\Illuminate\Http\UploadedFile $file, int $idWorker): string
    {
        // Generar nombre único basado en timestamp + ID del trabajador
        $timestamp = time();
        $uniqueId = md5($timestamp . $idWorker);

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
}

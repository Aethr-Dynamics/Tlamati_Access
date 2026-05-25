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
    */
    public function create(): View
    {
        $student = new Student();

        $schools = School::pluck('plantel', 'id');
        // Solo roles de estudiantes
        $rols = Rol::where('id_department', 8)->pluck('rol', 'id');
        $offers = Offer::pluck('nombre', 'id');

        return view('student.create', compact('student', 'schools', 'rols', 'offers'));
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function store(StudentRequest $request): RedirectResponse
    {
        Student::create($request->validated());

        return Redirect::route('student.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Guarda un recurso recién creado en el almacenamiento.
     */
    public function show(Student $student): View
    {

        return view('student.show', compact('student'));
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
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
     */
    public function update(StudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->validated());

        return Redirect::route('student.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Elimina el recurso especificado en el almacenamiento.
     */      
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return Redirect::route('student.index')
            ->with('success', 'Student deleted successfully');
    }
}

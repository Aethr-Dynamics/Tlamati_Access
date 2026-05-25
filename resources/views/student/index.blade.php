@extends('layouts.admin')

@section('template_title')
    Estudiantes
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Lista de estudiantes</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estudiantes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fa-solid fa-user-graduate" style="color: #E0E0E0;"></i> Nuevo estudiante
                                </a>
                              </div>
                        </div>
                    </div>
                    @if (Session::has('success'))
                    <script>
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Éxito",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
                    @endif

                    @if (Session::has('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            // text: '{{ Session::get('error') }}',
                            text: 'A ocurrido un error.',
                            confirmButtonColor: '#d33'
                        });
                    </script>
                    @endif 

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No.</th>
                                        
                                    <th > </th>
									<th >Nombre</th>
									<th >Palntel</th>
									<th >Estado</th>
									<th >Licenciatura</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                        <td style="text-align: center; align-items: center;"> <img src="{{ asset('storage/' . $student->fotografia_path) }}" style=" height: 70px;"> </td>
										<td >{{ $student->nombre }} {{ $student->apellido_materno }} {{ $student->apellido_paterno }}</td>
										<td >{{ $student->school->plantel ?? 'Sin sede' }}</td>
										<td style="text-transform: capitalize;">{{ $student->estado }}</td>
										<td >{{ $student->offer->nombre ?? 'Sin licenciatura' }}</td>

                                            <td>
                                                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('student.show', $student->id) }}">
                                                        <i class="fa fa-fw fa-eye" style="color: #E0E0E0;"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('student.edit', $student->id) }}">
                                                        <i class="fa fa-fw fa-edit" style="color: #E0E0E0;"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                        <i class="fa fa-fw fa-trash" style="color: #E0E0E0;"></i> {{ __('Delete') }}
                                                    </button> -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $students->links() }}
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {

                button.addEventListener('click', function () {

                    let form = this.closest('form');

                    Swal.fire({
                        title: '¿Eliminar registro?',
                        text: "Esta acción no se puede deshacer",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });

        });
    </script>     
@endsection

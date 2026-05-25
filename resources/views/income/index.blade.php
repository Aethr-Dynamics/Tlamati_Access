@extends('layouts.admin')

@section('template_title')
    Ingresos
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Lista de ingresos</h3>
                </div>
            </div><!--end::Row-->
        </div><!--end::Container-->
    </div><!--end::App Content Header-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ingresos') }}
                            </span>
<!-- 
                            <div class="float-right">
                                <a href="{{ route('income.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fa-solid fa-person-arrow-down-to-line" style="color: #E0E0E0;"></i> Nueva entrada
                                </a>
                            </div> -->
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
                                        <th>No</th>
                                        <th>Tipo de Ingreso</th>
                                        <th>Nombre Completo</th>
                                        <th>Fecha/Hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>
                                                @if($income->con_student)
                                                    <p class="badge bg-success" style="font-size: 12px; padding: 5px; font-weight: normal;"> Estudiante</p>
                                                    @elseif($income->con_worker)
                                                    <p class="badge bg-primary" style="font-size: 12px; padding: 5px; font-weight: normal;"> Trabajador</p>
                                                    @elseif($income->con_visitor)
                                                    <p class="badge bg-info" style="font-size: 12px; padding: 5px; font-weight: normal;"> Visitante</p>
                                                    @else
                                                    <p class="badge bg-info" style="font-size: 12px; padding: 5px; font-weight: normal;"> Desconocido</p>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if($income->con_student && $income->student)
                                                    <strong>{{ $income->student->nombre }} {{ $income->student->apellido_paterno }} {{ $income->student->apellido_materno }}</strong>
                                                @elseif($income->con_worker && $income->worker)
                                                    <strong>{{ $income->worker->nombre }} {{ $income->worker->apellido_paterno }} {{ $income->worker->apellido_materno }}</strong>
                                                @elseif($income->con_visitor && $income->visitor)
                                                    <strong>{{ $income->visitor->nombre }} {{ $income->visitor->apellido_paterno }} {{ $income->visitor->apellido_materno ?? '' }}</strong>
                                                @else
                                                    <span class="text-muted">No disponible</span>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                <small>{{ $income->created_at->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</small>
                                            </td>
                                            
                                            <td>
                                                <form action="{{ route('income.destroy', $income->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('income.show', $income->id) }}">
                                                        <i class="fa fa-fw fa-eye" style="color: #E0E0E0;"></i> Ver
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('income.edit', $income->id) }}">
                                                        <i class="fa fa-fw fa-edit"  style="color: #E0E0E0;"></i> Editar
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-delete">
                                                        <i class="fa fa-fw fa-trash"  style="color: #E0E0E0;"></i> Eliminar
                                                    </button> -->
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                            <div class="mt-3">
                                {{ $incomes->links() }}
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

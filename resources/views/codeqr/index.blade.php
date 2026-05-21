@extends('layouts.admin')

@section('template_title')
    Codeqrs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Codeqrs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('codeqr.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
									<th >Id Student</th>
									<th >Id Worker</th>
									<th >Id Visitor</th>
									<th >Access Token</th>
									<th >Token Hash</th>
									<th >Expires At</th>
									<th >Is Revoked</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($codeqrs as $codeqr)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $codeqr->id_student }}</td>
										<td >{{ $codeqr->id_worker }}</td>
										<td >{{ $codeqr->id_visitor }}</td>
										<td >{{ $codeqr->access_token }}</td>
										<td >{{ $codeqr->token_hash }}</td>
										<td >{{ $codeqr->expires_at }}</td>
										<td >{{ $codeqr->is_revoked }}</td>

                                            <td>
                                                <form action="{{ route('codeqr.destroy', $codeqr->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('codeqr.show', $codeqr->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('codeqr.edit', $codeqr->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $codeqrs->withQueryString()->links() !!}
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

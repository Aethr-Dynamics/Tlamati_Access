@extends('layouts.admin')

@section('template_title')
    Trabajadores
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Lista de trabajadores</h3>
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
                                {{ __('Workers') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('worker.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nuevo trabajador
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th >Fotografia</th>
									<th >Nombre</th>
									<th >Apellido Materno</th>
									<th >Apellido Paterno</th>
									<th >Sede</th>
									<th >Rol</th>
									<th >Id Offer</th>
									<th >Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                        <td >{{ $worker->fotografia }}</td>
										<td >{{ $worker->nombre }}</td>
										<td >{{ $worker->apellido_materno }}</td>
										<td >{{ $worker->apellido_paterno }}</td>
										<td >{{ $worker->school->plantel ?? 'Sin sede' }}</td>
										<td >{{ $worker->rol->rol ?? 'Sin rol' }}</td>
										<td >{{ $worker->offer->nombre ?? 'Sin licenciatura' }}</td>
										<td >{{ $worker->estado }}</td>

                                            <td>
                                                <form action="{{ route('worker.destroy', $worker->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('worker.show', $worker->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('worker.edit', $worker->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $workers->links() }}
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('template_title')
    Visitantes
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Lista de visitantes</h3>
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
                                {{ __('Visitors') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('visitor.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Nuevo visitante
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
                                        
									<th >Nombre</th>
									<th >Apellido Paterno</th>
									<th >Apellido Materno</th>
									<th >Motivo</th>
									<th >Es Menor</th>
									<th >Reactivacion</th>
									<th >Fechas Impresion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitors as $visitor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $visitor->nombre }}</td>
										<td >{{ $visitor->apellido_paterno }}</td>
										<td >{{ $visitor->apellido_materno }}</td>
										<td >{{ $visitor->motivo }}</td>
										<td >{{ $visitor->es_menor }}</td>
										<td >{{ $visitor->reactivacion }}</td>
										<td >{{ $visitor->fechas_impresion }}</td>

                                            <td>
                                                <form action="{{ route('visitor.destroy', $visitor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('visitor.show', $visitor->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('visitor.edit', $visitor->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            <div class="mt-3">
                                {{ $visitors->links() }}
                            </div>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

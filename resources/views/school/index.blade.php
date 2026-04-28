@extends('layouts.admin')

@section('template_title')
    Sedes
@endsection

@section('content')
    <div class="app-content-header"><!--begin::App Content Header-->
        <div class="container-fluid"><!--begin::Container-->
            <div class="row"><!--begin::Row-->
                <div class="col-sm-6">
                    <h3 class="mb-0">Lista de sedes educativas</h3>
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
                                Lista de sedes educativas
                            </span>

                             <div class="float-right">
                                <a href="{{ route('school.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                     Nueva sede
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
									<th >Plantel</th>
									<th >Direccion</th>
									<th >Correo</th>
									<th >Telefono</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>                                            
										<td >{{ $school->plantel }}</td>
										<td >{{ $school->direccion }}</td>
										<td >{{ $school->correo }}</td>
										<td >{{ $school->telefono }}</td>

                                            <td>
                                                <form action="{{ route('school.destroy', $school->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('school.show', $school->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('school.edit', $school->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                                {{ $schools->links() }}
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

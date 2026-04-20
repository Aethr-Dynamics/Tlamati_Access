@extends('layouts.admin')

@section('template_title')
    Students
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Students') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
									<th >Apellido Materno</th>
									<th >Apellido Paterno</th>
									<th >Id School</th>
									<th >Id Rol</th>
									<th >Id Offer</th>
									<th >Estado</th>
									<th >Fecha Nacimiento</th>
									<th >Fotografia</th>
									<th >Code Qr</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $student->nombre }}</td>
										<td >{{ $student->apellido_materno }}</td>
										<td >{{ $student->apellido_paterno }}</td>
										<td >{{ $student->id_school }}</td>
										<td >{{ $student->id_rol }}</td>
										<td >{{ $student->id_offer }}</td>
										<td >{{ $student->estado }}</td>
										<td >{{ $student->fecha_nacimiento }}</td>
										<td >{{ $student->fotografia }}</td>
										<td >{{ $student->code_qr }}</td>

                                            <td>
                                                <form action="{{ route('student.destroy', $student->id_student) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('student.show', $student->id_student) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('student.edit', $student->id_student) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $students->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

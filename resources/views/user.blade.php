@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
							<div class="panel-heading strong">Registro de Usuarios</div>
						@else
							<div class="panel-heading strong">Profesores</div>
						@endif
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						@if(Auth::user()->idrol == 1 or Auth::user()->idrol == 5)
							{!! Form::model($user, $parametros['ruta']) !!}
									<div class="form-group">
										<label class="col-md-4 control-label">NOMBRE</label>
										<div class="col-md-6">
											{!! Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Nombre')) !!}
										</div>
									</div>			
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">APELLIDO</label>
										<div class="col-md-6">
											{!! Form::text('apellido', null, array('class' => 'form-control', 'placeholder' => 'Apellido')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">CEDULA</label>
										<div class="col-md-6">
											{!! Form::text('cedula', null, array('class' => 'form-control', 'placeholder' => 'Cedula')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">FECHA DE NACIMIENTO </label>
										<div class="col-md-6">
											{!! Form::text('fecha_nac', null, array('class' => 'form-control', 'placeholder' => 'dd/mm/aa')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">TELEFONO </label>
										<div class="col-md-6">
											{!! Form::text('telefono', null, array('class' => 'form-control', 'placeholder' => 'Telefono')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">CELULAR</label>
										<div class="col-md-6">
											{!! Form::text('celular', null, array('class' => 'form-control', 'placeholder' => 'Celular')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">NACIONALIDAD</label>
										<div class="col-md-6">
											{!! Form::select('idpais', App\Paist::lists('pais', 'id'), null, array('class' => 'form-control')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
									<label class="col-md-4 control-label">SEDES</label>
									<div class="col-md-6">
									{!! Form::select('idsede', App\Sede::lists('sede', 'id'), null, array('class' => 'form-control')) !!}
									</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">FACULTAD</label>
										<div class="col-md-6">
											{!! Form::select('idfacultad', App\Facultad::lists('facultad', 'id'), null, array('class' => 'form-control')) !!}
										</div>
									</div>
									<br>	
									<div class="form-group">
										<label class="col-md-4 control-label">ROLES</label>
										<div class="col-md-6">
											@if(Auth::user()->idrol == 1)
												{{--*/$rol = DB::table('roles')->lists('rol','id')/*--}}
											@endif
											@if(Auth::user()->idrol == 5)
												{{--*/$rol = DB::table('roles')->where('id','<>','1')->where('id','<>','5')->lists('rol','id')/*--}}
											@endif
											{!! Form::select('idrol', $rol, null, array('class' => 'form-control', 'id' => 'idrol')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">DEPARTAMENTO</label>
										<div class="col-md-6">
											{!! Form::select('iddepartamento', App\Departamento::lists('departamento', 'id'), 26, array('class' => 'form-control')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">CARGO</label>
										<div class="col-md-6">
											{!! Form::select('idcargo', App\Cargos::lists('cargo', 'id'), null, array('class' => 'form-control')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">E-MAIL</label>
										<div class="col-md-6">
											{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'nombre.apellido@utp.ac.pa')) !!}
										</div>
									</div>
									<br>
									<div class="form-group">
										<label class="col-md-4 control-label">PASSWORD</label>
										<div class="col-md-6">
											{!! Form::password('password', array('class' => 'form-control', 'placeholder' => '*********')) !!}
										</div>
									</div>
									<br><br>
									<div class="container" id="menu_profesor" style="display:none;">
										<div class="row">
											<div class="col-md-9 col-md-offset-1">
											<br><br>											
												<div class="panel panel-default">
													<div class="  panel-heading">SI ES UN PROFESOR POR FAVOR LLENAR LOS SIGUIENTES CAMPOS</div>		
													<div class="panel-body ">
														<div class="form-group">
															<label class="col-md-10 c-ontrol-label">SEMESTRE</label>
															<div class="col-md-4">
															{!! Form::select('idsemestre', App\Semestre::lists('semestre', 'id'), null, array('class' => 'form-control')) !!}
															</div>
														</div>
														<br><br>
														<div class="form-group">
															<label class="col-md-10 c-ontrol-label">RESOLUCIÓN</label>
															<div class="col-md-4">
																{!! Form::checkbox('tieneresolucion', 1,true, array('class' => 'form-control'))!!}
															</div>
														</div>
														<br><br>
														<div class="form-group">
															<label class="col-md-10 c-ontrol-label">CANTIDAD DE HORAS</label>
															<div class="col-md-4">
																{!! Form::text('cantidaddehoras', null, array('class' => 'form-control'))!!}
																{!! Form::hidden('inactivo', 1, array('class' => 'form-control'))!!}
															</div>
														</div>
														<br><br>
													</div>
												</div>
											</div>
										</div>
									</div>						
									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-success">REGISTRAR</button>
											<br>
										</div>
									</div>
							{!! Form::close() !!}
						@endif
						</div>
						<div class="table-responsive">
							<br><br>
							{{--TABLA QUE AGRUPA A LOS USUARIOS ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS - VISTA ADMINISTRADOR--}}
							<h4 class="text-center">Lista de Usuarios</h4>
							{!! Form::open(['method' => 'GET','route' => 'user.index']) !!}
							<div class="form-group bg-warning">
							<br>
									<div class="col-md-6">
										<label class="col-md-8">{!! Form::text('users1', null, array('class' => 'form-control', 'placeholder' => 'Escriba el nombre')) !!}</label>
											<button type="submit" class="btn btn-success">Buscar</button>		
									</div>
									<br><br><br>
							</div>	
						{!! Form::close() !!}
							<table class="table2">
								<tr class="strong text-center bg-info tr2"><td>NOMBRE</td><td>APELLIDO</td><td>CEDULA</td><td>TEL. DEPART.</td><td>CELULAR</td>
									<td>FACULTAD</td><td>DEPARTAMENTO</td><td>ROL</td><td>ESTADO</td><td>ACTIVAR-DESACTIVAR</td>
									@if(Auth::user()->idrol == 1)
										<td>EDITAR</td><td>ELIMINAR</td>
									@endif
									@if(Auth::user()->idrol == 5)
										<td>EDITAR</td>
									@else
									@endif
								</tr>
								@foreach($users as $user)
									@if(Auth::user()->idrol == 1)
										<tr class="text-center tr2">
											<td>{{$user->nombre}}</td>
											<td>{{$user->apellido}}</td>
											<td>{{$user->cedula}}</td>
											<td>{{$user->telefono}}</td>
											<td>{{$user->celular}}</td>
											<td>{{$fac = DB::table('facultades')->where('id', $user->idfacultad)->pluck('facultad')}}</td>
											<td>{{$dep = DB::table('departamentos')->where('id', $user->iddepartamento)->pluck('departamento')}}</td>
											<td>{{$rol = DB::table('roles')->where('id', $user->idrol)->pluck('rol')}}</td>
												@if($user->inactivo == 1)
													<td class="text-success">ACTIVO</td>
												@else
													<td class="text-danger">INACTIVO</td>
												@endif		
											<td>
												@if($user->idrol == 2 or $user->idrol == 3 or $user->idrol == 4 or $user->idrol == 5)
													@if($user->inactivo == 1)
														{!! Form::open(['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
																{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
																{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
														{!! Form::close() !!}
													@endif
													@if($user->inactivo == 0)
														{!! Form::open(['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
																{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
																{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
														{!! Form::close() !!}
													@endif
												@endif
												@if($user->idrol == 1)
													<label>ADMINISTRADOR</label>
												@endif
											</td>
											
												<td>{!! Form::open(['method' => 'GET','route' => ['user.edit', $user->id]]) !!}
														{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}</td>
											
												<td>{!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id]]) !!}
														{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
													{!! Form::close() !!}</td>
											
									@endif
									@if(Auth::user()->idrol == 5 or Auth::user()->idrol == 4)
										@if($user->idrol <> 1)
											<tr class="text-center tr2">
											<td>{{$user->nombre}}</td>
											<td>{{$user->apellido}}</td>
											<td>{{$user->cedula}}</td>
											<td>{{$user->telefono}}</td>
											<td>{{$user->celular}}</td>
											<td>{{$fac = DB::table('facultades')->where('id', $user->idfacultad)->pluck('facultad')}}</td>
											<td>{{$dep = DB::table('departamentos')->where('id', $user->iddepartamento)->pluck('departamento')}}</td>
											<td>{{$rol = DB::table('roles')->where('id', $user->idrol)->pluck('rol')}}</td>
												@if($user->inactivo == 1)
													<td class="text-success">ACTIVO</td>
												@else
													<td class="text-danger">INACTIVO</td>
												@endif		
											<td>
												@if($user->idrol == 2 or $user->idrol == 3 or $user->idrol == 4 or $user->idrol == 5)
													@if($user->inactivo == 1)
														{!! Form::open(['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
																{!! Form::hidden('inactivo', 0, array('class' => 'form-control')) !!}
																{!! Form::submit('Desactivar', ['class' => 'btn btn-warning']) !!}
														{!! Form::close() !!}
													@endif
													@if($user->inactivo == 0)
														{!! Form::open(['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
																{!! Form::hidden('inactivo', 1, array('class' => 'form-control')) !!}
																{!! Form::submit('Activar', ['class' => 'btn btn-primary']) !!}
														{!! Form::close() !!}
													@endif
												@endif
											</td>
											@if(Auth::user()->idrol == 5)
												<td>{!! Form::open(['method' => 'GET','route' => ['user.edit', $user->id]]) !!}
														{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
													{!! Form::close() !!}</td>
											@endif
										@endif
									@endif
										</tr>
								@endforeach
							</table>
							<div class="text-center">
								{!!str_replace('/?','?',$users->appends(Input::except('page'))->render())!!}
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection

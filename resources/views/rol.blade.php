@extends('app')
	@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading strong">Roles</div>
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
						{!! Form::model($rol, $parametros['ruta']) !!}	
							<div class="form-group">
								<label class="col-md-4 control-label">NUEVO ROL</label>
								<div class="col-md-6">
									{!! Form::text('rol', null, array('class' => 'form-control', 'placeholder' => 'Nuevo Rol')) !!}
								</div>
							</div>			
							<br><br>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-success">REGISTRAR</button>									
								</div>
							</div>
							<br><br>
						{!!Form::close()!!}				
						</div>
						<div class="table-responsive">
							<br><br>
							<h4 class="text-center">Lista de Roles</h4>
							{{--TABLA QUE AGRUPA A LOS ROLES ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS--}}
							<table class="table2">
								<tr class="strong text-center bg-info tr2"><td>ROL</td><td>EDITAR</td><td>ELIMINAR</td></tr>
									@foreach(App\Rol::all() as $rol)
										<tr class="text-center tr2">
											<td>{{$rol->rol}}</td>
											<td>{!! Form::open(['method' => 'GET','route' => ['rol.edit', $rol->id]]) !!}
													{!! Form::submit('Editar', ['class' => 'btn btn-success']) !!}
												{!! Form::close() !!}</td>
											<td>{!! Form::open(['method' => 'DELETE','route' => ['rol.destroy', $rol->id]]) !!}
													{!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
												{!! Form::close() !!}</td>
										</tr>	 
									@endforeach
							</table>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection

@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading strong">HORARIOS</div>
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
					
			
			@if(Session::has('alert4'))
<div>	
			<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span class="glyphicon glyphicon-hand-right"></span> <strong>{{ Session::get('alert4') }}</strong>
                <hr class="message-inner-separator">
            </div>
        	<br>
	<br>	
</div>
      @endif		
<div>					
					
					
					<!--////////////////////formulario estatico///////////////////-->
					@if($sw == 0)
					{!! Form::model($Horarios, $parametros['ruta']) !!}
					
						<div class="form-group">
							<label class="col-md-4 control-label">AÑO</label>
							<div class="col-md-6">
									{!! Form::select('idagno', App\Agno::lists('agno', 'id'), null, array('class' => 'form-control','required' => 'required')) !!}
							</div>
						</div>	
						
					
					
					
						<div class="form-group">
							<label class="col-md-4 control-label">FACULTAD</label>
							<div class="col-md-6">
									{!! Form::select('idfacultad', App\Facultad::lists('facultad', 'id'), 8, array('class' => 'form-control','id'=>'idfacultad','required' => 'required')) !!}
							</div>
						</div>	
						
								
									<div class="form-group">
							<label class="col-md-4 control-label">CARRERAS</label>
							<div class="col-md-6">
									
									{!! Form::select('idcarrera', App\Carreras::lists('carrera', 'id'), null, array('class' => 'form-control','id'=>'idcarrera')) !!}
							</div>
						</div>
							
									<div class="form-group">
							<label class="col-md-4 control-label">PLANES</label>
							<div class="col-md-6">
									
									{!! Form::select('idplan', App\Planes::lists('plan', 'id'), null, array('class' => 'form-control','id'=>'idplan')) !!}
							</div>
						</div>
							
							
							
							
							
							
							
									<div class="form-group">
							<label class="col-md-4 control-label">AÑO DE ESTUDIO</label>
							<div class="col-md-6">
									{!! Form::select('idagnoestudio', App\Agnosestudio::lists('agno', 'id'), null, array('class' => 'form-control','id'=>'idagnoestudio')) !!}
							</div>
						</div>
						
						
						
						
						
						
								<div class="form-group">
							<label class="col-md-4 control-label">SEMESTRE</label>
							<div class="col-md-6">
										{!! Form::select('idsemestre', App\Semestre::lists('semestre','id'), null, array('class' => 'form-control','id'=>'idsemestre')) !!}
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-4 control-label">JORNADA </label>
							<div class="col-md-6">
								{!! Form::select('idjornada', App\Tipogrupos::lists('tipo','id'), null, array('class' => 'form-control','id'=>'idjornada')) !!}
							</div>
						</div>
						
						
						
						
						
						
							
							
							
						<div class="form-group">
							<label class="col-md-4 control-label">GRUPOS</label>
							<div class="col-md-6">
									{!! Form::select('idgrupo', App\Grupos::lists('grupo', 'id'), null, array('class' => 'form-control','id'=>'idgrupo')) !!}
							</div>
						</div>
						
				
						
						
						
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									REGISTRAR
								</button>
								<br>
							</div>
						</div>
					
					{!! Form::close() !!}
	
	
</div>	



		

</div>
















<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->					
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->										
					@endif
			<!--////////////////////////////////////////////////////////////////////////////-->		
		</div>
		<!--/////////////////////////////////////datos de horarios////////////////////////////-->	
			{{--*/
							$idagnoestudio=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idagnoestudio');
							
							$idfacultad=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idfacultad');
							
							$idgrupo=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idgrupo');
									
							$idsemestre=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idsemestre');
									
							$idjornada=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idjornada');
									
							$idplan=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idplan');
									
							$idagno=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idagno');
									
							$idcarrera=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idcarrera');
							
							
							
							
							
							$facultad=\DB::table('facultades')
									->where('id','=', $idfacultad)
									->pluck('facultad');	
									
							$carrera=\DB::table('carreras')
									->where('id','=', $idcarrera)
									->pluck('Carrera');					
							
							$grupo=\DB::table('grupos')
									->where('id','=', $idgrupo)
									->pluck('grupo');
							
							$semestre=\DB::table('semestres')
									->where('id','=', $idsemestre)
									->pluck('semestre');
									
							$jornada=\DB::table('tipogrupos')
									->where('id','=', $idjornada)
									->pluck('tipo');		
							
							$plan1=\DB::table('planes')
									->where('id','=', $idplan)
									->pluck('plan');
							
							$agno=\DB::table('agnos')
									->where('id','=', $idagno)
									->pluck('agno');
									
								
									
							$agnoes=\DB::table('agnosestudio')
									->where('id','=', $idagnoestudio)
									->pluck('agno');
							
							
							/*--}}
		<!--////////////////////////////////////////////////////////////////////////////-->	
			@if($sw == 1)
			
	@if(Session::has('alert1'))
<div>	
			<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span class="glyphicon glyphicon-hand-right"></span> <strong>{{ Session::get('alert1') }}</strong>
                <hr class="message-inner-separator">
            </div>
        	<br>
	<br>	
</div>
      @endif
	



			
	@if(Session::has('alert2'))
<div>	
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span class="glyphicon glyphicon-record"></span> <strong>{{ Session::get('alert2') }}</strong>
                <hr class="message-inner-separator">
            </div>
        <br>
	
</div>
      @endif
	

	
			
	@if(Session::has('alert3'))	
<div>        
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <span class="glyphicon glyphicon-ok"></span> <strong>{{ Session::get('alert3') }}</strong>
                <hr class="message-inner-separator">
           </div>
       
	<br>	
</div>	
@endif
	





		<!--/////////////////////tabla horario//////////////////////////////////////////-->
				<div class="table-responsive">
							
								<table class="table-bordered table2">
									<h4 class="text-center">GENERAR HORARIOS</h4>
									<br>
									<br>	
									<tr>	
										<td class="strong text-center bg-info tr2">Facultad:</td><td>{{$facultad}}</td>
									</tr>
									
									<tr>		
										<td class="strong text-center bg-info tr2">Carrera:</td><td>{{$carrera}}</td>
									</tr>
									
									<tr>		
										<td class="strong text-center bg-info tr2">Plan:</td><td>{{$plan1}}</td>
									</tr>		
									
									<tr>		
										<td class="strong text-center bg-info tr2">Semestre:</td><td>{{$semestre}}</td>
									</tr>
									
									<tr>		
										<td class="strong text-center bg-info tr2">Grupo:</td><td>{{$grupo}}</td>
									</tr>				
									
									<tr>		
										<td class="strong text-center bg-info tr2">Jornada:</td><td>{{$jornada}}</td>
									</tr>		
									
									<tr>		
										<td class="strong text-center bg-info tr2">Año:</td><td>{{$agno}}</td>
									</tr>		
										
									<tr>		
										<td class="strong text-center bg-info tr2">Año de Estudio:</td><td>{{$agnoes}}</td>
									</tr>	
											
																				
					
										
								</table>
								
								{{--TABLA QUE AGRUPA A LOS ROLES ALMACENADOS PARA PODER EDITARLOS O ELIMINARLOS--}}
								<table class="table-bordered table2">						
									<!--Lunes/martes/miércoles/jueves/viernes-->
									<tr class="strong text-center bg-info tr2">
										<!--<td>HORA</td><td>LUNES</td><td>MARTES</td><td>MIÉCOLES</td><td>JUEVES</td><td>VIERNES</td><td>SABADO</td><td>DOMINGO</td></tr>
										-->
										<td>HORA</td>
										@foreach(App\Dia::all() as $dia)
										<td>{{$dia->dia}}</td>		
								@endforeach
								</tr>
								
								
								
@foreach(App\Horas::all() as $horas)												
	
	<tr>
		<td class="strong text-center bg-info tr2">{{$horas->hora}}</td>
<!--******************************************************************DIAS**********************************************************************************************************-->
					<!--lunes-->	
		@foreach(App\Dia::all() as $dia)
			<td class="strong text-center bg-warning tr2">
				{{--*/$horariov=DB::table('detalleshorarios')->where('iddia', $dia->id)->where('idhora', $horas->id)->where('idhorarioss', $parametros['id'])->get();/*--}}				
				@if(count($horariov) > 0 )										
					{{--*/
						$h = $horariov[0];
					/*--}}
						{{$fac = DB::table('materias')->where('id', $h->idmateria)->pluck('materia')}}
						<br>
						{{$fac = DB::table('divgrupo')->where('id', $h->iddivgrupo)->pluck('diviciong')}}
						<br>
						@if($h->idlab ==1)
						<div>
							SALON:
						{{$fac = DB::table('salones')->where('id', $h->idsalon)->pluck('salon')}}
						@endif
						@if($h->idsalon ==1)
						</div>
						<div>
							LABORATORIO:
						{{$fac = DB::table('laboratorios')->where('id', $h->idlab)->pluck('laboratorio')}}
						</div>
						@endif
						<br>
						<button type="button" class="btn btn-success editModal" data-toggle="modal" data-semestre_id="{{ $idsemestre }}" data-agno_id="{{ $idagno }}"   data-id="{{ $h->id }}" data-dia_id="{{ $dia->id }}" data-dia_n="{{ $dia->dia }}" data-hora_id="{{ $horas->id}}" data-hora_n="{{ $horas->hora }}"  data-parametro = "{{ $parametros['id'] }}"  data-target="#exampleModal" data-whatever="@mdo"><i class="glyphicon glyphicon-edit"></i></button>		
				@else	
					<button type="button" class="btn btn-primary storeModal" data-toggle="modal" data-semestre_id="{{ $idsemestre }}" data-agno_id="{{ $idagno }}"  data-dia_id="{{ $dia->id }}" data-dia_n="{{ $dia->dia }}" data-hora_id="{{ $horas->id}}" data-hora_n="{{ $horas->hora }}" data-parametro = "{{ $parametros['id'] }}"  data-target="#exampleModal" data-whatever="@mdo">+</button>
				@endif
			</td>
		@endforeach	
		</tr>
	
@endforeach						    
</table>
</div>	
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
					
	
	
					
@if($parametros['id'] > 0)
<div class="table-responsive">
	<table class="table-bordered table2">
		<tr>
			<td class="strong text-center bg-info tr2">Profesores</td>
			<td class="strong text-center bg-info tr2">Codigo de Asignatura</td>
			<td class="strong text-center bg-info tr2">Materias</td>
		</tr>
		
		
		
			{{--*/
					
			$hor = DB::table('detalleshorarios')
                     ->where('idhorarioss', '=', $parametros['id'])
                     ->groupBy('iduser')
                     ->get();
					
			/*--}}

@foreach($hor as $h)
			
		<tr class="strong text-center bg-warning tr2">		
			<td>{{$use = DB::table('users')->where('id', $h->iduser)->pluck('nombre')}} {{$use1 = DB::table('users')->where('id', $h->iduser)->pluck('apellido')}}</td>
			<td>{{$cod = DB::table('materias')->where('id', $h->idmateria)->pluck('codigomateria')}}</td>
			<td>{{$fac = DB::table('materias')->where('id', $h->idmateria)->pluck('materia')}}</td>
		
		</tr>
		
@endforeach




	</table>
</div>				
@else
		<div class="form-group">
			<label>Materias no asignadas </label>
		</div>
					
@endif					
					<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">DETALLES HORARIOS</h4>
      </div>
      <div class="modal-body">
<!--/////////////////////////////////////////////////////////-->

<?php
$Detalleshorarios=0;
?>

	{{-- atributos form llenados por script.js --}}
		<form method="" action="" id="formModal">
			{!! csrf_field() !!}
			<div class="methodEdit"></div>
					<div class="row">
						<div class="col-sm-6">
							Dia: <p id="diaN"></p>
							
						</div>
						<div class="col-sm-6">
							Hora: <p id="horaN"></p>
							
						</div>
					</div>
						
						
						
						<input type="hidden" name="id" value ="" id="parametro">
						<input type="hidden" name="iddia" value ="" id="dia">
						<input type="hidden" name="idhora" value ="" id="hora">
						
						
						
						<div class="form-group">
							<label class="col-md-4 control-label">MATERIAS</label>
							<div class="col-md-6">
	
							
							{{--*/
							$planes=\DB::table('horarioss')				
									->where('id', $parametros['id'])
									->pluck('idplan');
							$materiass=\DB::table('materias')
									->join('cxpxm','cxpxm.idmateria','=','materias.id')
									->where('cxpxm.idplan','=', $planes)
									->where('cxpxm.idagnoestudio','=',$idagnoestudio)
									->where('cxpxm.idsemestre','=',$idsemestre)
									->select('materias.materia','materias.id')
									->lists('materias.materia','materias.id');					
							
							
							
							/*--}}
							
							

							{!! Form::select('idmateria', $materiass, null, array('class' => 'form-control', 'id'=>'idmateria' )) !!}
					
	

							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-4 control-label">PROFESORES</label>
							<div class="col-md-6">
									{{--*/$user = App\User::select('id',DB::raw('concat(nombre," ",apellido) as nombrec'))->where('idrol','<>',1)->lists('nombrec','id')/*--}}
									{!! Form::select('iduser', $user, null, array('class' => 'form-control','id'=>'iduser')) !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">TIPO DE CLASES</label>
							<div class="col-md-6">
										{!! Form::select('idtipoclass', App\Tipoclass::lists('tipo','id'), null, array('class' => 'form-control','id'=>'idtipoclass')) !!}
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">DIVIDIR GRUPO</label>
							<div class="col-md-6">
							{!! Form::select('iddivin', App\Divin::lists('divicion', 'id'), null, array('class' => 'form-control','id'=>'iddivin')) !!}
							</div>
						</div>
						
			<!--///////////////////////dividir salones /////////////////////////-->
						
							<div class="row" id="menu_div" style="display:none;">
								<div class="col-md-6 col-md-offset-3">
									<div class="panel panel-default">
										<div class="panel-heading">SI SE DIVIDE EL GRUPO</div>		
										<div class="panel-body ">
													
				
											<div class="form-group">
												<label class="col-md-10 control-label">DIVISIÓN  DE GRUPOS </label>
												<div class="col-md-12">
														{!! Form::select('iddivgrupo', App\Divgrupo::lists('diviciong', 'id'), 5, array('class' => 'form-control','id'=>'iddivgrupo')) !!}
												</div>
											</div>
										</div>												
									</div>			
								</div>
							</div>
						
						<!--///////////////////////fin de laboratorios///////////////////////////-->					
						<!--///////////////////////LABORATORIOS/////////////////////////-->
						
							<div class="row" id="menu_labs" style="display:none;">
								<div class="col-md-6 col-md-offset-3">
									<div class="panel panel-default">
										<div class="panel-heading">SI ES UN LABORATORIO</div>		
										<div class="panel-body ">
													
				
											<div class="form-group">
												<label class="col-md-10 control-label">LABORATORIOS</label>
												<div class="col-md-12">
														{!! Form::select('idlab', App\Laboratorios::lists('laboratorio', 'id'), null, array('class' => 'form-control','id'=>'idlab')) !!}
												</div>
											</div>
										</div>												
									</div>			
								</div>
							</div>
						
						<!--///////////////////////fin de laboratorios///////////////////////////-->
						
						
						
	<!--///////////////////////////////////////////////////////////////////SALONES DE CLASES////////////////////////////////////////////////////-->
						
												
												
							<div class="row" id="menu_salones" style="display:none;">
								<div class="col-md-6 col-md-offset-3">								
									<div class="panel panel-default">
										<div class="  panel-heading">SI ES UN SALON DE CLASES</div>		
										<div class="panel-body">
											<div class="form-group">
												<label class="col-md-10 control-label">SALON DE CLASES</label>
												<div class="col-md-12">
														{!! Form::select('idsalon', App\Salones::lists('salon', 'id'), null, array('class' => 'form-control','id'=>'idsalon')) !!}
												</div>
											</div>
										</div>			
									</div>
								</div>
							</div>


	<!--////////////////////////////////////////////////////////////////fin de salones //////////////////////////////////////////////////////////////////////////////-->						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-6">
								<button type="submit" class="btn btn-primary">
									REGISTRAR
								</button>
								<br>
							</div>
						</div>
					</form>
					
					<br>
					<br>
		
<!--/////////////////////////////////////////////////////////-->
	</div>
		<center>
			<div class="modal-footer">
				
			</div>
		</center>
    </div>
  </div>
 
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
</div>
					
					
				@endif
			</div>
		</div>
	</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
@endsection

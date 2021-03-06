@extends('app')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading strong">Reporte General de las Solicitudes</div>
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
							<p class="invisible">{!!$p = 0 !!}{!!$e = 0 !!}{!!$c = 0 !!}</p>
							@foreach(App\Solicitud::all() as $solicitud)
								@if($solicitud->idestado == 1)
									<td><p class="invisible">{!!$p++!!}</p></td>
								@endif	 
								@if($solicitud->idestado == 2)
									<td><p class="invisible">{!!$e++!!}</p></td>
								@endif
								@if($solicitud->idestado == 3)
									<td><p class="invisible">{!!$c++!!}</p></td>
								@endif	 	 
							@endforeach
							<h4 class="text-center strong text-danger">Total de solicitudes pendientes: {{$p}}</h4>
							<br><br>
							<h4 class="text-center strong text-warning">Total de solicitudes en proceso: {{$e}}</h4>
							<br><br>
							<h4 class="text-center strong text-success">Total de solicitudes culminadas: {{$c}}</h4>
							<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection

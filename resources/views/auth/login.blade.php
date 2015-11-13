 @extends('app')
 @section('content')
 <!--login modal-->
 <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog">
 		<div class="modal-content">
 			<div class="modal-header">
 				
 				<h1 class="text-center">eUBSCard</h1>
 			</div>
 			<div class="modal-body">
 				<form class="form col-md-12 center-block" method="POST" action="{{ url('sessions') }}">
 					<input type="hidden" name="_token" value="{{ csrf_token() }}">
 					<div class="form-group">
 						<input type="text" value="" class="form-control input-lg" name="name" placeholder="Agente">
 					</div>
 					<div class="form-group">
 						<input type="password" value="" class="form-control input-lg" name="password" placeholder="Senha">
 					</div>
 					<div class="form-group">
 						<input type="submit" class="btn btn-primary btn-lg btn-block" value="Entrar" />
 					</div>
 				</form>
 			</div>
 			<div class="modal-footer">
 				Medical Tech
 			</div>
 		</div>
 	</div>
 </div>
 @endsection		
 
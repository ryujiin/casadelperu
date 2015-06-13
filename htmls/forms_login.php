
<div class="modal fade bs-example-modal-lg" id="login_user" tabindex="-1" role="dialog" aria-labelledby="login_userLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="login_userLabel">Identificarse o crear una cuenta</h2>
      </div>
      <div class="modal-body">
      	<div class="row">
	      	<div class="col-md-6">
	        	<h3>Nuevos clientes</h3>
	        	<p>Al crear una cuenta en Casadelperu.com tu proceso de compra es más rápido porque tus datos ya están registrados en nuestra tienda, además podrás hacer un seguimiento de tus pedidos y estar informado de las últimas novedades.</p>
	        </div>
	        <div class="col-md-6 bg-success">
	        	<h3>Clientes registrados</h3>        	
	        	<p>Si usted tiene una cuenta con nosotros, por favor acceda.</p>
	        	<form action="validar/login.php" class="form-horizontal" method="POST">
	        		<div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="user">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Ingresar</button>
					    </div>
					  </div>
	        	</form>
	        </div>	
      	</div>        
      </div>
    </div>
  </div>
</div>
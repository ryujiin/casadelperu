<section id="page" class="contenedor">
	<div class="pull-right">
		<a class="btn btn-default" href="#" role="button" data-toggle="modal" data-target="#login_user"> Ya estás registrado?Click Aqui</a>
	</div>
    <div class="page-header">
      <h1>Crear Cuenta</h1>
    </div>
    <div class="container-fluid">
    	<p>Al registrarse en nuestra tienda, agilizará el proceso de compra, podrá añadir múltiples direcciones de envío, ver y hacer un seguimiento de sus pedidos, y mucho más.</p>
    	<form action="/validar/crear_cuenta.php" method="POST">
	    	<h3>Informcion de Login</h3>
	    	<div class="row">
			    <div class="col-md-6">
			    	<div class="form-group">
						   <label for="exampleInputEmail1">Correo electronico:</label>
						   <input type="email" class="form-control" name="correo" placeholder="tu_email@example.com">
					</div>
			    </div>
			    <div class="col-md-6">
			    	<div class="form-group">
						   <label for="exampleInputEmail1">Contraseña:</label>
						   <input type="password" class="form-control" name="pass1" placeholder="contraseña">
					</div>
					<div class="form-group">
						   <label for="exampleInputEmail1">Repetir Contraseña:</label>
						   <input type="password" class="form-control" name="pass2" placeholder="repetir contraseña">
					</div>
			    </div>
			</div>
			<h3>Informacion Personal</h3>
			<div class="row">
			    <div class="col-md-6">
			    	<div class="form-group">
						   <label for="exampleInputEmail1">Nombre:</label>
						   <input type="text" class="form-control" name="nombre" placeholder="Nombre">
					</div>
					<div class="form-group">
						   <label for="exampleInputEmail1">Apellidos:</label>
						   <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
					</div>
			    </div>
			    <div class="col-md-6">
			    	<div class="form-group">
						   <label for="exampleInputEmail1">Telefono:</label>
						   <input type="text" class="form-control" name="telefono" placeholder="555-5555">
					</div>
					<div class="form-group">
						   <label for="exampleInputEmail1">Fecha de nacimiento:</label>
						   <div class="row">
						    <div class="col-md-4">
							    <input type="number" class="form-control" size="2" placeholder="DD" min="1" max="31" name="dia">
							   </div>
							   <div class="col-md-4">
							   <input type="number" class="form-control" size="2" placeholder="MM" min="1" max="12" name="mes">
							   </div>
							   <div class="col-md-4">
							   <input type="number" class="form-control" size="4" placeholder="YYYY" min="1900" max="2015" name="ano">							    				    	
							   </div>
						   </div>					    
					</div>
			    </div>
			</div>
			<button class="btn btn-success pull-right" type="submit">Crear Cuenta</button>
		</form>
    </div>
</div>

<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin/">Casa del Peru</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="/"><span class="glyphicon glyphicon-share-alt"></span>IR a Tienda</a></li>
            <li><a href="salir.php"><span class="glyphicon glyphicon-off"></span>Salir</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Buscar...">
          </form>
        </div>
      </div>
    </nav>
</header>

<div id="main">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active">
						<a href="/admin/">Home</a>
					</li>
					<li class="">
						<a href="/admin/?page=catalogo">Catalogo</a>
					</li>
					<li class="">
						<a href="/admin/?page=cliente">Clientes</a>
					</li>
					<li class="">
						<a href="/admin/?page=carros">Carros</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<?php
					if ($page=='catalogo') {
						if ($form=='nuevo_producto') {
							include('formulario/nuevo_producto.php');
						}elseif ($form=='editar_producto') {
							include('formulario/editar_producto.php');
						}else{
							include('catalogo.php');
						}
					}elseif ($page=='cliente') {
						if ($form=='nuevo') {
							include('formulario/nuevo_cliente.php');
						}elseif ($form=='editar') {
							include('formulario/editar_cliente.php');
						}else{
							include('cliente.php');
						}												
					}
					elseif ($page=='carros') {					
						include('carros.php');
					}
					else{
						echo 'Hola administrador';
					}
					
				?>			
			</div>
		</div>
	</div>
</div>
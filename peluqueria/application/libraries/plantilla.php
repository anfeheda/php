<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>
<?php 
	class plantilla
	{
		var $titulo;
		var $menu;
		var $fechahora;
	
		public function __construct()
		{
			//No tiene parent porque no hereda de ninguna clase
			//configurar la hora local
			date_default_timezone_set('America/Bogota');
			//Y año con los cuatro dígitos
			$this->fechahora=date("Y-m-d H:i:s");
			$this->titulo="<h1>Tienda del peluquero crisman</h1>";
			//Enlaces (menú)
			
			$this->menu='<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">Tienda crisman s.a</a>
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="' . base_url() . 'index.php/cPeluqueria">Inicio</a></li>
			      <li><a href="'.base_url().'index.php/cSesion/cerrarSesion">Cerrar sesion</a></li>
			      <li><a href="'.base_url().'index.php/cPeluqueria/registroProvedor">Proovedor</a></li>

			      <li><a href="'.base_url().'index.php/cPeluqueria/verProvedor">Provedor registrado</a></li>

			      <li><a href="'.base_url().'index.php/cPeluqueria/registroProducto">Registro producto</a></li>

			      <li><a href="'.base_url().'index.php/cPeluqueria/registroCitas">Citas aca</a></li>

			      <li><a href="'.base_url().'index.php/cPeluqueria/vergaleria">Nuestros productos</a></li>
			      
			    </ul>
			  </div>
			</nav>';

		}
		//funciones que devuelven contenido
		public function devolverTitulo()
		{
			return $this->titulo;
		}
		public function devolverMenu()
		{
			return $this->menu;
		}
		public function devolverFechaHora()
		{
			return $this->fechahora;
		}

	//Seguidamente ir al controlador cUsuario y nos ubicamos en el constructor
	}	

 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<meta charset="utf-8">
	<title>Nuestros productos</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/estilos.css">
</head>
<body>
<div id="contenedor">
	<div id="cabecera">
		<!-- <h1>Página Inicio</h1> -->
		<!-- Aquí ya no va este título, está en el archivo plantilla.php -->
		<?php echo $enlaces;?>
	</div>
	<!-- Se invoca el controlador cUsuario en la función verUsuarios -->
	<div id="enlaces">
		<!-- Se sugiere que estas líneas de enlaces se guarden en un archivo
		de manera que si hay algún cambio en estos enlaces o se adicionen mas enlaces
		se pueda invocar un archivo php que debe estar en la carpeta application/library (p.e. plantilla.php) -->

		<!-- <p><a href="<?php echo base_url(); ?>index.php/cUsuario">Inicio</a></p>
		<p><a href="<?php echo base_url(); ?>index.php/cUsuario/verUsuarios">Ver Usuarios</a></p> -->

		<!-- <?php echo $titulo; ?> -->

	</div>
	<div id="contenido">
		<!-- Esto se especifica desde la plantilla.php -->
		<!-- <h2>Bienvenidos a la aplicación de usuarios</h2> -->
		 <!-- <?php echo $contenido; ?> -->
		 
	<img src="<?php echo base_url();?>/imagenes/barnices.jpg" width="300" height="300">
		&nbsp;
	<img src="<?php echo base_url();?>/imagenes/rubor.jpg" width="300" height="300">
		&nbsp;
	<img src="<?php echo base_url();?>/imagenes/secador.jpg" width="300" height="300">
		&nbsp;
	<img src="<?php echo base_url();?>/imagenes/utencilios.jpg" width="300" height="300" >
		&nbsp;
	<img src="<?php echo base_url();?>/imagenes/cepillo.jpg" width="300" height="300">
	 	&nbsp;
	<img src="<?php echo base_url();?>/imagenes/palete.jpg" width="300" height="300">
		 </div>
</div>
</body>
</html>

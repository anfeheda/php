<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Peluqueria crisman s.a</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/estilos.css">
</head>
<body>
<div id="contenedor">
	<div id="cabecera">
		<!-- <h1>Página Inicio</h1> -->
		<!-- Aquí ya no va este título, está en el archivo plantilla.php -->
		<?php echo $enlaces; ?>
	</div>
	<!-- Se invoca el controlador cUsuario en la función verUsuarios -->
	<div id="enlaces">
		<!-- Se sugiere que estas líneas de enlaces se guarden en un archivo
		de manera que si hay algún cambio en estos enlaces o se adicionen mas enlaces
		se pueda invocar un archivo php que debe estar en la carpeta application/library (p.e. plantilla.php) -->

		<!-- <p><a href="<?php echo base_url(); ?>index.php/cUsuario">Inicio</a></p>
		<p><a href="<?php echo base_url(); ?>index.php/cUsuario/verUsuarios">Ver Usuarios</a></p> -->

		<?php echo $titulo; ?>

	</div>
	<div id="contenido">
		<!-- Esto se especifica desde la plantilla.php -->
		<!-- <h2>Bienvenidos a la aplicación de usuarios</h2> -->

		<?php echo $contenido;?>
		<!-- //<img src="<?php echo base_url();?>/imagenes/nnnn.jpg" width="953" height="600"> -->
	<div>
       <h2>Ubicacion de nuestra peluqueria</h2>
       	<div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.6871649003987!2d-75.81237100744754!3d6.678029428083866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcbe25f5724687f14!2sParque+De+La+Independencia!5e0!3m2!1ses!2ses!4v1486916077845" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
       	</div>
      </div>
	</div>
</div>
</body>
</html>
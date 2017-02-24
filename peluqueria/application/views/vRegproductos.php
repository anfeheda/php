<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro general de productos crisman s.a</title>
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

		<?php echo $titulo; ?>

	</div>
	<div id="contenido">
		<!-- Esto se especifica desde la plantilla.php -->
		<!-- <h2>Bienvenidos a la aplicación de usuarios</h2> -->
		 <?php echo $contenido; ?> 

		<div id="error">
			<?php echo validation_errors(); ?>
		</div>
		<div>
			<?php echo form_open('cPeluqueria/registroProducto');?>
		</div>
		<center>
		Referencia del producto 
		<input type="text" name="txtreferencia" id="txtreferencia" maxlength="30" placeholder="Digite Referencia" value="<?php echo set_value('txtreferencia',''); ?>">
		<br>
		Descripcion
		<input type="text" name="txtdescripcion" id="txtdescripcion" maxlength="50" placeholder="Digite Descripcion" value="<?php echo set_value('txtdescripcion',''); ?>">
		<br>
		Nit del proovedor
		<input type="text" name="txtnit" id="txtnit" maxlength="30" placeholder="Digite nit" value="<?php echo set_value('txtnit',''); ?>">
		<br>
		Existencia
		<input type="text" name="txtexistencia" id="txtexistencia" maxlength="30" placeholder="Digite existencia" value="<?php echo set_value('txtexistencia',''); ?>">
		<br>
		
		<input type="submit" value="Guardar">
		<input type="reset" value="Restablecer">
		</center>
		<div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
</body>
</html>
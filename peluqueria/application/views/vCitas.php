<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de citas crisman s.a</title>
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
			<?php echo form_open('cPeluqueria/registroCitas');?>
		</div>
		<center>
		Identificacion del cliente 
		<input type="text" name="txtidcliente" id="txtidcliente" maxlength="30" placeholder="Digite identificacion" value="<?php echo set_value('txtidcliente',''); ?>">
		<br>
		Hora
		<input type="text" name="txthora" id="txthora" maxlength="50" placeholder="Digite hora" value="<?php echo set_value('txthora',''); ?>">
		<br>
		¿Motivo cita?
		<input type="text" name="txtcitapara" id="txtcitapara" maxlength="30" placeholder="Digite motivo de cita" value="<?php echo set_value('txtcitapara',''); ?>">
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
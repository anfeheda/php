<!DOCTYPE html>
<html>
<head>
	<title>Clientes registrados de la peluqueria crisman s.a</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/estilos.css">
</head>
<body>
	<div id="contenedor">
	<div id="cabecera">
		<!-- <h1>Página Inicio</h1> -->
		<!--  <?php echo $enlaces; ?> --> 
	</div>
	<!-- Se invoca el controlador cUsuario en la función verUsuarios -->
	<div id="enlaces">
		<!-- Se sugiere que estas líneas de enlaces se guarden en un archivo
		de manera que si hay algún cambio en estos enlaces o se adicionen mas enlaces
		se pueda invocar un archivo php que debe estar en la carpeta application/library (p.e. plantilla.php) -->
		<!-- <p><a href="<?php echo base_url(); ?>index.php/cUsuario">Inicio</a></p>
		<a href="<?php echo base_url(); ?>index.php/cUsuario/verUsuarios">Ver Usuarios</a> -->
		<?php echo $titulo; ?>
	</div>
	<div id="contenido">
		<h1>Clientes Registrados</h1>
		<br>
		<br>
		<table border="1">
		<center>
			<caption align="bottom">
			<center>
				Total de clientes registrados:
				<span style="color:red;font-weight:blue">
					<?php echo $total_clientes; ?> 

				</span>
				<a href="<?php echo base_url(); ?>/index.php/cPeluqueria">Inicia sesion aca</a>
				</center>
			</caption>
			<tr>
				<th>idcliente</th>
				<th>nombre</th>
				<th>direccion</th>
				<th>telefono</th>
				<th>email</th>
				<th>clave</th>
				<th>Eliminar</th>
				<th>Modificar</th>
				

			</tr>

			<?php
				//Recorrer la tabla
				foreach ($contenido->result() as $f)
				{
					$idcliente=$f->idcliente;
					echo "<tr>
							<td>".$f->idcliente."</td>
							<td>".$f->nombre."</td>
							<td>".$f->direccion."</td>
							<td>".$f->telefono."</td>
							<td>".$f->email."</td>
							<td>".$f->clave."</td>
							<td><a href='". base_url().
                          "index.php/cPeluqueria/eliminarcliente/$idcliente' 
                          onclick='return confirm(\"¿Está seguro de eliminar este cliente\");' 
                          title='Eliminar a " . $f->idcliente . "'>
                              Eliminar
                              </a></td>
                          <td><a href='". base_url().
                          "index.php/cPeluqueria/modificarcliente/$idcliente' 
                          onclick='return confirm(\"¿Está seguro de modificar los datos del cliente\");' 
                          title='Modifica a " . $f->idcliente . "'>
                              Modificar
                              </a></td>    </tr>";	
				}
			?>
			</center>
		</table>
	</div>
</div>
</body>
</html>
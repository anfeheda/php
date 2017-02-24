<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido a la peluqueria crisman s.a</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/estilos.css">
</head>
<body>
	<div id="contenedor">
	<div id="cabecera">
		<!-- <h1>Página Inicio</h1> -->
		 <?php echo $enlaces; ?> 
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
		<h1>Provedores Registrados</h1>
		<br>
		<br>
		<table border="1">
			<caption align="bottom">
			<center>
				Total de provedores registrados:
				<span style="color:red;font-weight:blue">
					 <?php echo $total_provedor; ?>  
				</span>
				</center>
			</caption>
			<tr>
				<th>Nit</th>
				<th>Razon social</th>
				<th>direccion</th>
				<th>telefono</th>
				<th>Eliminar</th>
				<th>Modificar</th>
				

			</tr>
			<?php
				//Recorrer la tabla
				foreach ($contenido->result() as $f)
				{
					$nit=$f->nit;
					echo "<tr>
							<td>".$f->nit."</td>
							<td>".$f->razonsocial."</td>
							<td>".$f->direccion."</td>
							<td>".$f->telefono."</td>
							<td><a href='". base_url().
                          "index.php/cPeluqueria/eliminarprovedor/$nit' 
                          onclick='return confirm(\"¿Está seguro de eliminar este provedor?\");' 
                          title='Eliminar a " . $f->nit . "'>
                              Eliminar
                              </a></td>
                          <td><a href='". base_url().
                          "index.php/cPeluqueria/modificarprovedor/$nit' 
                          onclick='return confirm(\"¿Está seguro de modificar los datos del provedor?\");' 
                          title='Modificar a " . $f->nit . "'>
                              Modificar
                              </a></td>    </tr>";	
				}
			?>
		</table>
	</div>
</div>
</body>
</html>
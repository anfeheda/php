<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/estilos.css" type="text/css"/>
    </head>
    <body>
    <div id="contenedor">
            <div id="cabecera">
                <?php
                  //echo $titulo;
                ?>
                
            </div>
            
            <div id="vinculos">
                <?php
                  //echo $enlaces;
                ?>
                
            </div>
            
    <div id="contenido">
              <h2>Actualizar información del cliente</h2>
              <?php
                if($contenido=="<b>No existe el cliente verifica la identificacion</b>")
                {   
                 echo $contenido;
                }
                else
                {
                 $f=$contenido->row();   
                
              ?>
              
              <div id="error">
                  <?php echo validation_errors(); ?>
              </div>
              <center>
              <?php echo form_open("cPeluqueria/actualizarcliente");?>

               <label for="txtidcliente">idcliente</label>
               <input type="text" name="txtidcliente" id="txtidcliente" maxlength="30" value="<?php echo $f->idcliente;?>" readonly="readonly"/>
              <br>
              
              <label for="txtnombre">nombre</label>
              <input type="text" name="txtnombre" id="txtnombre" maxlength="50" value="<?php echo $f->nombre;?>"/>
              <br>
              
              <label for="txtdireccion">direccion</label>
              <input type="text" name="txtdireccion" id="txtdireccion" maxlength="255" value="<?php echo $f->direccion; ?>"/>
              <br>
              <label for="txttelefono">telefono</label>
              <input type="text" name="txttelefono" id="txttelefono" maxlength="255" value="<?php echo $f->telefono; ?>"/>
              <br>
               <label for="txtemail">email</label>
              <input type="email" name="txtemail" id="txtemail" maxlength="255" value="<?php echo $f->email; ?>"/>
              <br>
               <label for="txtclave">clave</label>
              <input type="text" name="txtclave" id="txtclave" maxlength="255" value="<?php echo $f->clave; ?>"/>
              
              <input type="submit" value="Actualizar"/>
              <input type="reset" value="Restablecer"/>
              
              <?php echo form_close();?>
              <?php
                }
              ?>
              </center>
          </div>   
     </div>
</body>
</html>
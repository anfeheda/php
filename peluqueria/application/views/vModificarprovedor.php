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
              <h2>Actualizar información del provedor</h2>
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
              <?php echo form_open("cPeluqueria/actualizarprovedor");?>

               <label for="txtnit">Nit</label>
               <input type="text" name="txtnit" id="txtnit" maxlength="30" value="<?php echo $f->nit;?>" readonly="readonly"/>
              <br>
              
              <label for="txtrazonsocial">razon social</label>
              <input type="text" name="txtrazonsocial" id="txtrazonsocial" maxlength="50" value="<?php echo $f->razonsocial;?>"/>
              <br>
              
              <label for="txtdireccion">direccion</label>
              <input type="text" name="txtdireccion" id="txtdireccion" maxlength="255" value="<?php echo $f->direccion; ?>"/>
              <br>
              <label for="txttelefono">telefono</label>
              <input type="text" name="txttelefono" id="txttelefono" maxlength="255" value="<?php echo $f->telefono; ?>"/>
              <br>

              
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
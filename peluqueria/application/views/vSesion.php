<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inicio de session</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/estilos.css" type="text/css"/>
    </head>
    <body>
        <div id="contenedor">

            <div id="cabecera">
                <?
                  //echo $enlaces;
                ?>
                
            </div>
            
            <div id="vinculos">
                <?
                  //echo $titulo;
                ?>
                
            </div>
            
          <div id="contenido">
                <?php

                echo $contenido;
                
                echo "<div id='error'>".validation_errors()."</div>";
                ?>
                <?php
                echo form_open('cSesion/iniciarSesion');
                ?>
               
              <table>
                  <tr>
                      <th>Email</th> 
                      <td><input type="email" name="txtemail" id="txtemail"/></td>
                  </tr>
                  <tr>
                      <th>Clave</th> 
                      <td><input type="password" name="txtclave" id="txtclave"/></td>
                  </tr>
                  <tr>
                      <td colspan="2">
                      <center>
                          <input type="submit" name="btniniciar" id="btniniciar" value="Iniciar sesión"/>
                          <input type="reset" value="Restablecer"/>
                          <a href="<?php echo base_url(); ?>/index.php/cPeluqueria/registroClientes">Registra tu usuario aca</a>
                          </center>
                      </td>
                  </tr>
                  
              </table>
             <? echo form_close(); ?> 
          </div>
     </div>
    </body>
</html>
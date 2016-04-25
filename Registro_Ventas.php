<?php
require_once("connect.php");
$id=$_GET["actualizar"];
$registro_venta=pasar_registro_venta($id); 
$fila=mysql_fetch_assoc($registro_venta);
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="ajax_registro_venta.js"></script>
	<link rel="stylesheet"  href="estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1>Registro de Ventas</h1>
	<div class="container">
		<div class="center">
       
		</div>
		<div class="form center">
			<form action="" method="post" name="search_form" id="search_form">
				<label for="bucar"> Registro de Ventas</label>
				<input type="text" name="search" id="search">
			</form>
		</div>
		<div id="resultado"></div>

        <div id="formularios" >
              <hgroup>
                        <h1 class= "separar verde">Ingreso de Compras</h1>
              </hgroup>
            
                                <form method="post" action ="Registro_Ventas.php" >

                                  <div>
                                    <label for ='id'>Id:</label>
                                    <input type='text' name ="id" id='id' placeholder ='0' required  readonly value="<?php echo  $fila['Id'] ;?>">
                                  </div>
                                    
                                   
                                    <div>
                                    <label for ='fecha'>Fecha:</label>
                                    <input type='text' name ="fecha"id='fecha' placeholder ='Ingrese fecha' required value="<?php echo  $fila['Fecha'] ;?>">
                                    </div>
                                    
                                     <div>   
                                    <label for ='valor_venta'>Valor de Venta:</label>
                                    <input type='text' name ="valor_venta" id='valor_venta' placeholder ='Ingrese valor' required value="<?php echo  $fila['Valor_Venta'] ;?>">
                                     </div> 

                                    <div>
                                    <label for ='tipo_documento'>Tipo Documento:</label>
                                    <input type='text' name ="tipo_documento" id='tipo_documento' placeholder ='Ingrese tipo' required value="<?php echo  $fila['Tipo_Documento'] ;?>">
                                    </div>
                                     
                                   <div>
                                    <label for ='n_documento'>Nro. Documento:</label>
                                    <input type='text' name ="n_documento" id='n_documento' placeholder ='002456'required value="<?php echo  $fila['Nro_Documento'] ;?>">
                                   </div>

                                    <div class="guardar">
                                    <input type=submit value= "Guardar" class="boton" name="guardar" > 
                                    <input type=submit value="Guardar_Actualización" class="boton" name="actualizo" > 
                                    <a class="enlace" href="Reporte_Registro_Ventas.php"> Mostrar Reporte</a>
                                    </div>
                                  

                                </form>
                              
        </div> 
 
        <div class="footer center">
        	Copyright ©  2015 - Reservados todos los Derechos<br>
        </div>
      
        <?php

    if (isset($_POST["guardar"])) 
    {
         echo  $fecha=$_POST["fecha"];
         echo $valor_venta=$_POST["valor_venta"];
         echo $tipo_documento=$_POST["tipo_documento"];
         echo $n_documento=$_POST["n_documento"];
         $registro_venta=guardar_datos_registro_venta($fecha,$valor_venta, $tipo_documento,$n_documento);  
    } 
    if (isset($_POST["actualizo"])) 
   {
         echo $id=$_POST["id"];
         echo  $fecha=$_POST["fecha"];
         echo $valor_venta=$_POST["valor_venta"];
         echo $tipo_documento=$_POST["tipo_documento"];
         echo $n_documento=$_POST["n_documento"];
         $registro_venta=edita_registro_venta($fecha,$valor_venta, $tipo_documento,$n_documento);  
    }
  ?>
	</div>

</body>
</html>
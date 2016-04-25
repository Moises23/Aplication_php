<?php
require_once("connect.php");
$id=$_GET["actualizar"];
$registro_compra=pasar_registro_compra($id); 
$fila=mysql_fetch_assoc($registro_compra);
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="ajax_registro_compra.js"></script>
	<link rel="stylesheet"  href="estilos.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
	<h1>Registro de Compras</h1>
	<div class="container">
		<div class="center">
       
		</div>
		<div class="form center">
			<form action="" method="post" name="search_form" id="search_form">
				<label for="bucar"> Registro de Compras</label>
				<input type="text" name="search" id="search">
			</form>
		</div>
		<div id="resultado"></div>

        <div id="formularios" >
              <hgroup>
                        <h1 class= "separar verde">Ingreso de Compras</h1>
              </hgroup>
            
                                <form method="post" action ="Registro_Compras.php" >

                                  <div>
                                    <label for ='id'>Id:</label>
                                    <input type='text' name ="id" id='id' placeholder ='0' required  readonly value="<?php echo  $fila['Id'] ;?>">
                                  </div>
                                    
                                   
                                    <div>
                                    <label for ='proveedor'>Proveedor:</label>
                                    <input type='text' name ="proveedor"id='proveedor' placeholder ='Ingrese nombre proveedor' required value="<?php echo  $fila['Proveedor'] ;?>">
                                    </div>
                                    
                                     <div>   
                                    <label for ='tipo_documento'>Tipo Documento:</label>
                                    <input type='text' name ="tipo_documento" id='tipo_documento' placeholder ='Ingrese tipo documento' required value="<?php echo  $fila['Tipo_Documento'] ;?>">
                                     </div> 

                                    <div>
                                    <label for ='fecha_emision_documento'>Fecha Emisión Doc:</label>
                                    <input type='text' name ="fecha_emision_documento" id='fecha_emision_documento' placeholder ='Ingrese Fecha' required value="<?php echo  $fila['Fecha_Emision_Documento'] ;?>">
                                    </div>
                                     
                                   <div>
                                    <label for ='nr_documento'>Nro. Documento:</label>
                                    <input type='text' name ="n_documento" id='n_documento' placeholder ='002456'required value="<?php echo  $fila['Nro_Documento'] ;?>">
                                   </div>

                                   <div>
                                    <label for ='valor_factura'>Valor de Factura:</label>
                                    <input type='text' name ="valor_factura" id='valor_factura' placeholder ='5000'required value="<?php echo  $fila['Valor_Factura'] ;?>">
                                   </div>

                                    <div class="guardar">
                                    <input type=submit value= "Guardar" class="boton" name="guardar" > 
                                    <input type=submit value="Guardar_Actualización" class="boton" name="actualizo" > 
                                    <a class="enlace" href="Reporte_Registro_Compra.php"> Mostrar Reporte</a>
                                    </div>
                                  

                                </form>
                              
        </div> 
 
        <div class="footer center">
        	Copyright ©  2015 - Reservados todos los Derechos<br>
        </div>
      
        <?php

    if (isset($_POST["guardar"])) 
    {
         echo $proveedor=$_POST["proveedor"];
         echo $tipo_documento=$_POST["tipo_documento"];
        echo $fecha_emision_documento=$_POST["fecha_emision_documento"];
         echo $n_documento=$_POST["n_documento"];
         echo $valor_factura=$_POST["valor_factura"];
         $registro_compra=guardar_datos_registro_compra($proveedor, $tipo_documento, $fecha_emision_documento,$n_documento,$valor_factura);  
    } 
    if (isset($_POST["actualizo"])) 
   {
         $id=$_POST["id"];
         $proveedor=$_POST["proveedor"];
         $tipo_documento=$_POST["tipo_documento"];
         $fecha_emision_documento=$_POST["fecha_emision_documento"];
         $n_documento=$_POST["n_documento"];
         $valor_factura=$_POST["valor_factura"];
         $registro_compra=edita_registro_compra($id,$proveedor, $tipo_documento, $fecha_emision_documento,$n_documento,$valor_factura);  
    }
  ?>
	</div>

</body>
</html>
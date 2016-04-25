<?php
$conex=mysql_connect("localhost","root","") or die ("No se realizo la conexion");
  mysql_select_db("pendiente",$conex) or die("Error con la base de Datos");
  session_start();
  if (!$_SESSION['nombre']){
    header("Location:Index.php");
  }
require_once("connect.php");
@$id=$_GET["actualizar"];
$productos=pasar_productos($id); 
$fila=mysql_fetch_assoc($productos);
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <script type="text/javascript">
    function validarLetras(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; 
       if (tecla==48) return false;
       if (tecla==49) return false;
       if (tecla==50) return false;
       if (tecla==51) return false;
       if (tecla==52) return false;
       if (tecla==53) return false;
       if (tecla==54) return false;
       if (tecla==55) return false;
       if (tecla==56) return false;
       if (tecla==57) return false;
        if (tecla==9) return true; // tab
        if (tecla==8) return true; // backspace
        if (tecla==32) return true; // espacio
        if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
        if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
        if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
 
        patron = /[a-zA-Z]/; //patron
 
        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba de patron
    }  


    function validarNumeros(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==9) return true; // tab
        if (tecla==8) return true; // backspace
        if (tecla==109) return true; // menos
        if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
        if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
        if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
        if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
        if (tecla>=96 && tecla<=105) { return true;} //numpad
 
        patron = /[0-9]/; // patron
 
        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba
    } 
</script>
	<meta charset="UTF-8">
	<title>Productos</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="ajax_productos.js"></script>
	<link rel="stylesheet"  href="estilos.css">
    <link rel="stylesheet"  href="estilos_uno.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
<body>
  <a href="Desconectar.php">Cerrar Sesión</a>
    <div id="header">
        <ul class="nav">
            <li><a href="Inicio.php">Inicio</a></li>
            <li><a href="Cliente.php">Clientes</a></li>
            <li><a href="proveedores.php">Proveedores</a></li>
            <li><a href="Transaccion.php">Transacciones</a></li>
        </ul>
    </div>
	<h1>Productos</h1>
	<div class="container">
		<div class="center">
       
		</div>
		<div class="form center">
			<form action="" method="post" name="search_form" id="search_form">
				<label for="bucar"> Buscar Productos</label>
				<input type="text" name="search" id="search">
			</form>
		</div>
		<div id="resultado"></div>

        <div id="formularios" >
              <hgroup>
                        <h1 class= "separar verde">Ingreso de Productos</h1>
              </hgroup>
            
                                <form method="post" action ="Productos.php" >

                                  <div>
                                    <label for ='id'>Id:</label>
                                    <input type='text' name ="id" id='id' placeholder ='0' required  readonly value="<?php echo  $fila['ID_PRODUCTO'] ;?>">
                                  </div>
                                    
                                    <div>
                                    <label for ='proveedor'>Proveedor:</label>
                                    <select name="cb">
                                        <?php
                                         $nueva='SELECT ID_PROVEEDOR, NOMBRE FROM  proveedor';
                                         $resultado = $connect->query($nueva);
                                         $fil=mysqli_fetch_assoc($resultado);
                                        do
                                        {
                                            echo "<option value='".$fil['ID_PROVEEDOR']."'>";
                                            echo($fil['NOMBRE']);
                                            echo"</option>";
                                        }
                                        while($fil=mysqli_fetch_assoc($resultado));
                                        ?>
                                    </select>
                                    </div>
                                   
                                    <div>
                                    <label for ='nombre'>Nombre:</label>
                                    <input type='text' name ="nombre" id='nombre' placeholder ='Ingrese  producto' required onkeydown="return validarLetras(event)" value="<?php echo $fila['NOMBRE_PRO']; ?>">
                                    </div>
                                    
                                     <div>   
                                    <label for ='precio'>Precio Producto:</label>
                                    <input type='text' name ="precio" id='precio' placeholder ='Ingrese precio' required onkeydown="return validarNumeros(event)" value="<?php echo  $fila['PRECIO_PRO']; ?>">
                                     </div> 

                                      <div>   
                                    <label for ='stock'>Stock:</label>
                                    <input type='text' name ="stock" id='stock' placeholder ='Ingrese stock' onkeydown="return validarNumeros(event)" required value="<?php echo  $fila['STOCK']; ?>">
                                     </div> 

                                    <div class="guardar">
                                    <input type=submit value= "Guardar" class="boton" name="guardar" > 
                                    <input type=submit value="Guardar_Actualización" class="boton" name="actualizo" > 
                                    <a class="enlace" href="Reporte_Productos.php"> Mostrar Reporte</a>
                                    </div>
                                  
 
                                </form>
                              
        </div> 
 
        <div class="footer center">
        	Copyright ©  2015 - Reservados todos los Derechos<br>
        </div>
      
        <?php

    if (isset($_POST["guardar"])) 
    {
        $proveedor=$_POST["cb"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $stock=$_POST["stock"];
        $productos=guardar_datos_productos($proveedor,$nombre,$precio,$stock);  
    } 
    if (isset($_POST["actualizo"])) 
   {
        $id=$_POST["id"];
        $proveedor=$_POST["cb"];
        $nombre=$_POST["nombre"];
        $precio=$_POST["precio"];
        $stock=$_POST["stock"];
        $productos=edita_productos($id,$proveedor,$nombre,$precio,$stock);  
    }
  ?>
	</div>

</body>
</html>
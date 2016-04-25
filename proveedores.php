<?php
$conex=mysql_connect("localhost","root","") or die ("No se realizo la conexion");
  mysql_select_db("pendiente",$conex) or die("Error con la base de Datos");
  session_start();
  if (!$_SESSION['nombre']){
    header("Location:Index.php");
  }
require_once("connect.php");
@$id=$_GET["actualizar"];
$_proveedores=pasar_proveedores($id); 
$fila=mysql_fetch_assoc($_proveedores);
?>
<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="UTF-8">
	<title>Proveedores</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="ajax.js"></script>
	<link rel="stylesheet"  href="estilos.css">
     <link rel="stylesheet"  href="estilos_uno.css">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
</head>
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

function validarcedula()
{
 var i;
 var cedula;
 var acumulado;
 cedula=document.getElementById("cedula").value;
 var instancia;
 acumulado=0;
 for (i=1;i<=9;i++)
 {
  if (i%2!=0)
  {
   instancia=cedula.substring(i-1,i)*2;
   if (instancia>9) instancia-=9;
  }
  else instancia=cedula.substring(i-1,i);
  acumulado+=parseInt(instancia);
 }
 while (acumulado>0)
  acumulado-=10;
 if (cedula.substring(9,10)!=(acumulado*-1))
 {
  alert("Cedula no valida!!");
  document.getElementById("cedula").value='';
 }
} 
</script>
<body>
  <a href="Desconectar.php">Cerrar Sesión</a>
     <div id="header">
        <ul class="nav">
            <li><a href="Inicio.php">Inicio</a></li>
            <li><a href="Productos.php">Productos</a></li>
            <li><a href="Cliente.php">Clientes</a></li>
            <li><a href="Transaccion.php">Transacciones</a></li>
        </ul>
    </div>
	<h1>Proveedores</h1>
	<div class="container">
		<div class="center">
       
		</div>
		<div class="form center">
			<form action="" method="post" name="search_form" id="search_form">
				<label for="bucar"> Buscar Proveedores</label>
				<input type="text" name="search" id="search">
			</form>
		</div>
		<div id="resultado"></div>

        <div id="formularios" >
              <hgroup>
                        <h1 class= "separar verde">Ingreso de Proveedores</h1>
              </hgroup>
            
                                <form method="post" action ="proveedores.php" >
                                  <div>
                                    <label for ='id'>Id:</label>
                                    <input type='text' name ="id" id='id' placeholder ='Id' required  readonly value="<?php echo  $fila['ID_PROVEEDOR'] ;?>">
                                    </div>
                                    
                                   
                                    <div>
                                    <label for ='nombre'>Nombre:</label>
                                    <input type='text' name ="nombre"id='nombre' placeholder ='Ingresa tu nombre' required onkeydown="return validarLetras(event)" value="<?php echo  $fila['NOMBRE'] ;?>">
                                    </div>
                                    
                                     <div>   
                                    <label for ='apellido'>Apellido:</label>
                                    <input type='text' name ="apellido" id='apellido' placeholder ='Ingresa tu apellido' onkeydown="return validarLetras(event)" required value="<?php echo  $fila['APELLIDO'] ;?>">
                                     </div> 
                                     
                                   <div>
                                    <label for ='cedula'>Cedula:</label>
                                    <input type='text' name ="cedula" id='cedula' placeholder ='2300103815' maxlength="10" onchange="validarcedula()" required onkeydown="return validarNumeros(event)" value="<?php echo  $fila['CEDULA'] ;?>">
                                   </div>

                                    <div>
                                    <label for ='ruc'>Ruc:</label>
                                    <input type='text' name =" ruc" id='ruc' maxlength="13" placeholder ='23001038150345'required onkeydown="return validarNumeros(event)" value="<?php echo  $fila['RUC'] ;?>">
                                   </div>

                                    <div>
                                    <label for ='direccion'>Direccion:</label>
                                    <input type='text' name =" direccion" id='direccion' placeholder ='El Carmen'  value="<?php echo  $fila['DIRECCION'] ;?>">
                                   </div>

                                    <div>
                                    <label for ='telefono'>Telefono:</label>
                                    <input type='text' name ="telefono" id='telefono' maxlength="10" placeholder ='0991405312' required onkeydown="return validarNumeros(event)" value="<?php echo  $fila['TELEFONO'] ;?>">
                                   </div>


                                  
                                    <div class="guardar">
                                    <input type=submit value= "Guardar" class="boton" name="guardar" > <input type=submit value="Guardar_Actualización" class="boton" name="actualizo" > 
                                    <a class="enlace" href="Reporte_Proveedores.php"> Mostrar Reporte</a>
                                    </div>
                                  

                                </form>
                              
        </div> 
 
        <div class="footer center">
        	Copyright ©  2015 - Reservados todos los Derechos<br>
        </div>
      
        <?php

    if (isset($_POST["guardar"])) 
    {
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $cedula=$_POST["cedula"];
        $ruc=$_POST["ruc"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $_proveedores=guardar_datos_proveedores($nombre, $apellido, $cedula,$ruc,$direccion,$telefono);  
    } 
    if (isset($_POST["actualizo"])) 
   {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $cedula=$_POST["cedula"];
        $ruc=$_POST["ruc"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $proveedores=editar_proveedores($id,$nombre, $apellido, $cedula,$ruc,$direccion,$telefono);  
    }
  ?>
	</div>

</body>
</html>
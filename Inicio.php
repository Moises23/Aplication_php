<?php
$conex=mysql_connect("localhost","root","") or die ("No se realizo la conexion");
	mysql_select_db("pendiente",$conex) or die("Error con la base de Datos");
	session_start();
	if (!$_SESSION['nombre']){
		header("Location:Index.php");
	}
?>
<DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
 	<script src ='Canvas.js'></script>
 	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
 	<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
 	<link rel="stylesheet" href="Main.css">
</head>
<body>
	<a href="Desconectar.php">Cerrar Sesión</a>
	<div class=" center-block quitar-float text-center espacio-arriba">
		             <img src="Imagenes/Cuadernos_1.jpg">
		             <h1  class = "pacifico letra_tama verde">Libreria Marianela</h1>

	 <div>
		             	<h2 class ="subtitulo-color">Encuentra lo mejor aquí</h2>
             <nav>
             			<a href="proveedores.php"class="espacio">Proveedores</a>
             			<a href="Transaccion.php" class="espacio">Transacción</a>
             			<a href="Productos.php" class="espacio"> Productos</a>
                        <a href="Cliente.php" class="espacio">Cliente</a>
            </nav>
	</div>
		             
    </div>
    <footer>
     		<canvas id ='miCanvas'>
     		</canvas>
     	</footer>
</body>
</html>
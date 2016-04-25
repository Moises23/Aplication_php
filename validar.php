<?php
$email=$_POST['mail'];
$pass=$_POST['pass'];
if (isset($email)) {
	$conex=mysql_connect("localhost","root","") or die ("No se realizo la conexion");
	mysql_select_db("pendiente",$conex) or die("Error con la base de Datos");
	session_start();
	$consulta="SELECT * FROM login WHERE Email='$email' AND Password='$pass'";
	$resultado=mysql_query($consulta,$conex) or die (mysql_error());
	$fila=mysql_fetch_array($resultado);
	if(!$fila ['Id']){
		header("Location:Index.php");
	}
	else
	{
		$_SESSION['nombre']=$fila['Email'];
		header("Location:Inicio.php");
	}
}
else{
	header("Location:Index.php");
}
?>
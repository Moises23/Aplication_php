<?php
require_once("connect.php");
echo $id=$_GET["eliminar"];
$registro_venta=eliminar_registro_venta($id); 
echo "Registro eliminado";
header('Location:Registro_Ventas.php');

?>
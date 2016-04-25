<?php
require_once("connect.php");
echo $id=$_GET["eliminar"];
$_proveedores=eliminar_proveedores($id); 
echo "Registro eliminado";
header('Location:proveedores.php');

?>
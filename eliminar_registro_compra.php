<?php
require_once("connect.php");
echo $id=$_GET["eliminar"];
$registro_compra=eliminar_registro_compra($id); 
echo "Registro eliminado";
header('Location:Registro_Compra.php');

?>
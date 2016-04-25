<?php
require_once("connect.php");
echo $id=$_GET["eliminar"];
$productos=eliminar_productos($id); 
header('Location:Productos.php');
?> 
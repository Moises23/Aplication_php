<?php
require_once("connect.php");
echo $id=$_GET["eliminar"];
$clientes=eliminar_cliente($id); 
header('Location:Cliente.php');
?> 
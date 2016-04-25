<?php
session_start();
if ($_SESSION['nombre']) 
{
	session_unset();
	session_destroy();
	header("Location:Index.php");
}
else
{
	header("Location:Index.php");
}
?>
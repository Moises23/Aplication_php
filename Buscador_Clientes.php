
<html> 
<head>
	<title></title>
	<link rel="stylesheet"  href="estilos.css">
</head>
<body>
<?php
require_once("connect.php");
sleep(1);
$search = '';
if (isset($_POST["search"])) {
	$search=$_POST["search"];
}
$consulta = "SELECT * FROM cliente WHERE nombre LIKE '%".$search."%' OR apellido LIKE '%".$search."%' LIMIT 5";
$resultado = $connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);
?>
<?php if($total>0 && $search!='') {?>
<h2>Resultados </h2>
<form method="get">
<table class="normal">
	<tr>
								                <th>Id_Cliente </th> 
								                <th>Nombre</th>
								                <th>Apellido</th>
								                <th>Cedula</th>
								                <th>Direccion</th>
								                <th>Correo</th>  
								                <th>Eliminar</th> 
								                <th>Actualizar</th> 
   	</tr>   

<?php 
do
{   					
echo"<tr>";
echo ' <td>' .$fila['ID_CLIENTE'].'            </td>  ';
echo ' <td>' .$fila['NOMBRE'].'                </td>  ';
echo ' <td>' .$fila['APELLIDO'].'              </td>  ';
echo ' <td>' .$fila['CEDULA']. '               </td>  ';
echo ' <td>' .$fila['DIRECCION']. '            </td>  ';
echo ' <td>' .$fila['CORREO']. '            </td>  ';
?>
<td> <button type="submit"value= <?php echo  $fila['ID_CLIENTE'] ;?>  name= "eliminar"   onClick= "this.form.action = 'eliminar_cliente.php'" > <input type="image" src="Imagenes/Eliminar.png"></button></td>
<td> <button type="submit" value= <?php echo $fila['ID_CLIENTE'] ;?>   name= "actualizar"   onClick="this.form.action = 'Cliente.php'">    <input type="image" src="Imagenes/Actualizar.png"></button></td>
<?php
echo'</tr>';
}while($fila=mysqli_fetch_assoc($resultado));
?>
</table>
</form>
<?php }
elseif ($total>0 && $search=='') echo"<h2> Ingresa un Parámetro</h2><p> Ingresa palabras claves</p>";
else echo"<h2> No se encontro resultados</h2>";
?>
</body>
</html>
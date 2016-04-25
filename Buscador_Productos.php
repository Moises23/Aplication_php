
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
$consulta = "SELECT * FROM producto WHERE nombre_pro LIKE '%".$search."%' LIMIT 5";
$resultado = $connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);
?>
<?php if($total>0 && $search!='') {?>
<h2>Resultados </h2>
<form method="get">
<table class="normal">
	<tr>
								                <th>Id_Producto </th> 
								                <th>Id_Proveedor</th>
								                <th>Nombre</th>
								                <th>Precio</th>
								                <th>Stock</th>
								                <th>Eliminar</th> 
								                <th>Actualizar</th> 
   	</tr>   

<?php 
do
{   					
echo"<tr>";
echo ' <td>' .$fila['ID_PRODUCTO'].'            </td>  ';
echo ' <td>' .$fila['ID_PROVEEDOR'].'           </td>  ';
echo ' <td>' .$fila['NOMBRE_PRO'].'             </td>  ';
echo ' <td>' .$fila['PRECIO_PRO']. '            </td>  ';
echo ' <td>' .$fila['STOCK']. '                 </td>  ';
?>
<td> <button type="submit"value= <?php echo  $fila['ID_PRODUCTO'] ;?>  name= "eliminar"   onClick= "this.form.action = 'eliminar_productos.php'" > <input type="image" src="Imagenes/Eliminar.png"></button></td>
<td> <button type="submit" value= <?php echo $fila['ID_PRODUCTO'] ;?>   name= "actualizar"   onClick="this.form.action = 'Productos.php'">    <input type="image" src="Imagenes/Actualizar.png"></button></td>
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
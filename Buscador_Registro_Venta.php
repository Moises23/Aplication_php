
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
$consulta = "SELECT * FROM registro_venta WHERE valor_venta LIKE '%".$search."%' OR tipo_documento LIKE '%".$search."%' LIMIT 5";
$resultado = $connect->query($consulta);
$fila=mysqli_fetch_assoc($resultado);
$total=mysqli_num_rows($resultado);
?>
<?php if($total>0 && $search!='') {?>
<h2>Resultados </h2>
<form method="get">
<table class="normal">
	<tr>
								                <th>Id </th> 
								                <th>Fecha</th>
								                <th>Valor_Venta</th>
								                <th>Tipo_Documento</th>							           
								                <th>Nro_Documento</th>   
								                <th>Eliminar</th> 
								                <th>Actualizar</th> 


   	</tr>   

<?php do
{   					
echo"<tr>";
echo ' <td>' .$fila['Id'].'                 </td>  ';
echo ' <td>' .$fila['Fecha'].'              </td>  ';
echo ' <td>' .$fila['Valor_Venta'].'        </td>  ';
echo ' <td>' .$fila['Tipo_Documento']. '    </td>  ';
echo ' <td>' .$fila['Nro_Documento'].'      </td>  ';
?>
<td> <button type="submit"value= <?php echo  $fila['Id'] ;?>  name= "eliminar"   onClick= "this.form.action = 'eliminar_registro_venta.php'" > <input type="image" src="Imagenes/Eliminar.png"></button></td>
<td> <button type="submit" value= <?php echo $fila['Id'] ;?>   name= "actualizar"   onClick="this.form.action = 'Registro_Ventas.php'">    <input type="image" src="Imagenes/Actualizar.png"></button></td>
<?php
echo'</tr>';
}while($fila=mysqli_fetch_assoc($resultado)) ;
?>
</table>
</form>
<?php }
elseif ($total>0 && $search=='') echo"<h2> Ingresa un Parámetro</h2><p> Ingresa palabras claves</p>";
else echo"<h2> No se encontro resultados</h2>";
?>
</body>
</html>

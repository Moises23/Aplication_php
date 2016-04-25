<?php
$_host="localhost";
$_user="root";
$_pass="";
$_db="pendiente";
$connect = new mysqli($_host,$_user,$_pass,$_db) or die ("error".mysqli_error($connect)); 

function conectar()
	{
	
	$conexion=mysql_connect("localhost","root","");
	if($conexion==false)
	{ 
		echo("<br> Error de Conexion");
		return false;
	}
	else
		{
			$bdd=mysql_select_db("pendiente",$conexion);
			if ($bdd==true)
				{
				
				}
			else
				{
					echo("<br> Error de conexion");
				}
		return $conexion;
		}
	}
//////////////////////////////////////////////////Proveedores Funciones////////////////////////////////////////////////
function guardar_datos_proveedores ($nombre, $apellido, $cedula,$ruc,$direccion,$telefono)
	{
		$conexion=conectar();
		$_proveedores=mysql_query ("insert into proveedor (nombre,apellido,cedula,ruc,direccion,telefono)values('$nombre', '$apellido', '$cedula','$ruc','$direccion','$telefono')",$conexion);
		return $_proveedores;
	}

	function editar_proveedores ($id,$nombre, $apellido, $cedula,$ruc,$direccion,$telefono)
	{
		$conexion=conectar();
		$proveedores=mysql_query ("Update proveedor Set nombre='$nombre', apellido='$apellido', cedula='$cedula',ruc='$ruc',direccion='$direccion', telefono='$telefono' where id_proveedor='$id'",$conexion);
		return $proveedores;
	}
	function eliminar_proveedores($id)
	{
        $conexion=conectar();
        $proveedores=mysql_query("delete from proveedor where id_proveedor=$id");
        return $proveedores;
	}

	function pasar_proveedores($id)
	{
          $conexion=conectar();
          $proveedores=mysql_query("select * from proveedor where id_proveedor='$id'");
          return $proveedores;
	}
///////////////////////////////////////////////////Productos Funciones///////////////////////////////////////////////

	function guardar_datos_productos($proveedor,$nombre,$precio,$stock)
	{
		$conexion=conectar();
		$productos=mysql_query ("insert into producto (id_proveedor,nombre_pro, precio_pro,stock )values('$proveedor','$nombre','$precio','$stock')",$conexion);
		return $productos;
	}

	function eliminar_productos($id)
	{
        $conexion=conectar();
        $productos=mysql_query("delete from producto where id_producto=$id");
        return $productos;
	}

	function pasar_productos($id)
	{
          $conexion=conectar();
          $productos=mysql_query("select * from producto where id_producto='$id'");
          return $productos;
	}

	function edita_productos ($id, $proveedor, $nombre, $precio,$stock)
	{
		$conexion=conectar();
		$productos=mysql_query ("Update producto Set id_proveedor='$proveedor',nombre_pro='$nombre', precio_pro='$precio',stock='$stock' where id_producto='$id'",$conexion);
		return $productos;
	}
	

	///////////////////////////////////////////////////Registro Cliente///////////////////////////////////////////////
	
	function guardar_datos_cliente($nombre,$apellido,$cedula,$direccion,$correo)
	{
		$conexion=conectar();
		$clientes=mysql_query ("insert into cliente (nombre,apellido,cedula,direccion,correo)values('$nombre','$apellido','$cedula','$direccion','$correo')",$conexion);
		return $clientes;
	}

	function eliminar_cliente($id)
	{
        $conexion=conectar();
        $clientes=mysql_query("delete from cliente where id_cliente='$id'");
        return $clientes;
	}

	function pasar_cliente($id)
	{
          $conexion=conectar();
          $clientes=mysql_query("select * from cliente where id_cliente='$id'");
          return $clientes;
	}

	function edita_cliente($id,$nombre,$apellido,$cedula,$direccion,$correo)
	{
		$conexion=conectar();
		$clientes=mysql_query ("Update cliente set nombre='$nombre',apellido='$apellido',cedula='$cedula',direccion='$direccion',correo='$correo' where id_cliente='$id'",$conexion);
		return $clientes;
	}

	///////////////////////////////////////////////////Registro Transacciones///////////////////////////////////////////////
	
	function guardar_datos_transaccion($id_cliente,$fecha1,$nro_documento,$iva,$total_completo)
	{
		$conexion=conectar();
		$transaccion=mysql_query ("insert into transaccion (id_cliente,fecha_transaccion,num_documento,iva,total)values('$id_cliente','$fecha1','$nro_documento','$iva','$total_completo')",$conexion);
		return $transaccion;
	}

	function actualizar_stock_1($id_producto1, $baja_stock1)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock1' where id_producto='$id_producto1'",$conexion);
		return $transa;
	}

	function actualizar_stock_2($id_producto2, $baja_stock2)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock2' where id_producto='$id_producto2'",$conexion);
		return $transa;
	}

	function actualizar_stock_3($id_producto3, $baja_stock3)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock3' where id_producto='$id_producto3'",$conexion);
		return $transa;
	}

	function actualizar_stock_4($id_producto4, $baja_stock4)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock4' where id_producto='$id_producto4'",$conexion);
		return $transa;
	}

	function actualizar_stock_5($id_producto5, $baja_stock5)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock5' where id_producto='$id_producto5'",$conexion);
		return $transa;
	}

	function actualizar_stock_6($id_producto6, $baja_stock6)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock6' where id_producto='$id_producto6'",$conexion);
		return $transa;
	}

	function actualizar_stock_7($id_producto7, $baja_stock7)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock7' where id_producto='$id_producto7'",$conexion);
		return $transa;
	}
    
    function actualizar_stock_8($id_producto8, $baja_stock8)
	{
		$conexion=conectar();
		$transa=mysql_query ("Update producto set stock=stock-'$baja_stock8' where id_producto='$id_producto8'",$conexion);
		return $transa;
	}

?>

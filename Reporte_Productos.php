<?php
require_once("connect.php");
require("Reporte/fpdf.php");
$pdf = new FPDF();
$pdf-> AddPage();
$pdf-> SetFont("Arial","", "12");
$pdf-> Image("Imagenes/Cuadernos_1.jpg", 10,8,10,13,'jpg');
$pdf-> Cell(18,10,'',9);
$pdf-> Cell(150,10,'Bazar y Papeleria Marianela',0);
$pdf-> SetFont("Arial",'',10);
$pdf-> Cell(50,10);
$pdf-> Ln(15);
$pdf-> SetFont("Arial","B",11);
$pdf-> Cell(70,8,'',0);
$pdf-> Cell(100,8,'Lista de Productos',0);
$pdf-> Ln(8);
$pdf-> Ln(15);
$pdf-> SetFont("Arial",'B',8);
$pdf-> Cell(20,8,'Id Producto',0);
$pdf-> Cell(20,8,'Id Proveedor',0);
$pdf-> Cell(40,8,'Nombre',0);
$pdf-> Cell(40,8,'Precio',0);
$pdf-> Cell(40,8,'Stock',0);
$pdf-> Ln(8);
$pdf-> SetFont("Arial",'',8);
//Consulta
$nueva='SELECT * FROM  producto';
$resultado = $connect->query($nueva);
$fila=mysqli_fetch_assoc($resultado);
do
{
   
	$pdf->Cell(20,8,$fila['ID_PRODUCTO'],0);
	$pdf->Cell(20,8,$fila['ID_PROVEEDOR'],0);
	$pdf->Cell(40,8,$fila['NOMBRE_PRO'],0);
	$pdf->Cell(40,8,$fila['PRECIO_PRO'],0);
	$pdf->Cell(40,8,$fila['STOCK'],0);
   $pdf->Ln(8);
}while($fila=mysqli_fetch_assoc($resultado));

$pdf->Output();
?>
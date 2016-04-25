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
$pdf-> Cell(50,10, 0);
$pdf-> Ln(15);
$pdf-> SetFont("Arial","B",11);
$pdf-> Cell(70,8,'',0);
$pdf-> Cell(100,8,'Lista de Compras',0);
$pdf-> Ln(8);
$pdf-> Ln(15);
$pdf-> SetFont("Arial",'B',8);
$pdf-> Cell(10,8,'Id',0);
$pdf-> Cell(20,8,'Proveedor',0);
$pdf-> Cell(25,8,'Tipo Documento',0);
$pdf-> Cell(40,8,'Fecha Emision D.',0);
$pdf-> Cell(30,8,'Nro. Documento',0);
$pdf-> Cell(15,8,'Valor de Factura',0);
$pdf-> Ln(8);
$pdf-> SetFont("Arial",'',8);
//Consulta
$nueva='SELECT * FROM  registro_compra';
$resultado = $connect->query($nueva);
$fila=mysqli_fetch_assoc($resultado);
do
{
   
	$pdf->Cell(10,8,$fila['Id'],0);
	$pdf->Cell(20,8,$fila['Proveedor'],0);
	$pdf->Cell(25,8,$fila['Tipo_Documento'],0);
	$pdf->Cell(40,8,$fila['Fecha_Emision_Documento'],0);
	$pdf->Cell(30,8,$fila['Nro_Documento'],0);
    $pdf->Cell(15,8,$fila['Valor_Factura'],0);
   $pdf->Ln(8);
}while($fila=mysqli_fetch_assoc($resultado));

$pdf->Output();
?>
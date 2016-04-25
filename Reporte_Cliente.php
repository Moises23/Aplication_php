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
$pdf-> Cell(100,8,'Lista de Clientes',0);
$pdf-> Ln(8);
$pdf-> Ln(15);
$pdf-> SetFont("Arial",'B',8);
$pdf-> Cell(15,8,'Id Cliente',0);
$pdf-> Cell(30,8,'Nombre',0);
$pdf-> Cell(25,8,'Apellido',0);
$pdf-> Cell(30,8,'Cedula',0);
$pdf-> Cell(40,8,'Direccion',0);
$pdf-> Cell(45,8,'Correo',0);
$pdf-> Ln(8);
$pdf-> SetFont("Arial",'',8);
//Consulta
$nueva='SELECT * FROM  cliente';
$resultado = $connect->query($nueva);
$fila=mysqli_fetch_assoc($resultado);
do
{
	$pdf->Cell(15,8,$fila['ID_CLIENTE'],0);
	$pdf->Cell(30,8,$fila['NOMBRE'],0);
	$pdf->Cell(25,8,$fila['APELLIDO'],0);
	$pdf->Cell(30,8,$fila['CEDULA'],0);
	$pdf->Cell(40,8,$fila['DIRECCION'],0);
	$pdf->Cell(45,8,$fila['CORREO'],0);
   $pdf->Ln(8);
}while($fila=mysqli_fetch_assoc($resultado));

$pdf->Output();
?>
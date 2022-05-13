<?php

require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
  
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'Reporte de Productos',0,0,'C');
    // Salto de línea
   
    $this->Ln(30);
    $this->SetFont('Arial','B',10);
    $this->SetX(8);
    $this->Cell(10,10,'ID',1,0,'C',0);
    $this->Cell(30,10,'Descripcion',1,0,'C',0,);
    $this->Cell(27,10,'Precio_compra',1,0,'C',0);
    $this->Cell(27,10,'Precio_venta',1,0,'C',0);
    $this->Cell(20,10,'Stock',1,0,'C',0);
    $this->Cell(20,10,'Total',1,0,'C',0);
    $this->Cell(20,10,'Inversion',1,0,'C',0);
    $this->Cell(20,10,'Ganancia',1,0,'C',0);
    $this->Cell(22,10,'Fecha',1,1,'C',0);
	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

$conexion=mysqli_connect("db5007568055.hosting-data.io","dbu833532","mugarte14","ventas");
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(8);

    $pdf->Cell(10,10,$row['codigo'],1,0,'C',0);
    $pdf->Cell(30,10,$row['descripcion'],1,0,'C',0);
	$pdf->Cell(27,10,'$'.$row['precioCompra'],1,0,'C',0);
    $pdf->Cell(27,10,'$'.$row['precioVenta'],1,0,'C',0);
    $pdf->Cell(20,10,'$'.$row['existencia'],1,0,'C',0);
    $pdf->Cell(20,10,'$'.$row['precioVenta'] * $row['existencia'],1,0,'C',0);
    $pdf->Cell(20,10,'$'.$row['precioCompra'] * $row['existencia'],1,0,'C',0);
    $pdf->Cell(20,10,'$'.($row['precioVenta'] - $row['precioCompra']) * $row['existencia'],1,0,'C',0);
    $pdf->Cell(22,10,$row['fecha'],1,1,'C',0);
	


} 


	$pdf->Output();
?>
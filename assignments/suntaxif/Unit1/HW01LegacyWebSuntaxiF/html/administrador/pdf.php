<?php
require("../../php/aud.php");
require('../../fpdf/fpdf.php');
require("../../php/Curso.php");

session_start();

	$usuarioIp=$_SESSION['usuario'][1];
	$macAddress=$_SESSION['usuario'][2];
	$fechaIngreso = $_SESSION['usuario'][3];
	$horaIngreso = date('H:i:s');
	$cedula=$_SESSION['usuario'][6];

	//Auditoriaa
	$registroA = "Descargó Horario";
	$auditoria = new Auditoria();
	$auditoria->addAuditoria($cedula,$usuarioIp,$macAddress,$fechaIngreso,$horaIngreso,$registroA);

$horasBGU = array("07:15", "08:00", "08:45", "09:30", "10:45", "11:30", "12:15", "13:00");
$horasEGB = array("07:15", "08:00", "08:45", "09:30", "10:45", "11:30", "12:15");


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',13);
    // Movernos a la derecha
    $this->Cell(125);
    // Título
    $this->Cell(70,10,'Reporte Horarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(50,10,'Hora', 1,0,'C',0);
	$this->Cell(50,10,'Lunes', 1,0,'C',0);
	$this->Cell(50,10,'Martes', 1,0,'C',0);
	$this->Cell(50,10,'Miercoles', 1,0,'C',0);
	$this->Cell(50,10,'Jueves', 1,0,'C',0);
	$this->Cell(50,10,'Viernes', 1,1,'C',0);
    
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$curso = new Curso();

$codigoCurso = $_GET['curso'];

$nombreCurso = $curso->getCursoPorCodigo($codigoCurso);

if(strpos($nombreCurso[0]["CUR_CURSO"],'BGU') != false){
	$aux = 1;

//Si es de educacion general basica
}else{

	//Si el curso seleccionado es de educacion general basica superior
	if($nombreCurso[0]["CUR_CURSO"] == "10" || $nombreCurso[0]["CUR_CURSO"] == "9" || $nombreCurso[0]["CUR_CURSO"] == "8"){
		$aux = 2;

	//Si el curso seleccionado es de educacion general basica media
	}else if($nombreCurso[0]["CUR_CURSO"] == "7" || $nombreCurso[0]["CUR_CURSO"] == "6" || $nombreCurso[0]["CUR_CURSO"] == "5"){
		$aux = 3;

	//Si el curso seleccionado es de educacion general basica elemental
	}else if($nombreCurso[0]["CUR_CURSO"] == "4" || $nombreCurso[0]["CUR_CURSO"] == "3" || $nombreCurso[0]["CUR_CURSO"] == "2"){
		$aux = 4;

	}

}

$mysqli=new mysqli("localhost","admin","admin","proyecto7");
//$consulta="SELECT DOC_CODIGO FROM horario WHERE HOR_ESTADO = 1 AND CUR_CODIGO = '$codigoCurso'";
$consulta="SELECT m.MAT_NOMBRE FROM horario h, materia m, docente d WHERE h.DOC_CODIGO = d.DOC_CODIGO AND d.MAT_CODIGO = m.MAT_CODIGO AND h.HOR_ESTADO = 1 AND h.CUR_CODIGO = '$codigoCurso'";
$resultado=$mysqli->query($consulta);


$pdf = new PDF('l','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

if($aux == 1){
	$pdf->Cell(50,10,$horasBGU[0], 1,0,'C',0);
}else{
	$pdf->Cell(50,10,$horasEGB[0], 1,0,'C',0);
}

$cont = 1;
$i = 1;
while($row=$resultado->fetch_assoc()){

	if($cont % 5 == 0){

		$pdf->Cell(50,10,$row['MAT_NOMBRE'], 1,1,'C',0);
		
		if($aux == 1 && $i < count($horasBGU)){
			$pdf->Cell(50,10,$horasBGU[$i], 1,0,'C',0);
		}else if(($aux == 2 || $aux == 3 || $aux == 4) && $i < count($horasEGB)){
			$pdf->Cell(50,10,$horasEGB[$i], 1,0,'C',0);
		}
		
		$i++; 
		
	}else{
		$pdf->Cell(50,10,$row['MAT_NOMBRE'], 1,0,'C',0);
	}
	$cont++;
	 
	
}


$pdf->Output();


?>

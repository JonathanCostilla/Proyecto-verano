<?php
	include 'plant.php';
	require '../private/conn.php';

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
    $pdf->SetTitle(utf8_decode("Reporte de distribución"));
    $pdf->Line(40, 35, 165, 35);
	$pdf->SetFillColor(230,230,230);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(13,6,'Plan',1,0,'C',1);
	$pdf->Cell(15,6,'Clave',1,0,'C',1);
	$pdf->Cell(50,6,'Materia',1,0,'C',1);
    $pdf->Cell(17,6,'Grupo',1,0,'C',1);
    $pdf->Cell(23,6,'Semestre',1,0,'C',1);
    $pdf->Cell(13,6,'Hora',1,0,'C',1);
    $pdf->Cell(45,6,utf8_decode('Día'),1,0,'C',1);
    $pdf->Cell(13,6,utf8_decode('Salón'),1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);

    $user = new Database();
    $resultado=$user->search("distribucion", "id_distribucion != 0");

    foreach ($resultado as $row) {
        $plan = $row['plan'];
        $id_plan = $user->search("plan", "id_plan = $plan");
        foreach ($id_plan as $plans){
            $pdf->Cell(13,6,utf8_decode($plans["clave_plan"]),1,0,'C',1);
        }
        $clave = $row['clavemateria'];
        $id_clave = $user->search("clavemateria", "id_clavemateria = $clave");
        foreach($id_clave as $clavemateria){
            $pdf->Cell(15,6,utf8_decode($clavemateria["nombre_clave"]),1,0,'C',1);
        }
        $materia = $row['materia'];
        $id_materia = $user->search("materia", "id_materia = $materia");
        foreach($id_materia as $mat){
            $pdf->Cell(50,6,utf8_decode($mat["nombre_materia"]),1,0,'C',1);
        }
        $grupo = $row['grupo'];
        $id_grupo = $user->search("grupo", "id_grupo = $grupo");
        foreach($id_grupo as $gruposelect){
            $pdf->Cell(17,6,utf8_decode($gruposelect["numero_grupo"]),1,0,'C',1);
        }
        $semestre = $row['semestre'];
        $id_semestre = $user->search("semestre", "id_semestre = $semestre");
        foreach($id_semestre as $semestreselect){
            $pdf->Cell(23,6,utf8_decode($semestreselect["semestre"]),1,0,'C',1);
        }
        $hora = $row['hora'];
        $id_hora = $user->search("hora", "id_hora = $hora");
        foreach($id_hora as $horaselect){
            $pdf->Cell(13,6,utf8_decode($horaselect["nombre_hora"]),1,0,'C',1);
        }
        $dia = $row['dia'];
        $id_dia = $user->search("dia", "id_dia = $dia");
        foreach($id_dia as $diaselect){
            $pdf->Cell(45,6,utf8_decode($diaselect["clave_dia"]),1,0,'C',1);
        }
        $salon = $row['salon'];
        $id_salon = $user->search("salon", "id_salon = $salon");
        foreach($id_salon as $salonselect){
            $pdf->Cell(13,6,utf8_decode($salonselect["nombre_salon"]),1,1,'C',1);
        }
    }


	$pdf->Output();
?>
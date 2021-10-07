<?php
	require 'fpdf183/fpdf.php';
	
	class PDF extends FPDF
	{
        
		function Header()
		{
            $this->Image('../css/img/logouanl.png', 10, 1, 35 );
			$this->Image('../css/img/logofime.png', 170, 10, 30 );
			$this->SetFont('Arial','B',18);
			$this->Cell(30);
			$this->Cell(120,20, 'Distribuciones',0,0,'C');
			$this->Ln(35);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
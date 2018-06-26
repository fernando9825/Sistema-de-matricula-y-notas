<?php


    require '../libraries/fpdf/fpdf.php';

    class PDF extends FPDF
    {
        
        function Header(){
            $this->Image('../../uploads/logo.png', 5, 5, 30);
            $this->Front("Arial", "B", 15);
            $this->Cell(30);
            $this->Cell(120,10,"Listado de Estudiantes",0,0,'C');
            $this->Ln(20);
        }

        function Footer(){
            $this->setY(-15);
            $this->SetFont("Arial", "I", 8);
            $this->Cell(0,10,"Pagina ".$this->PageNo()."/{nb}",0,0,'C');
        }

    }
    

?>
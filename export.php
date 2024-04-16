<?php 
    require('./fpdf186/fpdf.php');
    include('../PHP-Project/php/config.php');

    $result = mysqli_query($conn, 'SELECT * FROM movieUsers');
    $pdf = new FPDF('L');
    $pdf->SetTitle('User Data');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,'PHP-Project User data', 'C');
    $pdf->Ln();

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(15,10,'Sr',1);
    $pdf->Cell(65,10,'Name',1);
    $pdf->Cell(65,10,'Email',1);
    $pdf->Cell(65,10,'Password',1);
    $pdf->Cell(65,10,'Last Login/Signup',1);
    $pdf->Ln();

    $id = 1;
    while ($row = mysqli_fetch_array($result)) {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(15,10,$id,1);
        $pdf->Cell(65,10,$row['Name'],1);
        $pdf->Cell(65,10,$row['Email'],1);
        $pdf->Cell(65,10,$row['Password'],1);
        $pdf->Cell(65,10,$row['LastLogin'],1);
        $pdf->Ln();
        $id += 1;
    }

    $pdf->Output();
    
?>
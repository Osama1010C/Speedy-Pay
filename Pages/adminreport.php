<?php

require_once('../pdf/fpdf.php');
require_once('../Models/Database.php');
$db=new Database();

// SQL query to fetch IPA and Histories from userhistory table
$sql = "SELECT `IPA`, `Histories` FROM `userhistory`";
$result = $db->query($sql);

// Create a PDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set font for data
$pdf->SetFont('Arial', '', 12);

// Fetch and add data to PDF
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0, 10, 'IPA: ' . $row['IPA'], 0, 1);
    $pdf->Cell(0, 10, 'Histories: ' . $row['Histories'], 0, 1);
    $pdf->Ln(5); // Add some space between rows
}

// Output PDF as a file named 'user_history.pdf' for download
$pdf->Output('D', 'user_history.pdf');

// Close connection
$conn->close();
?>

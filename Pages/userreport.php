<?php

require_once('../pdf/fpdf.php');
require_once('../Models/Database.php');
require_once('../Models/User.php');
$user = new User();
$IPA = $user->getIPA();
$db=new Database();

// SQL query to fetch IPA and Histories from userhistory table
$sql = "SELECT * FROM users WHERE IPA = $IPA";
$result = $db->query($sql);

// Create a PDF object
$pdf = new FPDF();
$pdf->AddPage();

// Set font for data
$pdf->SetFont('Arial', '', 12);

// Fetch and add data to PDF
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0, 10, 'IPA: ' . $row['IPA'], 0, 1);
    $pdf->Cell(0, 10, 'Username: ' . $row['username'], 0, 1);
    $pdf->Cell(0, 10, 'Email: ' . $row['email'], 0, 1);
    $pdf->Cell(0, 10, 'Password: ' . $row['userpassword'], 0, 1);
    $pdf->Cell(0, 10, 'Age: ' . $row['age'], 0, 1);
    $pdf->Cell(0, 10, 'Phone: ' . $row['phone_number'], 0, 1);
    $pdf->Cell(0, 10, 'Digital Wallet Balance: ' . $row['digital_wallet_balance']."$", 0, 1);
    $pdf->Ln(5); // Add some space between rows
}

// Output PDF as a file named 'user_history.pdf' for download
$pdf->Output('D', 'user_info.pdf');

// Close connection
$conn->close();
?>

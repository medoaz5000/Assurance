<?php 

// require('../tc/examples/example_001.php');

include('config.php');

ob_start();
session_start();

if(!isset($_SESSION['username'])){
  header('location: ../login.php');
}

$user = $_SESSION['username'];
$query = mysqli_query($db, "select * from personnel_details where Email = '$user' ");
$row = mysqli_fetch_array($query);
$id = $row['CIN'];





define('DB_HOST','Localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','assurance');

function connect(){
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if(mysqli_connect_errno($connect)){
        die("Failed to connect".mysqli_connect_error());
    }
    return $connect;
}

$con = connect();

require('../tc/tcpdf.php');


$pdf = new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('helvetica','B',36);
$pdf->Cell(0,'laxmi Academy',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',14);
$pdf->Cell(0,15,'Rampur Road, Shivneri Nagar',0,1,'C',0,'',false,'M','M');
$pdf->Cell(0,15,'Degloor Dist Nanded',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('Times New Roman','B',12);
$pdf->Cell(72,15,'Email : azizi@gmail.com',0,0,'L',0,'',false,'M','M');
$pdf->Cell(50,15,'phone : 0600000000',0,0,'C',0,'',false,'M','M');
$pdf->Cell(50,15,'Address : Tabount',0,0,'C',0,'',false,'M','M');
$pdf->Output('example.pdf', 'I');
// $pdf->
// $pdf->

?>



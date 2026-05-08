<?php
ob_start(); 
session_start();

$db = mysqli_connect("localhost","root","","assurance_3",3307);

if(!$db){
    die("couldn\'t not connect My sql :" . mysql_error());
}


$user = $_SESSION['username'];
$query = mysqli_query($db, "select * from personnel_details where Email = '$user' ");
$row = mysqli_fetch_array($query);
$id = $row['CIN'];

$ID_R = $_GET['id'];




require('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

$pdf->AddPage();

$pdf->SetFont('helvetica','B',36);
$pdf->Cell(0,22,'Sanlam',0,1,'C',0,'',false,'M','M');
$pdf->ln(8);
$pdf->SetFont('helvetica','B',12);


$pdf->Cell(191,10,'Email: agdal.assurances@gmail.com ',0,1,'R',0,'',false,'M','M');
$pdf->Cell(190,10,'Adresse: 27 Hay El Ouahda Ouarzazate',0,1,'R',0,'',0,false,'M','M');
$pdf->Cell(190,10,'Télé: 05 24 88 84 84', 0,0,'R',0,'',0,false,'M','M');

$pdf->Line(10,49,200,49);

$output = '';
// $sql = "select * from personnel_details where CIN='C0000001' ;";
$sql = "SELECT * FROM `personnel_details` 
INNER JOIN assurance 
ON personnel_details.CIN = assurance.CINa 
INNER JOIN periode 
ON personnel_details.CIN = periode.CINp 
INNER JOIN contrat 
ON contrat.N°_contrat = periode.N°_contrat1 
where personnel_details.CIN = '$id' AND periode.id = '$ID_R'
ORDER BY date DESC;";
$result = mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result)){

$pdf->SetFont('times','BI',12);
$pdf->ln(25);
// $pdf->Cell(180,15,'Date : '.$row["date"],0,1,'R',0,'',0,false,'M','M');
$pdf->ln(3);
 

$pdf->Cell(90,10,'Sociétaire (Souscripteur): ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Nom et Prénom : '. $row["firstname"]." ".$row["lastname"] , 0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'CIN : '.$row["CIN"],0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Adresse: '.$row["address"],0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Ville : '.$row["Ville"],0,0,'L',0,'',0,false,'M','M');


$pdf->ln(10);
$pdf->Cell(90,10,'Assuré ou Proprétaire du véhicule assuré: ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Nom et Prénom : '. $row["firstname"]." ".$row["lastname"],0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'CIN : '.$row["CIN"],0,1,'L',0,'',0,false,'M','M');
// $pdf->Cell(72,15,'Date Naissance : ',0,0,'l',0,'',false,'M','M');
$pdf->Cell(50,15,'N° Permis : '.$row["N°_permis"],0,0,'',0,'',false,'M','M');
// $pdf->Cell(72,15,'Date délivrance : '.$row["Date_mise"],0,0,'l',0,'',false,'M','M');


$pdf->ln(25);
$tbl  = <<<EOD
<table border="1" cellpadding cellspacing="2">
   
   <tr>
   <th colspan="8" align="center" style="font-size:18px; font-weight:bold;">Véhicule</th>
   </tr>

  <tr>
    <th align="center">Immatriculation</th>
    <th align="center">Nombre Place</th>
    <th align="center">Puissance énergie</th>
    <th align="center">Marque</th>
    <th align="center">Date 1ere mise en</th>
    <th align="center">Poids total</th>
    <th align="center">Usage</th>
    <th align="center">Cylindrée</th>
  </tr>

 


   
    <tr>
    <td align="center" style=" font-weight:normal;" >{$row["immatriculation"]}</td>
    <td align="center" style=" font-weight:normal;" >{$row["N°_places"]}</td>
    <td align="center" style=" font-weight:normal;" >{$row["puissance_energie"]}</td>
    <td align="center" style=" font-weight:normal;" >{$row["marque"]}</td>
    <td align="center" style=" font-weight:normal;" >{$row["Date_mise"]}</td>
    <td align="center" style=" font-weight:normal;" >00.0</td>
    <td align="center" style=" font-weight:normal;" >A</td>
    <td align="center" style=" font-weight:normal;" >0</td>
  </tr>
  
  







</table>

EOD;
$pdf->writeHTML($tbl, true,false,false, false,'');



$pdf->ln(5);
$tbl1  = <<<EOD
<table border="1" cellpadding cellspacing="2">
   
   <tr>
   <th  align="center" style="font-size:18px; font-weight:bold;">Assurance</th>
   </tr>

  <tr>
    <th align="center" width="75%" >Puissance fiscale</th>
    <td align="center" width="25%" style=" font-weight:normal;">{$row["Puissence_fiscal"]}</td>
  </tr>

  <tr>
    <th align="center" width="75%">Puissance énergie</th>
    <td align="center" width="25%"  style=" font-weight:normal;" >{$row["Puissence_energie"]}</td>
  </tr>

  <tr>
    <th align="center" width="75%">Garanties</th>
    <td align="center" width="25%"  style=" font-weight:normal;">{$row["Garanties"]}</td>
  </tr>

  <tr>
    <th align="center" width="75%">TOTAL à payer :</th>
    <td align="center" width="25%" >{$row["Prix"]}</td>
  </tr>


</table>
 
EOD;
$pdf->writeHTML($tbl1, true,false,false, false,'');


$pdf->ln(5);
$tbl2  = <<<EOD
<table border="1" cellpadding cellspacing="2">
   
   <tr>
   <th  align="center" style="font-size:18px; font-weight:bold;">Periode</th>
   </tr>

  <tr>
    <th align="center" width="25%" >DU:</th>
    <td align="center" width="75%" style=" font-weight:normal;">{$row["date_creation"]}</td>
  </tr>

  <tr>
    <th align="center" width="25%">AU:</th>
    <td align="center" width="75%"  style=" font-weight:normal;" >{$row["date_expiration"]}</td>
  </tr>

</table>
 
EOD;
$pdf->writeHTML($tbl2, true,false,false, false,'');



$pdf->SetFont('times','BI',12);
$pdf->ln(10);
$pdf->Cell(180,15,'Date : '.$row["date"],0,1,'R',0,'',0,false,'M','M');
$pdf->ln(3);



// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output();
}
//============================================================+
// END OF FILE
//============================================================+

?>
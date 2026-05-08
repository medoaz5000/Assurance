<?php
// ob_start(); 
// session_start();

// $db = mysqli_connect("localhost","root","","assurance");

// if(!$db){
//     die('couldn\'t not connect My sql :' . mysql_error());
// }


// $user = $_SESSION['username'];
// $query = mysqli_query($db, "select * from personnel_details where Email = '$user' ");
// $row = mysqli_fetch_array($query);
// $id = $row['CIN'];







require('tc/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetFont('helvetica','B',36);
$pdf->Cell(0,22,'Laxi Academy',0,1,'C',0,'',false,'M','M');
// $pdf->Cell(0,22,'Laxi Academy',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',14);
$pdf->Cell(0,15,'Rampur Road, Shivneri Nagar',0,1,'C',0,'',false,'M','M');
$pdf->Cell(0,15,'Degloor Dist Nanded',0,1,'C',0,'',false,'M','M');
$pdf->SetFont('helvetica','B',12);
$pdf->Cell(72,15,'Email : azizi@gmail.com',0,0,'l',0,'',false,'M','M');
$pdf->Cell(50,15,'Address : Tabount',0,0,'',0,'',false,'M','M');
$pdf->Cell(72,15,'Tele : 0600000011',0,0,'l',0,'',false,'M','M');
$pdf->Line(10,49,200,49);





$output = '';
// $sql = "select * from personnel_details where CIN='P547841' ;";
$sql = "SELECT * FROM `personnel_details` 
INNER JOIN assurance 
ON personnel_details.CIN = assurance.CINa 
INNER JOIN periode 
ON personnel_details.CIN = periode.CINp 
INNER JOIN contrat 
ON contrat.N°_contrat = periode.N°_contrat1 
where personnel_details.CIN = 'P547841' 
ORDER BY date DESC";
$result = mysqli_query($db,$sql);


while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){








$pdf->SetFont('times','BI',12);
$pdf->ln(18);
// $pdf->Cell(180,15,'Date : '.date("Y/m/d"),0,1,'R',0,'',0,false,'M','M');
$pdf->ln(3);


$pdf->Cell(90,10,'Sociétaire (Souscripteur): ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Nom et Prénom :{$row["firstname"]} ', 0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'CIN : ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Adresse: ',0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Ville : ',0,0,'L',0,'',0,false,'M','M');



$pdf->ln(10);
$pdf->Cell(90,10,'Assuré ou Proprétaire du véhicule assuré: ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'Nom et Prénom : ',0,0,'L',0,'',0,false,'M','M');
$pdf->Cell(90,10,'CIN : ',0,1,'L',0,'',0,false,'M','M');
$pdf->Cell(72,15,'Date Naissance : ',0,0,'l',0,'',false,'M','M');
$pdf->Cell(50,15,'N° Permis : ',0,0,'',0,'',false,'M','M');
$pdf->Cell(72,15,'Date délivrance : ',0,0,'l',0,'',false,'M','M');


// $pdf->ln(3);
// $pdf->Cell(90,10,'Barch : One',0,0,'L',0,'',0,false,'M','M');
// $pdf->Cell(90,10,'Medium : 10',0,0,'L',0,'',0,false,'M','M');

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
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
    <td align="center" style=" font-weight:normal;" ></td>
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
    <td align="center" width="25%" style=" font-weight:normal;"></td>
  </tr>

  <tr>
    <th align="center" width="75%">Puissance énergie</th>
    <td align="center" width="25%"  style=" font-weight:normal;" ></td>
  </tr>

  <tr>
    <th align="center" width="75%">Type assurance</th>
    <td align="center" width="25%"  style=" font-weight:normal;"></td>
  </tr>

  <tr>
    <th align="center" width="75%">Garanties</th>
    <td align="center" width="25%"  style=" font-weight:normal;"></td>
  </tr>

  <tr>
    <th align="center" width="75%">TOTAL à payer :</th>
    <td align="center" width="25%" ></td>
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
    <td align="center" width="75%" style=" font-weight:normal;"></td>
  </tr>

  <tr>
    <th align="center" width="25%">AU:</th>
    <td align="center" width="75%"  style=" font-weight:normal;" ></td>
  </tr>

</table>
 
EOD;
$pdf->writeHTML($tbl2, true,false,false, false,'');


}








// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output();

//============================================================+
// END OF FILE
//============================================================+

?>
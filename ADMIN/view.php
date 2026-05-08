<?php

include('config.php');
session_start();

if(!isset($_SESSION['usernamec'] )){
  header('location: login.php');
}

$user = $_SESSION['usernamec'] ;
$query = mysqli_query($db, "select * from inscription_admin where Email = '$user' ");
$row = mysqli_fetch_array($query);
$id = $row['id'];

$ID_V = $_GET['id_assurance'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sanlam</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/SLM.JO-1fa234df.png" rel="icon">
  <link href="assets/img/SLM.JO-1fa234df.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


  <style>
  table, th, td {
  border-style: none;
  }
  td{
    text-align: center;
  }
  </style>

</head>

<body>

  

  <main id="main" class="main">

    <div class="pagetitle">
      <!-- <h1>Assurance</h1> -->
        <a href="index.php" ><button class="btn btn-primary mx-5">Retour</button></a>
    </div>
    <section class="section profile">
      <div class="container">

        <div class="col-xl-10">
        <div class="card">
            <div class="card-body pt-4 ps-5">
              <div class="tab-content pt-2">

              <h5 class="card-title">Information Personnel:</h5>
                  <table>
<?php

$sql= "SELECT * FROM personnel_details pd
      INNER JOIN assurance a
      ON pd.CIN = a.CINa 
      INNER JOIN document d
      ON a.immatriculation = d.matricule1
      WHERE a.id_assurance = '$ID_V';";

$result = mysqli_query($db,$sql);


while($r = mysqli_fetch_array($result)){
?>
                    <tr>
                      <th width="500px">Nom & Prenom :</th>
                      <td width="65%"><?php echo $r['firstname']." ".$r['lastname']; ?></td>
                    </tr>
                    <tr>
                      <th width="500px">CIN :</th>
                      <td width="65%"><?php echo $r['CIN'];?></td>
                    </tr>  
                    <tr>
                      <th width="500px">Ville :</th>
                      <td width="65%"><?php echo $r['Ville'];?></td>
                    </tr>
                    <tr>
                      <th width="500px">Adresse :</th>
                      <td width="65%"><?php echo $r['address'];?></td>
                    </tr>
                    <tr>
                      <th width="500px">Téléphone :</th>
                      <td width="65%"><?php echo $r['phone'];?></td>
                    </tr>
                    
                  </table>

                  
                <h5 class="card-title">Information Véhicule:</h5>
                <table >
                <tr>
                    <th width="500px">N°_permis :</th>
                    <td width="65%"><?php echo $r['N°_permis'];?></td>
                </tr>
                <tr>
                    <th width="500px">Immatriculation :</th>
                    <td width="65%"><?php echo $r['immatriculation'];?></td>
                </tr>  
                <tr>
                    <th width="500px">Marque/Type :</th>
                    <td width="65%"><?php echo $r['marque'];?></td>
                </tr>
                <tr>
                    <th width="500px">Puissance énergie :</th>
                    <td width="65%"><?php echo $r['puissance_energie'];?></td>
                </tr>
                <tr>
                    <th width="500px">Date 1ère mise en :</th>
                    <td width="65%"><?php echo $r['Date_mise'];?></td>
                </tr>

                <tr>
                    <th>Cylindrée :</th>
                    <td>0</td>
                </tr>
                </table>


                <h5 class="card-title">Document :</h5>
                  <table > 
                    <tr>
                      <td ><img style="width:400px" src="doc/<?php echo $r['image'];?>" ></td>
                    </tr>
<?php
}
?>
                  </table>
                
                </div>
              </div>
            </div>   
          </div><!-- End Bordered Tabs -->
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html> 
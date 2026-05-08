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



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tableau de bord</title>
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

</head>


<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/SLM.JO-1fa234df.png" alt="">
        <span class="d-none d-lg-block">Sanlam</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">0</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">0</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block ps-2"><?php echo $_SESSION['usernamec'] ; ?></span>
          </a><!-- End Profile Iamge Icon -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Tableau de bord</span>
        </a>
      </li><!-- End tableau de bord Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Agence</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms.php">
              <i class="bi bi-circle"></i><span>Ajouter Nouveau offre</span>
            </a>
          </li>
        </ul>
      </li><!-- End Agences Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Liste des clients</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables.php">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Clients Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Liste des assurances</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts.php">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Catogories Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="profil.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed " href="contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

   

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-left"></i>
          <span>Se déconnecter</span>
        </a>
      </li><!-- End Sign Out Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau de bord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="container">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- client -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Clients </h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                        include('config.php');

                        //write query for all inscription_admin
                        $query = "SELECT COUNT(*) AS count FROM `personnel_details` " ;

                        $sql = "SELECT * from personnel_details";

                        if ($result = mysqli_query($db, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf( $rowcount);
                        }
                        
                        //close the connection
                        mysqli_close($db);
                    
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End clients -->

            <!-- offres -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Offres</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-plus"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                      <?php
                        include('config.php');

                        //write query for all inscription_admin
                        $query = "SELECT COUNT(*) AS count FROM `contrat` " ;

                        $sql = "SELECT * from contrat ";

                        if ($result = mysqli_query($db, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf( $rowcount);
                        }
                        
                        //close the connection
                        mysqli_close($db);
                    
                        ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--End offres-->

            <!-- Nomber Assurance -->
            <div class="col-xxl-4 col-lg-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Nombre Assurance </h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-list-ul'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php
                        include('config.php');

                        //write query for all inscription_admin
                        $query = "SELECT COUNT(*) AS count FROM `periode` " ;

                        $sql = "SELECT * from periode ";

                        if ($result = mysqli_query($db, $sql)) {

                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf( $rowcount);
                        }
                        
                        //close the connection
                        mysqli_close($db);
                    
                        ?></h6>
                    </div>
                  </div>
                </div>
              </div>

            </div><!-- End Nomber Assurance -->


            <!-- Nouveau Client -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Nouveau Clients </h5>
                  

                  <table class="table table-sm">
                    <thead class="table-info">
                      <tr>
                        <th scope="col">N° Demande</th>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">CIN</th>
                        <th scope="col">Immarticulation</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
<?php

include 'config.php';

  // $query = "SELECT * FROM personnel_details pd
  // INNER JOIN assurance a
  // ON pd.CIN = a.CINa
  // INNER JOIN periode p
  // ON pd.CIN = p.CINp
  // INNER JOIN contrat c
  // ON p.N°_contrat1 = c.N°_contrat
  // WHERE pd.status='pending' AND a.status1 = 'pending' ;";
  $query= "SELECT * FROM personnel_details pd
          INNER JOIN assurance a
          ON pd.CIN = a.CINa
          INNER JOIN contrat c
          ON c.N°_contrat = a.Num_contrat1
          WHERE pd.status='pending' AND a.status1 = 'pending';";
  
  $query_run = mysqli_query($db,$query) ;
  if(mysqli_num_rows($query_run) > 0)
    {
      $id=0;
      
        foreach($query_run as $client)
        {
          $id++;
                    ?>
                    <tbody class="table-group-divider">
                      <tr>
                        <th scope="row" class=""><?php echo $id;?></th> 
                        <th scope="row"><?= $client['lastname']." ".$client['firstname'];?></th>
                        <th><?= $client['CIN']; ?></th>
                        <th><?= $client['immatriculation']; ?></th>
                        <th><?= $client['marque']; ?></th>
                        
                        <!-- <td><?= $client['Durée']; ?></td> -->

                        <!-- <th scope="row"><?php echo $id;?></th> 
                        
                        <td><?= $client['id_assurance']; ?></td>
                        <td><?= $client['id_personnel']; ?></td>
                        <td><?= $client['firstname']; ?></td> 
                        <td><?= $client['CINa']; ?></td>
                        <td><?= $client['immatriculation']; ?></td>
                        
                        <td><?= $client['Durée']; ?></td> -->
                        <td>
                          <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $client['id_assurance']; ?>" >
                            <input type="hidden" name="cinn" value="<?php echo $client['CIN']; ?>" >
                            <input type="hidden" name="idc" value="<?php echo $client['N°_contrat']; ?>" >
                            <input type="hidden" name="cin" value="<?php echo $client['CINa']; ?>" >
                            <input type="hidden" name="duree" value="<?php echo $client['Durée']; ?>" >
                            <input type="hidden" name="mat" value="<?php echo $client['immatriculation']; ?>" >
                            <input class="btn btn-success btn-sm text-white fw-bold" type="submit" name="approved" value="Accept" > 
                            <input class="btn btn-danger btn-sm text-white fw-bold" type="submit" name="rejected" value="Refuse">
                            <a href="view.php?id_assurance=<?php echo $client['id_assurance'];?>"><input class="btn btn-warning btn-sm text-dark fw-bold" type="button" name="view" value="Voir"></a>
                            <!-- <button href="" class="btn btn-warning btn-sm" >View</button> -->
                          </form>
                        </td>
                      </tr>
                    
                      <?php 
                      }
                      }else{
                        echo '<tr><th colspan="6"><center> no demande</center></th></tr>';
                      }
                      ?>

                      
                    </tbody>
                  </table>
<?php 

if(isset($_POST['approved'])){

    $id = $_POST['id'];
    $idp = $_POST['cinn'];
    $idc = $_POST['idc'];
    $cin = $_POST['cin'];
    $d = $_POST['duree'];
    $mat = $_POST['mat'];

    // $select = "UPDATE assurance SET status = 'accept' where id_assurance='$id' ";
    // $select ="UPDATE assurance, personnel_details
    //           SET status1='Accept', status='Accept' 
    //           where id_assurance='$id' AND id_personnel='$idp' ;";

    // $result = mysqli_query($db, $select);
    
      // $date = date('Y-m-d 00:00:00');
      // $expiry = date('Y-m-d 00:00:00', time()+364*24*60*60 );
      // $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule)
      //         VALUES('2023-04-27 00:00:00', '2023-10-26 00:00:00', '3','C0000001');";
  
      // $r = mysqli_query($db,$sql);

    if($d == 'Année'){

      $select ="UPDATE assurance, personnel_details
      SET status1='Accept', status='Accept' 
      WHERE id_assurance='$id' AND CIN='$idp' ;";

      

      $date = date('Y-m-d 00:00:00');
      $expiry = date('Y-m-d 00:00:00', time()+364*24*60*60 );
      $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule,status2)
              VALUES('$date', '$expiry', '$idc','$cin','$mat','Accept');";

      // $result = mysqli_query($db, $select);
      // $r = mysqli_query($db,$sql);

    
      if(mysqli_query($db, $select) &&  mysqli_query($db,$sql)){
      
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>La demande a été acceptée</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              
              <script>
                if(window.history.replaceState){
                  window.history.replaceState(null, null, window.location.href);
                }
                location.reload();
              </script>';
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>La demande a été refusée</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          
          <script>
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
            location.reload();
          </script>';      
      }
    }

    if($d == '3Mois'){
      
      $select ="UPDATE assurance, personnel_details
      SET status1='Accept', status='Accept' 
      where id_assurance='$id' AND CIN='$idp' ;";

      

      $date = date('Y-m-d 00:00:00');
      $expiry = date('Y-m-d 00:00:00', time()+92*24*60*60 );
      $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule, status2)
              VALUES('$date', '$expiry', '$idc','$cin', '$mat','Accept');";
  
      // $result = mysqli_query($db, $select);
      // $r = mysqli_query($db,$sql);


      if( mysqli_query($db, $select) && mysqli_query($db,$sql)){
      
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>La demande a été acceptée</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          
          <script>
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
            location.reload();
          </script>';
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>La demande a été refusée</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          
          <script>
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
            location.reload();
          </script>'; 
      }
      
    }

    if($d == '6Mois'){

      $select ="UPDATE assurance, personnel_details
      SET status1='Accept', status='Accept' 
      where id_assurance='$id' AND CIN='$idp' ;";

      

      $date = date('Y-m-d 00:00:00');
      $expiry = date('Y-m-d 00:00:00', time()+182*24*60*60 );
      $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule, status2)
              VALUES('$date', '$expiry', '$idc','$cin', '$mat', 'Accept');";

      
      // $result = mysqli_query($db, $select);
      // $r = mysqli_query($db,$sql);


      if( mysqli_query($db, $select) && mysqli_query($db,$sql)){
          
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>La demande a été acceptée</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          
          <script>
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
            location.reload();
          </script>';
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>La demande a été refusée</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          
          <script>
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
            location.reload();
          </script>';

            
      }
                
    }



  
}


if(isset($_POST['rejected'])){
  $id = $_POST['cinn'];

  $select =" DELETE FROM personnel_details WHERE CIN = '$id' ";
  // $result = mysqli_query($db, $select);
  if(mysqli_query($db, $select)){
      
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>La demande a été refusée</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      
      <script>
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
        location.reload();
      </script>';
  }
    //else{
    // echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //     <strong>Echec !</strong>
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //   </div>

      
    //   <script>
    //     if(window.history.replaceState){
    //       window.history.replaceState(null, null, window.location.href);
    //     }
    //   </script>';
    // }
}
?>


                </div>

              </div>
            </div><!-- End Recent Sales -->


            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Renouvellement Assurance </h5>
                

                  <table class="table table-sm ">
                    <thead class="table-info">
                      <tr>
                        <th scope="col">N° Demande</th>
                        <th scope="col">Nom & Prenom</th>
                        <th scope="col">CIN</th>
                        <th scope="col">Immarticulation</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
<?php

include 'config.php';


  $query1 ="SELECT * FROM personnel_details pd
            INNER JOIN assurance a
            ON pd.CIN = a.CINa
            INNER JOIN periode p
            ON a.immatriculation = p.matricule
            INNER JOIN contrat c
            ON p.N°_contrat1 = c.N°_contrat
            WHERE p.status2 = 'pending' 
            ORDER BY p.date DESC;";

  $query_run = mysqli_query($db,$query1) ;
  if(mysqli_num_rows($query_run) > 0)
    {
      $id=0;
      // $id=rand(1000,1000);

        foreach($query_run as $client)
        {
          $id++;
                    
                    ?>
                    <tbody class="table-group-divider">
                      <tr>
                        <th scope="row"><?php echo $id;?></th> 
                        <th scope="row"><?= $client['lastname']." ".$client['firstname'];?></th>
                        <th><?= $client['CIN']; ?></th>
                        <th><?= $client['immatriculation']; ?></th>
                        <th><?= $client['marque']; ?></th>
                        

                        <!-- <th scope="row"><?php echo $id;?></th> 
                        
                        <td><?= $client['id_assurance']; ?></td>
                        <td><?= $client['id_personnel']; ?></td>
                        <td><?= $client['firstname']; ?></td> 
                        <td><?= $client['CINa']; ?></td>
                        <td><?= $client['immatriculation']; ?></td>
                        
                        <td><?= $client['Durée']; ?></td> -->
                        <td>
                          <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $client['id_assurance']; ?>" >
                            <input type="hidden" name="idp" value="<?php echo $client['id_personnel']; ?>" >
                            <input type="hidden" name="idc" value="<?php echo $client['N°_contrat']; ?>" >
                            <input type="hidden" name="cin" value="<?php echo $client['CINa']; ?>" >
                            <input type="hidden" name="duree" value="<?php echo $client['Durée']; ?>" >
                            <input type="hidden" name="mat" value="<?php echo $client['immatriculation']; ?>" >
                            <input type="hidden" name="idpd" value="<?php echo $client['id']; ?>" >
                            <input class="btn btn-success btn-sm text-white fw-bold " type="submit" name="accept" value="Accept" > 
                            <input class="btn btn-danger btn-sm text-white fw-bold" type="submit" name="rejeter" value="Refuse">

                          </form>
                        </td>
                      </tr>
                      
                      <?php 
                      }
                      }else{
                        echo '<tr ><th colspan="6"><center> no renouvellement </center></th></tr>';
                      }
                      ?>

                      
                    </tbody>
                  </table>
                  
<?php
if(isset($_POST['accept'])){

  $id = $_POST['id'];
  $idp = $_POST['idp'];
  $idc = $_POST['idc'];
  $cin = $_POST['cin'];
  $d = $_POST['duree'];
  $mat = $_POST['mat'];
  

  if($d == 'Année'){

    $date = date('Y-m-d 00:00:00');
    $expiry = date('Y-m-d 00:00:00', time()+364*24*60*60 );
    
    $sql ="UPDATE periode 
          SET status2='Accept', date_creation='$date', date_expiration='$expiry' 
          WHERE CINp = '$cin'
          ORDER BY date DESC
          Limit 1;";

  
    
    if($result = mysqli_query($db,$sql)){
      // echo '
      //  <script>
      //   alert("Accept demande succès");
      // </script>';

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>La demande a été acceptée</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              
              <script>
                if(window.history.replaceState){
                  window.history.replaceState(null, null, window.location.href);
                }
                location.reload();
              </script>';

      
    }

   
  }
  if($d == '3Mois'){

    $date = date('Y-m-d 00:00:00');
    $expiry = date('Y-m-d 00:00:00', time()+92*24*60*60 );
    
    $sql ="UPDATE periode 
          SET status2='Accept', date_creation='$date', date_expiration='$expiry' 
          WHERE CINp = '$cin'
          ORDER BY date DESC
          Limit 1;";

    
    if($result = mysqli_query($db,$sql)){
      // echo '
      //  <script>
      //   alert("Accept demande succès");
      // </script>';

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>La demande a été acceptée</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              
              <script>
                if(window.history.replaceState){
                  window.history.replaceState(null, null, window.location.href);
                }
                location.reload();
              </script>';

      
    }
    
    
  }
  if($d == '6Mois'){

    $date = date('Y-m-d 00:00:00');
    $expiry = date('Y-m-d 00:00:00', time()+182*24*60*60 );
    $sql ="UPDATE periode 
      SET status2='Accept', date_creation='$date', date_expiration='$expiry' 
      WHERE CINp = '$cin'
      ORDER BY date DESC
      Limit 1;";


    if($result = mysqli_query($db,$sql)){
      // echo '
      //  <script>
      //   alert("Accept demande succès");
      // </script>';

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>La demande a été acceptée</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              
              <script>
                if(window.history.replaceState){
                  window.history.replaceState(null, null, window.location.href);
                }
                location.reload();
              </script>';

      
    }
    
  }


}

if(isset($_POST['rejeter'])){

  $idpd = $_POST['idpd'];

  $select =" DELETE FROM periode WHERE id = '$idpd' ";
  if(mysqli_query($db, $select)){
      
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>La demande a été refusée</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  
  <script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    location.reload();
  </script>';
}
    
}
?>  



    
                </div>

              </div>
            </div><!-- End  -->


          </div>
        </div><!-- End  -->

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>
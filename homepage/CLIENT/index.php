<?php

include('config.php');
session_start();

if(!isset($_SESSION['username'])){
  header('location: ../login.php');
}
$db = mysqli_connect("localhost","root","","assurance_3",3307);
$user = $_SESSION['username'];
$query = mysqli_query($db, "select * from personnel_details where Email = '$user' ");
$row = mysqli_fetch_array($query);
$id = $row['CIN'];


?>
<?php 
  

if(isset($_POST['renouvelle'])){


  $cin = $_POST['cin'];
  $contrat = $_POST['contrat'];
  $mat = $_POST['matricule'];
  $date = date('Y-m-d 00:00:00');
  $expiry = date('Y-m-d 00:00:00', time()+1*24*60*60 );
  
  $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule)
          VALUE('$date', '$expiry', '$contrat','$cin', '$mat');";

  
    if($result = mysqli_query($db, $sql)){
      
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>La demande a été envoyée</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      
      <script>
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
      </script>';
    }else{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Échec de l’envoi de la demande</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      
      <script>
        if(window.history.replaceState){
          window.history.replaceState(null, null, window.location.href);
        }
      </script>';      
    }
  
}


?>

<?php

if(isset($_POST['envoyer'])){

  $num_permis = $_POST['num_permis'];
  $marque = strtoupper($_POST['marque']);
  $matricule = strtoupper($_POST['matricule']);
  $puissance = $_POST['puissance'];
  $num_place = $_POST['place'];
  $dm = $_POST['dateV'];
  $contrat = $_POST['contrat'];
  $cin = $_POST['cin'];

  
  $sql1 = "INSERT INTO assurance( N°_permis, marque, immatriculation, puissance_energie, N°_places, Date_mise, CINa, Num_contrat1, status1) 
            VALUE( '$num_permis', '$marque', '$matricule', '$puissance', '$num_place', '$dm', '$cin','$contrat', 'Accept');";

  

  $path = "../../../ADMIN/doc/";
  //$m = "document/".$_FILES['file']['name'];
  $m = $_FILES['file']['name'];
 
  $sql2 = "INSERT INTO document(image, CINd, matricule1)
          VALUE('$m','$cin','$matricule');";

  if(mysqli_query($db, $sql2)){
    move_uploaded_file($_FILES['file']['tmp_name'],$path.$m);
  }


  if(mysqli_query($db, $sql1)){

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>La demande a été envoyée pour obtenir d`assurance automobile, en attendant le traitement de votre demande, un courriel ou par SMS</strong>
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
          <strong>Une erreur s`est produite lors du remplissage des cases. Assurez-vous de remplir les cases !</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
          if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
          }
          location.reload();
        </script>';
  }


mysqli_close($db);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sanlam </title>
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


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

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
            <!--<img src="" alt="Profile" class="rounded-circle">-->
            <i class='bx bxs-user'></i>
            <span class="d-none d-md-block ps-2"><?php echo $_SESSION['username'];?></span>
          </a><!-- End Profile Iamge Icon -->

        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Tableau de board</span>
        </a>
      </li><!-- End Dashboard Nav -->

     
      <!--<li class="nav-heading">Pages</li>-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="assurance.php">
          <i class="bi bi-card-list"></i>
          <span>Assurance</span>
        </a>
      </li><!-- End Assurance Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-left"></i>
          <span>Se déconnecter</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau de board</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Tableau de board</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container ">
        <div class="col-lg-12">
            
          <div class="card " style="width: 990px;">
            <div class="card-body">
              <h5 class="card-title">Assurance</h5>

<?php 
  // $query = "SELECT * FROM `personnel_details` 
  //           INNER JOIN assurance 
  //           ON personnel_details.CIN = assurance.CINa 
  //           INNER JOIN periode 
  //           ON personnel_details.CIN = periode.CINp 
  //           INNER JOIN contrat  
  //           ON contrat.N°_contrat = periode.N°_contrat1 
  //           -- where personnel_details.CIN = 'P547841' AND assurance.status1='Accept'
  //           where personnel_details.CIN = '$id' AND assurance.status1='Accept' AND periode.status2='Accept'
  //           ORDER BY date DESC ;";

  $query="SELECT * FROM `personnel_details` 
        INNER JOIN assurance 
        ON personnel_details.CIN = assurance.CINa 
        INNER JOIN periode 
        ON periode.matricule = assurance.immatriculation 
        INNER JOIN contrat  
        ON contrat.N°_contrat = periode.N°_contrat1 
        -- where personnel_details.CIN = 'P547841' AND assurance.status1='Accept'
        where personnel_details.CIN = '$id' AND assurance.status1='Accept' AND periode.status2='Accept'
        ORDER BY date DESC;";
  $query_run = mysqli_query($db,$query);



?>
<?php 


// if(isset($_POST['renouvelle'])){


//   $cin = $_POST['cin'];
//   $contrat = $_POST['contrat'];
//   $mat = $_POST['matricule'];
//   $date = date('Y-m-d 00:00:00');
//   $expiry = date('Y-m-d 00:00:00', time()+1*24*60*60 );

//   $sql = "INSERT INTO periode(date_creation, date_expiration, N°_contrat1, CINp, matricule)
//           VALUE('$date', '$expiry', '$contrat','$cin', '$mat');";

  
//     if($result = mysqli_query($db, $sql)){
      
//         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
//         <strong>La demande a été envoyée</strong>
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//       </div>

      
//       <script>
//         if(window.history.replaceState){
//           window.history.replaceState(null, null, window.location.href);
//         }
//       </script>';
//     }else{
//     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//         <strong>Échec de l’envoi de la demande</strong>
//         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//       </div>

      
//       <script>
//         if(window.history.replaceState){
//           window.history.replaceState(null, null, window.location.href);
//         }
//       </script>';      
//     }
  
// }


?>
              <!-- Table with stripped rows-->
              <table class="table table-striped" >
                <thead class="table-info">
                  <tr>
                    <th>Id</th>
                    <th>Marque</th>
                    <th>Immatriculation</th>
                    <th>Type</th>
                    <th>Garanties</th>
                    <th>Prix</th>
                    <th>Date Creation</th>
                    <th>Date Expiration</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                <tr>
                      
                      <?php 
                        $q="SELECT * FROM `personnel_details` 
                        INNER JOIN assurance 
                        ON personnel_details.CIN = assurance.CINa 
                        INNER JOIN periode 
                        ON periode.matricule = assurance.immatriculation 
                        INNER JOIN contrat  
                        ON contrat.N°_contrat = periode.N°_contrat1 
                        -- where personnel_details.CIN = 'P547841' AND assurance.status1='Accept'
                        where personnel_details.CIN = 'C0000001'
                        ORDER BY date DESC;";
                        
                        $query1 = mysqli_query($db,$q);

                        if($query1 ){
                          foreach($query1 as $r){
                            $t= $r['status2'];
                            if($t == 'pending'){
                              echo '<td class="bg-danger text-white fw-bold" colspan="12"><center>En cours de traitement...</center></td>';
                              
                            } 
                            
                          }
                        }
     
                      
                      ?>
                    
                  </tr>
                  
                <?php
                
                if($query_run ){
                  $idd =0;
                  foreach($query_run as $row){
                    
                    $idd++;
                    ?>
                  
                    <tr>
                      <th scope="row"><?php echo $idd; ?></th>
                      <td><?php echo $row['marque']; ?></td>
                      <td><?php echo $row['immatriculation']; ?></td>
                      <td><?php echo $row['Type_assurance']; ?></td>
                      <td><?php echo $row['Garanties']; ?></td>
                      <td><?php echo $row['Prix']; ?></td>
                      <td><?php echo $row['date_creation']; ?></td>
                      <td><?php echo $row['date_expiration']; ?></td>
                      <td>
                        <!-- <span class="bg-success bg-opacity-75 rounded-pill fw-bold text-dark px-2">Active</span> -->
                        <?php 
                        
                        $e = $row['date_expiration'];
                        $d = date('Y-m-d 00:00:00');

                        if($e < $d){
                          echo '<span class="bg-danger bg-opacity-75 rounded-pill fw-bold text-dark px-2">Expire</span>';
                        }else{
                          echo '<span class="bg-success bg-opacity-75 rounded-pill fw-bold text-dark px-2">Active</span>';
                        }
                        
                        ?>
                      </td>
                      <td>
                        <!-- <a href="/tc/generatepdf.php?id=<?php echo $row['id'];?>"><button class="bg-warning btn btn-warning btn-sm bi bi-printer-fill"></i></button></a> -->
                        <a href="tc/generatepdf.php?id=<?php echo $row['id'];?>"><button class="bg-warning btn btn-warning btn-sm bi bi-printer-fill"></i></button></a>
                      </td>
                      <td>
                      <?php 
                        
                        // $e = $row['date_expiration'];
                        // $a = $row['date_creation'];
                        // $d = date('Y-m-d 00:00:00');
                        // $b = date('Y-m-d 00:00:00',strtotime("$e-3day"));

                        // if($e > $b && $b > $d ){
                        //   echo '<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-arrow-clockwise"></i></button>';
                        // }
                          echo '<button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="bi bi-arrow-clockwise"></i></button>';
                        
                        ?>
                      </td>
                     
                    </tr>
                    
                    

                    <?php
                    
                      }
                    }else{
                      echo '<tr><th colspan="11"><center>no assurance found</center></th></tr>';
                    }

                    
                    ?> 
                     
                
                </tbody>
              </table>
              <!-- End rows -->
<?php 

$c = $row['puissance_energie']; 



if($c == 'Essence'){
  $db = mysqli_connect("localhost", "root", "", "assurance");
  $s = "SELECT * FROM `contrat` where Puissence_energie = 'Essence'; ";
  $r = mysqli_query($db, $s);
  $d = $row['Puissence_energie']; 
  $options = "";

  while($roww = mysqli_fetch_array($r)){
    $options = $options."<option value='$roww[0]'>$roww[1]"." - "."$roww[2] - $roww[3] - $roww[4] - { $roww[5] } - $roww[6]</oiption>";
  }
}else{
  $db = mysqli_connect("localhost", "root", "", "assurance_3",3307);
  $s = "SELECT * FROM `contrat` where Puissence_energie = 'Diesel'; ";
  $r = mysqli_query($db, $s);
  $d = $row['Puissence_energie']; 
  $options = "";

  while($roww = mysqli_fetch_array($r)){
    $options = $options."<option value='$roww[0]' >$roww[1]"." - "."$roww[2] - $roww[3] - $roww[4] - { $roww[5] } - $roww[6]</oiption>";
    // $options = $options."<option>".$roww[0]."</oiption>";
  }
}

  
  $ss = "SELECT * FROM `assurance` where CINa = '$id' ; ";
  $rr = mysqli_query($db, $ss); 
  $options1 = "";

  while($roww1 = mysqli_fetch_array($rr)){
    $options1 = $options1."<option value='$roww1[3]'> $roww1[3] </oiption>";   
  }

  $ns = "SELECT * FROM `contrat` ; ";
  $n = mysqli_query($db, $ns); 
  $options2 = "";

  while($roww2 = mysqli_fetch_array($n)){
    $options2 = $options2."<option value='$roww2[0]'> $roww2[1]"." - "."$roww2[2] - $roww2[3] - $roww2[4] - { $roww2[5] } - $roww2[6]</oiption>";
    
  }

  

?>
              
               <button type="button" class="btn btn-secondary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@fat">Nouveau</button>
              

              <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Nouveau Véhicule</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-11">
                          <label for="num_permis" class="form-label fw-bold fs-6 mt-4">N° Permis</label>
                          <input type="text" name="num_permis" class="form-control" id="num_permis" value="<?php echo $row['N°_permis']; ?>" required>
                        </div>

                        <div class="col-11">
                          <label for="Marque/type" class="form-label fw-bold fs-6">Marque/type</label>
                          <input type="text" name="marque" class="form-control" id="Marque_type" required>
                        </div>

                        <div class="col-11">
                          <label for="Matricule" class="form-label fw-bold fs-6">Immatriculation</label>
                          <input type="text" name="matricule" class="form-control" id="Matricule" required>
                        </div>

                        <div class="col-11">
                        <label for="puissance" class="form-label fw-bold fs-6">Puissance Eneregie</label>
                          <div class="col-11">
                            <select class="form-select" aria-label="Default select example" name="puissance">
                              <option></option>  
                              <option value="Diesel">Diesel</option>
                              <option value="Essence">Essance</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-11">
                          <label for="Marque/type" class="form-label fw-bold fs-6">N° Places</label>
                          <input type="number" name="place" class="form-control" id="place" required>
                        </div>

                        <div class="col-11">
                          <label for="date1ere" class="form-label fw-bold fs-6">Date 1ère mise rn</label>
                          <input type="date" name="dateV" class="form-control" id="dateV" required>
                        </div>

                        <div class="col-11">
                          <label for="Marque/type" class="form-label fw-bold fs-6">Offres</label>
                          <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="contrat" >
                              <option value ="<?php echo $roww2[0]?>">  <?php echo $options2;?> </option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="col-11">
                            <label for="doc" class="form-label fw-bold fs-6">Envoyer les documentes :</label>
                            <input type="file" class="form-control" id="doc" name="file" required>
                        </div>

                      <input type="hidden" name="cin" value="<?php echo $row['CIN'];?>">  
                        
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                      <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Renouvellement</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST">
                      
                        <div class="mb-3">
                          <label for="recipient-name" class="col-form-label">CIN :</label>
                          <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $row['CIN']; ?>" >
                        </div>

                        <div class="mb-3">
                          <label for="matricule" class="form-label">Immatriculation :</label>
                            <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="matricule" >
                                <option value ="<?php echo $roww1[0]; ?>">  <?php echo $options1;?> </option>
                              </select>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                          <label for="puissance" class="form-label">Offers :</label>
                            <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="contrat" >
                                <option value ="<?php echo $roww[0]?>">  <?php echo $options;?> </option>
                              </select>
                            </div>
                        </div>

                        </div>
                        <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="renouvelle">Demande</button>
                      <!-- <input type="submit" name="submit" class="submit btn btn-danger" value="Demande" />  -->
                    </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <?php include('footer.php')?>
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
  <script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>
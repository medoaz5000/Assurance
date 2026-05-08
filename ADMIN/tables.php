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

  <title>Listes des clients </title>
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
            <span class="d-none d-md-block ps-2"><?php echo $_SESSION['usernamec'] ;?></span>
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
          <span>Tableau de board</span>
        </a>
      </li><!-- End Dashboard Nav -->

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
      </li><!-- End Catogory Nav -->

      <!--<li class="nav-heading">Pages</li>-->

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
      <h1>Client List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Clients</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="container section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card" style="width:950px;">
            <div class="card-body" >
              <h5 class="card-title">Client</h5>
<?php 
 
if(isset($_POST['mod'])){
  
  $ln = $_POST['lastname'];
  $fn = $_POST['firstname'];
  $c = $_POST['cin'];
  $e = $_POST['email'];
  $v = $_POST['ville'];
  $a = $_POST['adress'];

  $select ="UPDATE personnel_details
            SET email = '$e', firstname='$fn', lastname='$ln', CIN='$c', Ville='$v', address ='$a'
            WHERE CIN = '$c' ;";


  if($result = mysqli_query($db, $select)){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Terminé !</strong>
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
              <strong>Echec !</strong>
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

 
if(isset($_POST['delete'])){

  $CIN = $_POST['CIN'];

  $select = "DELETE FROM personnel_details
            WHERE CIN = '$CIN' ;";

  if($result = mysqli_query($db, $select)){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Terminé !</strong>
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
            <strong>Echec !</strong>
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
              <!-- Table with CARS rows-->
              <table class="table " style="width:920px;">
                <thead class="table-primary">
                  <tr>
                    <th>Id</th>
                    <th>Nom & Prénom</th>
                    <th>CIN</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                  </tr>
                </thead>
<?php 
  include 'config.php';

  $query= "SELECT * FROM personnel_details ";

  $query_run = mysqli_query($db,$query) ;
  if(mysqli_num_rows($query_run) > 0)
    {
      $id =0;
        foreach($query_run as $client)
        {
          $id++;
          
                  
                  
?>
                <tbody>
                  <tr>
                   <td><strong><?php echo $id; ?></strong></td>
                   <td><?= $client['lastname']." ".$client['firstname']; ?></td>
                   <td><?= $client['CIN']; ?></td>
                   <td><?= $client['email']; ?></td>
                   <td><?= $client['Ville']; ?></td>
                   <td><?= $client['address']; ?></td>
                   <td><?= $client['phone'];?></td>
                   <td>

                    <form action="" method="POST">
                      <button type="button" class="btn badge bg-danger " data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $client['CIN']?>"><i class="bi bi-trash3-fill"></i></button>
                        <div class="modal fade" id="exampleModal1<?php echo $client['CIN']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression :</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              
                                <div class="modal-body">
                                  Êtes-vous sûr de supprimer le client ? <?php echo $client['firstname']." ".$client['lastname'];?>
                                </div>
                                <div class="modal-footer">
                                  <input type="hidden" name="CIN" value="<?php echo $client['CIN']; ?>">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                  <button type="submit" class="btn btn-danger" name="delete">Supprimer</button>
                                </div>
                            </div>
                        </div>
                      </div>
                    </form>
                    

                    <button type="button" class="btn badge bg-warning text-dark " data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $client['CIN']; ?>" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square"></i></button>
                      <div class="modal fade" id="exampleModal<?php echo $client['CIN']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modification :</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>


                          <div class="modal-body">

                            <form action="" method="POST">
                                  
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nom :</label>
                                <input type="text" class="form-control" id="ln" name="lastname" value="<?php echo $client['lastname']?>" >
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Prénom :</label>
                                <input type="text" class="form-control" id="fn" name="firstname" value="<?php echo $client['firstname']?>" >
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">CIN :</label>
                                <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $client['CIN']?>" >
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Email :</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $client['email']?>" >
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Ville:</label>
                                <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $client['Ville']?>" >
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Adresse:</label>
                                <input type="text" class="form-control" id="adresse" name="adress" value="<?php echo $client['address']?>" >
                              </div>
                            
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" name="mod">Enregister</button>
                              </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                   </td>
                  </tr>
<?php 
  }
  }else{
    // echo 'no record found';
  }
?>
  
                </tbody>
              </table>
              <!-- End Table with CARS rows -->
              
            </div>
          </div>
        </div>
      </div>

      
              
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
    <?php include('footer.php');?>
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





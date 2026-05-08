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

    /*include('config.php');

    //write query for all inscription_admin
    $sql = 'select * from inscription_admin';

    //Output Form Entries from the Database
    $sql = "SELECT * FROM inscription_admin";
    //fire query
    $result = mysqli_query($db, $sql);

    //Fetch and Display MySQL Table Data
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
      /* echo "id : ".$row['id']."<br/>";
       echo "FirstName : ".$row['FirstName']."<br/>";
       echo "LastName : ".$row['LastName']."<br/>";
       echo "CIN: ".$row['CIN']."<br/>";
       echo "Email : ".$row['Email']."<br/>";*

    }else{
        echo "0 results";
    }


    mysqli_close($db);*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile </title>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Utilisateur</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


<?php  
  //include('config.php');
  

    //write query for all inscription_admin
    $sql = 'select * from inscription_admin where id = "$id" ' ;

    //Output Form Entries from the Database
    $sql = "SELECT * FROM inscription_admin where id = '$id' ";
    //fire query
    $result = mysqli_query($db, $sql);

    //Fetch and Display MySQL Table Data
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

         echo '<section class="section profile">';
          echo  '<div class="row">';
            echo '<div class="col-xl-4">';

            echo '<div class="card">';
            echo   '<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">';

            echo '<img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">';
            echo '<h2>'.$row['FirstName']." ".$row['LastName'].'</h2>';
            echo '</div>';
            echo '</div>';

            echo'</div>';

            echo'<div class="col-xl-8">';

            echo '<div class="card">';
            echo'<div class="card-body pt-3">';
                  //<!-- Bordered Tabs -->
                  echo '<ul class="nav nav-tabs nav-tabs-bordered">';

                  echo '<li class="nav-item">';
                  echo '<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>';
                  echo'</li>';

                  echo '<li class="nav-item">';
                  echo  '<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>';
                       echo'</li>';

                       echo '<li class="nav-item">';
                       echo   '<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>';
                       echo'</li>';

                       echo'<li class="nav-item">';
                       echo '<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>';
                       echo'</li>';

                       echo'</ul>';

                       echo'<div class="tab-content pt-2">';
                       echo  '<div class="tab-pane fade show active profile-overview" id="profile-overview">';
                      
                       echo '<h5 class="card-title">Profile Details</h5>';

                       echo'<div class="row">';
                       echo '<div class="col-lg-3 col-md-4 label ">ID Admin</div>';
                       echo'<div class="col-lg-9 col-md-8">'.$row['id'].'</div>';
                           echo '</div>';

                           echo '<div class="row">';
                           echo '<div class="col-lg-3 col-md-4 label">FirstName</div>';
                           echo '<div class="col-lg-9 col-md-8">'.$row['FirstName'].'</div>';
                           echo'</div>';

                           echo'<div class="row">';
                           echo'<div class="col-lg-3 col-md-4 label">LastName</div>';
                           echo'<div class="col-lg-9 col-md-8">'.$row['LastName'].'</div>';
                           echo'</div>';

                           echo'<div class="row">';
                           echo '<div class="col-lg-3 col-md-4 label">CIN</div>';
                           echo'<div class="col-lg-9 col-md-8">'.$row['CIN'].'</div>';
                           echo'</div>';

                           echo'<div class="row">';
                           echo'<div class="col-lg-3 col-md-4 label">Email</div>';
                           echo'<div class="col-lg-9 col-md-8">'.$row['Email'].'</div>';
                           echo'</div>';
                           echo'</div>';


                      /* '<div class="row">';
                           '<div class="col-lg-3 col-md-4 label">Phone</div>';
                           '<div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>';
                       '</div>';

                       '<div class="row">';
                           '<div class="col-lg-3 col-md-4 label">Email</div>';
                           '<div class="col-lg-9 col-md-8">k.anderson@example.com</div>';
                       '</div>';*/                            

    }else{
        echo "0 results";
    }

    mysqli_close($db);
  
?>
                 

          <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

            <!-- Profile Edit Form -->
            <form>

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">FisrtName</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                </div>
              </div>

                <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">LastName</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                </div>
              </div>

              <div class="row mb-3">
                <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                <div class="col-md-8 col-lg-9">
                  <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Job" class="col-md-4 col-lg-3 col-form-label">CIN</label>
                <div class="col-md-8 col-lg-9">
                  <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                <div class="col-md-8 col-lg-9">
                  <input name="country" type="text" class="form-control" id="Country" value="USA">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                <div class="col-md-8 col-lg-9">
                  <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                <div class="col-md-8 col-lg-9">
                  <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form><!-- End Profile Edit Form -->

          </div>

          <div class="tab-pane fade pt-3" id="profile-settings">

            <!-- Settings Form -->
            <form>

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                <div class="col-md-8 col-lg-9">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                    <label class="form-check-label" for="changesMade">
                      Changes made to your account
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                    <label class="form-check-label" for="newProducts">
                      Information on new products and services
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="proOffers">
                    <label class="form-check-label" for="proOffers">
                      Marketing and promo offers
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                    <label class="form-check-label" for="securityNotify">
                      Security alerts
                    </label>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    
                  <!-- Change Password Form -->
                  <form action="change.php" method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword" placeholder="old password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword"  placeholder="new password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword"  placeholder="new password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="change">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

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


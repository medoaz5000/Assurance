<?php

  session_start();

	include("config.php");
 

  
  
  if(isset($_POST['login'])){
   $db = mysqli_connect("localhost","root","","assurance_3",3307);
    
    $email =  $_POST['username'];
    $password =  $_POST['password'];
    $sql = mysqli_query($db, "select * from personnel_details where email = '$email' AND password = '$password' AND status = 'Accept' ");
    $num = mysqli_num_rows($sql);
        
      if($num >0){
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['id_client'] = $row['id_client'];
        $_SESSION['username'] = $row['email'];
        
      }
      
    header('location: CLIENT/index.php');

    }else{
      // echo '<script> alert("Votre demande en cours de traitement"); </script>';
      
    }
    
  if(isset($_POST['remember'])){
    setcookie('username',$_SESSION['username'],time()+ 300 * 24 * 3600, null, null, false, true );
    setcookie('password',$_POST['password'],time()+ 300 * 24 * 3600, null, null, false, true );
  }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Se connecter | Sanlam </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/SLM.JO-1fa234df.png" rel="icon">
  <link href="assets/img/SLM.JO-1fa234df.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="login/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="login/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="login/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="login/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="login/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="login/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="login/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="login/assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/SLM.JO-1fa234df.png" alt="">
                  <span class="d-none d-lg-block">Sanlam</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3" style="width: 450px;">

                <div class="card-body">

                  <div class="pt-4 pb-2 mb-4">
                    <h5 class="card-title text-center pb-0 fs-4">Se connecter à votre compte</h5>
                    
                  </div>

                  <form class="row g-3 needs-validation" action="" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label fw-bold fs-5">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="Email" name="username" class="form-control" id="yourUsername" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];}?>" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label fw-bold fs-5">Mot de passe</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="password" class="form-control" id="yourPassword" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];}?>" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100 fw-bold" type="submit" name="login" >Se connecter</button>
                    </div>
                   
                  </form>

                </div>
              </div>
            </div>

            <!-- ======= Footer ======= -->
            <?php include('footer.php');?>
            <!-- End Footer -->
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../admin/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../admin/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../admin/NiceAdmin/assets/js/main.js"></script>

</body>

</html>
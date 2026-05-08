<?php
include 'config.php';


// $sql2 = "INSERT INTO document(image, CINd, immatriculation1)
// VALUE('mohamed','25-A-588','dacia'); ";
// mysqli_query($db, $sql2);

if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['password'];
  $firstname = strtoupper($_POST['firstname']);
  $lastname = strtoupper($_POST['lastname']);
  $cin = $_POST['cin'];
  $address = strtoupper($_POST['address']);
  $phone = $_POST['phone'];

  $num_permis = $_POST['num_permis'];
  $marque = strtoupper($_POST['marque']);
  $matricule = strtoupper($_POST['matricule']);
  $puissance = $_POST['puissance'];
  $num_place = $_POST['place'];
  $dm = $_POST['dateV'];
  
  

  $contrat = $_POST['contrat'];



  if($password === $cpassword){
    
    //$id_p = 16;
    //$id_p++;

    $sql = "INSERT INTO personnel_details(id_personnel, email, password, firstname, lastname, CIN, address, phone)
            VALUE('$id_p', '$email', '$password', '$firstname', '$lastname', '$cin', '$address', '$phone');";

    $sql1 = "INSERT INTO assurance( N°_permis, marque, immatriculation, puissance_energie, N°_places, Date_mise,CINa, Num_contrat1) 
            VALUE( '$num_permis', '$marque', '$matricule', '$puissance', '$num_place', '$dm','$cin', '$contrat');";

        
    $path = "../../ADMIN/doc/";
    //$m = "document/".$_FILES['file']['name'];
    $m = $_FILES['file']['name'];

    $sql2 = "INSERT INTO document(image, CINd, matricule1)
            VALUE('$m','$cin','$matricule');";

    if(mysqli_query($db, $sql2)){
      move_uploaded_file($_FILES['file']['tmp_name'],$path.$m);
    }
    
    
    if(mysqli_query($db, $sql) && mysqli_query($db, $sql1)){
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
    header('location: login.php');
    
    
  }else{
  echo 'error';
  }
    
    // }
    
  }else{
  /*echo 'error 404'.mysqli_error($db);*/
  
}
    
    
    
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Souscription-en-ligne </title>
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
  <!--=========================================-->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

  <style type="text/css">
    #regiration_form fieldset:not(:first-of-type) {
        display: none;
    }
    .card1{
      width: 600px;
      background: white;
      border-radius: 8px;
      box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
      

    }
    
    .type{
      width: 100px;
      height: 100px;
      display: inline-block;
      margin-left: 68px;
      border: 1px solid rgb(124, 113, 113);
      border-radius: 5px;
      margin-top: 30px;
      margin-bottom: 30px;

    }
    .type:hover{
      border: 0.9px solid rgb(70, 150, 242);
      box-shadow: rgba(99, 99, 99, 0.2) 2px 2px 8px 2px;

    }
    h3{
      margin-top: 20px;
      margin-bottom: 10px;
      font-weight: bold;
      font-size: 30px;
    }
    .card{
      width: 700px;
    }

    .next, .submit{
      margin-top: 20px;
      margin-right: 60px;
      float: right;
    }
    .previous {
      margin-top: 20px;
      margin-right: 60px;
      float: left;
    }



 

  </style>

<body>


  <main >
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

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"></h5>
                  </div>

                  <section class="section profile">
                    <div class="container">
                      
                      <div class="col-xl-12">

                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                              <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Vehicule</button>
                              </li>

                            </ul>
                              <?php
                                $db = mysqli_connect("localhost", "root", "", "assurance_3",3307);
                                $s = "SELECT * FROM `contrat` ; ";
                                $r = mysqli_query($db, $s);
                                $options = "";

                                while($roww = mysqli_fetch_array($r)){
                                  $options = $options."<option value='$roww[0]'>$roww[1]"." - "."$roww[2] - $roww[3] - $roww[4] - { $roww[5] } - $roww[6]</oiption>";
                                }
                                ?>
                          <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                              <form id="regiration_form" action=""  method="POST"  enctype="multipart/form-data" novalidate >
                                <fieldset>
                                  <h3><u>étape 1: Création compte</u></h3>
                                    <div class="col-11">
                                      <label for="Email" class="form-label fw-bold fs-6 mt-4">Email</label>
                                      <input type="email" name="email" class="form-control" id="Email" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="Password" class="form-label fw-bold fs-6">Mot de passe</label>
                                      <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="cpassword" class="form-label fw-bold fs-6">Confirmer Mot de passe</label>
                                      <input type="password" name="password" class="form-control" id="cpassword" required>
                                    </div>

                                    <input type="button" name="next" class="next btn btn-primary" value="Suivant" />
                                    
                                </fieldset>

                                <fieldset>
                                  <h3><u>étape 2: Informations Personnel</u></h3>
                                    <div class="col-11">
                                      <label for="FirstName" class="form-label fw-bold fs-6 mt-4">Prénom</label>
                                      <input type="text" name="firstname" class="form-control" id="FirstName" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="LastName" class="form-label fw-bold fs-6">Nom</label>
                                      <input type="text" name="lastname" class="form-control" id="LastName" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="cin" class="form-label fw-bold fs-6">CIN</label>
                                      <input type="text" name="cin" class="form-control" id="cin" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="adress" class="form-label fw-bold fs-6">Adresse</label>
                                      <input type="text" name="address" class="form-control" id="adress" required>
                                    </div>

                                    <div class="col-11">
                                      <label for="phone" class="form-label fw-bold fs-6">Téléphone</label>
                                      <input type="text" name="phone" class="form-control" id="phone"  required>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-secondary" value="Précédent" />
                                    <input type="button" name="next" class="next btn btn-primary" value="Suivant" />

                                </fieldset>


                                <fieldset>
                                  <h3><u>étape 3: Informations Véhicule</u> </h3>
                                    <div class="col-11">
                                      <label for="num_permis" class="form-label fw-bold fs-6 mt-4">N° Permis</label>
                                      <input type="text" name="num_permis" class="form-control" id="num_permis" required>
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
                                          <option value="Gasoil">Diesel</option>
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
                                    <label for="yourPassword" class="form-label fw-bold fs-6 text-danger"></label>
                                      <input type="file" name="file" class="form-control" id="file" required>
                                    </div>

                                    <input type="button" name="previous" class="previous btn btn-secondary" value="Précédent" />
                                    <input type="button" name="next" class="next btn btn-primary" value="Suivant" />
                                    
                                </fieldset>
                                
                                <fieldset>
                                  <h3><u>étape 4: choisir votre offre</u></h3>
                                  <div class="col-11">
                                    <label for="contrat" class="form-label fw-bold fs-6 mt-4 "></label>
                                      <div class="col-12">
                                        <select class="form-select" aria-label="Default select example" name="contrat" >
                                          <option value ="<?php echo $roww[0] ?>">  <?php echo $options;?> </option>
                                        </select>
                                      </div>
                                  </div>
                                  <input type="button" name="previous" class="previous btn btn-secondary" value="Précédent" />
                                  <input type="submit" name="submit" class="submit btn btn-success" value="Souscription" />

                                </fieldset>

                              </form>
              
                              <script src="multi_form.js"></script>

                            </div>
                          </div>
                        </div><!-- End Bordered Tabs -->
                      </div>
                    </div>
                  </section>
    
                </div>
              </div>

              <?php include('footer.php');?>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

 

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

  <!-- <script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
  </script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




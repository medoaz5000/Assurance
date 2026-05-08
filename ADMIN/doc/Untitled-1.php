<?php
include 'config.php';



if(isset($_POST['submit'])){
  $id_p = 4;
  $id_p++;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $cin = $_POST['cin'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $num_permis = $_POST['num_permis'];
  $marque = $_POST['marque'];
  $matricule = $_POST['matricule'];
  $puissance = $_POST['puissance'];
  $num_place = $_POST['place'];


  // $sql1 = "INSERT INTO personnel_details(firstname, lastname, CIN, address, phone) VALUES('Mohamed','Azizi','P142','Ouarzazate','0606060606')";
  
  if($password === $cpassword){


  $sql = "INSERT INTO personnel_details(id_personnel, email, password, firstname, lastname, CIN, address, phone)
          VALUES('$id_p', '$email', '$password', '$firstname', '$lastname', '$cin', '$address', '$phone')";

  $sql1 = "INSERT INTO assurance( N°_permis, marque, immatriculation, puissance_energie, N°_places, CINa, Num_contrat)
          VALUE( '$num_permis', '$marque', '$matricule', '$puissance', '$num_place', '$cin', 3)";

  
  mysqli_query($db, $sql);
  mysqli_query($db, $sql1);
  //mysqli_query($db, $sql2);
  //mysqli_query($db, $sql3);


  /*$sql2 = "INSERT INTO assurance(num_permis, marque, matricule, puissance_energie, num_places)
            VALUES('2453','ford','25-B-2014','gasoil',8)";*/

            

  mysqli_close($db);
    
  }else{
    echo 'error';
  }

  // header('location: login.php');

}else{
  /*echo 'error 404'.mysqli_error($db);*/
  
}

    




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../Presento/assets/img/SLM.JO-1fa234df.png" rel="icon">
  <link href="../Presento/assets/img/SLM.JO-1fa234df.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../Presento/login/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../Presento/login/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../Presento/login/assets/css/style.css" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <!--=========================================-->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

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
    .next{
      margin-top: 20px;
      float: right;
      margin-right: 60px;
    }   
    .submit{
      margin-top: 20px;
      float: right;
      margin-right: 45px;
    }
    .previous{
      margin-top: 20px;
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
    }
    .card{
      width: 700px;
    }
    .payment span img{
      height: 35px;
      margin-top: 10px;
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
              <!--<p class="text-center small">Enter your personal details to create account</p>-->
            </div>

            <section class="section profile">
      <div class="container">
        
        <div class="col-xl-12">

        <!--<div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/SLM.JO-1fa234df.png" alt="">
            <span class="d-none d-lg-block">Sanlam</span>
          </a>
        </div><-- End Logo -->


         
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Cars</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">motorcycles</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Vans</button>
                </li>

              </ul>

              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <form class="row g-3 needs-validation" id="regiration_form" action="" method="POST" novalidate> 
                    <!--SECTION 1-->
                    <fieldset >
                      <h3>step 1: Creat account</h3>
                        <div class="col-11">
                          <label for="Email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="Email" required>
                          <div class="invalid-feedback">Please, enter your Email!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="Password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                          <div class="invalid-feedback">Please, enter your Password!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="cpassword" class="form-label">Confirm Password</label>
                          <input type="password" name="password" class="form-control" id="cpassword" required>
                          <!--<div class="invalid-feedback">Please, Password incorrect!</div>-->
                        </div>
    
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />
                      </fieldset><!--End SECTION 1-->

                      <!--SECTION 2-->
                      <fieldset >
                        <h3>step 2: Personnel details</h3>
                        <div class="form">
                        <div class="col-11">
                          <label for="FirstName" class="form-label">FirstName</label>
                          <input type="text" name="firstname" class="form-control" id="FirstName" required>
                          <div class="invalid-feedback">Please enter your FirstName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="LastName" class="form-label">LastName</label>
                          <input type="text" name="lastname" class="form-control" id="LastName" required>
                          <div class="invalid-feedback">Please enter your LastName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="cin" class="form-label">CIN</label>
                          <input type="text" name="cin" class="form-control" id="cin" required>
                          <div class="invalid-feedback">Please your CIN!</div>
                        </div>

                        <!-- <div class="col-11">
                          <label for="datenaissance" class="form-label">Date Naissance</label>
                          <input type="date" name="DN" class="form-control" id="DN" required>
                          <div class="invalid-feedback">Please your Date Naissance!</div>
                        </div> -->

                        <div class="col-11">
                          <label for="adress" class="form-label">Adress</label>
                          <input type="text" name="address" class="form-control" id="adress" required>
                          <div class="invalid-feedback">Please enter your Adress!</div>
                        </div>

                        <div class="col-11">
                          <label for="yourPassword" class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" id="phone" required>
                          <div class="invalid-feedback">Please enter your Phone!</div>
                        </div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />             
                      </fieldset><!--End SECTION 2-->

                      <!--SECTION 3-->
                      <fieldset >
                        <h3>step 3: Information Véhicule </h3>
                        <div class="form">
                        <div class="col-11">
                          <label for="num_permis" class="form-label">N° Permis</label>
                          <input type="text" name="num_permis" class="form-control" id="num_permis" required>
                        <div class="invalid-feedback">Please enter your N° Permis!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="Marque/type" class="form-label">Marque/type</label>
                          <input type="text" name="marque" class="form-control" id="Marque_type" required>
                          <div class="invalid-feedback">Please enter your Marque/type!</div>
                        </div>

                        <div class="col-11">
                          <label for="Matricule" class="form-label">Matricule</label>
                          <input type="text" name="matricule" class="form-control" id="Matricule" required>
                          <div class="invalid-feedback">Please enter your Matricule!</div>
                        </div>

                        <!--<div class="col-11">
                          <label for="puissance" class="form-label">Puissance Eneregie</label>
                          <input type="text" name="puissance" class="form-control" id="Matricule" required>
                          <div class="invalid-feedback">Please enter Puissance Eneregie!</div>
                        </div>-->

                        <div class="col-11">
                        <label for="puissance" class="form-label">Puissance Eneregie</label>
                          <div class="col-11">
                            <select class="form-select" aria-label="Default select example" name="puissance">
                              <option selected>Type Puissance</option>
                              <option value="Gasoil">Gasoil</option>
                              <option value="Essence">Essance</option>
                              <div class="invalid-feedback">Please enter Puissance Eneregie!</div>
                            </select>
                          </div>
                        </div>

                        <div class="col-11">
                          <label for="Marque/type" class="form-label">N° Places</label>
                          <input type="number" name="place" class="form-control" id="place" required>
                          <div class="invalid-feedback">Please enter number Places!</div>
                        </div>

                        <div class="col-11">
                          <label for="date1ere" class="form-label">Date 1ère mise rn</label>
                          <input type="date" name="dateV" class="form-control" id="dateV" required>
                          <div class="invalid-feedback">Please determine Date 1ère mise en!</div>
                        </div>

                        <div class="col-11">
                        <label for="yourPassword" class="form-label text-danger"></label>
                          <input type="file" name="phone" class="form-control" id="phone" required>
                          <label for="yourPassword" class="form-label text-danger">*Scanner CIN </label>
                          <div class="invalid-feedback">Please Scanner !</div>
                        </div>
                        </div>
                        



                        <!--<div class="col-11">
                          <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>-->
                        <!--<input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />  -->
                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="submit" name="submit" class="submit btn btn-primary" value="submit" /> 
                      </fieldset><!--End SECTION 3-->

                      <!--SECTION 4-->
                      <!--<fieldset >
                        <h3>step 4: choose Garante</h3>

                        <div class="row mb-3">
                          <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Choisir type assurance</option>
                              <option value="1">Tous Risque</option>
                              <option value="2">Damage et Collision</option>
                              <option value="3">Resposabilité Civil</option>
                            </select>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example">
                              <option selected>Durée</option>
                              <option value="1">3 Mois</option>
                              <option value="2">6 Mois</option>
                              <option value="3">3 Mois</option>
                              <option value="4">Année</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">السرقة</label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">سرقة المرايا </label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">الحريق </label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">كسر الزجاج </label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">أعمال التخريب</label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">أضرار الاصطدام</label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">أضرار التصادم الكبيرة</label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />   
                      </fieldset>--><!--End SECTION 4 -->

                      <!--SECTION 5-->
                      <!--<fieldset >
                        <h3> Step 5: Payment</h3>
                        <div class="col-11">
                          <label for="cardNumber" class="form-label">Card Number</label>
                          <input type="text" name="card_num" class="form-control" id="card_num" required>
                          <div class="invalid-feedback">Please, enter Card Number!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="CVC" class="form-label">CVC</label>
                          <input type="text" name="cvc" class="form-control" id="cvc" required>
                          <div class="invalid-feedback">Please, enter your CVC!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="dateExpire" class="form-label">Date Expire</label>
                          <input type="text" name="date_exp" class="form-control" id="date_exp" required>
                          <div class="invalid-feedback">Please, enter Date Expire!</div>
                        </div>
                        
                        <div class="payment">
                          
                          <span><img src="payment.jpg" alt="mastercard" ></span>
                          <--<span><img src="visa.png" alt="visa" class="pay"></span>
                          <span><img src="cmi.png" alt="cmi" class="pay"></span>--
                          
                          
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="submit" name="submit" class="submit btn btn-primary" value="submit" /> 
                      </fieldset>--><!--End SECTION 5-->
                      
                    <!--<div class="col-11">
                          <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>-->
                  </form>
                  
                  <script src="multi_form.js"></script>

                </div>

                <!--===============================================================================================-->

                <div class="tab-pane fade show profile-overview pt-3" id="profile-edit">
                  
                  <form class="row g-3 needs-validation" id="regiration_form" novalidate> 
                    <!--SECTION 1-->
                    <fieldset>
                      <h3>step 1: Creat account</h3>
                        <div class="col-11">
                          <label for="Email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="Email" required>
                          <div class="invalid-feedback">Please, enter your Email!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="Password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                          <div class="invalid-feedback">Please, enter your Password!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="c_password" class="form-label">Confirm Password</label>
                          <input type="password" name="c_paswword" class="form-control" id="c_password" required>
                          <div class="invalid-feedback">Please, Password incorrect!</div>
                        </div>
    
                        <input type="button" name="password" class="next btn btn-primary" value="Next" />
                      </fieldset><!--End SECTION 1-->

                      <!--SECTION 2-->
                      <fieldset>
                        <h3>step 2: Personnel details</h3>
                        <div class="col-11">
                          <label for="FirstName" class="form-label">FirstName</label>
                          <input type="text" name="firstname" class="form-control" id="FirstName" required>
                          <div class="invalid-feedback">Please enter your FirstName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="LastName" class="form-label">LastName</label>
                          <input type="text" name="lastname" class="form-control" id="LastName" required>
                          <div class="invalid-feedback">Please enter your LastName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="cin" class="form-label">CIN</label>
                          <input type="text" name="cin" class="form-control" id="cin" required>
                          <div class="invalid-feedback">Please your CIN!</div>
                        </div>

                        <div class="col-11">
                          <label for="datenaissance" class="form-label">Date Naissance</label>
                          <input type="date" name="DN" class="form-control" id="DN" required>
                          <div class="invalid-feedback">Please your Date Naissance!</div>
                        </div>

                        <div class="col-11">
                          <label for="adress" class="form-label">Adress</label>
                          <input type="text" name="adress" class="form-control" id="adress" required>
                          <div class="invalid-feedback">Please enter your Adress!</div>
                        </div>

                        <div class="col-11">
                          <label for="yourPassword" class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" id="phone" required>
                          <div class="invalid-feedback">Please enter your Phone!</div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />              
                      </fieldset><!--End SECTION 2-->


                      <!--SECTION 5-->
                      <fieldset>
                        <h3>Payment</h3>
                        <div class="col-11">
                          <label for="cardNumber" class="form-label">Card Number</label>
                          <input type="text" name="card_num" class="form-control" id="card_num" required>
                          <div class="invalid-feedback">Please, enter Card Number!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="CVC" class="form-label">CVC</label>
                          <input type="text" name="cvc" class="form-control" id="cvc" required>
                          <div class="invalid-feedback">Please, enter your CVC!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="dateExpire" class="form-label">Date Expire</label>
                          <input type="text" name="date_exp" class="form-control" id="date_exp" required>
                          <div class="invalid-feedback">Please, enter Date Expire!</div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="submit" name="submit1" class="submit btn btn-primary" value="submit" /> 
                      </fieldset><!--End SECTION 5-->
                      
                    <!--<div class="col-11">
                          <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>-->
                  </form>
                  
                  <script src="multi_form.js"></script>
                  
                </div>

                <!--=============================================================================-->

                <div class="tab-pane fade show profile-overview pt-3" id="profile-settings">
                  <form class="row g-3 needs-validation" id="regiration_form" novalidate>   
                    <!--SECTION 1-->
                    <fieldset>
                      <h3>step 1: Creat account</h3>
                        <div class="col-11">
                          <label for="Email" class="form-label">Email</label>
                          <input type="email" name="email" class="form-control" id="Email" required>
                          <div class="invalid-feedback">Please, enter your Email!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="Password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                          <div class="invalid-feedback">Please, enter your Password!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="c_password" class="form-label">Confirm Password</label>
                          <input type="password" name="c_paswword" class="form-control" id="c_password" required>
                          <div class="invalid-feedback">Please, Password incorrect!</div>
                        </div>
    
                        <input type="button" name="password" class="next btn btn-primary" value="Next" />
                      </fieldset><!--End SECTION 1-->

                      <!--SECTION 2-->
                      <fieldset>
                        <h3>step 2: Personnel details</h3>
                        <div class="col-11">
                          <label for="FirstName" class="form-label">FirstName</label>
                          <input type="text" name="firstname" class="form-control" id="FirstName" required>
                          <div class="invalid-feedback">Please enter your FirstName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="LastName" class="form-label">LastName</label>
                          <input type="text" name="lastname" class="form-control" id="LastName" required>
                          <div class="invalid-feedback">Please enter your LastName!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="cin" class="form-label">CIN</label>
                          <input type="text" name="cin" class="form-control" id="cin" required>
                          <div class="invalid-feedback">Please your CIN!</div>
                        </div>

                        <div class="col-11">
                          <label for="datenaissance" class="form-label">Date Naissance</label>
                          <input type="date" name="DN" class="form-control" id="DN" required>
                          <div class="invalid-feedback">Please your Date Naissance!</div>
                        </div>

                        <div class="col-11">
                          <label for="adress" class="form-label">Adress</label>
                          <input type="text" name="adress" class="form-control" id="adress" required>
                          <div class="invalid-feedback">Please enter your Adress!</div>
                        </div>

                        <div class="col-11">
                          <label for="yourPassword" class="form-label">Phone</label>
                          <input type="text" name="phone" class="form-control" id="phone" required>
                          <div class="invalid-feedback">Please enter your Phone!</div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />              
                      </fieldset><!--End SECTION 2-->

                      <!--SECTION 3-->
                      <fieldset>
                        <h3>step 3: Information Assurance </h3>
                        
                        <div class="col-11">
                          <label for="num_permis" class="form-label">N° Permis</label>
                          <input type="text" name="num_permis" class="form-control" id="num_permis" required>
                        <div class="invalid-feedback">Please enter your N° Permis!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="Marque/type" class="form-label">Marque/type</label>
                          <input type="text" name="marque" class="form-control" id="Marque_type" required>
                          <div class="invalid-feedback">Please enter your Marque/type!</div>
                        </div>

                        <div class="col-11">
                          <label for="Matricule" class="form-label">Matricule</label>
                          <input type="text" name="matricule" class="form-control" id="Matricule" required>
                          <div class="invalid-feedback">Please enter your Matricule!</div>
                        </div>

                        <div class="col-11">
                          <label for="puissance" class="form-label">Puissance Eneregie</label>
                          <input type="text" name="matricule" class="form-control" id="Matricule" required>
                          <div class="invalid-feedback">Please enter Puissance Eneregie!</div>
                        </div>

                        <div class="col-11">
                          <label for="Marque/type" class="form-label">N° Places</label>
                          <input type="number" name="place" class="form-control" id="place" required>
                          <div class="invalid-feedback">Please enter number Places!</div>
                        </div>

                        <div class="col-11">
                          <label for="date1ere" class="form-label">Date 1ère mise rn</label>
                          <input type="date" name="dateV" class="form-control" id="dateV" required>
                          <div class="invalid-feedback">Please determine Date 1ère mise en!</div>
                        </div>
                        

                        <!--<div class="col-11">
                          <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>-->
                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="button" name="next" class="next btn btn-primary" value="Next" />  
                      </fieldset><!--End SECTION 3-->


                      <!--SECTION 5-->
                      <fieldset>
                        <h3>Payment</h3>
                        <div class="col-11">
                          <label for="cardNumber" class="form-label">Card Number</label>
                          <input type="text" name="card_num" class="form-control" id="card_num" required>
                          <div class="invalid-feedback">Please, enter Card Number!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="CVC" class="form-label">CVC</label>
                          <input type="text" name="cvc" class="form-control" id="cvc" required>
                          <div class="invalid-feedback">Please, enter your CVC!</div>
                        </div>
    
                        <div class="col-11">
                          <label for="dateExpire" class="form-label">Date Expire</label>
                          <input type="text" name="date_exp" class="form-control" id="date_exp" required>
                          <div class="invalid-feedback">Please, enter Date Expire!</div>
                        </div>

                        <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                        <input type="submit" name="submit2" class="submit btn btn-primary" value="submit" /> 
                      </fieldset><!--End SECTION 5-->
                      
                    <!--<div class="col-11">
                          <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div>-->
                  </form>
                  <script src="multi_form.js"></script>
                 
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

  <script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script>
    let form = document.querySelector('form');
    let div = document.getElementsByClassName('form');
    let button = document.getElementsByTagName('button');

  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>




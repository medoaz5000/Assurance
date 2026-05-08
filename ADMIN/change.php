<?php 
include('config.php');
session_start();


$user = $_SESSION['username'];
$query = mysqli_query($db, "select * from inscription_admin where Email = '$user' ");
$row = mysqli_fetch_array($query);
$id = $row['id'];


if(isset($_POST['change'])){

    $currantpss = $_POST['password'];
    $password = $_POST['newpassword'];
    $passwordconf = $_POST['renewpassword'];

    if($password == $passwordconf){
        $query1 = "select * from inscription_admin where Password = '$currantpss' ";
        $result = mysqli_query($db, $query1);
        $count = mysqli_num_rows($result);
        echo $count;
        
        if($count >0){
            $query = "UPDATE inscription_admin SET Password = '$password' ";
            
            
        }else{
            
            
        }

    }else{
        echo $msg = 'new password and confirm password does not match';
    }
    
}


?>
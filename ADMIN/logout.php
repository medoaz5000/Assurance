<?php   
session_start(); //to ensure you are using same session
if(session_destroy()){
    header("location: login.php");
}; //destroy the session
 //to redirect back to "login.php" after logging out
//exit();

?>
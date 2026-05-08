<?php
  /* define('DB_SERVER', 'localhost:3036');
   define('DB_USERNAME', 'root');
   
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'assurance');*/
   
   $db = mysqli_connect("localhost","root","","assurance_3", 3307);

   if(!$db){
     die("couldn\'t not connect My sql :" . mysql_error());
   }
?>
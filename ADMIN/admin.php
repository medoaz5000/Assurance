<?php
    include('config.php');
    //Output Form Entries from the Database
    $sql = "SELECT * FROM inscription_admin";
    //fire query
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $row['FirstName'].' '.$row['LastName'];
    }else{
        echo "";
    }


?>
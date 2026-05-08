<?php  

 $conn = mysqli_connect("localhost","root","","assurance_3", 3307);

 if(!$conn){
   die('couldn\'t not connect My sql :' . mysql_error());
 }



if(isset($_POST['submit'])){

  $path = "../../ADMIN/doc/";
  $m = $_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],$path.$m);


  $q = "INSERT INTO document(image) VALUES('$m'); ";
  $run = mysqli_query($conn,$q);


  if($run){
    move_uploaded_file($_FILES['file']['tmp_name'],$path.$m);
    echo 'success';
  }else{
    echo 'failed'; 
  }

  

  
} 

 
?>
  
 
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>


<body>

<h2>My Profil</h2>

<form action="" method="POST" enctype="multipart/form-data">
  <label>choose an profile pic :</label>
  <input type="file" name="file" id="file"><br><br>
  <input type="submit" name="submit" value="submit">
</form>

  <a href="../../../ADMIN/doc/Untitled-1.php" ><input type="submit" name="submit" value="folder"></a>


<table>
  <tr>
    <th>id</th>
    <th>image</th>
  </tr>
  <?php
$query= "SELECT * FROM document 
        ORDER BY date_creation DESC ";

$query_run = mysqli_query($conn,$query) ;
if(mysqli_num_rows($query_run) > 0)
  {
  
      foreach($query_run as $client)
      {
        ?>
          <tr>
            <td><?= $client['id'];?></td>
            <td><img style="width:300px" src="../../../ADMIN/doc/<?= $client['image']?>" ></td>
          </tr>
        <?php
}
}else{
  // echo 'no record found';
}
        

?>
</table>


<!-- <input type="button" value="sign out" name="signout"> -->
<script>
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>
</html>


<?php


include_once('app/functions.php');

$users = $_GET['user_id'] ?? false;
if ($users) {
    $data = connect()->query("SELECT * FROM users WHERE id='$users'");

    $user_data = $data -> fetch_object();
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5</title>

  <!-- BS 5  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Main css file  -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>




<style>
    .single-user{
  width: 500px;
  margin: 200px auto ;
  text-align: center;
  border-radius: 30px;
  padding-bottom: 10px;
  padding-top: 10px;
  
  
}
.single-user img{
    
width: 200px;
height: 200px;
object-fit: cover;
border-radius: 100%;

}

</style>

<body>
 
<div class="single-user  bg-primary  text-light">

<img src="photo/<?php echo  $user_data -> photo ;?>" alt="">
<h2><?php echo  $user_data -> name ;?></h2>

<h3><?php echo  $user_data -> cell ;?></h3>
<a class="btn btn-info" href="table.php"> back</a>






</div>


  
  <!-- Scripts BS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Main script  -->
  <script src="assets/js/scripts.js"></script>
  <!-- jequry -->
  <script src="assets/js/jquery-3.6.0.min.js"></script>



</body>

</html>

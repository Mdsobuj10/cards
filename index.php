

<?php


include_once('app/functions.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Development Area</title>

  <!-- BS 5  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Main css file  -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
 


<?php

  if (isset($_POST['submit'])) {
     $name = $_POST['name'];
     $username = $_POST['username'];
     $cell = $_POST['cell'];
     $email = $_POST['email'];
     $gender = $_POST['gender'] ?? '';
     $edu = $_POST['edu'] ?? '';

     // files upload 
/* 
     $photo = $_FILES['photo']['name'] ?? '';
     $tmp_name = $_FILES['photo']['tmp_name'] ?? '';
 */



     $email_chek = emailcheck($email) ? '<span style="color:red";> *requred </span>' :'';
    
     if (empty($name) || empty($username) || empty( $cell) || empty( $email) || empty($edu) ) {
      
      $msg = validate('all fills are requird','danger');

    }elseif (emailcheck($email)) {

      $msg = validate('invilited email adress','success');
    }else{

      // files upload
      
        $file_name =   photoUplod ($_FILES['photo'], 'photo/');
      
     

      connect() -> query("INSERT INTO users (name, username, cell, email, education, gender,photo ) values ( '$name', '$username',  '$cell', '$email', '$edu', '$gender', '$file_name')");

      $msg = validate('data stable','info');


      formclear();
    }
  
 
  }
 


   ?>
   
   <div class="user-form w-25 mx-auto my-5">
   <a class="btn btn-primary" href="table.php">all student</a>
   <br>
   <br>
  <div class="card shadwo-lg">
  
    <div class="card-header">
      <div class="card-title"><h2>form formula</h2></div>
    </div>
    <div class="card-body">
      <?php echo $msg ?? '' ; ?>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group pb-4">
          <label for="name">name</label>
          <input type="text" class="form-control" name="name" value="<?php echo old('name')?>" id="name">
        </div>
        <div class="form-group pb-4">
          <label for="username">username</label>
          <input type="text" name="username" class="form-control"  value="<?php echo old('username')?>"  id="username">
        </div>
        <div class="form-group pb-4">
          <label for="cell">cell</label>
          <input type="text" name="cell" class="form-control" value="<?php echo old('cell')?>"  id="cell">
        </div>
        <div class="form-group pb-4">
          <label for="email">email</label>
          <input type="text" name="email" class="form-control" value="<?php echo old('email')?>"   id="email">
          <?php
          
          // echo $email_chek ?? '' ;
          
          
          ?>
        </div>
        <div class="form-group pb-4">
          <label for="edu">eduction</label>
          <select  class="form-control" name="edu" id="edu">
            <option value="select">- select -</option>
            <option <?php echo old('edu') == 'psc' ? 'selected' :'' ;?> value="psc">psc</option>
            <option <?php echo old('edu') == 'jsc' ? 'selected' :'' ;?> value="jsc">jsc</option>
            <option  <?php echo old('edu') == 'ssc' ? 'selected' :'' ;?> value="ssc">ssc</option>
          </select>
          <div class="form-group pb-4">
          <label for="">gender</label><br>
          <input <?php echo old('gender') == 'male' ? 'checked' :'' ;?> value="male" type="radio" name="gender"  id="male"> <label for="male">male</label>
          <input <?php echo old('gender') == 'female' ? 'checked' :'' ;?> value="female"  type="radio" name="gender"  id="female"> <label for="female">female</label>
        </div>
        <div class="form-group">
           <input  type="file"  name="photo" ">
        </div>
        
        <div class="form-group pb-4">
          <label for="check">check</label><br>
          <input type="checkbox" name="check" <?php echo old('check') == 'check' ? 'checked' :'' ;?>    value="check" id="check"> 
         </div>
      </div>

        <div class="form-group">
           <input  type="submit"  name="submit" class="btn btn-primary" value="sing up">
        </div>
        
      </form>
    </div>
</div>
</div>

  <!-- Scripts BS -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- Main script  -->
  <script src="assets/js/scripts.js"></script>



</body>

</html>

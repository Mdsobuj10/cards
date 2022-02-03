

<?php


include_once('app/functions.php');



// delete id 

$delete_id = $_GET['delete_id'] ?? '';

if ($delete_id) {
	connect() ->query("DELETE FROM users WHERE id='$delete_id' ");
	header('location:table.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<div class="wrap-table shadow w-75 mx-auto">
	<a class="btn btn-primary" href="index.php">add student</a>

	<br>
	<br>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php


                     $data = connect() -> query("SELECT * FROM users");

                      while ($users = $data -> fetch_object()):
						$sn =1;

                    ?>
	
						<tr>
							<td> <?php $sn; $sn++ ?></td>
							<td><?php echo  $users -> name?></td>
							<td><?php echo  $users -> email?></td>
							<td><?php echo  $users -> cell ?></td>
							
							<td><img style="height: 40px; width: 50px; object-fit: cover;" src="photo/<?php echo  $users -> photo ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="single.php?user_id=<?php echo  $users -> id ?>">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn delete-btn btn-sm btn-danger" href="?delete_id=<?php echo  $users -> id ?>">Delete</a>
							</td>
						</tr>
					
				                           
                       <?php 
 
 
                          endwhile;
 
                           ?>


					</tbody>
				</table>
			</div>
		</div>
	</div>
	





	<!-- JS FILES  -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<script src="assets/js/srcipts.js"></script>


    <script>
  $('.delete-btn').click(function(){

      let conf = confirm('are you sure');

	  if(conf){

         return true;

	  }else{

		return false;
	  };


  });





	</script>



</body>
</html>
<?php
require 'include/header.php';
require_once 'config/config.php';
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT * FROM users WHERE id = '".$_GET['id']."'";
$result = mysqli_query($connection, $sql);
$data =  mysqli_fetch_row($result);	
if (isset($_POST['submit'])) {
	$image = $_FILES['profile_image']['name'];
  	$target = "profile/".basename($image);
  	if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
  		$sql = "UPDATE users SET name='".$_POST['name']."',email='".$_POST['email']."',photo='".$image."' WHERE id='".$_POST['id']."'";
  	}
  	else
  	{
  		$sql = "UPDATE users SET name='".$_POST['name']."',email='".$_POST['email']."' WHERE id='".$_POST['id']."'";
  	}
	if ($connection->query($sql) === TRUE) {
	    header('Location: /UserManagement');
	} else {
	    echo "Error: " . $sql . "<br>" . $connection->error;
	}
	$connection->close();
}
?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-6" style="margin-top:20px;">
			<h2 style="text-align: center;">Register User</h2>
			<div class="jumbotron">
				<form class="form" action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" value="<?php echo $data[1]; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" value="<?php echo $data[2]; ?>" class="form-control">
					</div>
					<div class="form-group">
						<img src="/UserManagement/profile/<?php echo $data[3]; ?>" alt="<?php echo $data[1]; ?>" class="img-thumbnail" style="width: 150px;height: 150px;">
					</div>
					<div class="form-group">
						<label>Profile image</label>
						<input type="file" name="profile_image" class="form-control-file">
					</div>
					<div class="form-group">
						<span class="float-right">
							<input type="submit" name="submit" class="btn btn-success" value="Update user">
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require 'include/footer.php';
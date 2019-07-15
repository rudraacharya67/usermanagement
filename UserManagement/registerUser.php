<?php 
require 'include/header.php';
require_once 'config/config.php';

if (isset($_POST['name'], $_POST['email'], $_FILES['profile_image']['name'])) {
	$image = $_FILES['profile_image']['name'];
  	$target = "profile/".basename($image);

  	if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
		$sql = "INSERT INTO users (name, email, photo)
		VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$image."')";

		if ($connection->query($sql) === TRUE) {
		    header('Location: /UserManagement');
		} else {
		    echo "Error: " . $sql . "<br>" . $connection->error;
		}
		$connection->close();
	}
}
?>
<div class="container">
	<div class="row justify-content-md-center">
		<div class="col-md-6" style="margin-top:20px;">
			<h2 style="text-align: center;">Register User</h2>
			<div class="jumbotron">
				<form class="form" action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input required type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input required type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Profile image</label>
						<input required type="file" name="profile_image" class="form-control-file">
					</div>
					<div class="form-group">
						<span class="float-right">
							<input type="submit" name="" class="btn btn-success" value="Add new user">
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
require 'include/footer.php';



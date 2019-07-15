<?php 
require 'include/header.php';
require_once 'config/config.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($connection, $sql);	


?>
<div class="container" style="margin-top:20px;">
	<div class="jumbotron">
		<h2 style="text-align: center;padding: 5px;">Registered Users</h2>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">Email</th>
		      <th scope="col">Profile</th>
		      <th>Edit</th>
		      <th>Delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	if (mysqli_num_rows($result) > 0) {
			  	while($row = mysqli_fetch_assoc($result)) { ?>
				    <tr>
				      <th scope="row"><?php echo $row["id"] ?></th>
				      <td><?php echo $row["name"] ?></td>
				      <td><?php echo $row["email"] ?></td>
				      <td><img src="./profile/<?php echo $row["photo"] ?>" style="width: 50px;height: 50px;"></td>
				      <td><a href="/UserManagement/editUser.php/?id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a></td>
				      <td><a onClick="javascript: return confirm('Please confirm deletion');" href="/UserManagement/deleteUser.php/?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
				    </tr>
				<?php } }?>
		  </tbody>
		</table>
	</div>
</div>
<?php
require 'include/footer.php';



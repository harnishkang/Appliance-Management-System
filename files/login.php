<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
include('../assets/header.php');

if(isset($_POST['submit'])){
	$result = countval("userinfo","email = '".$_POST['email']."' and password = '".$_POST['password']."'");

	if($result > 0){
		selectdataclause("userinfo","id,firstName,lastName,roleid","email = '".$_POST['email']."' and password = '".$_POST['password']."'","login");
	}
	else{
		echo "<div class='failure'>Invalid Email or Password !!!</div>";
	}
}
?>
<div class="container">
	<div class="col-md-12 mt-5 alert-secondary p-5">
		<h3>User Login</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		  <div class="form-group">
		    <label for="email">Email Id:</label>
		    <input type="text" class="form-control" name="email">
		  </div>
		  <div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password">
		  </div>
		  <input type="submit" class="btn btn-default" name="submit" value="Submit">
		</form>
	</div>

</div>
<?php
include('../assets/footer.php');
?>

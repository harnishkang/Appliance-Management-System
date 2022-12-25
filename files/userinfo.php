<?php 
include('../assets/database.php');
$_SESSION['page'] = 'A';
include('../assets/header.php');
if(isset($_POST['submit'])){

	$resultcnt = countval("userinfo","email = '".$_POST['email']."' or contactNum='".$_POST['Contact']."'");
	if($resultcnt > 0){
		echo "<script>alert('User Already Exists')</script>";
	}
	else{
		$data = "(firstName,lastName,contactNum,houseNum,street,state,city,pincode,email,password,roleid) values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['Contact']."','".$_POST['Flat']."','".$_POST['Street']."','".$_POST['State']."','".$_POST['city']."','".$_POST['PinCode']."','".$_POST['email']."','".$_POST['password']."',1)" ;

	    $result = insertdata("userinfo",$data);

	    echo $result;
	}
	
}

?>

<div class="container">
	<div class="alert alert-success">
		<p>Selected Service Charges : <?php echo number_format($_SESSION['total'],2); ?></p>
		<p>Refrence Number : <?php echo $_SESSION['refrence']; ?></p>
	</div>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		

		<div class="form-group">
			<label for="firstname">First Name</label>
			<input type="text" name="firstname" required="true" class="form-control"/>
		</div>
	
		<div class="form-group">
			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="Contact">Contact Number</label>
			<input type="text" name="Contact" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="Flat">Flat/House No.</label>
			<input type="text" name="Flat" required="true" class="form-control"v/>
		</div>

		<div class="form-group">
			<label for="Street">Street/Location</label>
			<input type="text" name="Street" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="State">State</label>
			<input type="text" name="State" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" name="city" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="PinCode">PinCode</label>
			<input type="text" name="PinCode" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="email">email</label>
			<input type="text" name="email" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-submit" name="submit" />
		</div>
</form>
</div>
	

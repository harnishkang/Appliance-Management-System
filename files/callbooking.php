<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
$resultcnt = 0;
if(isset($_POST['check'])){
	$resultcnt = countval("userinfo","contactNum=".$_POST['available']);
	if($resultcnt > 0){
		$resultdata = selectdataclause("userinfo","id,firstName,lastName,contactNum,houseNum,street,state,city,pincode,email,password,roleid","contactNum=".$_POST['available'],"callbooking");
	}
	else{
		echo "<script>alert('No Data Found');</script>";
	}
}
if(isset($_POST['submit'])){
	$resultcnt = countval("userinfo","contactNum=".$_POST['Contact']);
	echo "<script>alert(".$resultcnt.$_POST['service'].")</script>";
	if($resultcnt > 0){
		$_SESSION['usertype'] = "callbooking";
    	echo "<script>location.href='acrepair'</script>";
	}
	else{
		$data = "(firstName,lastName,contactNum,houseNum,street,state,city,pincode,email,password,roleid) values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['Contact']."','".$_POST['Flat']."','".$_POST['Street']."','".$_POST['State']."','".$_POST['city']."','".$_POST['PinCode']."','".$_POST['email']."','".$_POST['password']."',1)" ;

    	$result = insertdata("userinfo",$data);
    	$_SESSION['usertype'] = "callbooking";
    	
	}

	if($_POST['service'] == 1){
		echo "<script>location.href='/servin/files/acrepair'</script>";
	}
	else if($_POST['service'] == 2){
		echo "<script>location.href='/servin/files/refrigerator'</script>";
	}
	else if($_POST['service'] == 3){
		echo "<script>location.href='/servin/files/geyser'</script>";
	}
	else if($_POST['service'] == 4){
		echo "<script>location.href='/servin/files/microwave'</script>";
	}
	else if($_POST['service'] == 5){
		echo "<script>location.href='/servin/files/ro'</script>";
	}
	else if($_POST['service'] == 6){
		echo "<script>location.href='/servin/files/tv'</script>";
	}
	else if($_POST['service'] == 7){
		echo "<script>location.href='/servin/files/cooler'</script>";
	}
	else if($_POST['service'] == 8){
		echo "<script>location.href='/servin/files/wm'</script>";
	}
	else{
		echo "<script>location.href='/servin/files/acrepair'</script>";
	}
}

?>

<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		<div class="form-group">
			<label for="available">Check Availability</label>
			<input type="text" name="available" required="true" class="form-control"/>
			<input type="submit" class="btn btn-submit" name="check" value="Check" />
		</div>
	</form>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<?php 
			if($resultcnt > 0){
				echo $resultdata;
			}
			else{
		?>

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
		<?php
			}
		?>

		<div class="form-group">
			<label for="service">Service</label>
			<select name="service" class="form-control serviceChange" onchange="serviceChange()">
				<option value="-">---Select Service---</option>
				<?php $resultOption = optiondata("services","id,serviceName","active='Y'") ;
					echo $resultOption;
				?>
			</select>
		</div>
		<div class="form-group subserviceselected">	
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-submit" name="submit" value="Submit" />
		</div>
	</div>
</form>
</div>
<?php
include('../assets/footer.php');
?>
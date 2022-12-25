<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  include('../assets/header.php');

  if(isset($_POST['submit'])){
	$check = countval("professionals","contnum = '".$_POST['contnum']."'");
  	if($check > 0){
  		echo "<div class='failure'>Professional Already Registered !!!</div>";
  	}
  	else{
  		$data = "(fullName,city,profession,email,contnum,pass) values('".$_POST['fullname']."','".$_POST['city']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['contnum']."','".$_POST['pass']."')";	
	  	$result = insertdata("professionals",$data);
		echo $result;
  	}
  }
?>
 	<div class="container">
	<h3>Become Our Partner within a minute...</h3>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
			<label for="fullname">Full Name</label>
			<input type="text" name="fullname" required="true" class="form-control"/>
			<!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
		</div>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" name="city" required="true" class="form-control"/>
		</div>


		<div class="form-group">
			<label for="profession">Primary Profession</label>
			<select name="profession" class="form-control">
				<option value="-">-- Select Primary Profession --</option>
				<?php 
					$clause="active='Y'";
					$data = "id,professionName";
					$option = optiondata("profession",$data,$clause);
					echo $option;
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="contnum">Contact Number</label>
			<input type="text" name="contnum" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="pass">Password</label>
			<input type="text" name="pass" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-default" name="submit" value="Sign Up" />
			<button type="button" class="btn btn-default" name="Edit"><a href="professionalview" class="nostyle">Edit</a></button>
		</div>

	</form>
	</div>

<?php
  include('../assets/footer.php');
?>

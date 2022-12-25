<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
 if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  if(isset($_POST['submit'])){
	if(isset($_POST["activeChk"])){
		$chk = "Y";
	}
	else{
		$chk = "N";
	}
	$data = "(serviceName,active) values('" . $_POST['serviceNm'] . "','" .$chk."')" ;
	$result = insertdata("services",$data);
	echo $result;
}
?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group">
    <label for="serviceNm">Service Name:</label>
    <input type="text" class="form-control" name="serviceNm">
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="activeChk">Active</label>
  </div>
  <input type="submit" class="btn btn-default" name="submit" value="Submit">
  <button type="button" class="btn btn-default" name="Edit"><a href="servicesview" class="nostyle">Edit</a></button>
</form>
</div>
<?php


  include('../assets/footer.php');
?>
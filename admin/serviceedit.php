<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  	$data = "serviceName,active";
    $_SESSION['serviceId'] = $_POST['editid'];
  	$clause = "id=".$_SESSION['serviceId'];
  	$result = selectdataclause("services",$data,$clause,"servicesedit");

  	if(isset($_POST["activeChk"])){
		$chk = "Y";
	}
	else{
		$chk = "N";
	}

  	if(isset($_POST['submit'])){
      $clause = "id=".$_POST['editid'];
  		$data = "serviceName='".$_POST['serviceNm']."',active='".$chk."'";
  		$result1 = updatedata("services",$data,$clause);

  		echo $result1;
  	}
?>

<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="hidden" value="<?php echo $_SESSION['serviceId']; ?>" name="editid"/>
  	<?php
		echo $result;
	?>
  <input type="submit" class="btn btn-default" name="submit" value="Update">
</form>
</div>
<?php
  include('../assets/footer.php');
?>
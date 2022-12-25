<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  	$data = "professionName,active";
    $_SESSION['professionId'] = $_POST['editid'];
  	$clause = "id=".$_SESSION['professionId'];
  	$result = selectdataclause("profession",$data,$clause,"professionedit");

  	if(isset($_POST["activeChk"])){
		$chk = "Y";
	}
	else{
		$chk = "N";
	}

  	if(isset($_POST['submit'])){
      $clause = "id=".$_POST['editid'];
  		$data = "professionName='".$_POST['professionName']."',active='".$chk."'";
  		$result1 = updatedata("profession",$data,$clause);

  		echo $result1;
  	}
?>

<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="hidden" value="<?php echo $_SESSION['professionId']; ?>" name="editid"/>
  	<?php
		echo $result;
	?>
  <input type="submit" class="btn btn-default" name="submit" value="Update">
</form>
</div>
<?php
  include('../assets/footer.php');
?>
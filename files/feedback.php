<?php 
include('../assets/database.php');
$_SESSION['page'] = 'A';
include('../assets/headeruser.php');

$data = "firstName,lastName";
$resultselect = selectdataclause("userinfo",$data,"id=".$_SESSION['feedbackUserId'],"feedback");


if(isset($_POST['submit'])){
	$data = "(selectedServiceId,feedback) values('".$_POST['id']."','".$_POST['feedback']."')" ;

    $result = insertdata("feedback",$data);

    echo $result;
}

?>

<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="form-group">
			
			<input type="hidden" name="id" required="true" class="form-control" value="<?php echo $_SESSION['feedbackId']; ?>"/>
		</div>

		<?php echo $resultselect; ?>
	
		<div class="form-group">
		  <label for="feedback">Feedback</label>
		  <textarea class="form-control" id="feedback" rows="7" name="feedback"></textarea>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-submit" name="submit" />
		</div>
</form>
</div>
	

<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
?>
<div class="container text-center">
	<div class="alert alert-secondary"><h2>Thanks for Choosing Us!!!</h2>
	<h3>We will Contact You within 48 Hrs. <?php echo  $_SESSION['refrence']; ?> is your refrence Id for further Considerations. </h3></div>
	
</div>
<?php
include('../assets/footer.php');
?>

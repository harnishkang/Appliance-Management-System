<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
$result = selectdataclause("selectedservices","id,refrenceId,subServiceId,servicedt,cost,status,userId","userId=".$_SESSION['userid']." and id not in(select selectedServiceId from feedback)","userdashboard");
?>
<div class="container mt-4">
	<table class="table table-bordered table-hover">
		<thead>
			<th>S.No.</th>
			<th>Reference ID</th>
			<th>Services</th>
			<th>Service Date</th>
			<th>Cost</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php echo $result; ?>
		</tbody>
	</table>
</div>
<?php
include('../assets/footer.php');
?>
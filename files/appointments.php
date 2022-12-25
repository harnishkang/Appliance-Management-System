<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
include('../assets/headeruser.php');
$result = selectdataclause("selectedservices","subServiceId,cost,refrenceId,servicedt","userId = ".$_SESSION['userid']." order by servicedt desc","userdashboard");

?>
<div class="container mt-4">
	<table class="table table-bordered table-hover">
		<thead>
			<th>S.No.</th>
			<th>Service</th>
			<th>Cost</th>
			<th>Reference Id</th>
			<th>Service Date</th>
		</thead>
		<tbody>
			<?php echo $result; ?>
		</tbody>
	</table>
</div>

<?php
include('../assets/footer.php');
?>
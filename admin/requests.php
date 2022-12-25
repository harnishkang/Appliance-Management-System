<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  	$data = "refrenceId,servicedt,cost,id";
  	$result = selectdataviewclause("selectedservices",$data,"status = 1","requests");
?>
<div class="container mt-4">
<table class="table table-bordered table-hover">
	<thead>
		<th>Reference ID</th>
		<th>Service Date</th>
		<th>Cost</th>
		<th>Option</th>
	</thead>
	<tbody>
		
		<?php
			echo $result;
		?>
	
	</tbody>	
</table>
</div>
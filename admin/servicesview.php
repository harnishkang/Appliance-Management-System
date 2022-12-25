<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  	$data = "serviceName,active,id";
	$result = selectdata("services",$data,"serviceedit");

	if(isset($_POST['edit'])){
		$_SESSION['serviceId'] = $_POST['editid'];
	}
?>
<div class="container mt-4">
<table class="table table-bordered table-hover">
	<thead>
		<th>Service Name</th>
		<th>Active(Y/N)</th>
		<th>Options</th>
	</thead>
	<tbody>
		
		<?php
			echo $result;
		?>
	
	</tbody>	
</table>
</div>
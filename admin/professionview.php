<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if(isset($_SESSION['userroleid'])){
  include('../assets/userroleid.php');
}
else{
  include('../assets/header.php');
}
  	$data = "professionName,active,id";
	$result = selectdata("profession",$data,"professionedit");

	if(isset($_POST['edit'])){
		$_SESSION['professionId'] = $_POST['editid'];
	}
?>
<div class="container mt-4">
<table class="table table-bordered table-hover">
	<thead>
		<th>Profession Name</th>
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
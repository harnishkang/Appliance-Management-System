<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';

  include('../assets/header.php');
  $data = "fullName,professionName,contnum,professionals.id as id";
	$result = selectdata("professionals",$data,"professionaledit");

	if(isset($_POST['edit'])){
		$_SESSION['professionalId'] = $_POST['editid'];
	}
?>
<div class="container mt-4">
<table class="table table-bordered table-hover">
	<thead>
		<th>Name</th>
		<th>Profession</th>
		<th>Contact Number</th>
		<th>Options</th>
	</thead>
	<tbody>
		
		<?php
			echo $result;
		?>
	
	</tbody>	
</table>
</div>

<?php
  include('../assets/footer.php');
?>
<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
include('../assets/headeruser.php');
}
else{
include('../assets/header.php');
}
$data = "subServiceName,instructionYN,id";
$clause = "serviceId = ".$_SESSION['serviceId'];
$result = selectdataviewclause("subservices",$data,$clause,"subservicesedit");

if(isset($_POST['edittext'])){
$_SESSION['subservicesId'] = $_POST['editid'];
}
?>
<div class="container mt-4">
<table class="table table-bordered table-hover">
<thead>
<th>Sub Service Name</th>
<th>Instruction(Y/N)</th>
<th>Options</th>
</thead>
<tbody>

<?php
	echo $result;
?>

</tbody>	
</table>
</div>
<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
include('../assets/headeruser.php');
}
else{
include('../assets/header.php');
}
$_SESSION['subservicesId'] = $_POST['editid'];
$data = "subServiceName,instructionYN";
$clause = "id=".$_SESSION['subservicesId'];
$result = selectdataclause("subservices",$data,$clause,"subservicesedit");

if(isset($_POST["instChk"])){
$chk = "Y";
}
else{
$chk = "N";
}

if(isset($_POST['submit'])){
$clause = "id=".$_POST['editid'];
$data = "subServiceName='".$_POST['subServiceName']."',instructionYN='".$chk."'";
$result1 = updatedata("subservices",$data,$clause);

echo $result1;
}
?>

<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="hidden" value="<?php echo $_SESSION['subservicesId']; ?>" name="editid"/>
<?php
echo $result;
?>
<input type="submit" class="btn btn-default" name="submit" value="Update">
</form>
</div>
<?php
include('../assets/footer.php');
?>
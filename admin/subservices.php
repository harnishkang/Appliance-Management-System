<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  if(isset($_POST['submit'])){
  	if(isset($_POST["activeChk"])){
  		$chk = "Y";
  	}
  	else{
  		$chk = "N";
  	}
  	$data = "(serviceId,subServiceName,instructionYN) values('".$_POST['service']."','" . $_POST['subserviceNm'] . "','" .$chk."')" ;
  	$result = insertdata("subServices",$data);
  	echo $result;
  }
  else if(isset($_POST['Edit'])){
    $_SESSION['serviceId'] = $_POST['service'];
    echo "<script>location.href='subservicesview';</script>";
  }
?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group">
      <label for="service">Service</label>
      <select name="service" class="form-control">
        <option value="-">-- Select Service --</option>
        <?php 
          $clause="active='Y'";
          $data = "id,serviceName";
          $option = optiondata("services",$data,$clause);
          echo $option;
        ?>
      </select>
    </div>
  <div class="form-group">
    <label for="subserviceNm">Sub Service Name:</label>
    <input type="text" class="form-control" name="subserviceNm">
  </div>
  <div class="checkbox">
    <label><input type="checkbox" name="activeChk">Instruction</label>
  </div>
  <input type="submit" class="btn btn-default" name="submit" value="Submit">
  <button type="submit" class="btn btn-default" name="Edit">Edit</button>
</form>
</div>
<?php


  include('../assets/footer.php');
?>
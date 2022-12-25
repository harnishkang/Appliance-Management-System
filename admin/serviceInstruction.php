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
	$data = "(instructionText,serviceId,subServiceId) values('".$_POST['instructionText']."','" . $_POST['service'] . "','" .$_POST['subservice']."')" ;
	$result = insertdata("serviceinstruction",$data);
	echo $result;
}
?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group">
      <label for="service">Service</label>
      <select name="service" class="form-control serviceDrop">
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
      <label for="subservice">Sub Service</label>
      <select name="subservice" class="form-control subServiceDrop">
        <option value="-">-- Select Sub Service --</option>
        
      </select>
    </div>


  <div class="form-group">
    <label for="instructionText">Instruction</label>
    <input type="text" class="form-control" name="instructionText">
  </div>
  
  <input type="submit" class="btn btn-default" name="submit" value="Submit">
  <button type="button" class="btn btn-default" name="Edit"><a href="servicesview" class="nostyle">Edit</a></button>
</form>
</div>
<?php


  include('../assets/footer.php');
?>
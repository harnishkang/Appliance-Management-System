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

	
		$data = "(productType,productMake,productModel,productSno,dateofPurchase,cost) 
		values('".$_POST['prodtype']."','".$_POST['make']."','".$_POST['model']."','".$_POST['serialno']."','".$_POST['purdate']."','".$_POST['cost']."')" ;

	    $result = insertdata("productDetail",$data);

	    echo $result;
}

?>

<div class="container">
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		

		<div class="form-group">
			<label for="prodtype">Product Type</label>
			<input type="text" name="prodtype" required="true" class="form-control"/>
		</div>
	
		<div class="form-group">
			<label for="make">Make</label>
			<input type="text" name="make" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="model">Model</label>
			<input type="text" name="model" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="serialno">Serial Number</label>
			<input type="text" name="serialno" required="true" class="form-control"v/>
		</div>

		<div class="form-group">
			<label for="purdate">Date of Purchase</label>
			<input type="text" name="purdate" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<label for="cost">Cost</label>
			<input type="text" name="cost" required="true" class="form-control"/>
		</div>

		<div class="form-group">
			<input type="submit" class="btn btn-submit" name="submit" />
		</div>
</form>
</div>
	

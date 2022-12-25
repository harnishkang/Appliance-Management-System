<?php 
include('../assets/database.php');
$_SESSION['page'] = 'A';

if(isset($_SESSION['userroleid'])){
  include('../assets/headeruser.php');
}
else{
  include('../assets/header.php');
}
  
  ?>

<div class="container">

<div class="alert alert-dark" role="alert">
	<input type="hidden" name="selectId" class="form-control selectId" value="0<?php echo $_SESSION['selectid']; ?>"/>
  <?php echo $_SESSION['selecttext']; ?>	
</div>
<div class="form-group">
  <label for="servicedt">Date of Service</label>
  <input type="text" name="servicedt" id="servicedt" required="true" class="form-control"/>
</div>
    
<div class="alert alert-secondary subservice" role="alert" subservice-index="10">
  <h4>Select Type of Microwave</h4>
  <div class="alert alert-light" role="alert">
    <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="249">Does not heat properly (<span class="rate">Rs. 249</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="249">Buttons don't work (<span class="rate">Rs. 249</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="249">Other (<span class="rate">Rs. 249</span>)</li>
      </ul>
    </div>
</div>

<div class="row">
	<input type="button" class="btn btn-primary nextstep1" value="Next"/>
</div>
</div>
<?php
  include('../assets/footer.php');
?>
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
    
<div class="alert alert-secondary subservice" role="alert" subservice-index="11">
  <h4>Number of RO For Repair</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="rorepair" value="499">1 (<span class="rate">Rs. 499</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="rorepair" value="999">2 (<span class="rate">Rs. 999</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="rorepair" value="1499">3 (<span class="rate">Rs. 1,499</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="rorepair" value="1999">4 (<span class="rate">Rs. 1,999</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="rorepair" value="2499">5 (<span class="rate">Rs. 2,499</span>)</li>
  </ul>
</div>


<div class="alert alert-secondary subservice" role="alert" subservice-index="12">
  <h4>Number of RO For Installation</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="roinst" value="499">1 (<span class="rate">Rs. 499</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="roinst" value="999">2 (<span class="rate">Rs. 999</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="roinst" value="1499">3 (<span class="rate">Rs. 1,499</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="roinst" value="1999">4 (<span class="rate">Rs. 1,999</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="roinst" value="2499">5 (<span class="rate">Rs. 2,499</span>)</li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="12">
  <h4>Number of RO For Un-Installation</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="rouninst" value="399">1 (<span class="rate">Rs. 399</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="rouninst" value="799">2 (<span class="rate">Rs. 799</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="rouninst" value="1199">3 (<span class="rate">Rs. 1,199</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="rouninst" value="1599">4 (<span class="rate">Rs. 1,599</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="rouninst" value="1999">5 (<span class="rate">Rs. 1,999</span>)</li>
  </ul>
</div>
<div class="row">
	<input type="button" class="btn btn-primary nextstep1" value="Next"/>
</div>
</div>
<?php
  include('../assets/footer.php');
?>
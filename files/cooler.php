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
    
<div class="alert alert-secondary subservice" role="alert" subservice-index="18">
  <h4>Number of Coolers For Grass (Khas) Change</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="grasschange" value="249">1 (<span class="rate">Rs. 249</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="grasschange" value="499">2 (<span class="rate">Rs. 499</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="grasschange" value="749">3 (<span class="rate">Rs. 749</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="grasschange" value="999">4 (<span class="rate">Rs. 999</span>)</li>
        <li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="grasschange" value="1249">5 (<span class="rate">Rs. 1,249</span>)</li>
  </ul>
</div>


<div class="alert alert-secondary subservice" role="alert" subservice-index="19">
  <h4>Number of Coolers For Servicing &amp; Cleaning</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="servicing" value="249">1 (<span class="rate">Rs. 249</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="servicing" value="499">2 (<span class="rate">Rs. 499</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="servicing" value="749">3 (<span class="rate">Rs. 749</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="servicing" value="999">4 (<span class="rate">Rs. 999</span>)</li>
        <li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="servicing" value="1249">5 (<span class="rate">Rs. 1,249</span>)</li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="20">
  <h4>Number of Coolers For Fan Motor Repair</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="motor" value="399">1 (<span class="rate">Rs. 399</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="motor" value="799">2 (<span class="rate">Rs. 799</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="motor" value="1199">3 (<span class="rate">Rs. 1,199</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="motor" value="1599">4 (<span class="rate">Rs. 1,599</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="motor" value="1999">5 (<span class="rate">Rs. 1,999</span>)</li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="21">
  <h4>Number of Coolers For Water Pump Repair</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="pump" value="399">1 (<span class="rate">Rs. 399</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="pump" value="799">2 (<span class="rate">Rs. 799</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="pump" value="1199">3 (<span class="rate">Rs. 1,199</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="pump" value="1599">4 (<span class="rate">Rs. 1,599</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="pump" value="1999">5 (<span class="rate">Rs. 1,999</span>)</li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="22">
  <h4>Number of Coolers For Fan Replacement</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="fan" value="349">1 (<span class="rate">Rs. 349</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="fan" value="697">2 (<span class="rate">Rs. 697</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="fan" value="1046">3 (<span class="rate">Rs. 1,046</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="fan" value="1395">4 (<span class="rate">Rs. 1,395</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="fan" value="1745">5 (<span class="rate">Rs. 1,745</span>)</li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="23">
  <h4>Number of Coolers For Other Repairs</h4>
  <ul class='list-group list-group-flush'>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="other" value="249">1 (<span class="rate">Rs. 249</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="other" value="499">2 (<span class="rate">Rs. 499</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="other" value="749">3 (<span class="rate">Rs. 749</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="other" value="999">4 (<span class="rate">Rs. 999</span>)</li>
        <li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="other" value="1249">5 (<span class="rate">Rs. 1,249</span>)</li>
  </ul>
</div>

<div class="row">
  <input type="button" class="btn btn-primary nextstep1" value="Next"/>
</div>
</div>
<?php
  include('../assets/footer.php');
?>
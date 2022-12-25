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
    
<div class="alert alert-secondary subservice" role="alert" subservice-index="1">
  <h4>Select Type and number of ACs For Servicing</h4>
  <ul class='list-group list-group-flush'>
  	<li class='list-group-item servwinli'><input type='checkbox' class='chkwh chkservwin' />Window AC (<span class="rate ratewin">Rs. 349</span>)<input type="hidden" class="form-control chkservwinval" value = "0" /></li>
  	<li class='list-group-item servwin'><input type="text" class="form-control windownoval" name="windowno" onkeyup="onchangeval('window')" placeholder="Number of Window ACs" /></li>
  	<li class='list-group-item servsplitli'><input type='checkbox' class='chkwh chkservsplit' />Split AC (<span class="rate ratesplit">Rs. 399</span>)<input type="hidden" class="form-control chkservsplitval" value = "0" /></li>
  	<li class='list-group-item servsplit'><input type="text" class="form-control splitnoval" name="splitno" onkeyup="onchangeval('split')" placeholder="Number of Split ACs" /></li>
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="2">
  <ul class='list-group list-group-flush'>
  	<li class='list-group-item'>Labour Cost (<span class="rate">Rs. 250</span>)<input type="hidden" class="form-control repaircost" name="repaircost" value="250"/></li>

  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="3">
  <h4>Select Type and Number of ACs For Installation</h4>
  <ul class='list-group list-group-flush'>
  	<li class='list-group-item servwinliin'><input type='checkbox' class='chkwh chkservwinin' />Window AC
  		
<input type ="hidden" name="wininstallcost" class="form-control wininstallcost" value="0"/>
  	</li>
  	<div class="alert alert-light servwinliinnum" role="alert">
  		<ul>
  			<li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="499">1 (<span class="rate">Rs. 499</span>)</li>
  			<li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="999">2 (<span class="rate">Rs. 999</span>)</li>
  			<li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="1499">3 (<span class="rate">Rs. 1,499</span>)</li>
  			<li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="1999">4 (<span class="rate">Rs. 1,999</span>)</li>
  			<li class='list-group-item gasliwinin'><input type="radio" class="form-check-input radiowh" name="inwin" value="2499">5 (<span class="rate">Rs. 2,499</span>)</li>
  		</ul>
  	</div>
  	
	<li class='list-group-item servsplitliin'><input type='checkbox' class='chkwh chkservsplitin' />Split AC
		<input type ="hidden" name="splitinstallcost" class="form-control splitinstallcost" value="0"/></li>
	<div class="alert alert-light servsplitliinnum" role="alert">
		<ul>
			<li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="insplit" value="1499" />1 (<span class="rate">Rs. 1,499</span>)</li>
			<li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="insplit" value="2649" />2 (<span class="rate">Rs. 2,649</span>)</li>
			<li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="insplit" value="3699" />3 (<span class="rate">Rs. 3,699</span>)</li>
			<li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="insplit" value="4599" />4 (<span class="rate">Rs. 4,599</span>)</li>
			<li class='list-group-item gaslisplitin'><input type="radio" class="form-check-input radiowh" name="insplit" value="5299" />5 (<span class="rate">Rs. 5,299</span>)</li>
		</ul>
	</div>
  	
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="4">
  <h4>Select Type and Number of ACs For Un-Installation</h4>
  <ul class='list-group list-group-flush'>
  	<li class='list-group-item servwinliun'><input type='checkbox' class='chkwh chkservwinun' />Window AC
  		<input type ="hidden" name="winuninstallcost" class="form-control winuninstallcost" value="0"/>

  	</li>
  	<div class="alert alert-light servwinliunnum" role="alert">
  		<ul>
  			<li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="unwin" value="399">1 (<span class="rate">Rs. 399</span>)</li>
  			<li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="unwin" value="799">2 (<span class="rate">Rs. 799</span>)</li>
  			<li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="unwin" value="1199">3 (<span class="rate">Rs. 1,199</span>)</li>
  			<li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="unwin" value="1599">4 (<span class="rate">Rs. 1,599</span>)</li>
  			<li class='list-group-item gasliwinun'><input type="radio" class="form-check-input radiowh" name="unwin" value="1999">5 (<span class="rate">Rs. 1,999</span>)</li>
  		</ul>
  	</div>
  	
	<li class='list-group-item servsplitliun'><input type='checkbox' class='chkwh chkservsplitun' />Split AC
		<input type ="hidden" name="splituninstallcost" class="form-control splituninstallcost" value="0"/></li>
	<div class="alert alert-light servsplitliunnum" role="alert">
		<ul>
			<li class='list-group-item gaslisplitun'><input type="radio" class="form-check-input radiowh" name="unsplit" value="599">1 (<span class="rate">Rs. 599</span>)</li>
			<li class='list-group-item gaslisplitun'><input type="radio" class="form-check-input radiowh" name="unsplit" value="1199">2 (<span class="rate">Rs. 1,199</span>)</li>
			<li class='list-group-item gaslisplitun'><input type="radio" class="form-check-input radiowh" name="unsplit" value="1799">3 (<span class="rate">Rs. 1,799</span>)</li>
			<li class='list-group-item gaslisplitun'><input type="radio" class="form-check-input radiowh" name="unsplit" value="2499">4 (<span class="rate">Rs. 2,499</span>)</li>
			<li class='list-group-item gaslisplitun'><input type="radio" class="form-check-input radiowh" name="unsplit" value="2999">5 (<span class="rate">Rs. 2,999</span>)</li>
		</ul>
	</div>
  	
  </ul>
</div>

<div class="alert alert-secondary subservice" role="alert" subservice-index="5">
  <h4>What is the tonnage of the AC requiring Gas Charging ?</h4>
  <input type ="hidden" name="tonnagecost" class="form-control tonnagecost" value="0"/>
  <ul class='list-group list-group-flush'>
  	<li class='list-group-item gasli'><input type="radio" class="form-check-input radiowh" name="tonnage" value="1700">0.8 to 1 ton (<span class="rate">Rs. 1,700</span>)</li>
  	<li class='list-group-item gasli'><input type="radio" class="form-check-input radiowh" name="tonnage" value="1900">1.1 to 1.5 ton (<span class="rate">Rs. 1,900</span>)</li>
  	<li class='list-group-item gasli'><input type="radio" class="form-check-input radiowh" name="tonnage" value="2100">Greater than 1.5 ton (<span class="rate">Rs. 2,100</span>)</li>
  </ul>
</div>

<div class="row">
	<input type="button" class="btn btn-primary nextstep1" value="Next"/>
</div>
</div>
<?php
  include('../assets/footer.php');
?>
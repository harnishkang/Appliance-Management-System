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
<div class="aboutimg"></div>
<div class="card m-5" style="height: auto !important; min-height: auto !important;">
  <div class="card-header">
    About Us
  </div>
  <div class="card-body">
    <p class="card-text">AMS is recognized as the fastest-growing startup in India. We are a mobile marketplace for local services. We help customers hire trusted professionals for all their service needs. We are staffed with young, passionate people working tirelessly to make a difference in the lives of people by catering to their service needs at their doorsteps. We provide repair services which consist of ac repair, tv repir etc. We are a sure shot destination for your service needs.</p>
  </div>
</div>
<?php
  include('../assets/footer.php');
?>
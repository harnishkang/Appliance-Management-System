<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if(isset($_SESSION['userroleid'])){
    include('../assets/headeruser.php');
  }
  else{
    include('../assets/header.php');
  }
  $data = "id,serviceName,active,imagenm";
  $clause = "active = 'Y'";
  $result = selectdataclause("services",$data,$clause,"servicelist"); 
?>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Select Sub Services</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="step1">
            
          </div>
          <div class="step2">
            <p>You Selected Following Services : </p>
          </div>
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary nextstep">Next</button>
          <button type="button" class="btn btn-secondary procstep">Proceed</button>
          <button type="button" class="btn btn-secondary restep">ReSelect</button>
        </div>
        
      </div>
    </div>
  </div>


      <div class="container-fluid">
        <hr/>
        <h1 class="text-center">Which service Do you Require ? </h1>
        <hr/>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div class="row text-center bg-light">
          
            
          <?php
            echo $result;
          ?>
        </div>
        </form>
      </div>
<?php
  include('../assets/footer.php');
?>

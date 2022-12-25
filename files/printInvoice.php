<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  include('../assets/headeruser.php');

?>
      <div class="container">
        <div class="printInvoice col-md-12 borderall mb-4">
            <div class="row">
              <div class="col-md-2 logofont">
                  <i class="fab fa-asymmetrik"></i>
              </div>
              <div class="col-md-10 text-center">
                <h2>Appliance Maintenance Services</h2>
                <p class="pfont">Providing Household and Industrial Appliance Services</p>
                <p class="pfont">Tel : 0172-252525 Email : harnish.kang2012@gmail.com</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center borderup borderdown"><h5>Invoice</h5></div>
            </div>
            <div class="row">
                <div class="col-md-6 borderright">
                  <strong>Sold To : </strong> 
                  <?php 
                    $result = selectdataclause("userinfo","CONCAT(firstName, ' ', lastName) AS name, houseNum, street, state, city, pincode, contactNum, email","id=".$_SESSION['userid'],"clientInvoice"); 
                    echo $result;
                  ?>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <?php 
                    $data = "refrenceId,curdate() as curdate";
                    $resultclient = selectdataclause("selectedservices",$data,"id=".$_SESSION['invoiceId'],"invInvoice"); 
                    echo $resultclient;
                  ?>
                    
                  </div>
                </div>
            </div>
            <div class="row borderup">
                <div class="col-md-1 borderright"><p class="pfont"><strong>Sr.No.</strong></p></div>
                <div class="col-md-6 borderright"><p class="pfont"><strong>Description</strong></p></div>
                <div class="col-md-1 borderright"><p class="pfont"><strong>Product Code</strong></p></div>
                <div class="col-md-1 borderright"><p class="pfont"><strong>Quantity</strong></p></div>
                <div class="col-md-1 borderright"><p class="pfont"><strong>Rate(Rs.)</strong></p></div>
                <div class="col-md-1 borderright"><p class="pfont"><strong>Unit</strong></p></div>
                <div class="col-md-1"><p class="pfont"><strong>Total</strong></p></div>
            </div>
              <div class="row borderup">
                <?php 
                    $data = "subServiceId,cost";
                    $resultservice = selectdataclause("selectedservices",$data,"id=".$_SESSION['invoiceId'],"productInvoice"); 
                    echo $resultservice;
                  ?>
            </div>

            

            <div class="row borderup text-right">
                <?php 
                    $data = "subServiceId,cost";
                    $resultservice = selectdataclause("selectedservices",$data,"id=".$_SESSION['invoiceId'],"totalInvoice"); 
                    echo $resultservice;
                  ?>
                
            </div>

            <?php 
                $data = "subServiceId,cost";
                $resultrest = selectdataclause("selectedservices",$data,"id=".$_SESSION['invoiceId'],"restInvoice"); 
                echo $resultrest;
              ?>

            



            <div class="row borderup">
                <div class="col-md-12">
                  <p class="pfont">Terms and Conditions</p>
                  <p class="pfont">*Goods once sold cannot be returned and/or exchanged after Warranty Period.</p>
                </div>
            </div>


        </div>

        
      </div>
<?php
  include('../assets/footer.php');
?>
<?php
include('../assets/database.php');
$_SESSION['page'] = 'A';
  if($_REQUEST['pageType'] === "subService"){
    $_SESSION['mainService'] = $_REQUEST['serviceId'];
  	$data = "subServiceName,id";
  	$clause = "serviceId=".$_REQUEST['serviceId'];
  	$result = selectdataclause("subservices",$data,$clause,"subservicepopdet");
  	echo $result;  
  }
  else if($_REQUEST['pageType'] === "acrepair"){
    $_SESSION['selecttext'] = $_POST['selecttext'];
    $_SESSION['selectid'] = $_POST['selectid'];
    if($_SESSION['mainService'] == 1){
      echo "ac";
    }
    else if($_SESSION['mainService'] == 2){
      echo "refri";
    }
    else if($_SESSION['mainService'] == 3){
      echo "geyser";
    }
    else if($_SESSION['mainService'] == 4){
      echo "micro";
    }
    else if($_SESSION['mainService'] == 5){
      echo "ro";
    }
    else if($_SESSION['mainService'] == 6){
      echo "tv";
    }
    else if($_SESSION['mainService'] == 7){
      echo "cooler";
    }
    else if($_SESSION['mainService'] == 8){
      echo "wm";
    }
    else{
      echo "ac";
    }
  }
  else if($_REQUEST['pageType'] === "selectedServices"){
    $maxval = maxval("code","selectedServices","1=1");
    $maxval = $maxval + 1;
    $_SESSION['refrence'] = "REF".$maxval;
    $_SESSION['total'] = $_REQUEST['total'];
    if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
    }
    else{
      $userid = 0;
    }
    $data = "(subServiceId,cost,code,refrenceId,servicedt,userId,status) values('" . "0".$_SESSION['selectid'] . "','" .$_REQUEST['total']."','".$maxval."','".$_SESSION['refrence']."', '".$_REQUEST['servicedt']."',".$userid.",1)" ;

    $result = insertdata("selectedservices",$data);
    if(isset($_SESSION['userid'])){
      echo "loggedin";
    }
    else if ((isset($_SESSION['usertype'])) and ($_SESSION['usertype'] == "callbooking")){
      echo "callbooking";
    }
    else{
      echo "userinfo";
    }

  }
  else if($_REQUEST['pageType'] === "userdashboard"){
   $_SESSION['invoiceId'] = $_REQUEST['idval'];
   $_SESSION['invoiceRef'] = $_REQUEST['refrenceid'];
   return 1;
  }
  else if($_REQUEST['pageType'] === "feedback"){
   $_SESSION['feedbackId'] = $_REQUEST['idval'];
   $_SESSION['feedbackUserId'] = $_REQUEST['useridval'];
   return 1;
  }
  else if($_REQUEST['pageType'] === "callbooking"){
   return "hello";
  }
  else if($_REQUEST['pageType'] === "subservicesdiv"){

   $data = "subServiceName,id";

    $clause = "serviceId=".$_REQUEST['idval'];

    $resulting = selectdataclause("subservices",$data,$clause,"subservicesdiv");

    echo $resulting;
  }
  else if($_REQUEST['pageType'] === "updateStatus"){
    $table = "selectedservices";
    $data = "status = '2'";
    $clause = "id=".$_REQUEST['idval'];
    $result = updatedata($table,$data,$clause);
    echo $result;
  }
  else{
  	$data = "subServiceName,id";
  	$clause = "serviceId=".$_GET['serviceId']." and instructionYN = 'Y'";
  	$result = selectdataclause("subservices",$data,$clause,"subservicepop");

  	echo $result;
  }

?>
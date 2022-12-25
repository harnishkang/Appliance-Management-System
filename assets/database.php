<?php
  //include('config.php');
//$con = $this->connect();
session_start();
ob_start();
$_SESSION['page'] = 'N';

/*$dbhost = "sg2nlmysql37plsk.secureserver.net";
	public $dbname = "servin";
	public $dbuser = "servin";
	public $dbpass = 'Gcu22c5^';
	public $dbport = '3306';
*/

//$con = @mysqli_connect("sg2nlmysql37plsk.secureserver.net","servin",'Gcu22c5^',"servin",'3306');
//$con = @mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname,$this->dbport);
function connect(){
	
	$con = @mysqli_connect("sg2nlmysql37plsk.secureserver.net","servin",'Gcu22c5^',"servin",'3306');
		
		$result = 0;
		if (mysqli_connect_errno()) {
			$result = "Failed to connect to MySQL using the PHP mysqli extension: " . mysqli_connect_error();
		}
		else{
			$result = "Connected";
		}
		return $con;
	}



  function insertdata($table,$data){
  	$sql = "insert into ".$table.$data;
  	if(mysqli_query($con,$sql) == 1){
      $insid = mysqli_insert_id($con);  
      if($table == "profession"){
        return "<script>location.href='congratulations';</script>";
      }
      else if($table == "selectedservices"){
        return "<script>location.href='userinfo'</script>";
      }
      else if($table == "userinfo"){

        $idval = updatedata("selectedservices","userId=".$insid,"refrenceId='".$_SESSION['refrence']."'");
        return "<script>location.href='success'</script>";
      }
      else{
        return "<div class='success'>Record Submitted successfully !!!</div>";
      }
  	}
  	else{

  		return "<div class='failure'>Access Denied !!!</div>";
  	}
  }


  function updatedata($table,$data,$clause){
    $sql = "update ".$table." set ".$data." where ".$clause;
    if(mysqli_query($con,$sql) == 1){
      return "<div class='success'>Record Updated successfully !!!</div>";
    }
    else{
      return "<div class='failure'>Access Denied !!!</div>";
    }

    
  }

  function selectdata($table,$column,$link){
  	$columnval = explode(",",$column);
    $grid = "";
    if($table == "professionals"){
      $sql = "select ".$column." from ".$table." inner join profession on profession.id = ".$table.".profession";
    }else{
      $sql = "select ".$column." from ".$table;
    }

  	$resultset = mysqli_query($con,$sql);
  	if (! $resultset){ 
  		return "<div class='failure'>Access Denied !!!</div>";
  	}
  	if (mysqli_num_rows($resultset) == 0){   
	    return "<div class='success'>No Data Found !!!</div>";
  	}else{

  	    while($row = mysqli_fetch_assoc($resultset)){
  	    	$grid .= "<tr>";
  	    	foreach($columnval as $col1){

            if($col1 == "id"){
                $grid.="<td><form method='post' action='".$link."' class='mb-0'><input type='hidden' name='editid' value='".$row[$col1]."' /><button type='submit' class='btn btn-default' name='edit'>Edit</button> 
            <button type='button' class='btn btn-default'>Delete</button></form></td>";
            }
            else{
              $grid.= "<td>".$row[$col1]."</td>";  
            }
  		  		
  		  	}
  	        $grid .= "</tr>";
  	    }
  	    return $grid;
  	}

  }

function selectdataviewclause($table,$column,$clause,$link){
    $columnval = explode(",",$column);
    $grid = "";
    
      $sql = "select ".$column." from ".$table." where ".$clause;
    $resultset = mysqli_query($con,$sql);
    if (! $resultset){ 
      return "<div class='failure'>Access Denied !!!</div>";
    }
    if (mysqli_num_rows($resultset) == 0){   
      return "<div class='success'>No Data Found !!!</div>";
    }else{

        while($row = mysqli_fetch_assoc($resultset)){
          $grid .= "<tr>";
          foreach($columnval as $col1){

            if($col1 == "id"){
              if($link == "requests"){
                $grid.="<td> <input type='hidden' name='editid' class='editid' value='".$row[$col1]."' /><button type='button' class='btn btn-default' name='edit' onclick='updateStatus(".$row[$col1].")'>Visited</button>
                <a class='btn btn-default' href='/servin/admin/productdetail'>Product Detail</a> </td>";
              }
              else{
                $grid.="<td><form method='post' action='".$link."' class='mb-0'><input type='hidden' name='editid' value='".$row[$col1]."' /><button type='submit' class='btn btn-default' name='edittext'>Edit</button> 
              <button type='button' class='btn btn-default'>Delete</button></form></td>";
            }

            }
            else{
              $grid.= "<td>".$row[$col1]."</td>";  
            }
            
          }
            $grid .= "</tr>";
        }
        return $grid;
    }

  }

  function optiondata($table,$data,$clause){
    $option = "";
    $sql = "select ".$data." from ".$table." where ".$clause;
    $resultset = mysqli_query($con,$sql);
    if(!$resultset){
      return "<div class='failure'>Access Denied !!!</div>";
    }
    else{
      while($row = mysqli_fetch_assoc($resultset, MYSQL_NUM)){
        $option .= "<option value='".$row[0]."'>".$row[1]."</option>";
      }
    }
    return $option;

  }

  function selectdataclause($table,$column,$clause,$form){
	  $con = connect();
    $columnval = explode(",",$column);
    $grid = "";
    if($form == "subservicepop"){
      $grid = "<option value='-''>-- Select Sub Service --</option>";
    }
    $sql = "select ".$column." from ".$table." where ".$clause;
    
    $resultset = mysqli_query($con,$sql);
    if (!$resultset){ 
      return "<div class='failure'>Access Denied !!!</div>";
    }
    if (mysqli_num_rows($resultset) == 0){   
      return "<div class='success'>No Data Found !!!</div>";
    }else{

      $i = 1;

        while($row = mysqli_fetch_assoc($resultset)){
          if($form == "servicesedit"){
              $grid .= "<div class='form-group'><label for='serviceNm'>Service Name:</label>
                <input type='text' class='form-control' name='serviceNm' value='".$row['serviceName']."'>
                </div><div class='checkbox'><label><input type='checkbox' name='activeChk'";
                if($row['active'] == 'Y'){
                  $grid .= "checked='true'";
                }
                else{
                  $grid .= "checked='false'";
                }
                $grid .= ">Active</label></div>";
          }
          else if($form == "subservicesedit"){
            $grid .= "<div class='form-group'><label for='subServiceName'>Sub Service Name:</label>
                <input type='text' class='form-control' name='subServiceName' value='".$row['subServiceName']."'>
                </div><div class='checkbox'><label><input type='checkbox' name='instChk'";
                if($row['instructionYN'] == 'Y'){
                  $grid .= "checked='true'";
                }
                else{
                  $grid .= "checked='false'";
                }
                $grid .= ">Instruction</label></div>";
          }
          else if($form == "professionedit"){
            $grid .= "<div class='form-group'><label for='professionName'>Profession Name:</label>
                    <input type='text' class='form-control' name='professionName' value='".$row['professionName']."'>
                    </div><div class='checkbox'><label><input type='checkbox' name='activeChk'";
              if($row['active'] == "Y"){
                $grid .= "checked='true'";
              }
              else{
                $grid .= "checked='false'";
              }
              $grid .= ">Active</label></div>";

          }
          else if($form == "servicelist"){
              $grid .= "<div class='col-md-4'><img src='../images/specialities/".$row['imagenm']."' class='serviceimg'/><button type='button' class='btn btn-default serviceBtn' data-toggle='modal' data-target='#myModal' data-index='".$row['id']."'>".$row['serviceName']."</button></div>";
          }
          else if($form == "subservicesdiv"){
              $grid .= "<div class='col-md-12'><input type='checkbox' class='chk' onclick='callacrepair()' name='chk".$row['id']."' data-index=".$row['id']." data-text='".$row['subServiceName']."' />".$row['subServiceName']."</div>";
          }
          else if($form == "subservicepop"){
            $grid.="<option value='".$row['id']."'>" .$row['subServiceName'] . "</option>";
          }
          else if($form == "feedback"){
            $grid.="<div class='form-group'>
      <label for='name'>Name</label>
      <input type='text' name='name' required='true' class='form-control' value='".$row['firstName']." ".$row['lastName']."' disabled/>
    </div>";
          }

          else if($form == "login"){
            $_SESSION['userid'] = $row['id'];
            $_SESSION['userroleid'] = $row['roleid'];
            $_SESSION['username'] = $row['firstName']." ".$row['lastName'];
            if($row['roleid'] == 2){
              echo "<script>location.href='/servin/admin/requests'</script>";
            }
            else{
              echo "<script>location.href='userdashboard'</script>";
            }
            
          }
          else if($form == "userdashboard"){
            $subservmn = "";
            $servnm = "";
            $grid.="<tr><td>".$i."</td><td>".$row['refrenceId']."</td><td>";
            
            $resultset1 = selectsubdata("subservices","serviceId,subServiceName","id in(".$row['subServiceId'].")");

            while($row1 = mysqli_fetch_assoc($resultset1)){
              $result2 = selectsubdata("services","serviceName","id = ".$row1['serviceId']);
              while($row2 = mysqli_fetch_assoc($result2)){
                $servnm = $row2['serviceName'];
              }
              $subservmn.=$row1['subServiceName']."<br/>";
            }

            $grid.="<strong>".$servnm."</strong><br/>".$subservmn."</td><td>".date("d-m-Y", strtotime($row['servicedt']))."</td><td>".number_format($row['cost'],2)."</td>";
            if($row['status'] == 1){
              $grid.="<td style='color: red; cursor:pointer;'>Pending</td>"; 
            } 
            else{
              $grid.="<td><a style='color: green; cursor:pointer;' data-index=".$row['id']." onclick='printInvoice(".$row['id'].")'>Print Invoice</a> | <a style='color: #007bff; cursor:pointer;' data-index=".$row['id']." onclick='feedback(".$row['id'].",".$row['userId'].")'>Feedback</a></td>";
            }
            
            $grid.="</tr>";
          }
          else if($form == "clientInvoice"){
            $grid.="<p class='pfont'>".$row['name']."</p>
                  <p class='pfont'>".$row['houseNum']."</p>
                  <p class='pfont'>".$row['street']."</p>
                  <p class='pfont'>".$row['city']." - ".$row['pincode'].", ".$row['state']." </p>
                  <p class='pfont'>".$row['contactNum']."</p>
                  <p class='pfont'>".$row['email']."</p>";
          }
          else if($form == "invInvoice"){
            $grid.="<div class='col-md-6'>
                    <p class='pfont'>Invoice No.   :   <strong>Inv".$row['refrenceId']."</strong></p>
                    <p class='pfont'>Order No.     :   <strong>Ord".$row['refrenceId']."</strong></p>
                    <p class='pfont'>GST No.       :   <strong>78942563</strong></p>
                    <p class='pfont'>TIN No.       :   <strong>78942563</strong></p>
                  </div>
                  <div class='col-md-6'>
                    <p class='pfont'>Invoice Dt.   : <strong>".$row['curdate']."</strong></p>
                    <p class='pfont'>Order Dt.   :   <strong>".$row['curdate']."</strong></p>
                  </div>";
          }
          else if($form == "productInvoice"){

            $resultsub = selectsubdata("subservices","subServiceName","id in(".$row['subServiceId'].")");
            $grid .= "<div class='col-md-1 borderright'><p class='pfont'>1.</p></div>
                <div class='col-md-6 borderright'>";

            while($row1 = mysql_fetch_assoc($resultsub)){
              $grid.="<p class='pfont'>".$row1['subServiceName']."</p>";
            }
                $grid.="</div>
                <div class='col-md-1 borderright'><p class='pfont'>5863</p></div>
                <div class='col-md-1 borderright'><p class='pfont'>1</div>
                <div class='col-md-1 borderright text-right'><p class='pfont'>".number_format($row['cost'],2)."</p></div>
                <div class='col-md-1 borderright'><p class='pfont'>Nos</p></div>
                <div class='col-md-1 text-right'><p class='pfont'>".number_format($row['cost'],2)."</p></div>";
          }
          else if($form == "totalInvoice"){

            
            $grid .= "<div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-6 borderright'><p class='pfont'><strong>Sub Total</strong></p></div>
                <div class='col-md-1 borderright'><p class='pfont'> </p></div>
                <div class='col-md-1 borderright text-left'><p class='pfont'>1</div>
                <div class='col-md-1 borderright text-right'><p class='pfont'>".number_format($row['cost'],2)."</p></div>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-1 text-right'><p class='pfont'>".number_format($row['cost'],2)."</p></div>";
          }
          else if($form == "restInvoice"){
            $grid .= "<div class='row text-right'>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-6 borderright'><p class='pfont'>Discount</p></div>
                <div class='col-md-1 borderright'><p class='pfont'> </p></div>
                <div class='col-md-1 borderright'><p class='pfont'></div>
                <div class='col-md-1 borderright text-right'><p class='pfont'>10</p></div>
                <div class='col-md-1 borderright'><p class='pfont'>%</p></div>
                <div class='col-md-1 text-right'><p class='pfont'>".number_format(($row['cost'] *(10/100)),2)."</p></div>
            </div>

            <div class='row text-right'>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-6 borderright'><p class='pfont'>GST</p></div>
                <div class='col-md-1 borderright'><p class='pfont'> </p></div>
                <div class='col-md-1 borderright'><p class='pfont'></div>
                <div class='col-md-1 borderright text-right'><p class='pfont'>18</p></div>
                <div class='col-md-1 borderright'><p class='pfont'>%</p></div>
                <div class='col-md-1 text-right'><p class='pfont'>".number_format(($row['cost'] *(18/100)),2)."</p></div>
            </div>

            <div class='row'>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-6 borderright'><p class='pfont'><br/><br/></p></div>
                <div class='col-md-1 borderright'><p class='pfont'> </p></div>
                <div class='col-md-1 borderright'><p class='pfont'></div>
                <div class='col-md-1 borderright text-right'><p class='pfont'></p></div>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-1 text-right'><p class='pfont'></p></div>
            </div>

            <div class='row borderup'>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-6 borderright'><p class='pfont'><strong>Grand Total</strong></p></div>
                <div class='col-md-1 borderright'><p class='pfont'> </p></div>
                <div class='col-md-1 borderright'><p class='pfont'></div>
                <div class='col-md-1 borderright text-right'><p class='pfont'></p></div>
                <div class='col-md-1 borderright'><p class='pfont'></p></div>
                <div class='col-md-1 text-right'><p class='pfont'>".number_format(($row['cost'] + ($row['cost'] *(18/100)) - ($row['cost'] *(10/100))),2)."</p></div>
            </div>";
          }
          else if($form == "callbooking"){

            $_SESSION['userid'] = $row['id'];
            $_SESSION['userroleid'] = $row['roleid'];
            $grid.="<div class='form-group'>
      <label for='firstname'>First Name</label>
      <input type='text' name='firstname' required='true' class='form-control' value='".$row['firstName']."'/>
      </div>
  
    <div class='form-group'>
      <label for='lastname'>Last Name</label>
      <input type='text' name='lastname' required='true' class='form-control' value='".$row['lastName']."' />
    </div>

    <div class='form-group'>
      <label for='Contact'>Contact Number</label>
      <input type='text' name='Contact' required='true' class='form-control' value='".$row['contactNum']."'/>
    </div>

    <div class='form-group'>
      <label for='Flat'>Flat/House No.</label>
      <input type='text' name='Flat' required='true' class='form-control' value='".$row['houseNum']."'/>
    </div>

    <div class='form-group'>
      <label for='Street'>Street/Location</label>
      <input type='text' name='Street' required='true' class='form-control' value='".$row['street']."'/>
    </div>

    <div class='form-group'>
      <label for='State'>State</label>
      <input type='text' name='State' required='true' class='form-control' value='".$row['state']."'/>
    </div>

    <div class='form-group'>
      <label for='city'>City</label>
      <input type='text' name='city' required='true' class='form-control' value='".$row['city']."'/>
    </div>

    <div class='form-group'>
      <label for='PinCode'>PinCode</label>
      <input type='text' name='PinCode' required='true' class='form-control' value='".$row['pincode']."'/>
    </div>

    <div class='form-group'>
      <label for='email'>email</label>
      <input type='text' name='email' required='true' class='form-control' value='".$row['email']."'/>
    </div>

    <div class='form-group'>
      <label for='password'>Password</label>
      <input type='password' name='password' required='true' class='form-control' value='".$row['password']."'/>
    </div>";
          }
          else if($form == "subservicepopdet"){
            $cntinst = countval("serviceinstruction","subServiceId = ".$row['id']);
            $grid.= "<li class='list-group-item'><input type='checkbox' class='chkwh' data-index='".$row['id']."' data-text='".$row['subServiceName']."'/>".$row['subServiceName'];
            if($cntinst != 0){
              $grid.= "<ul>";
               $sql1 = "select instructionText from serviceinstruction where subServiceId = ".$row['id'];
               $resultset1 = mysqli_query($con,$sql1);
               while($row1 = mysqli_fetch_assoc($resultset1)){
                  $grid.= "<li>".$row1['instructionText']."</li>";
               }
               $grid .= "</ul>";
            }

            $grid .= "</li>";
          }
$i++;
        }
        return $grid;
    }

  }

  function countval($table,$clause){
    $sql = "select count(*) as cnt from ".$table." where ".$clause;
    $result = mysqli_query($con,$sql);
    $value = mysqli_fetch_object($result);
    return $value->cnt;
  }

  function maxval($column,$table,$clause){
    $sql = "select max(".$column.") as maxcode from ".$table." where ".$clause;
    $result = mysqli_query($con,$sql);
    $value = mysqli_fetch_object($result);
    return $value->maxcode;
  }

  function selectsubdata($table,$data,$clause){
    $sql = "select ".$data." from ".$table." where ".$clause;
    $result = mysqli_query($con,$sql);
    return $result;
  }

?>
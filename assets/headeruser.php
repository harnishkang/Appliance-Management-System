<?php
  $_SESSION['page'] == 'N'?$_SESSION['path'] = '':$_SESSION['path'] = '../';
?>
<html>
  <head>
  	<title></title>
  	<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['path']; ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['path']; ?>css/bootstrap-datepicker.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['path']; ?>css/style.css">
      <script type="text/javascript" src="<?php echo $_SESSION['path']; ?>js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo $_SESSION['path']; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $_SESSION['path']; ?>js/fontawesome.js"></script>
      <script type="text/javascript" src="<?php echo $_SESSION['path']; ?>js/script.js"></script>
      <script type="text/javascript" src="<?php echo $_SESSION['path']; ?>js/bootstrap-datepicker.js"></script>
  </head>
  <body>

    <div class="container-fluid">
      <!-- Main Menu -->
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo $_SESSION['path']; ?>servin"><i class="fab fa-asymmetrik logoicon"></i></i> AMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <?php if($_SESSION['userroleid'] == 1){  ?>
                  <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="/servin/files/userdashboard">UpComing Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/servin/files/services">Choose Your Service</a>
                  </li>
                </ul>
              <?php } else{ 
                ?>
                
                
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/servin/admin/requests">Pending Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/files/callbooking">Call Booking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/admin/services">New Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/admin/subservices">New SubService</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/admin/profession">Profession</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/admin/serviceInstruction">New Instruction</a>
                </li>
              </ul>
            <?php } ?>
              <form class="form-inline my-2 my-lg-0">
                <h6 class="mr-3"><?php echo ucwords($_SESSION['username']); ?></h6>
                <a class="btn btn-outline-success my-2 my-sm-0" href="/servin/files/logout" role="button">Logout</a>
                <!--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
                
              </form>
            </div>
          </nav>
        <!-- Main Menu -->
    </div>

	
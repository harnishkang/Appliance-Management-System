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
            <a class="navbar-brand" href="/servin"><i class="fab fa-asymmetrik logoicon"></i></i> AMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/servin/files/professional">Becoma a Professional</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/servin/files/aboutus">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=""><i class="fa fa-phone"></i> 99999-88888</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <a class="btn btn-outline-success my-2 my-sm-0" href="/servin/files/login" role="button">Login</a>
              </form>
            </div>
          </nav>
        <!-- Main Menu -->
    </div>

	
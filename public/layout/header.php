<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MVC4PHP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- JQuery - http://jquery.com/download -->
    <script src="<?php echo URL; ?>template/js/jquery.min.js"></script>
    
    <!-- Bootstrap - http://getbootstrap.com -->
    <link href="<?php echo URL; ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>template/css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="<?php echo URL; ?>template/js/bootstrap.min.js"></script>  
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Mvc4php-Custom styles for this template -->
    <link href="<?php echo URL; ?>template/css/style.css" rel="stylesheet">
  
</head>
<body>
 
 <!-- NAVIGATION -->
 
<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand logo" href="<?php echo URL; ?>HomeController/index">
            <img alt="PHP 4 MVC" src="http://mvc4php.com/demo/template/images/mvc4php.png">
          </a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo URL; ?>HomeController/index">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Kunden <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>CustomerController/index">Anzeigen</a></li>
                  <li><a href="<?php echo URL; ?>CustomerController/search">Suchen</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header"></li>
                  <li><a href="<?php echo URL; ?>CustomerController/add">Erzeugen</a></li>                  
                  <li><a href="<?php echo URL; ?>CustomerController/index">Bearbeiten</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Verträge <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo URL; ?>ContractController/index">Anzeigen</a></li>
                  <li><a href="<?php echo URL; ?>ContractController/search">Suchen</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header"></li>
                  <li><a href="<?php echo URL; ?>ContractController/add">Erzeugen</a></li>                  
                  <li><a href="<?php echo URL; ?>ContractController/index">Bearbeiten</a></li>
                </ul>
              </li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </div>
 
 <!-- NAVIGATION ENDE -->

  <header class="header">  

  </header>
  <!-- /.header --> 
<?php include "../common/database.class.php";
include "../common/functions.php";
include "../common/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from easy-themes.tk/themes/preview/ace/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:19 GMT -->
<head>
<meta charset="utf-8" />
<title>Dynamic Test</title>
<meta name="description" content="Common form elements and layouts" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="../../../images/dts.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<!--basic styles-->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
<!--page specific plugin styles-->
<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
<link rel="stylesheet" href="assets/css/chosen.css" />
<link rel="stylesheet" href="assets/css/datepicker.css" />
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
<link rel="stylesheet" href="assets/css/daterangepicker.css" />
<link rel="stylesheet" href="assets/css/colorpicker.css" />
<!--fonts-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
<!--ace styles-->
<link rel="stylesheet" href="assets/css/ace.min.css" />
<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
<!--inline styles if any-->
</head>
<body>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid"> <a href="#" class="brand"> <small> <i class="icon-leaf"></i> Dynamic Test Admin </small> </a>
      <!--/.brand-->
      <ul class="nav ace-nav pull-right">
        <li class="light-blue user-profile"> <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle"> <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" /> <span id="user_info"> <small>Welcome,</small> Admin </span> <i class="icon-caret-down"></i> </a>
          <ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
            <li> <a href="logout.php"> <i class="icon-off"></i> Logout </a> </li>
          </ul>
        </li>
      </ul>
      <!--/.ace-nav-->
    </div>
    <!--/.container-fluid-->
  </div>
  <!--/.navbar-inner-->
</div>
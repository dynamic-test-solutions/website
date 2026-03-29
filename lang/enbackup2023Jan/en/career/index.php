<?php 
include "../common/database.class.php";
include '../common/functions.php';
error_reporting(0);
$db=new database;

$asiavar=getasia();

$north=getnorthamerica();


$europe=geteurope();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../../../images/dts.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="stylesheet" type="text/css" href="../../../css/dts_styles.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/slicknav.css"/>
<link rel="stylesheet" type="text/css" href="../../../fonts/css/font-awesome.css" media="screen">
<link href='../../../font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="../../../js/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../../js/dropdown-hover.js"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../../../js/jquery.slicknav.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#menu').slicknav();
});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Employment Oppurtunities</title>
</head>

<body>
<!--Navigation Starts Here-->
<div id="nav" class="container1">
  <div class="container">
    <div class="row">
      <div >
        <ul class="nav nav-pills" id="menu">
          <li style="border-left:0;"><a class="green_txt" href="../../../index.html">Home</a> </li>
          <li class="dropdown"><a  href="#" data-toggle="dropdown" class="dropdown-toggle green_txt">About Us<b class="caret"></b></a>
            <ul class="dropdown-menu" id="menu2">
              <li><a href="../aboutus/business.html">Our Business</a></li>
              <li><a href="../aboutus/our-value-add.html">Our Value Add</a></li>
              <li><a href="../aboutus/quality.html">Our Quality</a></li>
              <li><a href="../aboutus/history.html">Our History</a></li>
              <li><a href="../aboutus/our-locations.html">Our Locations</a></li>
            </ul>
          </li>
          <li class="dropdown"><a  href="#" data-toggle="dropdown" class="dropdown-toggle green_txt">Products <b class="caret"></b></a>
            <ul class="dropdown-menu" id="menu2">
              <li><a href="../products/package.html">Package Test Loadboards/DIB</a></li>
              <li><a href="../products/wafer.html">Wafer Probe Loadboards/PIB</a></li>
              <li><a href="../products/probe.html">Probe Card PCBs</a></li>
              <li><a href="../products/bench.html">Bench & Characterization Boards</a></li>
            </ul>
          </li>
          <li class="dropdown"><a  href="#" data-toggle="dropdown" class="dropdown-toggle green_txt">Services<b class="caret"></b></a>
            <ul class="dropdown-menu" id="menu2">
              <li><a href="../design/design.html">Design</a></li>
              <li><a href="../design/fabrication.html">Fabrication</a></li>
              <li><a href="../design/assembly.html">Assembly</a></li>
              <li><a href="../design/turnkey.html">Turn Key</a></li>
            </ul>
          </li>
          <li><a class="green_txt" href="../testerplatforms/index.html">Tester Platforms</a> </li>
          <li><a class="green_txt" href="../news/index.html">News</a> </li>
          <li class="active"><a class="green_txt" href="../career/index.php">Employment Opportunities</a> </li>
          <li><a class="green_txt" href="../Inquiry/index.php">Inquiry</a> </li>
          <li style="border-right:0;"><a class="green_txt" href="../contactus/index.html">Contact Us</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Navigation Ends Here-->
<!--Logo Area Starts here-->
<div class="container">
  <div class="row">
    <div id="logo" class="span3"> <img src="../../../images/DTS_logo.jpg" width="140" height="85" alt="dts logo" /></div>
    <div class="span4 offset5"> </div>
  </div>
</div>
<!--Logo Area end here-->
<!--Slider Starts here-->
<!--Slider ends here-->
<!--Content area starts here-->
<div id="content_area" class="container1">
<div class="container">
  <div class="row">
    <div class="page-header">
      <h2 class="green_txt">Employment Opportunities</h2>
    </div>
    <div class="span12 heading-block left0"> <br />
      <div class="space"></div>
      <h3>Asia Pacific</h3>
      <hr>
      <div class="flag-name-holder">
        <ul>
          <?php
		 foreach($asiavar as $key => $val):  ?>
          <li><a href="careerdesc.php?a=v&con=<?php echo $val['country_list']; ?>"><img  class="border-img "src="../admin_flags/<?php echo $val['country_flag']; ?>" width="54" height="54" /><span><span> <?php echo $val['country_list']; ?></span></span></a> </li>
          <?php endforeach; ?>
        </ul>
        <!--<li><a href="#"><img  class="border-img "src="../../../images/flags/Philippines.png" width="64" height="64"/><span><span>Philippines </span></span></a>			    </li>
    <li><a href="#"><img  class="border-img "src="../../../images/flags/china.png" width="64" height="64"/><span><span>China </span></span></a></li>
    <li><a href="#"><img  class="border-img "src="../../../images/flags/Malaysia.png" width="64" height="64"/><span><span>Malaysia </span></span></a></li>
    <li><a href="#"><img  class="border-img "src="../../../images/flags/taiwan.png" width="64" height="64"/><span><span>Taiwan </span></span></a></li>-->
      </div>
      <h3>North America</h3>
      <hr>
      <div class="flag-name-holder">
        <ul>
          <?php
		 foreach($north as $key => $val):  ?>
          <li><a href="careerdesc.php?a=v&con=<?php echo $val['country_list']; ?>"><img  class="border-img "src="../../../images/flags/<?php echo $val['country_flag']; ?>" width="54" height="54" /><span><span> <?php echo $val['country_list']; ?></span></span></a> </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <h3>Europe</h3>
      <hr>
      <div class="flag-name-holder">
        <ul>
          <?php
		 foreach($europe as $key => $val):  ?>
          <li><a href="careerdesc.php?a=v&con=<?php echo $val['country_list']; ?>"><img  class="border-img "src="../../../images/flags/<?php echo $val['country_flag']; ?>" width="54" height="54" /><span><span> <?php echo $val['country_list']; ?></span></span></a> </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Content area ends here-->
<!--Footer starts here-->
<div id="footer"  class="container1">
  <div class="container">
    <div class="row">
      <div class="span9 footer left0"> <br />
        <div>Copyright © 2015 www.dynamic-test.com. All rights reserved.</div>
      </div>
    </div>
  </div>
</div>
<!--Footer ends here-->
</body>
</html>

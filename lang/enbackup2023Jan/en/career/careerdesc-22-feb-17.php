<?php 
include "../common/database.class.php";
include '../common/functions.php';
error_reporting(0);
$db=new database;

//$conditons=array('continent_list='.$_REQUEST['con']);
//print_r($conditons);
//$getrecord=$db->findAll('job_table',$conditons);


//print_r($getrecord);
//exit();

// Fetch Current Openings
//=============================
$query="select * from job_table where country_list='".$_REQUEST['con']."'";
$getrecord=mysql_query($query);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../../../images/dts.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link rel="stylesheet" type="text/css" href="../../../css/dts_styles.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/jquery-ui2.css" media="screen">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="../../../css/slicknav.css"/>
<link href="../../../css/jquery.drawer.css" rel="stylesheet">
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>News</title>
<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2000, 2001, 2002, 2003 Macromedia, Inc. All rights reserved. -->
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
              <li><a href="../products/probe.html">Probe Card PCBsS</a></li>
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
          <li ><a class="green_txt" href="../news/index.html">News</a> </li>
          <li class="active"><a href="../career/index.php">Employment Opportunities</a> </li>
          <li><a class="green_tx" href="../Inquiry/index.php">Inquiry</a> </li>
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
    <div class="span4 offset5">
      <!--<div class="controls" style="text-align:right; padding:80px 20px 0 0;">
        <select id="select01">
          <option>Select Language</option>
        </select>
      </div>-->
    </div>
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
      <?php 
	   $query="select * from dy_place  where country_list='".$_REQUEST['con']."'";
	   //echo $query;
       $view=mysql_query($query);	
	   
	     
	   while($row=mysql_fetch_array($view)) { ?>
      <div class="span12">
        <div class="space"></div>
        <div class="point_country_holder"><a href="../career/index.php"> <img src="../admin_flags/<?php echo $row['country_flag']; ?> "/><span class="left-heading green_txt"><?php echo $row['country_list']; } ?> </span></a> <a href="index.php"><span class="bck"><i class="fa fa-arrow-left"></i>
Back</span></a> </div>
        <div class="space"></div>
        <div class="clearfix"></div>
        <div class="pad20px_r right0"> <br>
          <div class="drawer">
            <?php   
             	$cnt=mysql_num_rows($getrecord);
			  	if($cnt!=0){ 
			 
		
					while($row=mysql_fetch_array($getrecord)) { ?>
            <div class="drawer-item">
              <div class="drawer-header">
                <h3><?php echo $row['job_title'];?></h3>
                <div class="drawer-header-icon"></div>
              </div>
              <div class="drawer-content"> <?php echo $row['job_desc'];?> 
             <a class="btn btn-primary" href="submitpage.php?c=<?php echo $row['country_list']; ?>"> Apply </a>
			  </div>
              
            </div>
            <?php 
			 } } else { ?>
			 
			 <div class="alert alert-danger fade in">
  				<strong>Sorry ! </strong> There are no current openings at this location.
			 </div>
			 
			 
			 <?php }
			   
              
             ?>
            <!-- First Item -->
            <!-- Second Item -->
            <!--<div class="drawer-item">
              <div class="drawer-header">
                <h3>PCB Design Engineer</h3>
                <div class="drawer-header-icon"></div>
              </div>
              <div class="drawer-content"> </div>
            </div>-->
            <!-- Third Item -->
          </div>
        </div>
        <div class="space"></div>
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
      <!--<div class="span3" style="text-align:right"> Website by <a href="http://www.thedreammakerz.com" target="_blank">Dream Makerz</a></div>-->
    </div>
  </div>
</div>
<!--Footer ends here-->
<script type="text/javascript" src="../../../js/jquery-ui.js"></script>
<script src="../../../js/jquery.drawer.js"></script>
<script src="../../../js/demo.js"></script>
</body>
</html>

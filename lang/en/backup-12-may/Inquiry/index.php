<?php
	if ($_POST["submit"]) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$com=$_POST['company'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$skype = $_POST['skype'];
		$message = $_POST['message'];
		$from = $_POST['name']; 
		$to = 'salesasia@dynamic-test.com,petea@dynamic-test.com,salesusa@dynamic-test.com';   //dreammakerz.sugumar@gmail.com,salesca@dynamic-test.com,petea@dynamic-test.com
		//
		$subject = "Message from $fname";
		$headers = "From: $email";
		
		$body =" First Name: $fname\n Last Name: $lname\n Company Name:$com\n E-Mail: $email\n Phone No:$phone\n Message:\n $message";

		// Check if fname has been entered
		if (!$_POST['fname']) {
			$errFname = 'Please enter your First Name';
		}
		// Check if lname has been entered
		if (!$_POST['lname']) {
			$errLast = 'Please enter your Last Name';
		}

		
		// Check if name has been entered
		if (!$_POST['company']) {
			$errCom = 'Please enter your Comapany name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		// Check if name has been entered
		if (!$_POST['phone']) {
			$errPhone = 'Please enter your Phone No';
		}
		
		
		//Check if message has been entered
		//if (!$_POST['message']) {
		//	$errMessage = 'Please enter your message';
		//}
		//Check if simple anti-bot test is correct
		

// If there are no errors, send the email
if (!$errFname && !$errLast && !$errCom && !$errEmail && !$errPhone ) {
	if (mail ($to, $subject,$body,$headers)) {
		$result='<div class="alert alert-success">Thank You! We will be in touch</div>';
		header( "refresh:3;url=http://dynamic-test.com/");
		 
		
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
	}
}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Inquiry</title>
</head>
<body>
<!--Navigation star-fieldsts Here-->
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
          <li ><a class="green_txt" href="../testerplatforms/index.html">Tester Platforms</a> </li>
          <li><a class="green_txt" href="../news/index.html">News</a> </li>               <li><a class="green_txt" href="../career/index.php">Employment Opportunities</a> </li>
          <li class="active"><a class="green_txt" href="index.php">Inquiry</a> </li>
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
        <h2 class="green_txt">Inquiry</h2>
      </div>
      <div class="span12 left0">
        <div class="span8">
          <br />
          <br />
          <h3 style="text-align:left;"><em>Thank you for your interest in DTS! Please complete the<br />
            information below and we will reply promptly.</em></h3>
          <br />
          <br />
        </div>
        <br />
        <br />
        <div class="span6">
          <form class="enquiry-form" role="form" method="post" action="index.php">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">First Name<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo htmlspecialchars($_POST['fname']); ?>">
                <?php echo "<p class='text-danger'>$errFname</p>";?> </div>
            </div>
		<div class="form-group">
              <label for="name" class="col-sm-2 control-label">Last Name<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo htmlspecialchars($_POST['lname']); ?>">
                <?php echo "<p class='text-danger'>$errLast</p>";?> </div>
            </div>

            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Company<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" value="<?php echo htmlspecialchars($_POST['company']); ?>">
                <?php echo "<p class='text-danger'>$errCom</p>";?> </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                <?php echo "<p class='text-danger'>$errEmail</p>";?> </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Mobile Phone<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
                <?php echo "<p class='text-danger'>$errPhone</p>";?> </div>
            </div>
            
            </div>
            <div class="span5">
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Skype ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="skype" name="skype" placeholder="skype ID" value="<?php echo htmlspecialchars($_POST['skype']); ?>">
               </div>
            </div>
            <div class="form-group">
              <label for="message" class="col-sm-2 control-label">How can we help?</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="8" cols="40" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                <?php echo "<p class='text-danger'>$errMessage</p>";?> </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
                <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary" >
              </div>
              

            </div>
            <span class="star-fields">*</span> Required fields</span>
            <br />
			<br />
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2"> <?php echo $result; ?> </div>
            </div>
          </form>
        </div>
      </div>
      <!--<div class="span4">
        <div class="pad20px_l">
          <div >
            <h2><small>DTS Quality</small></h2>
          </div>
          <hr />
          <div class="well">DTS takes Quality seriously and employs a series of QA/QC checks
            
            throughout the entire process. Beginning at the initiation of a new
            
            job, we carefully check all customer supplied inputs, conduct
            
            multiple quality checks thru the design process and provide a
            
            comprehensive QC inspection of the final data package. DTS Engineers 
            
            utilize CAM350 software with custom scripts to
            
            execute an automated and thorough QC of the CAM files, prior to
            
            releasing the project for fabrication.<br />
            <br />
            All DTS boards are fabricated in ISO9000 certified
            
            PCBs fabrication facilities!
            
            DTS has a 50+ point QA Checklist that is completed on every job.
            
            QA Checklist items include:<br />
            &nbsp;
            <h4>DTS stands behind its products and warrants all boards to be free of
              
              electrical or mechanical defects for a period of 90 days after shipment!</h4>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
<!--Content area ends here-->
<!--Footer star-fieldsts here-->
<div id="footer"  class="container1">
  <div class="container">
    <div class="row">
      <div class="span9 footer left0">
        <!--<ul class="nav">
          <li><a href="../../../index.html">Home</a></li>
          <li><a href="../aboutus/index.html">About Us</a></li>
          <li><a href="../products/package.html">Products</a></li>
          <li><a href="../design/design.html">Services</a></li>
          <li><a href="../testerplatforms/index.html">Tester Platforms</a></li>
          <li><a href="../news/index.html">News</a></li>
          <li><a style="border:0" href="../contactus/index.html">Contact Us</a></li>
        </ul>-->
        <br />
        <div>Copyright © 2015 www.dynamic-test.com. All rights reserved.</div>
      </div>
      <!--<div class="span3" style="text-align:right"> Website by <a href="http://www.thedreammakerz.com" target="_blank">Dream Makerz</a></div>-->
    </div>
  </div>
</div>
<!--Footer ends here-->
<!--<script type="text/javascript">
function clearform()
{
    document.getElementById("name").value=""; //don't forget to set the textbox id
    document.getElementById("company").value="";
	document.getElementById("email").value="";
	document.getElementById("phone").value="";
	document.getElementById("skype").value="";
	document.getElementById("message").value="";
}

</script>-->
</body>
</html>

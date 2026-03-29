<?php
	error_reporting(0);
	
	
	if ($_POST["submit"]) {
		
		
		
		$place=$_POST['ctry'];
		
		
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$from = $_POST['fname']; 
		$to = 'HR@dynamic-test.com'; 	   //dreammakerz.sugumar@gmail.com,salesca@dynamic-test.com,petea@dynamic-test.com
		$subject = "Message from $fname";
		//$headers = "From: $email";
		
		//$body =" First Name: $fname\n  E-Mail: $email\n Phone No:$phone";

		// Check if fname has been entered
		if (!$_POST['fname']) {
			$errFname = 'Please enter your Full Name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		
		// Check if name has been entered
		if (!$_POST['phone']) {
			$errPhone = 'Please enter your Phone No';
		}
		
		
		if($_FILES['file']['name']=='')
		{
			//No file selected
			
			$errempty = 'Input file should not be empty';
			
		}
		
		$file_size = $_FILES['file']['size'];
		
		if($file_size > 2097152){      
			$errsize = 'File too large. File must be less than 2 megabytes.'; 
		}
		
		
		
		
		
		
		
		//Check if message has been entered
		//if (!$_POST['message']) {
		//	$errMessage = 'Please enter your message';
		//}
		//Check if simple anti-bot test is correct
		
		
		
		// Maximum file size for aresumes in KB NOT Bytes for simplicity. MAKE SURE your php.ini can handel it,
		// post_max_size, upload_max_filesize, file_uploads, max_execution_time!
		// 2048kb = 2MB,       1024kb = 1MB,     512kb = 1/2MB etc..
	
		$max_file_size="5000";
		
		
		if((!empty($_FILES["file"]))) {
			// basename -- Returns filename component of path
			$filename = basename($_FILES['file']['name']);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			$filesize=$_FILES['file']['size'];
			$max_bytes=$max_file_size*1024;
	} 

			// send an email
			// Obtain file upload vars
			$fileatt      = $_FILES['file']['tmp_name'];
			$fileatt_type = $_FILES['file']['type'];
			$fileatt_name = $_FILES['file']['name'];
			
			// Headers
			$headers = "From: $email";
		
		// create a boundary string. It must be unique
		  $semi_rand = md5(time());
		  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

		  // Add the headers for a file file
		  $headers .= "\nMIME-Version: 1.0\n" .
		              "Content-Type: multipart/mixed;\n" .
		              " boundary=\"{$mime_boundary}\"";

		  // Add a multipart boundary above the plain message
		  $message ="This is a multi-part message in MIME format.\n\n";
		  $message.="--{$mime_boundary}\n";
		  $message.="Content-Type: text/plain; charset=\"iso-8859-1\"\n";
		  $message.="Content-Transfer-Encoding: 7bit\n\n";
		  
		  $message.="Name: ".$fname."\n";
		  $message.="Mobile: ".$phone."\n";
		  $message.="Email: ".$email."\n";
		  $message.="Country Applied For: ".$place."\n";
		  		  
		
		if (is_uploaded_file($fileatt)) {
		  // Read the file to be attached ('rb' = read binary)
		  $file = fopen($fileatt,'rb');
		  $data = fread($file,filesize($fileatt));
		  fclose($file);

		  // Base64 encode the file data
		  $data = chunk_split(base64_encode($data));

		  // Add file file to the message
		  $message .= "--{$mime_boundary}\n" .
		              "Content-Type: {$fileatt_type};\n" .
		              " name=\"{$fileatt_name}\"\n" .
		              //"Content-Disposition: file;\n" .
		              //" filename=\"{$fileatt_name}\"\n" .
		              "Content-Transfer-Encoding: base64\n\n" .
		              $data . "\n\n" .
		              "--{$mime_boundary}--\n";
		}
		
		
		// Send the completed message
		
		$envs = array("HTTP_USER_AGENT", "REMOTE_ADDR", "REMOTE_HOST");
		foreach ($envs as $env)
		$message .= "$env: $_SERVER[$env]\n";
		

// If there are no errors, send the email
if (!$errFname && !$errEmail && !$errPhone && !$errempty && !$errsize   ) {
	if (mail ($to, $subject,$message,$headers)) {
		
		$result='<div class="alert alert-success">Thank You! We will be in touch</div>';
		
		$respond_subject = "Thank you for contacting us!";

		$headers = "From:HR@dynamic-test.com" ;
		
		/* Prepare autoresponder message */
		$respond_message = "Hello!
		
		
		Thank you for applying for the career opportunity at DTS!
		
		We will contact you if you are a good candidate for our opening.
		
		www.dynamic-test.com
		
		Thanks, Pete
		
		";
		
		mail($email, $respond_subject, $respond_message, $headers);
				
		header( "refresh:5;url=http://dynamic-test.com/");
		 
		
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

var _validFileExtensions = [".pdf", ".doc", ".docx"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
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
          <li ><a class="green_txt" href="../news/index.html">News</a> </li>
          <li class="active"><a class="green_txt" href="../career/index.php">Employment Opportunities</a> </li>
          <li ><a class="green_txt" href="index.php">Inquiry</a> </li>
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
        <h2 class="green_txt">Employment Opportunities</h2>
      </div>
      <div class="span12 left0">
        <div class="span12">
          <br />
          <br />
          <h3 style="text-align:center;">Please complete information below, attach
			 your resume and click Submit Resume</h3>
          <br />
          <br />
        </div>
        <br />
        <br />
        <div class="span6">
          <form class="enquiry-form" role="form" method="post" action="submitpage.php" onsubmit="return Validate(this);" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Full Name<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name" value="<?php echo htmlspecialchars($_POST['fname']); ?>">
                <?php echo "<p class='text-danger'>$errFname</p>";?> </div>
            </div>
		

            
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email Address<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                <?php echo "<p class='text-danger'>$errEmail</p>";?> </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Mobile Phone Number<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile No" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
                <?php echo "<p class='text-danger'>$errPhone</p>";?> </div>
            </div>
            
            </div>
            <div class="span5">
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Alternate Phone Number (Opt)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="altmob" name="altmob" placeholder="Alternate Number" value="<?php echo htmlspecialchars($_POST['altmob']); ?>"><?php echo "<p class='text-danger'>$errAlt</p>";?> 
               </div>
            </div>
            <div class="form-group">
              <label for="message" class="col-sm-2 control-label">Upload File<span class="star-fields">*</span></label>
              <div class="col-sm-10">
                <input type="file" name="file" id="file" onchange="ValidateSingleInput(this);">
                <input type="hidden" name="max_file_size" value="2000000" />
                <input type="hidden" name="ctry" value="<?php echo $_GET['c']; ?>" />
                <?php echo "<p class='text-danger'>$errempty</p>";?>
                <?php echo "<p class='text-danger'>$errsize</p>";?>
                </div>
            </div>
            <div class="form-group">
              <input id="submit" name="submit" type="submit" value="Submit Resume" class="btn btn-success btn-lg" >
              

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
	document.getElementById("altmob").value="";
	document.getElementById("message").value="";
}

</script>-->
</body>
</html>

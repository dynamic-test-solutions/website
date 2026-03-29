<?php 
session_start();
if($_SESSION['user_name']=="")
{
header("location:index.php?act=invalid");
}
include "../common/database.class.php";
include "../common/functions.php";

//error_reporting(0);
$db=new database;

if($_GET['act']=="e")
{

if($_POST['Edit']!="")
{
		
	
		 
		   	 
		     unset($_POST[Edit]);
		
			 $table_name="job_table";
			 
			 $condition=array('id='.$_POST['id']);
			 $arguments=$_POST;
			// print_r ($product_arguments);
			// print_r ($condition);
			// exit();
			 
			 //$product_id=$_GET['id'];
			 //unset($_GET[id]);
//			 echo '<pre>';
//			 print_r($_POST);
//			 echo $product_id;
//			 echo '</pre>';
//			 print_r($product_arguments); 
//			 print_r( $condition);
//			 exit;
			 $db->update($table_name,$arguments,$condition);
			 
		 
	 
			
			header("location:viewsubmenu.php?Action=Updated");
		}
		
}
		else{
			$conditons=array('id='.$_GET['id']);
			$products=$db->findOne('job_table', $conditons);
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from easy-themes.tk/themes/preview/ace/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:19 GMT -->
<head>
<meta charset="utf-8" />
<title>Dynamic Test Admin</title>
<meta name="description" content="Common form elements and layouts" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
<script src="assets/js/countries.js"></script>
<body>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <div class="container-fluid"> <a href="#" class="brand"> <small> <i class="icon-leaf"></i> Ekki Admin </small> </a>
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
<div class="container-fluid" id="main-container"> <a id="menu-toggler" href="#"> <span></span> </a>
  <div id="sidebar">
    <ul class="nav nav-list">
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Country</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li ><a href="addplace.php"> <i class="icon-picture"></i> <span>Add Countries</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li ><a href="viewplace.php"> <i class="icon-picture"></i> <span>view countries</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Jobs</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li><a href="viewsubmenu.php"> <i class="icon-picture"></i> <span>View Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li class="active"><a href="submenu.php"> <i class="icon-picture"></i> <span>Add Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Settings</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
         <li><a href="settings.php"> <i class="icon-picture"></i> <span>Add Settings</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
    </ul>
    <!--/.nav-list-->
    <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>
  </div>
  <div id="main-content" class="clearfix">
    <div id="page-content" class="clearfix">
      <div class="page-header position-relative">
        <h1> Edit job </small> </h1>
      </div>
      <!--/.page-header-->
      <div class="row-fluid">
        <!--PAGE CONTENT BEGINS HERE-->
       <?php  if($_GET['Action']=="Updated") { ?>
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
          <i class="icon-ok green"></i> Record Successfully Updated</strong>. </div>
        <?php }
        ?>
        <form class="form-horizontal" id="job_form" name="job_form" method="post" action="?act=e"enctype="multipart/form-data">
        	<input type="hidden" name="Edit" value="edit">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
          <div class="control-group">
            <label class="control-label" for="form-field-1">continent_list </label>
            <div class="controls">
              <select onChange="print_state('country_list',this.selectedIndex);" id="continent_list" name="continent_list">
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="form-field-1">Country List</label>
            <div class="controls">
              <select name ="country_list" id="country_list">
              </select>
              <script language="javascript">print_country("continent_list");</script>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="form-field-1">Job Title</label>
            <div class="controls">
              <input type="text" name="job_title" id="job_title" value="<?php echo $products['job_title'];?>">
                          </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="form-field-1"> Job_desc</label>
            <div class="controls">
              <textarea name="job_desc" id="job_desc"><?php echo $products['job_desc'];?></textarea>
            </div>
          </div>
         <div class="form-actions">
            <button class="btn btn-info" type="submit" id="submit"> <i class="icon-ok bigger-110"></i>Submit </button>
          </div>
        </form>
        <!--PAGE CONTENT ENDS HERE-->
      </div>
      <!--/row-->
    </div>
    <!--/#page-content-->
    <!--/#ace-settings-container-->
  </div>
  <!--/#main-content-->
</div>
<!--/.fluid-container#main-container-->
<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse"> <i class="icon-double-angle-up icon-only bigger-110"></i> </a>
<!--basic scripts-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<!--page specific plugin scripts-->
<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->


<!--ace scripts-->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script>
//tinymce.init({selector:'#content'});
 CKEDITOR.replace( 'job_desc',{filebrowserUploadUrl: "ckeditor/upload/upload.php"}  );
 
 

</script>
<!--inline scripts related to this page-->
<script type="text/javascript">
			$(function() {
				$('#submit').on('click',function(){
					$("#continent_list").css( "border", "" );
					$("#country_list").css( "border", "" );
					$("#job_title").css( "border", "" );
					var flog=0;
					if($('#continent_list').val()==''){
						$("#continent_list").css( "border", "1px solid red" );
						flog=1;
					}
					if($('#country_list').val()==''){
						$("#country_list").css( "border", "1px solid red" );
						flog=1;
					}
					if($('#job_title').val()==''){
						$("#job_title").css( "border", "1px solid red" );
						flog=1;
					}
					
					
					
					if(flog==1){
						return false;	
					}else{
				
						$('#job_form').submit();
					}
				});
				
				$('#id-input-file-2').ace_file_input({
					no_file:'No image ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false 
					
				});
				
				function myconfirm() {
			   	resut= confirm("Are you sure delete job !!! ");
				   if(!resut){
					   return false;
				   }
				}
				
					

});			
</script>
</body>
<!-- Mirrored from easy-themes.tk/themes/preview/ace/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:34 GMT -->
</html>

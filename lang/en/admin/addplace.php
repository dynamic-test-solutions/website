<?php 
session_start();
if($_SESSION['user_name']=="")
{
header("location:index.php?act=invalid");
}
include_once 'header.php';
//error_reporting(0);

/*if($_GET['act']=='del'){
	if($_GET['category_id']){
		$db=new database;
		$category_id=$_GET['category_id'];
		$conditons=array("category_id=".$category_id);					
		$db->deleteRow('product_categories',$conditons);
		header("location:categories.php");
	}
}*/



	if($_POST)
	{
		//print_r($_FILES['product_type_image']);exit;
		
		if($_FILES['country_flag']['name']!="")			
		{				
				$submenu_image =$_FILES['country_flag']['name'];
				move_uploaded_file($_FILES['country_flag']['tmp_name'],"../admin_flags/".$submenu_image);
				
		}
			     $db=new database;
			 	 		 
				 unset($_POST['id']);
				 unset($_POST['hintcountry_image']);
				 
				 $type_arguments=$_POST;
				 
				 $type_arguments['country_flag']=$submenu_image;
				 //echo "<pre>";
				// print_r($type_arguments);
				// //echo "</pre>";
				// exit;
				//print_r($type_arguments);exit;
				 $type_id=$db->insert("dy_place",$type_arguments);
				 			 	
				 header("location:addplace.php?Action=Added");
			 
	}
	
	
	
	


			


if($_GET['act']=='del'){
	if($_GET['id']){
		$db=new database;
		$type_id=$_GET['id'];
		$site_name=explode("/",$_SERVER['PHP_SELF']);
		$path=$_SERVER['DOCUMENT_ROOT'].'/'.$site_name[1].'../admin_flags/'.$_POST[hintcountry_image];	
		@unlink($path);
		$conditons=array("id=".$type_id);					
		$db->deleteRow('dy_place',$conditons);
		header("location:addplace.php");
	}
}


?>
<script src="assets/js/countries.js"></script>
<style>
#submenu_img {
	display:none;
}
</style>
<div class="container-fluid" id="main-container"> <a id="menu-toggler" href="#"> <span></span> </a>
  <div id="sidebar">
    <ul class="nav nav-list">
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Country</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li class="active"><a href="addplace.php"> <i class="icon-picture"></i> <span>Add Countries</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li><a href="viewplace.php"> <i class="icon-picture"></i> <span>view countries</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Jobs</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
          <li><a href="viewsubmenu.php"> <i class="icon-picture"></i> <span>View Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
          <li ><a href="submenu.php"> <i class="icon-picture"></i> <span>Add Jobs</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
      <li><a href="#" class="dropdown-toggle"> <i class="icon-picture"></i> <span>Setting</span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
         <li><a href="settings.php"> <i class="icon-picture"></i> <span>Add Settings</span> <b class="arrow icon-angle-down"></b> </a></li>
         <li><a href="viewsettings.php"> <i class="icon-picture"></i> <span>View Settings</span> <b class="arrow icon-angle-down"></b> </a></li>
        </ul>
      </li>
    </ul>
    <!--/.nav-list-->
    <div id="sidebar-collapse"><i class="icon-double-angle-left"></i></div>
  </div>
  <div id="main-content" class="clearfix">
    <div id="page-content" class="clearfix">
      <div class="page-header position-relative">
        <h1>Place Form</h1>
      </div>
      <!--/.page-header-->
      <div class="product_type">
        <h4>Add Place</h4>
        <?php  
		if($_GET['Action']=="Added") { ?>
        <div class="alert alert-block alert-success">
          <button type="button" class="close" data-dismiss="alert"> <i class="icon-remove"></i> </button>
          <i class="icon-ok green"></i> Record Successfully Added</strong>. </div>
		<?php }
        ?>
        <form class="form-horizontal" id="place_form" name="place_form" method="post" action="" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label" for="form-field-1">continent_list </label>
            <div class="controls">
              <select onchange="print_state('country_list',this.selectedIndex);" id="continent_list" name="continent_list">
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
            <label class="control-label" for="form-field-1">Country Flag</label>
            <div class="controls country_flag_img_input">
              <input multiple="" type="file"  id="id-input-file-2" name="country_flag" />
            </div>
          </div>
          <input type="hidden" name="hintcountry_image" id="hintcountry_image" >
          <div class="form-actions">
            <button class="btn btn-info" type="submit" id="submit"> <i class="icon-ok bigger-110"></i>Submit </button>
          </div>
        </form>
      </div>
      <div class="row-fluid">
        <!--PAGE CONTENT BEGINS HERE-->
        <div class="row-fluid" id="submenu_list"> </div>
        <!--PAGE CONTENT ENDS HERE-->
      </div>
      <!--/row-->
    </div>
    <!--/#page-content-->
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
<!--ace scripts-->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script>
//tinymce.init({selector:'#content'});
 CKEDITOR.replace( 'job_desc',{filebrowserUploadjob_title: "ckeditor/upload/upload.php"}  );

</script>
<!--inline scripts related to this page-->
<script type="text/javascript">


			$(function() {
				$('#submit').on('click',function(){
					$("#continent_list").css( "border", "" );
					$("#country_list").css( "border", "" );
										
					/*$("#description").closest('.controls').css( "border", "" );
					$("#salient_features").closest('.controls').css( "border", "" );
					$("#applications").closest('.controls').css( "border", "" );
					$("#advantages").closest('.controls').closest('.controls').css( "border", "" );
					$("#specifications").closest('.controls').css( "border", "" );
					$("#brouchure").closest('.controls').css( "border", "" );*/
					$("#id-input-file-2").closest('.ace-file-input').css( "border", "" );
					var flog=0;
					if($('#continent_list').val()==''){
						$("#continent_list").css( "border", "1px solid red" );
						flog=1;
					}
					if($('#country_list').val()==''){
						$("#country_list").css( "border", "1px solid red" );
						flog=1;
					}
					
					if($("#id-input-file-2").val()==''){
						$("#id-input-file-2").closest('.ace-file-input').css( "border", "1px solid red" );
						flog=1;
					 }
					
					
					
					if(flog==1){
						return false;	
					}else{
				
						$('#place_form').submit();
					}
				});
				
				$('#id-input-file-2').ace_file_input({
					no_file:'No image ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				
				function myconfirm() {
			   	resut= confirm("Are you sure delete submenu !!! ");
				   if(!resut){
					   return false;
				   }
				}
				
					

});
</script>
</body><!-- Mirrored from easy-themes.tk/themes/preview/ace/gallery.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:58 GMT -->
</html>
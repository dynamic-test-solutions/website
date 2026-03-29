<?php include "../common/database.class.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Dynamic Test</title>
<!--basic styles-->

<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/font-awesome.min.css" />

<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

<!--page specific plugin styles-->

<!--fonts-->

<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

<!--ace styles-->

<link rel="stylesheet" href="assets/css/ace.min.css" />
<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />

<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

<!--inline styles if any-->
</head>
	
		<body class="login-layout">
		<div class="container-fluid" id="main-container">
			<div id="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-leaf green"></i>
										<span class="red">Admin Panel</span>
										
									</h1>
									<h4 class="blue">&copy; Dynamic Test</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Please Enter Your Information
												</h4>

												<div class="space-6"></div>

												<form id="login_form" action="loginverify.php" method="post">
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" class="span12" placeholder="Username" name="user_name" id="user_name"/>
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" class="span12" placeholder="Password" name="password" id="password"/>
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="row-fluid">
															<label class="span8">
																
															</label>

															<button  class="span4 btn btn-small btn-primary" id="Submit" Name="submit">
																<i class="icon-key"></i>
																Login
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											
										</div><!--/widget-body-->
									</div><!--/login-box-->

								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/span-->
				</div><!--/row-->
			</div>
		</div><!--/.fluid-container-->

		<!--basic scripts-->

		<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.min.js'>"+"<"+"/script>");
		</script>

		<!--page specific plugin scripts-->

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
			$('#Submit').click(function(){
				if($("#user_name").val()=='' || $("#password").val()==''){
					if($("#user_name").val()=='')
					$("#user_name").closest('label').css( "background-color", "red" );
					 if($("#password").val()=='')
					$("#password").closest('label').css( "background-color", "red" );

						return false;
				}else{
					$("#user_name").closest('label').css( "background-color", "" );
					$("#password").closest('label').css( "background-color", "" );
					$('#login_form').submit();
				}
			});
			<?php if($_GET['act']=='n'){?>
				$("#user_name").closest('label').css( "background-color", "red" );			 
				$("#password").closest('label').css( "background-color", "red" );
			<?php } ?>
		</script>
	</body>

<!-- Mirrored from easy-themes.tk/themes/preview/ace/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 05 Jul 2013 12:56:58 GMT -->
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.ico"/>
	<link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/front.js"></script>
	 <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
	<script data-ad-client="ca-pub-9621985279299351" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		var admin_loc='<?php echo base_url().'admin_ajax/'; ?>';
		var base_loc='<?php echo base_url().'admin/'; ?>';
    </script>
    <style>
        .login100-form-title{
            font-size:18px;
        }
        .fnt_70{
            font-size:50px;
        }
        /* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{

background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: #2d44a2 !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: rgba(13, 10, 95, 0.72);
color: #fff;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: #FFF;
background-color: rgba(13, 10, 95, 0.72);
width: 100px;
}
.btn-primary{
color: #FFF;
background-color: rgba(13, 10, 95, 0.72);

}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
.errors {
    /* display: none; */
    color: #d82b2b !important;
}
    </style>
</head>
<body>
	<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
	
			<div class="card-header">
			<!-- <div class="" style="float:left">
					<a href="<?php echo base_url(); ?>" class="btn btn-sm btn-primary" >HOME</a>
				</div> -->
			
				<h3 style="padding-top: 27px;text-align: center;">Sign In </h3>
				<div class="d-flex justify-content-end social_icon">
					<!-- <span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span> -->
				</div>
			</div>
			<div class="card-body">
				<form id="login">
				    <div class="errors alert alert-danger text-center"></div> 
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Enter Your user id" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Enter your password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn login_cl">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="<?php echo base_url(); ?>registration" class="btn btn-sm btn-primary">Sign Up</a>
				</div>
				<!--<div class="d-flex justify-content-center">
					<a href="javascript:void(0);">Forgot your password?</a>
				</div>-->
				
			</div>
		</div>
	</div>
</div>
	<!--<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" id="login">
					<span class="login100-form-title">
						Sign In With <div class="" style="font-size:30px;"><?php echo get_option('footer_name'); ?></div>
					</span>
                    <div class="login100-form validate-form flex-sb flex-w errors alert alert-danger text-center"></div>    
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							User Id
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Userid is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
                    </div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn login_cl">
							Sign In
						</button>
					</div>
                     <div class="container-login100-form-btn text-center m-t-17" style="display:block;">
					    <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> HOME</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	-->

	<!-- Data table JavaScript -->
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	


</body>
</html>




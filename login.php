<?php
session_start();
require_once 'src/mod/login/class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);
	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>

<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0-beta.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>OLS monitoring system</title>
    <!-- Icons-->
	<link rel="icon" href="src/img/brand/favicon.ico" type="image/x-icon"/>
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="src/css/style.css" rel="stylesheet">
    <link href="src/vendors/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
		<?php 
		if(isset($_GET['inactive']))
		{
			?>
			<div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
				<strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
			</div>
			<?php
		}
		?>
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
					<form class="form-signin" method="post">
						<?php
						if(isset($_GET['error']))
						{
							?>
							<div class='alert alert-success'>
								<button class='close' data-dismiss='alert'>&times;</button>
								<strong>Wrong Details!</strong> 
							</div>
							<?php
						}
						?>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
							<span class="input-group-text">
							  <i class="icon-user"></i>
							</span>
						  </div>
						  <input type="text" class="form-control" placeholder="Username" name="txtemail">
						</div>
						<div class="input-group mb-4">
						  <div class="input-group-prepend">
							<span class="input-group-text">
							  <i class="icon-lock"></i>
							</span>
						  </div>
						  <input type="password" class="form-control" placeholder="Password" name="txtupass">
						</div>
						<div class="row">
						  <div class="col-6">
							<button class="btn btn-primary px-4" type="submit" name="btn-login">Login</button>
						  </div>
						  <div class="col-6 text-right">
							<button type="button" class="btn btn-link px-0">Forgot password?</button>
						  </div>
						</div>
					</form>
              </div>
            </div>
           <!-- <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
  </body>
</html>
<script>
//document.getElementById('user').focus();
</script>
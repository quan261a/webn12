<?php
	session_start();
	if (isset($_SESSION['UserName']) and $_SESSION['LoaiUser'] == 1) {
		header('Location: ../Admin/index.php');
		exit();
	}
	if (isset($_SESSION['UserName']) and $_SESSION['LoaiUser'] == 0) {
		header('Location: ../User/index.php');
		exit();
	}
	$us ='';
	$msg = '';
	$ps ='';
	if(isset($_POST['btnlogin'])){
    require_once("../../Controller/AccessController.php");
		$us = $_POST['username'];

		$ps = $_POST['pass'];
    $user = (new AccessController())->login($us);
    
		if (!$user->UserName) {
			$msg = 'Tài khoản hoặc mật khẩu không chính xác';
			$user->UserName = $us;
		}
		else {
			if(password_verify($ps,  $user->Password))
			{
				if( $user->LoaiUser === 1) {
					$_SESSION['UserName'] = $user->UserName;
					$_SESSION['LoaiUser'] = $user->LoaiUser;
         
          header('Location: ../Admin/index.php');
					die();
				}
				else {
					$_SESSION['UserName'] = $user->UserName;
					$_SESSION['LoaiUser'] = $user->LoaiUser;
					header("Location:../User/index.php");
					die();
				}
			} 
      else {
				$msg = 'Mật khẩu không chính xác';
			}
			
		}
	}
?>


<?php
	if(isset($_POST['btnSignUp'])){ 
		header("Location:register.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="../../Style/Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../Style/Admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../Style/Admin/assets/css/style.css">
    <link rel="shortcut icon" href="../../Style/Admin/assets/images/favicon.ico" />
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../Style/Admin/assets/images/logo.svg">
                 
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <div style="color:red"><?php echo $msg?> </div>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button  class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html"  name="btnlogin">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <!-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                  </div> -->
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="../Access/register.php" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../Style/Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../Style/Admin/assets/js/off-canvas.js"></script>
    <script src="../../Style/Admin/assets/js/hoverable-collapse.js"></script>
    <script src="../../Style/Admin/assets/js/misc.js"></script>
  </body>
</html>
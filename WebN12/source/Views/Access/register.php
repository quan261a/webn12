<?php
	session_start();
	require_once("../../Data/db.php");
  require_once("../../Models/Account.php");
  require_once("../../Models/Customer.php");
	$us ='';
	$error = '';
	$msg = '';
	$name = $email = $pass = $rpass = "";
	if(isset($_POST['btnSignUp'])){
   
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		if(isset($_POST['pass'])) {
			$pass = $_POST['pass'];
		}
		if(isset($_POST['rpass'])) {
			$rpass = $_POST['rpass'];
		}
    $pwd_hashed = password_hash($pass, PASSWORD_DEFAULT);
		require_once("../../Controller/AccessController.php");
		$user = (new AccessController())->checkUsername($name);
    $userEmail =(new AccessController())->checkEmail($email);
		if ($user->UserName == $name) {
			$error = 'Tên tài khoản đã được dùng';
		} 
    else if ($userEmail->Email == $email) {
      $error = 'Email đã được sử dụng';
    }
		else if (strlen($pass) < 6) {
			$error = 'Password must have at least 6 characters';
		} else if ($pass != $rpass) {
			$error = 'Nhập lại mật khẩu không chính xác';
		}
		else {
			if(filter_has_var(INPUT_POST,'btncheck')) {
				$role = 0; /// role users
				$sql = "INSERT INTO `account` (`username`, `password`, `loaiuser`) VALUES ('$name','$pwd_hashed','$role')";
				$result = mysqli_query($conn,$sql);
        if($result) {
          $msg = 'Tạo tài khoản thành công';

          $sql = "INSERT INTO `customer` (`UserName`, `Email`) VALUES ('$name', '$email')";
          $result = mysqli_query($conn,$sql);
        } else {
          $msg = 'Tạo tài không khoản thành công';
        } 
		   	}
			else {
				$error = 'Bạn phải đồng ý với các điều khoản';
			}
		}	
	}
	
?>
<?php
	if(isset($_POST['btnSignIn'])){ 
		header("Location:login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>

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
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <p class="error">
                  <div style="color:green"><?php echo $msg?> </div>
                </p>
                <div style="color:red"><?php echo $error?> </div>
                <form class="pt-3" method = "post" action="#">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="name">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="pass">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="rpass">
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" name="btncheck" class="form-check-input"> I agree to all Terms & Conditions </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" name="btnSignUp" href="#">SIGN UP</button>
                  </div>
                  <!-- href="../Access/login.php" -->
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a  name="btnSignIn" href="../Access/login.php" class="text-primary">Login</a>
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
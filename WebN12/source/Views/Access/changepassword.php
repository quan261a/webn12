<?php
	session_start();
    require_once("../../Data/db.php");
	// if (isset($_SESSION['UserName']) and $_SESSION['LoaiUser'] == 1) {
	// 	header('Location: ../admin/index-admin.php');
	// 	exit();
	// }
	// if (isset($_SESSION['UserName']) and $_SESSION['LoaiUser'] == 0) {
	// 	header('Location: ../User/index.php');
	// 	exit();
	// }
    $msg = '';
	$ps ='';
	if(isset($_POST['btnSave'])){
   
		$ps = $_POST['pass'];
        $pwd_hashed = password_hash($ps, PASSWORD_DEFAULT);
        $stm = $conn->prepare("Update account Set Password=? where username= ?");
        $stm->bind_param("ss",$pwd_hashed, $_SESSION['UserName']);
        if ($stm->execute()) {
            $msg = "Thay đổi mật khẩu thành công";
            // echo "Record updated successfully";
            // header("Location:../../Views/Access/logout.php");
            session_unset();
            session_destroy();
            header("Location:../User/index.php");
        } else {
            echo "Error updating record: " . $stm->error;
        }
        $stm->close();
	}
?>

<!DOCTYPE html>
<html>
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
                    <div class="col-md-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="../../Style/Admin/assets/images/logo.svg">
                            </div>
                            <h6 class="font-weight-light">Change password is easy. It only takes a few steps</h6>
                            <div><?php echo $msg; ?></div>
                            <form asp-action="ChangePassword" method="post">
                                <div asp-validation-summary="ModelOnly" class="text-danger"></div>
                                <input type="hidden" asp-for="UserName" />
                                <div class="form-group">
                                    <label asp-for="Password" class="control-label">Mật khẩu mới</label>
                                    <input asp-for="Password" type="password" class="form-control" name="pass"/>
                                    <span asp-validation-for="Password" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"  value="Save" class="btn btn-primary" name="btnSave" />
                                </div>
                            </form>
                            
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="../../Views/Access/login.php" class="text-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a asp-action="Index">Back to List</a>
    </div>
    <script src="../../Style/Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../Style/Admin/assets/js/off-canvas.js"></script>
    <script src="../../Style/Admin/assets/js/hoverable-collapse.js"></script>
    <script src="../../Style/Admin/assets/js/misc.js"></script>
</body>
</html>

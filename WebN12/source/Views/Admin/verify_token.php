<?php
require_once("../../Controller/UserController.php");


if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $userController = new UserController();
    $username = $userController->verifyToken($token);

    if ($username) {
        if (isset($_POST['btnSave'])) {
            $newPassword = $_POST['new_password'];
            if ($userController->resetPassword($username, $newPassword)) {
                echo "Mật khẩu đã được thay đổi. Bạn có thể đăng nhập bằng mật khẩu mới.";
            } else {
                echo "Đã có lỗi xảy ra. Vui lòng thử lại.";
            }
        }
    } else {
        echo "Liên kết không hợp lệ hoặc đã hết hạn.";
    }
} else {
    echo "Không tìm thấy token.";
}
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Đặt lại mật khẩu
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tạo mật khẩu mới</h4>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="new_password">Mật khẩu mới:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                        </div>
                        <button type="submit" name="btnSave" class="btn btn-primary">Lưu mật khẩu mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

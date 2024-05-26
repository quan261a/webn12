<?php
require_once("../../Data/db.php");
require_once("../../Controller/UserController.php");
require '../../lib/PHPMailer/src/PHPMailer.php';
require '../../lib/PHPMailer/src/SMTP.php';
require '../../lib/PHPMailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['btnSave'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = explode('@', $email)[0]; // Sử dụng phần trước @ làm username
    $password = bin2hex(random_bytes(4)); // Tạo mật khẩu ngẫu nhiên

    $userController = new UserController();

    // Kiểm tra xem tên người dùng đã tồn tại chưa
        if ($userController->createSalespersonAccount($name, $email, $username, $password, $conn)) {
            // Tạo token
            $token = bin2hex(random_bytes(16));
            $expiry = time() + 60; // Token có hiệu lực trong 1 phút
            $userController->storeToken($username, $token, $expiry, $conn);

            // Gửi email bằng PHPMailer
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'trananhquan2610a@gmail.com'; // Email của bạn
                $mail->Password = 'kbos sxtm puen riwk'; // Mật khẩu email của bạn
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('trananhquan2610a@gmail.com', 'Mailer');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Tài khoản của bạn đã được tạo';
                $mail->Body = "Tài khoản của bạn đã được tạo. Vui lòng nhấp vào liên kết sau để đăng nhập: ";
                $mail->Body .= "http://localhost/webn12/WebN12/source/Access/changepassword.php?token=$token";

                $mail->send();
                echo 'Tài khoản đã được tạo và email đã được gửi.';
            } catch (Exception $e) {
                echo "Đã có lỗi xảy ra khi gửi email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Đã có lỗi xảy ra khi tạo tài khoản.";
        }
    $conn->close(); // Đóng kết nối sau khi hoàn thành
}
?>

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Tạo tài khoản nhân viên bán hàng
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin tài khoản</h4>
                    <form method="post" action="create_account.php">
                        <div class="form-group">
                            <label for="name">Tên nhân viên:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Gmail:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" name="btnSave" class="btn btn-primary">Tạo tài khoản</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

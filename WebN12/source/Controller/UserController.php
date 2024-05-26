<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
require_once("../../Models/LoaiSanPham.php");
class UserController {
    
    public function loadProduct()
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT MaLoaiSp, LoaiSp FROM loaisanphams");
        $stm->execute();
        $stm->bind_result($MaLoaiSp, $LoaiSp); 
        $products = [];
        while ($stm->fetch()) {
            $us = new LoaiSanPhamInfor();
            $us->MaLoaiSp = $MaLoaiSp;
            $us->LoaiSp = $LoaiSp;
            $products[] = $us;
        }
        $stm->close();
        return $products; 
    }

    public function getIdCustomer($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT * FROM customer where username=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new CustomerInfor();
        $stm->bind_result($us->MaKhachHang, $us->TenKhachHang, $us->NgaySinh, $us->SDT, $us->DiaChi, $us->LoaiKhachHang, $us->AnhDaiDien,$us->GhiChu, $us->UserName, $us->Email);
        $stm->fetch();
        return $us; 
    }

    public function getMKKHCustomer($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT * FROM customer where MaKhachHang=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new CustomerInfor();
        $stm->bind_result($us->MaKhachHang, $us->TenKhachHang, $us->NgaySinh, $us->SDT, $us->DiaChi, $us->LoaiKhachHang, $us->AnhDaiDien,$us->GhiChu, $us->UserName, $us->Email);
        $stm->fetch();
        return $us; 
    }

    public function login($us)
    {
        global $conn;
        // $hash_pass = password_hash($ps, PASSWORD_DEFAULT);
        $stm = $conn->prepare("select * from account where username= ? ");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new AccountInfor();
        $stm->bind_result($us->UserName, $us->Password, $us->LoaiUser);
        $stm->fetch();
        return $us; 
    }
    public function loadNumberAccount()
    {
        global $conn;

        // Prepare the SQL statement to count the number of products
        if ($stm = $conn->prepare("SELECT COUNT(*) FROM account")) {
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variable
                $stm->bind_result($productCount);
                
                // Fetch the result
                if ($stm->fetch()) {
                    $stm->close();
                    return $productCount;
                } else {
                    // Handle fetch error
                    $stm->close();
                    die('Fetch error: ' . htmlspecialchars($stm->error));
                }
            } else {
                // Handle execution error
                die('Execute error: ' . htmlspecialchars($stm->error));
            }
        } else {
            // Handle preparation error
            die('Prepare error: ' . htmlspecialchars($conn->error));
        }
        
        return null;  // Return null if no result
    }

    public function loadInfoAccount()
    {
        global $conn;
        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            UserName, Password, LoaiUser  FROM account")) {
            
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($UserName, $Password, $LoaiUser);
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new AccountInfor();
                    $us->UserName = $UserName;
                    $us->Password = $Password;
                    $us->LoaiUser = $LoaiUser; 
                    $products[] = $us;
                }
                
                $stm->close();
                
                return $products; 
            } else {
                // Handle execution error
                die('Execute error: ' . htmlspecialchars($stm->error));
            }
        } else {
            // Handle preparation error
            die('Prepare error: ' . htmlspecialchars($conn->error));
        }
    }

    public function createSalespersonAccount($name, $email, $username, $password, &$conn) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO nhanvien (TenNhanVien, Email, UserName, MatKhau, ChucVu) VALUES (?, ?, ?, ?, 'salesperson')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);
    
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    

    public function storeToken($username, $token, $expiry, $conn) {
        $sql = "UPDATE nhanvien SET Token = ?, TokenExpiry = ? WHERE UserName = ?";
        $stmt = $conn->prepare($sql);
        $expiryDate = date('Y-m-d H:i:s', $expiry);
        $stmt->bind_param("sss", $token, $expiryDate, $username);
    
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    

    public function verifyToken($token) {
        global $conn;
        $sql = "SELECT UserName, TokenExpiry FROM nhanvien WHERE Token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->bind_result($username, $expiry);
        $stmt->fetch();

        if ($username && time() < strtotime($expiry)) {
            $stmt->close();
            // Xóa token sau khi sử dụng
            $sql = "UPDATE nhanvien SET Token = NULL, TokenExpiry = NULL WHERE UserName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            return $username;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }

    public function resetPassword($username, $password) {
        global $conn;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE nhanvien SET MatKhau = ? WHERE UserName = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $username);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            $stmt->close();
            $conn->close();
            return false;
        }
    }
}
?>

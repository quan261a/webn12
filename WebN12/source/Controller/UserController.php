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

   

}
?>

<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
class AccessController {
    
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
    public function checkEmail($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from customer where email= ?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new CustomerInfor();
        $stm->bind_result($us->MaKhachHang, $us->TenKhachHang, $us->NgaySinh,$us->SDT, $us->DiaChi, $us->LoaiKhachHang,$us->AnhDaiDien, $us->GhiChu, $us->UserName, $us->Email);
        $stm->fetch();
        return $us; 
    }


    public function checkUsername($us)
    {
        global $conn;
        $stm = $conn->prepare("select * from account where username= ?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new AccountInfor();
        $stm->bind_result($us->UserName, $us->Password, $us->LoaiUser);
        $stm->fetch();
        return $us; 
    }

    public function changePass($pass, $us)
    {
        global $conn;
        $stm = $conn->prepare("Update accounts Set Password=? from users where username= ?");
        $stm->bind_param("ss",$pass, $us);
        return$stmt->execute(); 
    }
   
}
?>

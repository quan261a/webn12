<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");

class AccessController {
    
    public function login($us)
    {
        global $conn;
        $stm = $conn->prepare("SELECT * FROM account WHERE username = ?");
        $stm->bind_param("s", $us);
        $stm->execute();
        $us = new AccountInfor();
        $stm->bind_result($us->UserName, $us->Password, $us->LoaiUser);
        $stm->fetch();
        $stm->close();
        return $us; 
    }

    public function checkEmail($email)
    {
        global $conn;
        $stm = $conn->prepare("SELECT * FROM customer WHERE email = ?");
        $stm->bind_param("s", $email);
        $stm->execute();
        $customer = new CustomerInfor();
        $stm->bind_result($customer->MaKhachHang, $customer->TenKhachHang, $customer->NgaySinh, $customer->SDT, $customer->DiaChi, $customer->LoaiKhachHang, $customer->AnhDaiDien, $customer->GhiChu, $customer->UserName, $customer->Email);
        $stm->fetch();
        $stm->close();
        return $customer; 
    }

    public function checkUsername($us)
    {
        global $conn;
        $stm = $conn->prepare("SELECT * FROM account WHERE username = ?");
        $stm->bind_param("s", $us);
        $stm->execute();
        $account = new AccountInfor();
        $stm->bind_result($account->UserName, $account->Password, $account->LoaiUser);
        $stm->fetch();
        $stm->close();
        return $account; 
    }

    public function changePass($pass, $us)
    {
        global $conn;
        $stm = $conn->prepare("UPDATE account SET Password = ? WHERE username = ?");
        $stm->bind_param("ss", $pass, $us);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }
}
?>

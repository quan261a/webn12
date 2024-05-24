<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
require_once("../../Models/LoaiSanPham.php");
require_once("../../Models/ChiTietSanPham.php");
class ProductDetailController {

    public function getIdProductDetail($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT * FROM chitietsanphams where MaSP=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new ChiTietSanPhamInfor();
        $stm->bind_result($us->MaChiTietSanPham ,$us->AnhDaiDien, $us->Video, $us->GiaBan, $us->GiamGia, $us->soLuongTon, $us->MaMauSac, $us->MaKichThuoc,$us->MaSP);
        $stm->fetch();
        return $us; 
    }

    public function getMaSP($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT * FROM chitietsanphams where MaChiTietSanPham=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new ChiTietSanPhamInfor();
        $stm->bind_result($us->MaChiTietSanPham ,$us->AnhDaiDien, $us->Video, $us->GiaBan, $us->GiamGia, $us->soLuongTon, $us->MaMauSac, $us->MaKichThuoc,$us->MaSP);
        $stm->fetch();
        return $us; 
    }
   
}
?>
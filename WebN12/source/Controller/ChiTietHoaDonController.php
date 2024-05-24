<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
require_once("../../Models/LoaiSanPham.php");
require_once("../../Models/DanhMucSanPham.php");
require_once("../../Models/AnhSanPham.php");
require_once("../../Models/ThongTinChiTietSp.php");
require_once("../../Models/HoaDon.php");
require_once("../../Models/ChiTietHoaDon.php");
class ChiTietHoaDonController {
    
    public function createOrderDetails($us)
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

    public function listOrder($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT MaHoaDon, MaChiTietSanPham, SoLuongBan, GiaBan, GiamGia, GhiChu FROM chitiethoadons where MaHoaDon=?");
        $stm->bind_param("s", $us);
        $stm->execute();
        $stm->bind_result($MaHoaDon, $MaChiTietSanPham, $SoLuongBan, $GiaBan,$GiamGia, $GhiChu); 
        $products = [];
        while ($stm->fetch()) {
            $us = new ChiTietHoaDonInfor();
            $us->MaHoaDon = $MaHoaDon;
            $us->MaChiTietSanPham = $MaChiTietSanPham;
            $us->SoLuongBan = $SoLuongBan;
            $us->GiaBan = $GiaBan;
            $us->GiamGia = $GiamGia;
            $us->GhiChu = $GhiChu;
            $products[] = $us;
        }
        $stm->close();
        return $products; 
    }
}
?>
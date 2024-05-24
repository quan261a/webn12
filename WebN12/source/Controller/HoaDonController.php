<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
require_once("../../Models/LoaiSanPham.php");
require_once("../../Models/DanhMucSanPham.php");
require_once("../../Models/AnhSanPham.php");
require_once("../../Models/ThongTinChiTietSp.php");
require_once("../../Models/HoaDon.php");
class HoaDonController {
    
    public function createOrder($us)
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
    public function getIdOrder($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT MAX(MaHoaDon) FROM hoadons");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new ChiTietSanPhamInfor();
        $stm->bind_result($us->MaChiTietSanPham ,$us->AnhDaiDien, $us->Video, $us->GiaBan, $us->GiamGia, $us->soLuongTon, $us->MaMauSac, $us->MaKichThuoc,$us->MaSP);
        $stm->fetch();
        return $us; 
    }

    public function getOderByIdUser($us)
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaHoaDon, 
            NgayTaoHoaDon,
            TongTien, 
            GiamGia,
            PhuongThucThanhToan, 
            TinhTrang, 
            ThongTinThue, 
            GhiChu, 
            MaKhachHang,
            MaNhanVien
            FROM hoadons WHERE MaKhachHang = ? ORDER BY MaHoaDon DESC" )) {
            
            // Bind the parameter
            $stm->bind_param("s", $us);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaHoaDon, $NgayTaoHoaDon, $TongTien, $GiamGia, $PhuongThucThanhToan, $TinhTrang, $ThongTinThue, $GhiChu, $MaKhachHang, $MaNhanVien);
                
                $orders = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $order = new HoaDonInfor();
                    $order->MaHoaDon = $MaHoaDon;
                    $order->NgayTaoHoaDon = $NgayTaoHoaDon;
                    $order->TongTien = $TongTien;
                    $order->GiamGia = $GiamGia;
                    $order->PhuongThucThanhToan = $PhuongThucThanhToan;
                    $order->TinhTrang = $TinhTrang;
                    $order->ThongTinThue = $ThongTinThue;
                    $order->GhiChu = $GhiChu;
                    $order->MaKhachHang = $MaKhachHang;
                    $order->MaNhanVien = $MaNhanVien;
                    $orders[] = $order;
                }
                
                $stm->close();
                
                return $orders; 
            } else {
                // Handle execution error
                die('Execute error: ' . htmlspecialchars($stm->error));
            }
        } else {
            // Handle preparation error
            die('Prepare error: ' . htmlspecialchars($conn->error));
        }
    }

    public function loadNumberOrder()
    {
        global $conn;

        // Prepare the SQL statement to count the number of products
        if ($stm = $conn->prepare("SELECT COUNT(*) FROM hoadons")) {
            
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

    public function getBillInfo()
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaHoaDon, 
            NgayTaoHoaDon,
            TongTien, 
            GiamGia,
            PhuongThucThanhToan, 
            TinhTrang, 
            ThongTinThue, 
            GhiChu, 
            MaKhachHang,
            MaNhanVien
            FROM hoadons ORDER BY MaHoaDon DESC" )) {
            
            // Bind the parameter
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaHoaDon, $NgayTaoHoaDon, $TongTien, $GiamGia, $PhuongThucThanhToan, $TinhTrang, $ThongTinThue, $GhiChu, $MaKhachHang, $MaNhanVien);
                
                $orders = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $order = new HoaDonInfor();
                    $order->MaHoaDon = $MaHoaDon;
                    $order->NgayTaoHoaDon = $NgayTaoHoaDon;
                    $order->TongTien = $TongTien;
                    $order->GiamGia = $GiamGia;
                    $order->PhuongThucThanhToan = $PhuongThucThanhToan;
                    $order->TinhTrang = $TinhTrang;
                    $order->ThongTinThue = $ThongTinThue;
                    $order->GhiChu = $GhiChu;
                    $order->MaKhachHang = $MaKhachHang;
                    $order->MaNhanVien = $MaNhanVien;
                    $orders[] = $order;
                }
                
                $stm->close();
                
                return $orders; 
            } else {
                // Handle execution error
                die('Execute error: ' . htmlspecialchars($stm->error));
            }
        } else {
            // Handle preparation error
            die('Prepare error: ' . htmlspecialchars($conn->error));
        }
    }

    public function getBillInfoById($us)
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaHoaDon, 
            NgayTaoHoaDon,
            TongTien, 
            GiamGia,
            PhuongThucThanhToan, 
            TinhTrang, 
            ThongTinThue, 
            GhiChu, 
            MaKhachHang,
            MaNhanVien
            FROM hoadons where MaHoaDon= ?" )) {
            $stm->bind_param("s", $us);
            // Bind the parameter
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaHoaDon, $NgayTaoHoaDon, $TongTien, $GiamGia, $PhuongThucThanhToan, $TinhTrang, $ThongTinThue, $GhiChu, $MaKhachHang, $MaNhanVien);
                
                $orders = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $order = new HoaDonInfor();
                    $order->MaHoaDon = $MaHoaDon;
                    $order->NgayTaoHoaDon = $NgayTaoHoaDon;
                    $order->TongTien = $TongTien;
                    $order->GiamGia = $GiamGia;
                    $order->PhuongThucThanhToan = $PhuongThucThanhToan;
                    $order->TinhTrang = $TinhTrang;
                    $order->ThongTinThue = $ThongTinThue;
                    $order->GhiChu = $GhiChu;
                    $order->MaKhachHang = $MaKhachHang;
                    $order->MaNhanVien = $MaNhanVien;
                    $orders[] = $order;
                }
                
                $stm->close();
                
                return $orders; 
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
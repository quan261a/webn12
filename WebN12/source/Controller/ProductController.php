<?php
require_once("../../Data/db.php");
require_once("../../Models/Account.php");
require_once("../../Models/Customer.php");
require_once("../../Models/LoaiSanPham.php");
require_once("../../Models/DanhMucSanPham.php");
require_once("../../Models/AnhSanPham.php");
require_once("../../Models/ThongTinChiTietSp.php");
class ProductController {
    
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
   

    public function loadNumberProduct()
    {
        global $conn;

        // Prepare the SQL statement to count the number of products
        if ($stm = $conn->prepare("SELECT COUNT(MaSP) FROM danhmucsanphams")) {
            
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

    
    

    public function loadProductById($us)
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaSP, 
            TenSP,
            Model, 
            CanNang,
            MaDacTinh, 
            TenSpShort, 
            NgayDang, 
            NgayChinhSua, 
            ThoiGianBaoHanh,
            GioiThieuSanPham, 
            ChieuKhau, 
            AnhDaiDien, 
            GiaLonNhat, 
            GiaNhoNhat, 
            MaChatLieu, 
            MaLoaiSp, 
            MaDT, 
            MaHangSX 
            FROM danhmucsanphams WHERE MaLoaiSp=?")) {
            
            // Bind the parameter
            $stm->bind_param("s", $us);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new DanhMucSanPhamInfor();
                    $us->MaSP = $MaSP;
                    $us->TenSP = $TenSP;
                    $us->Model = $Model;
                    $us->CanNang = $CanNang;
                    $us->MaDacTinh = $MaDacTinh;
                    $us->TenSpShort = $TenSpShort;
                    $us->NgayDang = $NgayDang;
                    $us->NgayChinhSua = $NgayChinhSua;
                    $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                    $us->GioiThieuSanPham = $GioiThieuSanPham;
                    $us->ChieuKhau = $ChieuKhau;
                    $us->AnhDaiDien = $AnhDaiDien;
                    $us->GiaLonNhat = $GiaLonNhat;
                    $us->GiaNhoNhat = $GiaNhoNhat;
                    $us->MaChatLieu = $MaChatLieu;
                    $us->MaLoaiSp = $MaLoaiSp;
                    $us->MaDT = $MaDT;
                    $us->MaHangSX = $MaHangSX;
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

    public function loadProductByCategory($us)
    {
        global $conn;
        $condition;
        if($us != "all" ) {
            if($us == "Laptop") {      
                $condition = 11;
            }
            if($us =="Dienthoai") {
                $condition =10;
            }
            if($us == "Banphim") {
                $condition = 15;
            } 
            if($us == "Chuot") {
                $condition =13;
               
            } 
            if ($stm = $conn->prepare("SELECT 
                MaSP, 
                TenSP,
                Model, 
                CanNang,
                MaDacTinh, 
                TenSpShort, 
                NgayDang, 
                NgayChinhSua, 
                ThoiGianBaoHanh,
                GioiThieuSanPham, 
                ChieuKhau, 
                AnhDaiDien, 
                GiaLonNhat, 
                GiaNhoNhat, 
                MaChatLieu, 
                MaLoaiSp, 
                MaDT, 
                MaHangSX 
                FROM danhmucsanphams WHERE MaLoaiSp=?")) {
                
                // Bind the parameter
                $stm->bind_param("s", $condition);
                
                // Execute the statement
                if ($stm->execute()) {
                    // Bind the result variables
                    $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                    
                    $products = [];
                    
                    // Fetch the results
                    while ($stm->fetch()) {
                        $us = new DanhMucSanPhamInfor();
                        $us->MaSP = $MaSP;
                        $us->TenSP = $TenSP;
                        $us->Model = $Model;
                        $us->CanNang = $CanNang;
                        $us->MaDacTinh = $MaDacTinh;
                        $us->TenSpShort = $TenSpShort;
                        $us->NgayDang = $NgayDang;
                        $us->NgayChinhSua = $NgayChinhSua;
                        $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                        $us->GioiThieuSanPham = $GioiThieuSanPham;
                        $us->ChieuKhau = $ChieuKhau;
                        $us->AnhDaiDien = $AnhDaiDien;
                        $us->GiaLonNhat = $GiaLonNhat;
                        $us->GiaNhoNhat = $GiaNhoNhat;
                        $us->MaChatLieu = $MaChatLieu;
                        $us->MaLoaiSp = $MaLoaiSp;
                        $us->MaDT = $MaDT;
                        $us->MaHangSX = $MaHangSX;
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
        } else {
            if ($stm = $conn->prepare("SELECT 
                MaSP, 
                TenSP,
                Model, 
                CanNang,
                MaDacTinh, 
                TenSpShort, 
                NgayDang, 
                NgayChinhSua, 
                ThoiGianBaoHanh,
                GioiThieuSanPham, 
                ChieuKhau, 
                AnhDaiDien, 
                GiaLonNhat, 
                GiaNhoNhat, 
                MaChatLieu, 
                MaLoaiSp, 
                MaDT, 
                MaHangSX 
                FROM danhmucsanphams")) {
                
                // Execute the statement
                if ($stm->execute()) {
                    // Bind the result variables
                    $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                    
                    $products = [];
                    
                    // Fetch the results
                    while ($stm->fetch()) {
                        $us = new DanhMucSanPhamInfor();
                        $us->MaSP = $MaSP;
                        $us->TenSP = $TenSP;
                        $us->Model = $Model;
                        $us->CanNang = $CanNang;
                        $us->MaDacTinh = $MaDacTinh;
                        $us->TenSpShort = $TenSpShort;
                        $us->NgayDang = $NgayDang;
                        $us->NgayChinhSua = $NgayChinhSua;
                        $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                        $us->GioiThieuSanPham = $GioiThieuSanPham;
                        $us->ChieuKhau = $ChieuKhau;
                        $us->AnhDaiDien = $AnhDaiDien;
                        $us->GiaLonNhat = $GiaLonNhat;
                        $us->GiaNhoNhat = $GiaNhoNhat;
                        $us->MaChatLieu = $MaChatLieu;
                        $us->MaLoaiSp = $MaLoaiSp;
                        $us->MaDT = $MaDT;
                        $us->MaHangSX = $MaHangSX;
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
    
        // Prepare the SQL statement
       
    }

    public function loadInfoProductById($us)
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaSP, 
            TenSP,
            Model, 
            CanNang,
            MaDacTinh, 
            TenSpShort, 
            NgayDang, 
            NgayChinhSua, 
            ThoiGianBaoHanh,
            GioiThieuSanPham, 
            ChieuKhau, 
            AnhDaiDien, 
            GiaLonNhat, 
            GiaNhoNhat, 
            MaChatLieu, 
            MaLoaiSp, 
            MaDT, 
            MaHangSX 
            FROM danhmucsanphams WHERE MaSP=?")) {
            
            // Bind the parameter
            $stm->bind_param("s", $us);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new DanhMucSanPhamInfor();
                    $us->MaSP = $MaSP;
                    $us->TenSP = $TenSP;
                    $us->Model = $Model;
                    $us->CanNang = $CanNang;
                    $us->MaDacTinh = $MaDacTinh;
                    $us->TenSpShort = $TenSpShort;
                    $us->NgayDang = $NgayDang;
                    $us->NgayChinhSua = $NgayChinhSua;
                    $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                    $us->GioiThieuSanPham = $GioiThieuSanPham;
                    $us->ChieuKhau = $ChieuKhau;
                    $us->AnhDaiDien = $AnhDaiDien;
                    $us->GiaLonNhat = $GiaLonNhat;
                    $us->GiaNhoNhat = $GiaNhoNhat;
                    $us->MaChatLieu = $MaChatLieu;
                    $us->MaLoaiSp = $MaLoaiSp;
                    $us->MaDT = $MaDT;
                    $us->MaHangSX = $MaHangSX;
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

    public function loadInfoImageProductById($us)
    {
        global $conn;  

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT IDFileAnh, ViTriLuu, MaSP
            FROM anhsanphams WHERE MaSP=?")) {
            
            // Bind the parameter
            $stm->bind_param("s", $us);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($IDFileAnh, $ViTriLuu, $MaSP);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new AnhSanPhamInfor();
                    $us->IDFileAnh = $IDFileAnh;
                    $us->ViTriLuu = $ViTriLuu;
                    $us->MaSP = $MaSP;
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

    public function getInfoProductById($us)
    {
        global $conn;  

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT MaThongTin, TenTT, NoiDUngTT, MaSP
            FROM thongtinchitietsps WHERE MaSP=?")) {
            
            // Bind the parameter
            $stm->bind_param("s", $us);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaThongTin, $TenTT, $NoiDUngTT, $MaSP);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new ThongTinChiTietSpInfor();
                    $us->MaThongTin = $MaThongTin;
                    $us->TenTT = $TenTT;
                    $us->NoiDUngTT = $NoiDUngTT;
                    $us->MaSP = $MaSP;
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

    public function loadInfoProductByName($us)
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaSP, 
            TenSP,
            Model, 
            CanNang,
            MaDacTinh, 
            TenSpShort, 
            NgayDang, 
            NgayChinhSua, 
            ThoiGianBaoHanh,
            GioiThieuSanPham, 
            ChieuKhau, 
            AnhDaiDien, 
            GiaLonNhat, 
            GiaNhoNhat, 
            MaChatLieu, 
            MaLoaiSp, 
            MaDT, 
            MaHangSX 
            FROM danhmucsanphams WHERE TenSpShort like ?")) {
            $searchTerm = '%' . $us . '%';
            // Bind the parameter
            $stm->bind_param("s", $searchTerm);
            
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new DanhMucSanPhamInfor();
                    $us->MaSP = $MaSP;
                    $us->TenSP = $TenSP;
                    $us->Model = $Model;
                    $us->CanNang = $CanNang;
                    $us->MaDacTinh = $MaDacTinh;
                    $us->TenSpShort = $TenSpShort;
                    $us->NgayDang = $NgayDang;
                    $us->NgayChinhSua = $NgayChinhSua;
                    $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                    $us->GioiThieuSanPham = $GioiThieuSanPham;
                    $us->ChieuKhau = $ChieuKhau;
                    $us->AnhDaiDien = $AnhDaiDien;
                    $us->GiaLonNhat = $GiaLonNhat;
                    $us->GiaNhoNhat = $GiaNhoNhat;
                    $us->MaChatLieu = $MaChatLieu;
                    $us->MaLoaiSp = $MaLoaiSp;
                    $us->MaDT = $MaDT;
                    $us->MaHangSX = $MaHangSX;
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

    public function getNameMaSP($us)
    {
        global $conn;
        
        $stm = $conn->prepare("SELECT * FROM danhmucsanphams where MaSP=?");
        $stm->bind_param("s",$us);
        $stm->execute();
        $us = new DanhMucSanPhamInfor();
        $stm->bind_result($us->MaSP ,$us->TenSP, $us->Model, $us->CanNang, $us->MaDacTinh, $us->TenSpShort, $us->NgayDang, $us->NgayChinhSua,$us->ThoiGianBaoHanh, $us->GioiThieuSanPham,
            $us->ChieuKhau, $us->AnhDaiDien, $us->GiaLonNhat, $us->GiaNhoNhat, $us->MaChatLieu, $us->MaLoaiSp,$us->MaDT,$us->MaHangSX);
        $stm->fetch();
        return $us; 
    }

    public function loadInfoProduct()
    {
        global $conn;

        // Prepare the SQL statement
        if ($stm = $conn->prepare("SELECT 
            MaSP, 
            TenSP,
            Model, 
            CanNang,
            MaDacTinh, 
            TenSpShort, 
            NgayDang, 
            NgayChinhSua, 
            ThoiGianBaoHanh,
            GioiThieuSanPham, 
            ChieuKhau, 
            AnhDaiDien, 
            GiaLonNhat, 
            GiaNhoNhat, 
            MaChatLieu, 
            MaLoaiSp, 
            MaDT, 
            MaHangSX 
            FROM danhmucsanphams")) {
            
            // Bind the parameter
            // Execute the statement
            if ($stm->execute()) {
                // Bind the result variables
                $stm->bind_result($MaSP, $TenSP, $Model, $CanNang, $MaDacTinh, $TenSpShort, $NgayDang, $NgayChinhSua, $ThoiGianBaoHanh, $GioiThieuSanPham, $ChieuKhau, $AnhDaiDien, $GiaLonNhat, $GiaNhoNhat, $MaChatLieu, $MaLoaiSp, $MaDT, $MaHangSX);
                
                $products = [];
                
                // Fetch the results
                while ($stm->fetch()) {
                    $us = new DanhMucSanPhamInfor();
                    $us->MaSP = $MaSP;
                    $us->TenSP = $TenSP;
                    $us->Model = $Model;
                    $us->CanNang = $CanNang;
                    $us->MaDacTinh = $MaDacTinh;
                    $us->TenSpShort = $TenSpShort;
                    $us->NgayDang = $NgayDang;
                    $us->NgayChinhSua = $NgayChinhSua;
                    $us->ThoiGianBaoHanh = $ThoiGianBaoHanh;
                    $us->GioiThieuSanPham = $GioiThieuSanPham;
                    $us->ChieuKhau = $ChieuKhau;
                    $us->AnhDaiDien = $AnhDaiDien;
                    $us->GiaLonNhat = $GiaLonNhat;
                    $us->GiaNhoNhat = $GiaNhoNhat;
                    $us->MaChatLieu = $MaChatLieu;
                    $us->MaLoaiSp = $MaLoaiSp;
                    $us->MaDT = $MaDT;
                    $us->MaHangSX = $MaHangSX;
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

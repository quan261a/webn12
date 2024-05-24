-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2024 lúc 04:23 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhangdientu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `LoaiUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`UserName`, `Password`, `LoaiUser`) VALUES
('admin', '$2y$10$BgDfcb02RnUfMO1IjzGS5O.QZxzlu9HHzCwgKIOgFsdtdWMKbLzfK', 0),
('admin1', '$2y$10$BgDfcb02RnUfMO1IjzGS5O.QZxzlu9HHzCwgKIOgFsdtdWMKbLzfK', 1),
('admin2', '$2y$10$w7bfnbzJy0mNMcLkL2KVPux4EICEmlSF8Ot9wxIQl73xUy86rN/CG', 0),
('admin3', '$2y$10$sbAi2pWM99E2xZUPmALKZO3Lb1tSD2jfbgJTnDoN8RsNTQa4rp1jW', 0),
('admin5', '$2y$10$1R.nepybOCjkjOo.9YF0.uPjLPaOvgKMVN.8o1LeXzILxQM79VULW', 0),
('admin6', '$2y$10$EEMDV85cGy84dUNvxH3DquZRID8F7bNgB8ESVm3Oiqa6x6WHbW2Yq', 0),
('customer', '$2y$10$NPHxaVQs6ZnJL3Mcf/J/kOykkw6Kn5F3DLJbDEUZs0.J52iuQ84b6', 0),
('customer01', '$2y$10$ZPpx8ssiNPzHxWLCwFTGHeppohDb4JeqwEYiDugquF31KTa51UYN6', 0),
('Khoi Luong Mai ', '$2y$10$unB00ztJiLy2rMw7LSP8WO5Pmuf8ngqb3l43pxSILuR/HjtjlJcrK', 0),
('Khoi Luong Mai Thanh', '123456', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsanphams`
--

CREATE TABLE `anhsanphams` (
  `IDFileAnh` int(11) NOT NULL,
  `ViTriLuu` varchar(255) NOT NULL,
  `MaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anhsanphams`
--

INSERT INTO `anhsanphams` (`IDFileAnh`, `ViTriLuu`, `MaSP`) VALUES
(12, 'vi-vn-acer-aspire-7-gaming-a715-43g-r8ga-r5-nhqhdsv002-1.jpg', 14),
(13, 'vi-vn-acer-aspire-7-gaming-a715-76g-59mw-i5-nhqmysv001-slider-4.jpg', 14),
(15, 'vi-vn-acer-aspire-7-gaming-a715-76g-59mw-i5-nhqmysv001-slider-7.jpg', 14),
(16, 'vi-vn-acer-aspire-7-gaming-a715-76g-59mw-i5-nhqmysv001-slider-1.jpg', 14),
(17, 'vi-vn-acer-aspire-7-gaming-a715-76g-59mw-i5-nhqmysv001-slider-2.jpg', 14),
(18, 'vi-vn-acer-aspire-7-gaming-a715-76g-59mw-i5-nhqmysv001-slider-3.jpg', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatlieus`
--

CREATE TABLE `chatlieus` (
  `MaChatLieu` int(11) NOT NULL,
  `TenChatLieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chatlieus`
--

INSERT INTO `chatlieus` (`MaChatLieu`, `TenChatLieu`) VALUES
(1, 'Vỏ nhựa - nắp lưng bằng kim loại'),
(10, 'Vỏ kim loại'),
(11, 'Vỏ nhựa'),
(12, 'Khung nhôm & Mặt lưng kính cường lực');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadons`
--

CREATE TABLE `chitiethoadons` (
  `MaHoaDon` int(11) NOT NULL,
  `MaChiTietSanPham` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL,
  `GiaBan` double NOT NULL,
  `GiamGia` double NOT NULL,
  `GhiChu` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadons`
--

INSERT INTO `chitiethoadons` (`MaHoaDon`, `MaChiTietSanPham`, `SoLuongBan`, `GiaBan`, `GiamGia`, `GhiChu`) VALUES
(10, 11, 1, 16490000, 25, 'NOne'),
(11, 11, 1, 16490000, 25, 'NOne'),
(10, 11, 1, 16490000, 12, '12312'),
(10, 11, 1, 16490000, 12, '12312'),
(45, 11, 2, 16490000, 25, 'Chưa Xác Nhận'),
(45, 12, 1, 10890000, 12, 'Chưa Xác Nhận'),
(45, 14, 1, 10999000, 25, 'Chưa Xác Nhận'),
(46, 14, 1, 10999000, 25, 'Chưa Xác Nhận'),
(47, 11, 3, 16490000, 25, 'Chưa Xác Nhận'),
(48, 11, 2, 16490000, 25, 'Chưa Xác Nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanphams`
--

CREATE TABLE `chitietsanphams` (
  `MaChiTietSanPham` int(11) NOT NULL,
  `AnhDaiDien` longtext NOT NULL,
  `Video` varchar(255) NOT NULL,
  `GiaBan` double NOT NULL,
  `GiamGia` double NOT NULL,
  `soLuongTon` int(11) NOT NULL,
  `MaMauSac` int(11) NOT NULL,
  `MaKichThuoc` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanphams`
--

INSERT INTO `chitietsanphams` (`MaChiTietSanPham`, `AnhDaiDien`, `Video`, `GiaBan`, `GiamGia`, `soLuongTon`, `MaMauSac`, `MaKichThuoc`, `MaSP`) VALUES
(11, 'acer-aspire-7-gaming-a715-43g-r8ga-r5', 'laptop', 16490000, 25, 13, 10, 10, 14),
(12, 'iphone-11-trang', 'dienthoai', 10890000, 12, 10, 13, 12, 12),
(13, 'iphone-11-den', 'dienthoai', 10890000, 12, 10, 10, 12, 13),
(14, 'dell-inspiron-15-3520-i3', 'laptop', 10999000, 25, 13, 14, 13, 1),
(15, 'apple-macbook-air-m2-2022-16gb', 'laptop', 37690000, 4, 14, 13, 11, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `IdComment` int(11) NOT NULL,
  `NoiDung` longtext NOT NULL,
  `NoiDungId` int(11) NOT NULL,
  `NgayDang` date NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `MaChiTietSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `MaKhachHang` int(11) NOT NULL,
  `TenKhachHang` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(15) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `LoaiKhachHang` int(11) NOT NULL,
  `AnhDaiDien` longtext NOT NULL,
  `GhiChu` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`MaKhachHang`, `TenKhachHang`, `NgaySinh`, `SDT`, `DiaChi`, `LoaiKhachHang`, `AnhDaiDien`, `GhiChu`, `UserName`, `Email`) VALUES
(1, 'nguyen van a', '2003-03-30', '00932111', 'cu chi viet nam', 0, '', 0, 'admin', 'thanhkhoi939sss@gmail.com'),
(8, 'nguyen van a', '2003-03-30', '009321111', 'cu chi viet nam', 0, '', 0, 'customer', 'thanhkhoi939303@gmail.com'),
(9, '', '0000-00-00', '', '', 0, '', 0, 'customer01', 'thanhkhoi@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanphams`
--

CREATE TABLE `danhmucsanphams` (
  `MaSP` int(11) NOT NULL,
  `TenSP` longtext NOT NULL,
  `Model` varchar(255) NOT NULL,
  `CanNang` double NOT NULL,
  `MaDacTinh` varchar(255) NOT NULL,
  `TenSpShort` varchar(255) DEFAULT NULL,
  `NgayDang` date NOT NULL,
  `NgayChinhSua` date NOT NULL,
  `ThoiGianBaoHanh` int(11) NOT NULL,
  `GioiThieuSanPham` text NOT NULL,
  `ChieuKhau` double NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `GiaLonNhat` double NOT NULL,
  `GiaNhoNhat` double NOT NULL,
  `MaChatLieu` int(11) NOT NULL,
  `MaLoaiSp` int(11) NOT NULL,
  `MaDT` int(11) NOT NULL,
  `MaHangSX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanphams`
--

INSERT INTO `danhmucsanphams` (`MaSP`, `TenSP`, `Model`, `CanNang`, `MaDacTinh`, `TenSpShort`, `NgayDang`, `NgayChinhSua`, `ThoiGianBaoHanh`, `GioiThieuSanPham`, `ChieuKhau`, `AnhDaiDien`, `GiaLonNhat`, `GiaNhoNhat`, `MaChatLieu`, `MaLoaiSp`, `MaDT`, `MaHangSX`) VALUES
(1, 'dell-inspiron-15-3520-i3', 'Laptop', 1.9, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT\', N\'Acer-Aspire-7-Gaming\'', 'dell inspiron 15 ', '2024-05-01', '2024-05-08', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.\r\nBộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.\r\nỔ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.\r\nMàn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.\r\nMáy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 0, 'dell-inspiron-15-3520-i3-i3u082w11blu-thumb-600x600.jpg', 13999999, 10999999, 11, 11, 16, 9),
(10, 'dell-inspiron-15-3520-i3', 'Laptop', 1.9, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT\', N\'Acer-Aspire-7-Gaming\'', 'dell inspiron 15', '2024-05-01', '2024-05-08', 12, '', 0, 'dell-inspiron-15-3520-i3-i3u082w11blu-thumb-600x600.jpg', 13999999, 10999999, 11, 11, 16, 9),
(11, 'hp-15s-fq5162tu-i5', 'Laptop', 1.7, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT\'', 'Acer Aspire 7 Gaming', '2024-05-01', '2024-05-09', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.\r\nBộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.\r\nỔ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.\r\nMàn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.\r\nMáy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 19, 'hp-15s-fq5162tu-i5-7c134pa-thumb-600x600.jpg', 18890000, 15190000, 11, 11, 11, 13),
(12, 'iphone-11-trang', 'DienThoai', 195, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suấtBảo hành pin 12 thángBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT', 'iphone 11 trắng', '2024-05-08', '2024-05-03', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.Bộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.Ổ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.Màn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.Máy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 12, 'iphone-11-trang-600x600.jpg', 10000000, 10000000, 10, 10, 18, 7),
(13, 'iphone-11-den', 'DienThoai', 195, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suấtBảo hành pin 12 thángBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT', 'iphone 11 Đen', '2024-05-08', '2024-05-03', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.Bộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.Ổ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.Màn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.Máy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 12, 'iphone-11-trang-600x600.jpg', 1190000, 10000000, 10, 10, 18, 7),
(14, 'acer-aspire-7-gaming-a715-43g-r8ga-r5', 'Laptop', 1.9, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT\', N\'Acer-Aspire-7-Gaming\'', 'acer aspire 7 gaming ', '2024-05-01', '2024-05-08', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.\r\nBộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.\r\nỔ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.\r\nMàn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.\r\nMáy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 25, 'acer-aspire-7-gaming-a715-43g-r8ga-r5.jpg', 21000000, 16999999, 11, 11, 16, 13),
(15, 'hp-15s-fq5162tu-i5', 'Laptop', 1.7, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT', 'hp 15s ', '2024-05-01', '2024-05-02', 12, 'Trang bị bộ vi xử lý AMD Ryzen 5 5625U cùng card rời NVIDIA GeForce RTX 3050 4 GB cân mọi tác vụ từ học tập, làm việc trên các ứng dụng của Office, Google,... cho đến thiết kế đồ họa trên Adobe hay chiến mọi tựa game thịnh hành hiện nay.\r\nBộ nhớ RAM 8 GB cho phép mở nhiều cửa sổ trình duyệt Chrome cùng lúc mà vẫn không có hiện tượng giật lag.\r\nỔ cứng 512GB SSD cho không gian lưu trữ rộng lớn, lưu mọi file, dữ liệu học tập hay tải nhiều tựa game mà không lo hết dung lượng.\r\nMàn hình 15.6 inch cùng tấm nền IPS mang đến góc nhìn rộng rãi, giúp game thủ quan sát tốt mọi chuyển động của đối phương.\r\nMáy trang bị đầy đủ các cổng kết nối như: USB Type C, USB-A, HDMI,... hỗ trợ kết xuất hình ảnh hay truyền tải dữ liệu nhanh chóng.', 19, 'hp-15s-fq5162tu-i5-7c134pa-thumb-600x600.jpg', 18890000, 15900000, 12, 11, 12, 10),
(16, 'apple-macbook-air-m2-2022-16gb', 'Laptop', 1.24, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất\r\nBảo hành pin 12 tháng\r\nBảo hành 12 tháng tại trung tâm bảo hành Chính hãng./ 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất./ Giá sản phẩm đã bao gồm VAT', 'Macbook Air M2', '2024-05-01', '2024-05-02', 12, 'Chip Apple M2 vẫn được sản xuất ở tiến trình 5 nm với 4 nhân hiệu năng cao và 4 nhân tiết kiệm kiệm như dòng M1 nhưng tốc độ băng thông đã được cải tiến vượt trội lên đến 100GB/s, cùng với đó là sự trợ giúp của 20 nghìn tỷ bóng bán dẫn giúp hiệu suất hoạt động được nâng cao hơn 18% so với phiên bản tiền nhiệm, đảm bảo vận hành trơn tru mọi tác vụ học tập, làm việc từ cơ bản đến nâng cao. \r\n\r\nKhông chỉ giải quyết hoàn hảo những tác vụ thông thường, MacBook M2 còn chinh phục người dùng sáng tạo khi trang bị 10 nhân GPU với khả năng xử lý lên đến 15.8 nghìn tỷ tác vụ chỉ trong 1 giây, cho phép bạn thao tác mượt mà các ứng dụng đồ họa như Adobe Illustrator, Premiere, AutoCAD,... cũng như chỉnh sửa hình ảnh, phát video 4K, 8K ProRes 12 ấn tượng.\r\n', 4, 'apple-macbook-air-m2-2022-16gb-600x600.jpg', 39190000, 37690000, 10, 11, 14, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuats`
--

CREATE TABLE `hangsanxuats` (
  `MaHangSX` int(11) NOT NULL,
  `TenHangSX` varchar(255) NOT NULL,
  `MaNuocThuongHieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuats`
--

INSERT INTO `hangsanxuats` (`MaHangSX`, `TenHangSX`, `MaNuocThuongHieu`) VALUES
(7, 'Apple', 'USA'),
(8, 'SamSung', 'Hàn Quốc'),
(9, 'Dell', 'USA'),
(10, 'HP', 'USA'),
(11, 'Asus', 'Đài Loan'),
(12, 'Lenovo', 'USA'),
(13, 'Acer', 'Đài Loan'),
(14, 'Logitech', 'Thuỵ Sỹ'),
(15, 'Zowie', 'None');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadons`
--

CREATE TABLE `hoadons` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayTaoHoaDon` date NOT NULL,
  `TongTien` double NOT NULL,
  `GiamGia` double NOT NULL,
  `PhuongThucThanhToan` int(11) NOT NULL,
  `TinhTrang` text NOT NULL,
  `ThongTinThue` varchar(255) NOT NULL,
  `GhiChu` longtext NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadons`
--

INSERT INTO `hoadons` (`MaHoaDon`, `NgayTaoHoaDon`, `TongTien`, `GiamGia`, `PhuongThucThanhToan`, `TinhTrang`, `ThongTinThue`, `GhiChu`, `MaKhachHang`, `MaNhanVien`) VALUES
(10, '2024-05-08', 10000000, 0, 0, 'a', 'a', 'a', 1, NULL),
(11, '0000-00-00', 10000, 0, 0, '', '', '', 1, NULL),
(12, '0000-00-00', 0, 0, 0, '', '', '', 1, NULL),
(13, '0000-00-00', 0, 0, 0, '', '', '', 1, NULL),
(14, '0000-00-00', 16999999, 0, 0, '', '', '', 1, NULL),
(15, '0000-00-00', 16999999, 0, 0, '', '', '', 1, NULL),
(16, '0000-00-00', 16999999, 0, 0, '', '', '', 1, NULL),
(17, '0000-00-00', 16999999, 0, 0, '', '', '', 1, NULL),
(18, '0000-00-00', 16999999, 0, 0, 'Đang chờ xác nhận', '', '', 1, NULL),
(19, '0000-00-00', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(20, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(21, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(22, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(23, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(24, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(25, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(26, '2024-05-23', 16999999, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(27, '2024-05-23', 83999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(28, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(29, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(30, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(31, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(32, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(33, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(34, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(35, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(36, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(37, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(38, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(39, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(40, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(41, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(42, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(43, '2024-05-23', 93999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(44, '2024-05-23', 54999997, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(45, '2024-05-23', 54999997, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(46, '2024-05-23', 10999999, 0, 0, 'Đã nhận hàng', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 1, NULL),
(47, '2024-05-24', 50999997, 0, 0, 'Đang vận chuyển', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 8, NULL),
(48, '2024-05-24', 73999998, 0, 0, 'Đang chờ xác nhận', 'Luong Mai Thanh Khoi 124 hồ văn tắng củ chi thành phố hồ chí minh Hồ Chí Minh 0389177663', 'thanhkhoi939@gmail.com', 8, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichthuocs`
--

CREATE TABLE `kichthuocs` (
  `MaKichThuoc` int(11) NOT NULL,
  `KichThuocSP` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `kichthuocs`
--

INSERT INTO `kichthuocs` (`MaKichThuoc`, `KichThuocSP`) VALUES
(10, 'gaming'),
(11, 'pro'),
(12, 'promax'),
(13, 'normal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaidactinhs`
--

CREATE TABLE `loaidactinhs` (
  `MaDT` int(11) NOT NULL,
  `TenLoaiDT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaidactinhs`
--

INSERT INTO `loaidactinhs` (`MaDT`, `TenLoaiDT`) VALUES
(10, 'Cảm ứng'),
(11, 'Gaming'),
(12, 'Thường'),
(13, 'Pro Max'),
(14, 'Pro'),
(15, 'Intel'),
(16, 'AMD'),
(17, '15.6'),
(18, '16GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanphams`
--

CREATE TABLE `loaisanphams` (
  `MaLoaiSp` int(11) NOT NULL,
  `LoaiSp` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanphams`
--

INSERT INTO `loaisanphams` (`MaLoaiSp`, `LoaiSp`) VALUES
(10, 'Điện Thoại'),
(11, 'LapTop'),
(12, 'Đồng Hồ'),
(13, 'Chuột'),
(14, 'Tai Nghe'),
(15, 'Bàn Phím'),
(16, 'Logitech'),
(17, 'Zowie');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausacs`
--

CREATE TABLE `mausacs` (
  `MaMauSac` int(11) NOT NULL,
  `TenMauSac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausacs`
--

INSERT INTO `mausacs` (`MaMauSac`, `TenMauSac`) VALUES
(10, 'black'),
(11, 'red'),
(12, 'green'),
(13, 'white'),
(14, 'gray'),
(15, 'blue');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanviens`
--

CREATE TABLE `nhanviens` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SoDienThoai1` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinchitietsps`
--

CREATE TABLE `thongtinchitietsps` (
  `MaThongTin` int(11) NOT NULL,
  `TenTT` varchar(255) DEFAULT NULL,
  `NoiDUngTT` varchar(255) DEFAULT NULL,
  `MaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinchitietsps`
--

INSERT INTO `thongtinchitietsps` (`MaThongTin`, `TenTT`, `NoiDUngTT`, `MaSP`) VALUES
(10, 'CPU', 'i512450H2GHz', 14),
(11, 'RAM', '8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz', 14),
(12, 'Ổ cứng', 'Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1 TB)512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1 TB)', 14),
(13, 'Card màn hình:', 'Card rờiRTX 2050 4GB', 14),
(14, 'Màn hình:', '15.6\"Full HD (1920 x 1080) 144Hz', 14),
(15, 'Cổng kết nối:', '1 x USB Type-C (hỗ trợ USB, DisplayPort, Thunderbolt 4)HDMILAN (RJ45)3 x USB 3.2Jack tai nghe 3.5 mm', 14),
(16, 'Đặc biệt:', 'Có đèn bàn phím', 14),
(17, 'Hệ điều hành:', 'Windows 11 Home SL', 14),
(18, 'Thiết kế:', 'Vỏ nhựa - nắp lưng bằng kim loại', 14),
(19, 'Kích thước, khối lượng:', 'Dài 362.3 mm - Rộng 237.4 mm - Dày 19.9 mm - Nặng 2.1 kg', 14),
(20, 'Thời điểm ra mắt:', '2023', 14),
(21, 'Công nghệ CPU:', 'AMD Ryzen 5 - 5625U', 14);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UserName`);

--
-- Chỉ mục cho bảng `anhsanphams`
--
ALTER TABLE `anhsanphams`
  ADD PRIMARY KEY (`IDFileAnh`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `chatlieus`
--
ALTER TABLE `chatlieus`
  ADD PRIMARY KEY (`MaChatLieu`);

--
-- Chỉ mục cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  ADD KEY `MaChiTietSanPham` (`MaChiTietSanPham`),
  ADD KEY `fk_htk_id_sanpham` (`MaHoaDon`);

--
-- Chỉ mục cho bảng `chitietsanphams`
--
ALTER TABLE `chitietsanphams`
  ADD PRIMARY KEY (`MaChiTietSanPham`),
  ADD KEY `MaKichThuoc` (`MaKichThuoc`),
  ADD KEY `MaMauSac` (`MaMauSac`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`IdComment`),
  ADD KEY `MaChiTietSanPham` (`MaChiTietSanPham`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `danhmucsanphams`
--
ALTER TABLE `danhmucsanphams`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDT` (`MaDT`),
  ADD KEY `MaChatLieu` (`MaChatLieu`),
  ADD KEY `MaHangSX` (`MaHangSX`),
  ADD KEY `MaLoaiSp` (`MaLoaiSp`);

--
-- Chỉ mục cho bảng `hangsanxuats`
--
ALTER TABLE `hangsanxuats`
  ADD PRIMARY KEY (`MaHangSX`);

--
-- Chỉ mục cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaNhanVien` (`MaNhanVien`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `kichthuocs`
--
ALTER TABLE `kichthuocs`
  ADD PRIMARY KEY (`MaKichThuoc`);

--
-- Chỉ mục cho bảng `loaidactinhs`
--
ALTER TABLE `loaidactinhs`
  ADD PRIMARY KEY (`MaDT`);

--
-- Chỉ mục cho bảng `loaisanphams`
--
ALTER TABLE `loaisanphams`
  ADD PRIMARY KEY (`MaLoaiSp`);

--
-- Chỉ mục cho bảng `mausacs`
--
ALTER TABLE `mausacs`
  ADD PRIMARY KEY (`MaMauSac`);

--
-- Chỉ mục cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `thongtinchitietsps`
--
ALTER TABLE `thongtinchitietsps`
  ADD PRIMARY KEY (`MaThongTin`),
  ADD KEY `MaSP` (`MaSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhsanphams`
--
ALTER TABLE `anhsanphams`
  MODIFY `IDFileAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chatlieus`
--
ALTER TABLE `chatlieus`
  MODIFY `MaChatLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `chitietsanphams`
--
ALTER TABLE `chitietsanphams`
  MODIFY `MaChiTietSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `danhmucsanphams`
--
ALTER TABLE `danhmucsanphams`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hangsanxuats`
--
ALTER TABLE `hangsanxuats`
  MODIFY `MaHangSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `kichthuocs`
--
ALTER TABLE `kichthuocs`
  MODIFY `MaKichThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `loaidactinhs`
--
ALTER TABLE `loaidactinhs`
  MODIFY `MaDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `loaisanphams`
--
ALTER TABLE `loaisanphams`
  MODIFY `MaLoaiSp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `mausacs`
--
ALTER TABLE `mausacs`
  MODIFY `MaMauSac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongtinchitietsps`
--
ALTER TABLE `thongtinchitietsps`
  MODIFY `MaThongTin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhsanphams`
--
ALTER TABLE `anhsanphams`
  ADD CONSTRAINT `anhsanphams_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `danhmucsanphams` (`MaSP`);

--
-- Các ràng buộc cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  ADD CONSTRAINT `chitiethoadons_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadons` (`MaHoaDon`),
  ADD CONSTRAINT `chitiethoadons_ibfk_2` FOREIGN KEY (`MaChiTietSanPham`) REFERENCES `chitietsanphams` (`MaChiTietSanPham`),
  ADD CONSTRAINT `fk_htk_id_sanpham` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadons` (`MaHoaDon`);

--
-- Các ràng buộc cho bảng `chitietsanphams`
--
ALTER TABLE `chitietsanphams`
  ADD CONSTRAINT `chitietsanphams_ibfk_1` FOREIGN KEY (`MaKichThuoc`) REFERENCES `kichthuocs` (`MaKichThuoc`),
  ADD CONSTRAINT `chitietsanphams_ibfk_2` FOREIGN KEY (`MaMauSac`) REFERENCES `mausacs` (`MaMauSac`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`MaChiTietSanPham`) REFERENCES `chitietsanphams` (`MaChiTietSanPham`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserName`) REFERENCES `account` (`UserName`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `account` (`UserName`);

--
-- Các ràng buộc cho bảng `danhmucsanphams`
--
ALTER TABLE `danhmucsanphams`
  ADD CONSTRAINT `danhmucsanphams_ibfk_1` FOREIGN KEY (`MaDT`) REFERENCES `loaidactinhs` (`MaDT`),
  ADD CONSTRAINT `danhmucsanphams_ibfk_2` FOREIGN KEY (`MaChatLieu`) REFERENCES `chatlieus` (`MaChatLieu`),
  ADD CONSTRAINT `danhmucsanphams_ibfk_3` FOREIGN KEY (`MaHangSX`) REFERENCES `hangsanxuats` (`MaHangSX`),
  ADD CONSTRAINT `danhmucsanphams_ibfk_4` FOREIGN KEY (`MaLoaiSp`) REFERENCES `loaisanphams` (`MaLoaiSp`);

--
-- Các ràng buộc cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  ADD CONSTRAINT `hoadons_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanviens` (`MaNhanVien`),
  ADD CONSTRAINT `hoadons_ibfk_2` FOREIGN KEY (`MaKhachHang`) REFERENCES `customer` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD CONSTRAINT `nhanviens_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `account` (`UserName`);

--
-- Các ràng buộc cho bảng `thongtinchitietsps`
--
ALTER TABLE `thongtinchitietsps`
  ADD CONSTRAINT `thongtinchitietsps_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `danhmucsanphams` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

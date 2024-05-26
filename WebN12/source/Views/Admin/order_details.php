<?php
require_once("../../Data/db.php");

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $query = "
        SELECT 
            chitiethoadons.SoLuongBan,
            chitiethoadons.GiaBan,
            chitiethoadons.GiamGia,
            chitiethoadons.GhiChu,
            hoadons.NgayTaoHoaDon,
            hoadons.TongTien,
            hoadons.GiamGia AS HoaDonGiamGia,
            hoadons.PhuongThucThanhToan,
            hoadons.TinhTrang,
            hoadons.ThongTinThue,
            hoadons.GhiChu AS HoaDonGhiChu,
            danhmucsanphams.TenSP,
            danhmucsanphams.Model,
            danhmucsanphams.CanNang,
            danhmucsanphams.MaDacTinh,
            danhmucsanphams.TenSpShort,
            danhmucsanphams.NgayDang,
            danhmucsanphams.NgayChinhSua,
            danhmucsanphams.ThoiGianBaoHanh,
            danhmucsanphams.GioiThieuSanPham,
            danhmucsanphams.ChieuKhau,
            danhmucsanphams.AnhDaiDien,
            danhmucsanphams.GiaLonNhat,
            danhmucsanphams.GiaNhoNhat,
            danhmucsanphams.MaChatLieu,
            danhmucsanphams.MaLoaiSp,
            danhmucsanphams.MaDT,
            danhmucsanphams.MaHangSX
        FROM chitiethoadons
        INNER JOIN hoadons ON chitiethoadons.MaHoaDon = hoadons.MaHoaDon
        INNER JOIN danhmucsanphams ON chitiethoadons.MaChiTietSanPham = danhmucsanphams.MaSP
        WHERE chitiethoadons.MaHoaDon = ?
    ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order_details = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Details for Order ID: <?php echo $order_id; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Discount</th>
                    <th>Note</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_details as $item): ?>
                    <tr>
                        <td><?php echo $item['TenSP']; ?></td>
                        <td><?php echo $item['Model']; ?></td>
                        <td><?php echo $item['SoLuongBan']; ?></td>
                        <td><?php echo number_format($item['GiaBan'], 2); ?></td>
                        <td><?php echo number_format($item['GiamGia'], 2); ?></td>
                        <td><?php echo $item['GhiChu']; ?></td>
                        <td><?php echo number_format($item['SoLuongBan'] * $item['GiaBan'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="javascript:history.back()">Back</a>
    </div>
</body>
</html>

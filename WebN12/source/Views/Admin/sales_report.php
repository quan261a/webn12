<?php
require_once("../../Data/db.php");

function getSalesReport($start_date, $end_date, $conn) {
    $report = [
        'total_orders' => 0,
        'total_amount_received' => 0,
        'total_products' => 0,
        'orders' => []
    ];

    $query = "SELECT hd.MaHoaDon, hd.NgayTaoHoaDon, hd.TongTien, COUNT(cthd.MaChiTietSanPham) AS total_products
              FROM hoadons hd
              JOIN chitiethoadons cthd ON hd.MaHoaDon = cthd.MaHoaDon
              WHERE hd.NgayTaoHoaDon BETWEEN ? AND ?
              GROUP BY hd.MaHoaDon
              ORDER BY hd.NgayTaoHoaDon ASC";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $report['total_orders'] += 1;
        $report['total_amount_received'] += $row['TongTien'];
        $report['total_products'] += $row['total_products'];
        $report['orders'][] = [
            'id' => $row['MaHoaDon'],
            'order_date' => $row['NgayTaoHoaDon'],
            'total_amount' => $row['TongTien'],
            'total_products' => $row['total_products']
        ];
    }

    return $report;
}

function getProfit($start_date, $end_date, $conn) {
    $query = "SELECT SUM(hd.TongTien) - SUM(cthd.GiaBan * cthd.SoLuongBan) AS profit
              FROM hoadons hd
              JOIN chitiethoadons cthd ON hd.MaHoaDon = cthd.MaHoaDon
              WHERE hd.NgayTaoHoaDon BETWEEN ? AND ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['profit'];
}
?>

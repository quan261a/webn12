<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['UserName'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        label {
            margin-right: 10px;
        }
        button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        th:first-child, td:first-child {
            width: 10%;
        }
        td a {
            color: #007bff;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
        .total-profit {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Báo cáo thống kê</h1>
        <form id="reportForm" method="POST" action="report.php">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
            <button type="submit">Generate Report</button>
        </form>

        <div>
            <button onclick="setDateRange('today')">Today</button>
            <button onclick="setDateRange('yesterday')">Yesterday</button>
            <button onclick="setDateRange('last7days')">Last 7 Days</button>
            <button onclick="setDateRange('thismonth')">This Month</button>
        </div>

        <?php if (isset($_POST['start_date']) && isset($_POST['end_date'])): ?>
            <?php
                require_once("sales_report.php");
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $report = getSalesReport($start_date, $end_date, $conn);
            ?>
            <h2>Sales Report from <?php echo $start_date; ?> to <?php echo $end_date; ?></h2>
            <p>Tổng hóa đơn: <?php echo $report['total_orders']; ?></p>
            <p>Tổng số tiền thu được: <?php echo $report['total_amount_received']; ?></p>
            <p>Tổng số sản phẩm đã bán: <?php echo $report['total_products']; ?></p>
            
            <h3>Order List</h3>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Total Products</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report['orders'] as $order): ?>
                        <tr>
                            <td><?php echo $order['id']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><?php echo $order['total_amount']; ?></td>
                            <td><?php echo $order['total_products']; ?></td>
                            <td><a href="order_details.php?id=<?php echo $order['id']; ?>">View Details</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if ($_SESSION['LoaiUser'] == 1): // Admin ?>
                <div class="total-profit">
                    <h3>Lợi nhuận:</h3>
                    <p><?php echo getProfit($start_date, $end_date, $conn); ?></p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <script>
        function setDateRange(range) {
            const today = new Date();
            let startDate, endDate;

            if (range === 'today') {
                startDate = endDate = today.toISOString().split('T')[0];
            } else if (range === 'yesterday') {
                const yesterday = new Date(today);
                yesterday.setDate(today.getDate() - 1);
                startDate = endDate = yesterday.toISOString().split('T')[0];
            } else if (range === 'last7days') {
                const last7Days = new Date(today);
                last7Days.setDate(today.getDate() - 7);
                startDate = last7Days.toISOString().split('T')[0];
                endDate = today.toISOString().split('T')[0];
            } else if (range === 'thismonth') {
                startDate = new Date(today.getFullYear(), today.getMonth(), 1).toISOString().split('T')[0];
                endDate = today.toISOString().split('T')[0];
            }

            document.getElementById('start_date').value = startDate;
            document.getElementById('end_date').value = endDate;
            document.getElementById('reportForm').submit();
        }
    </script>
</body>
</html>

<section class="breadcrumb-section set-bg" style="background-color:#D21404">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>WeStore</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
	if (!isset($_SESSION['UserName'])) {
        ?>
        <section class="checkout spad">
        <div class="container">
            <div class="row">
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <h4 class="card-title d-flex justify-content-center" >Bạn chưa đăng nhập tài khoản</h4>
                                        
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <?php
	} else {
        require_once("../../Controller/UserController.php");
        require_once("../../Controller/HoaDonController.php");
        $user = (new UserController())->getIdCustomer($_SESSION['UserName']); 
        // echo $user->MaKhachHang;
        $lists = (new HoaDonController())->getOderByIdUser($user->MaKhachHang); 
    }
   
?>
<?php
    function getStringValue(float $value) {
        // Convert the float value to a string
        $a = (string)$value;
        $length = strlen($a);
        // Insert a dot 3 characters from the end
        $a = substr_replace($a, ".", $length - 3, 0);
        if ($length > 9) {
            // Insert a dot 9 characters from the end
            $a = substr_replace($a, ".", $length - 9, 0);
        }
        if ($length > 6) {
            // Insert a dot 6 characters from the end
            $a = substr_replace($a, ".", $length - 6, 0);
        }
        return $a;
    }
?>

<section class="checkout spad">
        <div class="container">
            <div class="row">
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 stretch-card">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        
                                        <?php  if (isset($_SESSION['UserName'])) 
                                        { 
                                            ?>
                                            <h4 class="card-title">Các đơn hàng của bạn</h4>
                                            <table class="table table-bordered table-striped table-hover table-condensed">
                                                <thead>
                                                    <tr class="table-warning" style="width: 30%">
                                                        <th >
                                                            Ngày lập hoá đơn
                                                        </th>
                                                        <th >
                                                            Địa Chỉ
                                                        </th>
                                                        <th >
                                                            Email
                                                        </th>
                                                        <th >
                                                            Tổng tiền
                                                        </th>
                                                        <th >
                                                            Giảm giá
                                                        </th>
                                                        <th >
                                                            Phương thức thanh toán
                                                        </th>
                                                        <th >
                                                            Tình trạng đơn hàng
                                                        </th>
                                                        <th>Chức Năng</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                            <?php
                                               
                                                    foreach ($lists as $list) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $list->NgayTaoHoaDon; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $list->ThongTinThue; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $list->GhiChu; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo getStringValue($list->TongTien); ?>
                                                            </td> 
                                                            <td>
                                                                <?php echo $list->GiamGia; ?>
                                                            </td>
                                                            <td>
                                                                 Thanh toán khi nhận hàng
                                                            </td>
                                                            <td>
                                                                <?php echo $list->TinhTrang; ?>
                                                            </td>
                                                            <td>
                                                                <a href="../User/indexHome.php?page_layout=details&id=<?php echo $list->MaHoaDon; ?>">Details</a> 
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } 
                
                                            ?>
                                                   
                                                
                                            </tbody>
                                        </table>
                                            <?php
                                        }
                                        ?>
                                       
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
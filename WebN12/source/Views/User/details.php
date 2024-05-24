<?php
    require_once("../../Controller/UserController.php");
    require_once("../../Controller/HoaDonController.php");
    require_once("../../Controller/ChiTietHoaDonController.php");
    require_once("../../Controller/ProductDetailController.php");
    
    $user = (new UserController())->getIdCustomer($_SESSION['UserName']); 
    // echo $user->MaKhachHang;
    $lists = (new HoaDonController())->getOderByIdUser($user->MaKhachHang); 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $listsOders = (new ChiTietHoaDonController())->listOrder($id); 
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
<section class="breadcrumb-section set-bg" style="background-color:#D21404">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>WeStore</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                        <h4 class="card-title">Các đơn hàng của bạn</h4>
                                        <table class="table table-bordered table-striped table-hover table-condensed">
                                            <thead>
                                                <tr class="table-warning" style="width: 30%">
                                                     <th >
                                                        Id
                                                    </th>
                                                    <th >
                                                        Tên Sản Phẩm
                                                    </th>
                                                    <th >
                                                        Số lượng
                                                    </th>
                                                    <th >
                                                        Tổng tiền
                                                    </th>
                                                    <th >
                                                        Giảm giá
                                                    </th>
                                                   
                                                    <th >
                                                        Tình trạng đơn hàng
                                                    </th>
                                                    <th>Chức Năng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(isset($_GET['id'])) {
                                                    foreach ($listsOders as $list) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $list->MaHoaDon; ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                require_once("../../Controller/ProductDetailController.php");
                                                                require_once("../../Controller/ProductController.php");
                                                                $MaSP = (new ProductDetailController())->getMaSP($list->MaChiTietSanPham); 
                                                                $NameProduct = (new ProductController())->getNameMaSP($MaSP->MaSP);
                                                                echo $NameProduct->TenSpShort; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $list->SoLuongBan; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo getStringValue($list->GiaBan); ?>
                                                            </td> 
                                                            <td>
                                                                <?php echo $list->GiamGia; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $list->GhiChu; ?>
                                                            </td>
                                                          
                                                            <td>
                                                                <a href="../User/indexHome.php?page_layout=history">Quay lại</a> 
                                                               
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                            }
                                            ?>
                                                   
                                                
                                            </tbody>
                                        </table>
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
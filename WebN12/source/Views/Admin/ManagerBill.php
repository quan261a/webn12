<?php
    require_once("../../Controller/ProductController.php");
    require_once("../../Controller/HoaDonController.php");
    require_once("../../Controller/UserController.php");
    $numberBills = (new HoaDonController())->getBillInfo();
   
?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Quản lý hoá đơn
        </h3>
        <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
        </nav>
    </div>
   
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                        <h4 class="card-title d-flex justify-content-center" >Thông tin các hoá đơn</h4>
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                                <tr class="table-warning" style="width: 30%">
                                    <th  class="text-center">
                                        Mã hoá đơn
                                    </th>
                                    <th  class="text-center">
                                        Ngày tạo
                                    </th>
                                    <th  class="text-center">
                                        Tổng tiền
                                    </th>
                                    <th  class="text-center">
                                       Trạng thái
                                    </th>
                                    <th  class="text-center">
                                       Thông tin người nhận
                                    </th>
                                    <th  class="text-center">
                                       Email
                                    </th>
                                    <th  class="text-center">
                                       Tài khoản đặt hàng
                                    </th>
                                    <th  class="text-center">Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($numberBills as $list) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $list->MaHoaDon ?>
                                                </td>
                                                <td>
                                                <?php echo $list->NgayTaoHoaDon ?>
                                                </td>
                                                <td>
                                                <?php echo $list->TongTien ?>
                                                </td>
                                                <td>
                                                <?php echo $list->TinhTrang ?>
                                                </td>
                                                <td>
                                                <?php echo $list->ThongTinThue ?>
                                                </td>
                                                <td>
                                                <?php echo $list->GhiChu ?>
                                                </td>
                                                <td>
                                                <?php 
                                                 $numberAccountss = (new UserController())->getMKKHCustomer($list->MaKhachHang);
                                                echo $numberAccountss->UserName ?>
                                                </td>
                                                <td>
                                                    <a href="../Admin/index.php?page_layout=detailBill&id=<?php echo$list->MaHoaDon?>">Details</a> |
                                                    <a href="../Admin/index.php?page_layout=editBill&id=<?php echo$list->MaHoaDon?>">Edits</a> 
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                               
                            </tbody>
                    </table>          
                </div>
            </div>
        </div>
    </div>
</div>
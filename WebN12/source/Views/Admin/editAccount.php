<?php
    require_once("../../Controller/ProductController.php");
    require_once("../../Controller/HoaDonController.php");
    require_once("../../Controller/UserController.php");
    $id = '';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $numberAccounts = (new UserController())->getIdCustomer($id);
?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Quản lý tài khoản
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
                        <h4 class="card-title d-flex justify-content-center" >Thông tin khách hàng</h4>
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                                <tr class="table-warning" style="width: 30%">
                                    <th  class="text-center">
                                       Tên khách hàng
                                    </th>
                                    <th  class="text-center">
                                       Số điện thoại
                                    </th>
                                    <th  class="text-center">
                                       Ngày Sinh
                                    </th>
                                    <th  class="text-center">
                                       Địa Chỉ
                                    </th>
                                    <th  class="text-center">
                                       Email
                                    </th>
                                    <th  class="text-center">Chức Năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    ?>
                                        <tr>
                                            <td>
                                            <?php
                                                if( $numberAccounts->SDT =='') {
                                                    echo "Chưa cập nhật thông tin";
                                                } else {
                                                    echo $numberAccounts->TenKhachHang; 
                                                }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php
                                                if( $numberAccounts->SDT =='') {
                                                    echo "Chưa cập nhật thông tin";
                                                } else {
                                                    echo $numberAccounts->SDT; 
                                                }
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                if( $numberAccounts->SDT =='') {
                                                    echo "Chưa cập nhật thông tin";
                                                } else {
                                                    echo $numberAccounts->NgaySinh; 
                                                }
                                                ?>
                                               
                                            </td>
                                            <td>
                                            <?php
                                                if( $numberAccounts->SDT =='') {
                                                    echo "Chưa cập nhật thông tin";
                                                } else {
                                                    echo $numberAccounts->DiaChi; 
                                                }
                                                ?>
                                              
                                            </td>
                                            <td>
                                            <?php
                                                if( $numberAccounts->SDT =='') {
                                                    echo "Chưa cập nhật thông tin";
                                                } else {
                                                    echo $numberAccounts->Email; 
                                                }
                                                ?>
                                          
                                            </td>
                                           
                                            <td>
                                                <a href="../Admin/index.php?page_layout=ManagerAccount">Return</a> |
                                                <a href="../Admin/index.php?page_layout=editCustomerInfo&id=<?php echo$numberAccounts->MaKhachHang ?>">Edits</a> 
                                            </td>
                                        </tr>
                                    <?php
                                  
                                ?>
                               
                            </tbody>
                    </table>          
                </div>
            </div>
        </div>
    </div>
</div>
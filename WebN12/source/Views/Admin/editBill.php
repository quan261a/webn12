<?php
    require_once("../../Controller/ProductController.php");
    require_once("../../Controller/HoaDonController.php");
    require_once("../../Controller/UserController.php");
    $id = '';
    if(isset($_GET['id'])) {
        $ids = $_GET['id'];
     
    }
    $statusBill = (new HoaDonController())->getBillInfoById($ids);
   
?>
<?php
    $msg ='';
    if(isset($_POST['btnSave'])) {
        $tinhtrang = $_POST['tinhtrang'];
        if(isset($tinhtrang)) {
            // echo $diachi;
            // echo $ngaysinh;
            $sql = "UPDATE `hoadons` 
            SET `TinhTrang` = ? 
               
            WHERE `MaHoaDon` = ?";
            if ($stmt = $conn->prepare($sql)) {
                // Assuming $tenkhachhang, $ngaysinh, $sdt, $diachi, $email, and $ids are defined earlier
                $stmt->bind_param("ss", $tinhtrang, $ids);
                
                // Execute the statement
                if ($stmt->execute()) {
                    
                    // echo "Record updated successfully.";
                    $msg = "Cập nhật thành công";
                } else {
                    // Handle execution error
                    die('Execute error: ' . htmlspecialchars($stmt->error));
                }
            
                // Close the statement
                $stmt->close();
            } else {
                // Handle preparation error
                die('Prepare error: ' . htmlspecialchars($conn->error));
            }
        }
    }
?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Thay đổi thông tin 
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
                    <h4 class="card-title d-flex justify-content-center" >Thông tin hoá đơn</h4>
                    <h4><span><?php echo $msg; ?></span></h4>
                    <div class="col-lg-12">
                        <form method="post" asp-action="SuaKhachHang">
                            <div class="form-group">
                                
                                <label asp-for="Password" class="control-label">Trạng thái</label>
                                <!-- <select  class="form-control" name="cars" id="cars">
                                    <option value="Đang chờ xác nhận">Đang chờ xác nhận</option>
                                    <option value="Đang vận chuyển">Đang vận chuyển</option>
                                    <option value="Thanh toán thành công">Thanh toán thành công</option>
                                
                                </select> -->
                                <input asp-for="Password" class="form-control" name="tinhtrang" value="" placeholder="<?php
                                foreach($statusBill as $status) {
                                    echo $status->TinhTrang; 
                                }
                               
                                 ?>"/>
                                <span asp-validation-for="Password" class="primary-danger"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Save" name="btnSave" class="btn btn-primary" button> 
                                
                            </div>
                        </form>
                        <a href="../Admin/index.php?page_layout=ManagerBill">Return</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
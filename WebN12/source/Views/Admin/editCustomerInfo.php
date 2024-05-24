<?php

    require_once("../../Controller/ProductController.php");
    require_once("../../Controller/HoaDonController.php");
    require_once("../../Controller/UserController.php");
    $id = '';
    if(isset($_GET['id'])) {
        $ids = $_GET['id'];
     
    }
  
    $numberAccountss = (new UserController())->getMKKHCustomer($ids);
?>
<?php
    $msg ='';
    if(isset($_POST['btnSave'])) {
        $tenkhachhang = $_POST['tenkhachhang'];
        $sdt = $_POST['sdt'];
        $ngaysinh = $_POST['ngaysinh'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        if(isset($tenkhachhang) && isset($sdt) && isset($ngaysinh) && isset($diachi) && isset($email) ) {
            // echo $diachi;
            // echo $ngaysinh;
            $sql = "UPDATE `customer` 
            SET `TenKhachHang` = ?, 
                `NgaySinh` = ?, 
                `SDT` = ?, 
                `DiaChi` = ?, 
                `Email` = ? 
            WHERE `MaKhachHang` = ?";
    
            if ($stmt = $conn->prepare($sql)) {
                // Assuming $tenkhachhang, $ngaysinh, $sdt, $diachi, $email, and $ids are defined earlier
                $stmt->bind_param("sssssi", $tenkhachhang, $ngaysinh, $sdt, $diachi, $email, $ids);
                
                // Execute the statement
                if ($stmt->execute()) {
                    
                    echo "Record updated successfully.";
                   
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
                    <h4 class="card-title d-flex justify-content-center" >Thông tin khách hàng</h4>
                    <h4><span><?php echo $msg; ?></span></h4>
                    <div class="col-lg-12">
                        <form method="post" asp-action="SuaKhachHang">
                            <div class="form-group">
                                <label asp-for="Password" class="control-label">Tên khách hàng</label>
                                <input asp-for="Password" class="form-control" name="tenkhachhang" value="" placeholder="<?php echo $numberAccountss->TenKhachHang ?>"/>
                                <span asp-validation-for="Password" class="primary-danger"></span>
                            </div>
                            
                            <div class="form-group">
                                <label asp-for="LoaiUser" class="control-label">Số điện thoại</label>
                                <input asp-for="LoaiUser" class="form-control" name="sdt"  placeholder="<?php echo $numberAccountss->SDT ?>"/>
                                <span asp-validation-for="LoaiUser" class="text-primary"></span>
                            </div>
                            <div class="form-group">
                                <label asp-for="Password" class="control-label">Ngày sinh</label>
                                <input asp-for="Password" class="form-control" name="ngaysinh"  placeholder="<?php echo $numberAccountss->NgaySinh ?>"/>
                                <span asp-validation-for="Password" class="primary-danger"></span>
                            </div>
                            <div class="form-group">
                                <label asp-for="LoaiUser" class="control-label">Địa chỉ</label>
                                <input asp-for="LoaiUser" class="form-control"  name="diachi" placeholder="<?php echo $numberAccountss->DiaChi ?>"/>
                                <span asp-validation-for="LoaiUser" class="text-primary"></span>
                            </div>
                            <div class="form-group">
                                <label asp-for="Password" class="control-label">Email</label>
                                <input asp-for="Password" class="form-control" name="email" placeholder="<?php echo $numberAccountss->Email ?>"/>
                                <span asp-validation-for="Password" class="primary-danger"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Save" name="btnSave" class="btn btn-primary" button> 
                                
                            </div>
                        </form>
                        <a href="../Admin/index.php?page_layout=ManagerAccount">Return</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
<section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <form action="" method="post" id="giohang">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once("../../Controller/ProductController.php");
                                    if(isset($_SESSION['shopcart'])) {
                                        if(isset($_POST['sl'])) {
                                            foreach($_POST['sl'] as $id_sp=>$sl) {
                                                if($sl == 0) {
                                                    unset($_SESSION['shopcart'][$id_sp]);
                                                }
                                                elseif ($sl >0) {
                                                    $_SESSION['shopcart'][$id_sp] = $sl;
                                                }
                                            }
                                        }
                                        $arrId = array();
                                        $totalPrice= 0;
                                        foreach($_SESSION['shopcart'] as $id_sp =>$so_luong) {
                                            $infoProducts = (new ProductController())->loadInfoProductById($id_sp);
                                            foreach($infoProducts as $product) {
                                                $totalPrice += $product->GiaNhoNhat * $_SESSION['shopcart'][$product->MaSP]; 
                                                ?>
                                                <tr>
                                                    <td class="shoping__cart__item">
                                                        <img src="../../Style/User/img/featured/<?php echo $product->AnhDaiDien?>" width="150" height="100" alt="">
                                                        <h5><?php echo $product->TenSpShort; ?></h5>
                                                    </td>
                                                    <td class="shoping__cart__price">
                                                        <?php echo getStringValue($product->GiaNhoNhat); ?>
                                                    </td>
                                                    <td class="shoping__cart__quantity">
                                                        <div class="quantity">
                                                            <div class="pro-qty">
                                                                <input type="text" name="sl[<?php echo $product->MaSP; ?>]" value="<?php echo $_SESSION['shopcart'][$product->MaSP]; ?>">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="shoping__cart__total">
                                                        <?php 
                                                            $total = $product->GiaNhoNhat * $_SESSION['shopcart'][$product->MaSP];
                                                            echo getStringValue($total);
                                                        ?>
                                                    </td>
                                                    <td class="shoping__cart__item__close">
                                                        
                                                        <a href="../../Controller/XoaSanPham.php?id_sp=<?php echo $product->MaSP; ?>"><span class="icon_close"></span></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }          
                                        }  
                                    } 
                                    else {
                                       ?>
                                       <tr> 
                                            <td colspan="4"> Chưa có sản phẩm trong giỏ hàng!</td>
                                       </tr>
                                      <?php
                                    } 
                                ?>
                            </tbody>
                        </table>
                        </form>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="../../Views/User/index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a onclick="document.getElementById('giohang').submit();"  class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal 
                                <span> 
                                    <?php 
                                     if(isset($_SESSION['shopcart']))
                                      { 
                                        echo getStringValue($totalPrice);
                                      } else {
                                        echo "0";
                                      }

                                        // $total = $product->GiaNhoNhat * $_SESSION['shopcart'][$product->MaSP];
                                       
                                    ?>
                                </span></li>
                            <li>Total 
                                <span> 
                                    <?php 
                                        // $total = $product->GiaNhoNhat * $_SESSION['shopcart'][$product->MaSP];
                                        if(isset($_SESSION['shopcart']))
                                      { 
                                        echo getStringValue($totalPrice);
                                      } else {
                                        echo "0";
                                      }

                                    ?>
                                </span></li>
                        </ul>
                        <?php 
                            if(isset($_SESSION['shopcart']))
                            { 
                                ?>
                                <a href="../User/indexHome.php?page_layout=checkout" class="primary-btn" style="background-color:#D21404">Thanh toán</a>
                                <?php
                            }
                            else {
                                ?>
                                <a href="" class="primary-btn" style="background-color:#D21404">Vui lòng chọn sản phẩm trước khi thanh toán</a>
                                <?php
                            }
                        ?>
                        <!-- <a href="../User/indexHome.php?page_layout=checkout" class="primary-btn">PROCEED TO CHECKOUT</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
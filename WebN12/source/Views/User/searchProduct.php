<?php
    require_once("../../Controller/ProductController.php");
    if(isset($_GET['tukhoa'])) {
        $id_Dm = $_GET['tukhoa'];
    } else {
        $id_Dm = ''; 
    }  
    $products = (new ProductController())->loadInfoProductByName($id_Dm);
?>
<?php
    function getStringValue(float $value) {
        // Convert the float value to a string
        $a = (string)$value;
        $length = strlen($a);
    
        // Insert a dot 3 characters from the end
        $a = substr_replace($a, ".", $length - 3, 0);
    
        if ($length > 10) {
            // Insert a dot 9 characters from the end
            $a = substr_replace($a, ".", $length - 9, 0);
        }
    
        if ($length > 7) {
            // Insert a dot 6 characters from the end
            $a = substr_replace($a, ".", $length - 6, 0);
        }
    
        return $a;
    }
?>
<?php
    foreach ($products as $product) {
        ?>
         <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="../../Style/User/img/featured/<?php echo $product->AnhDaiDien?>" style="background-size: contain,  cover;">
                    <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="indexHome.php?page_layout=product-details&id_Dm=<?php echo $product->MaSP; ?>"><?php echo $product->TenSpShort; ?> </a></h6>
                    <h5><?php echo getStringValue($product->GiaLonNhat); ?></h5>
                </div>
            </div>
        </div>
        <?php
    }
?>

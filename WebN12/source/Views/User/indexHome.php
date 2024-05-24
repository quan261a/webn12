<?php
    require_once("../../Controller/ProductController.php");
    $products = (new ProductController())->loadProduct();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeStore</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../Style/User/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../Style/User/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                <li><a href="#"><i class="fa fa-shopping-bag"></i> 
                <span>
                        <?php
                        session_start();
                        if(isset($_SESSION['shopcart'])) {
                            echo count( $_SESSION['shopcart']);  
                        } else {
                            echo "0";
                        }
                        
                    ?>
                </span>
            </a></li>
            </ul>
            <div class="header__cart__price">item: 
            <span>
                <?php
                    require_once("../../Controller/ProductController.php");
                    $totalPrice= 0;
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
                            }          
                        }  
                    } 
                    echo $totalPrice;
                ?>
                
                </span>
            </div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="../User/index.php">Home</a></li>
                <li><a href="../User/indexHome.php?page_layout=shop-grid">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="../User/indexHome.php?page_layout=shop-grid">Shop Details</a></li>
                        <li><a href="../User/indexHome.php?page_layout=shop-cart">Shoping Cart</a></li>
                        <li><a href="../User/indexHome.php?page_layout=checkout">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="../User/indexHome.php?page_layout=history">History</a></li>
                <li><a href="../User/indexHome.php?page_layout=contact">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> 52100144@student.tdtu.edu.vn</li>
                <li>Free Shipping for all Order anywhere</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> 52100144@student.tdtu.edu.vn</li>
                                <li>Free Shipping for all Order of 500.000</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <div class="header__top__right__auth">
                                <a  href="../../Views/Access/changepassword.php">
                                        <i class="fa fa-user"></i>
                                        Change Password
                                    </a>   
                                </div>
                            </div>
                            <div class="header__top__right__language">
                                <div class="header__top__right__auth">
                                    <a  href="../../Views/Access/login.php">
                                        <i class="fa fa-user"></i>
                                        LogIn
                                    </a>
                                   
                                </div>
                            </div>
                            <div class="header__top__right__auth">
                                <a  href="../../Views/Access/logout.php">
                                    <i class="fa fa-user"></i>
                                    LogOut
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="../User/index.php">Home</a></li>
                            <li><a href="../User/indexHome.php?page_layout=shop-grid">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="../User/indexHome.php?page_layout=shop-grid">Shop Details</a></li>
                                    <li><a href="../User/indexHome.php?page_layout=shop-cart">Shoping Cart</a></li>
                                    <li><a href="../User/indexHome.php?page_layout=checkout">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="../User/indexHome.php?page_layout=history">History</a></li>
                            <li><a href="../User/indexHome.php?page_layout=contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> 
                            <span>
                                <?php
                               
                                if(isset($_SESSION['shopcart'])) {
                                    echo count( $_SESSION['shopcart']);  
                                } else {
                                    echo "0";
                                }
                                
                            ?>
                            </span>
                        </a></li>
                        </ul>
                        <div class="header__cart__price">item: 
                        <span>
                            <?php
                                require_once("../../Controller/ProductController.php");
                                $totalPrice= 0;
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
                                        }          
                                    }  
                                } 
                                echo $totalPrice;
                            ?>
                          
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories" style="background-color:#D21404">
                        <div class="hero__categories__all" style="background-color:#D21404">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php
                            foreach ($products as $product) {
                                ?>
                                <li><a href="index.php?page_layout=indexProduct&id_Dm=<?php echo $product->MaLoaiSp ?> ">  <?php echo $product->LoaiSp; ?> </a></li>
                            
                                <?php
                            }
                        ?>
                            <!-- <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="indexHome.php?page_layout=shop-grid&timkiem" method="get">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?" name="tukhoa">
                                <button type="submit" class="site-btn" style="background-color:#D21404" name="search" value="TimKiem">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0900.99.999</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <?php
        if(isset($_GET['page_layout']))  {
            switch($_GET['page_layout']) {
                case 'checkout':
                    include_once("../User/checkout.php");
                    break;
                case 'shop-cart':
                    include_once("../User/shop-cart.php");
                    break;
                case 'shop-grid':
                    include_once("../User/shop-grid.php");
                    break;
                case 'contact':
                    include_once("../User/contact.php");
                    break;
                case 'product-details':
                    include_once("../User/product-details.php");
                    break;
                case 'history':
                    include_once("../User/history.php");
                    break;
                case 'details':
                    include_once("../User/details.php");
                    break;
                
            }
        }
        else {
            include_once("../User/shop-grid.php");
        }
        // 
        // include_once("../User/checkout.php");
        // include_once("../User/shop-cart.php");
        //  include_once("../User/shop-grid.php");
        ?>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-6 col-sm-6">
                 <div class="footer__about">
                     <div class="footer__about__logo">
                         <a href="./index.html"><img src="../LayoutIndex/img/og.png" alt=""></a>
                     </div>
                     <ul>
                         <li>Address: Tp Hồ Chí Minh, Việt Nam</li>
                         <li>Phone:0900.99.999</li>
                         <li>Email: 52100050@student.tdtu.edu.vn</li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                 <div class="footer__widget">
                     <h6>Useful Links</h6>
                     <ul>
                         <li><a href="#">About Us</a></li>
                         <li><a href="#">About Our Shop</a></li>
                         <li><a href="#">Secure Shopping</a></li>
                         <li><a href="#">Delivery infomation</a></li>
                         <li><a href="#">Privacy Policy</a></li>
                         <li><a href="#">Our Sitemap</a></li>
                     </ul>
                     <ul>
                         <li><a href="#">Who We Are</a></li>
                         <li><a href="#">Our Services</a></li>
                         <li><a href="#">Projects</a></li>
                         <li><a href="#">Contact</a></li>
                         <li><a href="#">Innovation</a></li>
                         <li><a href="#">Testimonials</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-4 col-md-12">
                 <div class="footer__widget">
                     <h6>Join Our Newsletter Now</h6>
                     <p>Get E-mail updates about our latest shop and special offers.</p>
                     <form action="#">
                         <input type="text" placeholder="Enter your mail">
                         <button type="submit" style="background-color:red" class="site-btn">Subscribe</button>
                     </form>
                     <div class="footer__widget__social">
                         <a href="#"><i class="fa fa-facebook"></i></a>
                         <a href="#"><i class="fa fa-instagram"></i></a>
                         <a href="#"><i class="fa fa-twitter"></i></a>
                         <a href="#"><i class="fa fa-pinterest"></i></a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <div class="footer__copyright">
                     <div class="footer__copyright__text">
                         <p>
                             <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                             Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                             <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                         </p>
                     </div>
                     <div class="footer__copyright__payment"><img src="../LayoutIndex/img/payment-item.png" alt=""></div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../../Style/User/js/jquery-3.3.1.min.js"></script>
    <script src="../../Style/User/js/bootstrap.min.js"></script>
    <script src="../../Style/User/js/jquery.nice-select.min.js"></script>
    <script src="../../Style/User/js/jquery-ui.min.js"></script>
    <script src="../../Style/User/js/jquery.slicknav.js"></script>
    <script src="../../Style/User/js/mixitup.min.js"></script>
    <script src="../../Style/User/js/owl.carousel.min.js"></script>
    <script src="../../Style/User/js/main.js"></script>


</body>

</html>
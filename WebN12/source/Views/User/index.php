
<?php
    require_once("../../Controller/UserController.php");
    $products = (new UserController())->loadProduct();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
            <a href="#"><img src="../../Style/User/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li style="background-color:#D21404"><a href="#"><i class="fa fa-heart" style="background-color:#D21404"></i> <span>1</span></a></li>
                <li style="background-color:#D21404"><a href="#"><i class="fa fa-shopping-bag" style="background-color:#D21404"></i> 
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
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="../../Style/User/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
                <!-- <a href="#"><i class="fa fa-user"></i> Logout</a> -->
            </div>
            <div class="header__top__right__auth">
                <!-- <a href="#"><i class="fa fa-user"></i> Login</a> -->
                <a href="#"><i class="fa fa-user"></i> Logout</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"  style="background-color:#D21404"><a href="../User/index.php"  style="background-color:#D21404">Home</a></li>
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

                <li><a href="../admin/report.php">Sales Report</a></li>

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
                    <div class="col-lg-6 col-md-6">
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
                        <!-- <a href="./index.html"><img src="../../Style/User/img/logo.png" alt=""></a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active" ><a href="../User/index.php"  >Home</a></li>
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
                            <li><a href="../admin/report.php">Sales Report</a></li>

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
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
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
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn" style="background-color:#D21404" >SEARCH</button>
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
                    <div class="hero__item set-bg" data-setbg="../../Style/User/img/hero/banner-tgdd.jpg">
                        <div class="hero__text">
                            <!-- <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../../Style/User/img/categories/apple.jpg">
                        <h5><a class="border border-dark rounded-pill border-4" href="#">Apple</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../../Style/User/img/categories/msiLogo.jpg">
                        <h5><a class="border border-dark rounded-pill border-4" href="#">MSI</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../../Style/User/img/categories/samsungLogo.jpg">
                        <h5><a class ="border border-dark rounded-pill border-4" href="#">SamSung</a></h5>
                    </div>
                </div>
                <!-- <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../.../Style/User/img/categories/Lenovo.png">
                        <h5><a class="border border-dark rounded-pill border-4" href="#">Lenovo</a></h5>
                    </div>
                </div> -->
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="../../Style/User/img/categories/Dell.jpg">
                        <h5><a class="border border-dark rounded-pill border-4"  href="#">Dell</a></h5>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Các sản phẩm nổi bật</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="all"><a href="index.php?page_layout=indexProduct&id_Dm=all" style="color:black" >All</a></li>
                            <li data-filter=".oranges"><a href="index.php?page_layout=indexProduct&id_Dm=Laptop" style="color:black" >Laptop</a></li>
                            <li data-filter=".fresh-meat"><a href="index.php?page_layout=indexProduct&id_Dm=Dienthoai" style="color:black" >Điện thoại</a></li>
                            <li data-filter=".vegetables"><a href="index.php?page_layout=indexProduct&id_Dm=Chuot" style="color:black" >Chuột</a></li>
                            <li data-filter=".fastfood"><a href="index.php?page_layout=indexProduct&id_Dm=Banphim" style="color:black" >Bàn phím</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
<!-- Categories Section End -->
<!-- Featured Section Begin -->
                <?php
                if(isset($_GET['page_layout']))  {
                    switch($_GET['page_layout']) {
                        case 'indexProduct':
                            include_once("../User/indexProduct.php");
                            break;
                        default: include_once("../User/indexP.php");    
                    }
                }
                else {
                    include_once("../User/indexDefault.php");
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <!-- <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="../../Style/User/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="../../Style/User/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="../../Style/User/img/categories/apple.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Iphone</h6>
                                        <span>10.000.000</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="../../Style/User/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="../../Style/User/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="../../Style/User/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->

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

<?php
    session_start();
    $id_sp = $_GET['id_sp']; 
   
    if(isset($_SESSION['shopcart'][$id_sp])) {
        $_SESSION['shopcart'][$id_sp] = $_SESSION['shopcart'][$id_sp] + 1;
        
    } else {
        $_SESSION['shopcart'][$id_sp] = 1;
        
    }
    // echo count( $_SESSION['shopcart']);
    header('Location: ../Views/User/indexHome.php?page_layout=shop-cart');
   
?>
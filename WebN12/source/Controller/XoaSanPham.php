<?php
    session_start();
    if(isset($_GET['id_sp'])) {
        $id_sp = $_GET['id_sp'];
        unset($_SESSION['shopcart'][$id_sp]);
    }
    header('Location: ../Views/User/indexHome.php?page_layout=shop-cart');
?>
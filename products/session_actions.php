<?php
    session_start();
    if($_SESSION['cart'] == "")
    {
        $_SESSION['cart'] = array($_POST);
        echo "<script type='text/javascript'>alert('Item added to cart!');
        window.location.href='../index.php';
        </script>";
    } else {
        array_push($_SESSION['cart'], $_POST);
        echo "<script type='text/javascript'>alert('Item added to cart!');
        window.location.href='../index.php';
        </script>";
    }

?>
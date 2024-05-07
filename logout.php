<?php
    session_start();
    if(isset($_SESSION['session_username'])) {
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'>alert('Logout Succesful!');
        window.location.href='index.php';
        </script>";
    }
    else {
        echo "<script type='text/javascript'>alert('Please login to your account.');
        window.location.href='login.php';
        </script>";
    }
?>
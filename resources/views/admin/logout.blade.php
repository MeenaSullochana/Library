<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['userid']);
    session_destroy();

    if (isset($_COOKIE["usersid"])) {
        $cokiesusername = $_COOKIE['usersid'];
        echo $cokiesusername;
        setcookie('uname','', time()-(10 * 365 * 24 * 60 * 60));
        setcookie('paword','', time()-(10 * 365 * 24 * 60 * 60));
        setcookie('usersid','', time()-(10 * 365 * 24 * 60 * 60));
        echo $cokiesusername;
     } else {
        $msg="Not Reconganized Any data";
        echo "<script>console.log(".json_encode($msg).")</script>";
     }

    include("login");
    echo '<script> alert("Your are successfully logged out") </script>';
    echo '<script language="JavaScript"> window.location.href ="login.php" </script>';
    //header('Location:login.php');
?>
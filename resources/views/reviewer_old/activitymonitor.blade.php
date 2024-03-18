<?php
@ob_start();
session_start();
function admin_logincheck()
{
    if(!isset($_SESSION['username']) || $_SESSION['username']=='')
    {
        session_destroy();
        header('Location:login.php');
    }
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 18000)) {
                             // last request was more than 5 minutes ago
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();	// destroy session data in storage
        
        include("login.php");
        echo '<script> alert("Your session expired. Please login again") </script>';
        echo '<script language="JavaScript"> window.location.href ="admin-login.php" </script>';
    }
    $_SESSION['LAST_ACTIVITY'] = time();
}
?>
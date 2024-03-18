<?php
// Login Restriction
// activity Checking
// include "activitymonitor.php";
// admin_logincheck();
// Import Packages
// Db Config

include "config/dbconnect.php";
include "class/InsertControler.class.php";
include "class/ViewControler.class.php";
include "class/UpdateControler.class.php";
include "class/DeleteControler.php";
include "class/Auth.class.php";
include "component/tables.php";
include "component/string.php";

date_default_timezone_set("Asia/Calcutta");
//India time (GMT+5:30)

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Error Handling
$error_message          =   array();
$success_message        =   array();
$data                   =   array();

//button Variable Insitialize
$btn_update             =   false;
$btn_save               =   true;

//Get Current Date Time
$today = date("y/m/d h:i:s");
$commenttoday = date("y-m-d h:i:s");
$todaydatetime = date('c');

//Initialize the Class InsertController
$viewController     = new ViewController;
$insertController   = new InsertController;
$updateController   = new UpdateController;
$deleteController   = new DeleteControler;
$dbconnect          = new DatabaseConnection;
$AuthController     = new auth;
?>
<?php
// Login Restriction
// activity Checking
// include "activitymonitor.php";
// admin_logincheck();
// Import Packages
// Db Config

include "../config/dbconnect.php";
include "../class/InsertControler.class.php";
include "../class/ViewControler.class.php";
include "../class/UpdateControler.class.php";
include "../class/DeleteControler.php";
include "../class/Auth.class.php";
include "../component/tables.php";
include "../component/string.php";

date_default_timezone_set("Asia/Calcutta");
//India time (GMT+5:30)

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

//Error Handling
$error_message = [];
$success_message = [];
$data = [];

//button Variable Insitialize
$btn_update = false;
$btn_save = true;

//Get Current Date Time
$today = date("y/m/d h:i:s");
$commenttoday = date("y-m-d h:i:s");
$todaydatetime = date("c");

//Initialize the Class InsertController
$viewController = new ViewController();
$insertController = new InsertController();
$updateController = new UpdateController();
$deleteController = new DeleteControler();
$dbconnect = new DatabaseConnection();
$AuthController = new auth();

if (isset($_POST["dist_status"])) {
    $dist_status = mysqli_escape_string($dbconnect->conn,$_POST["dist_status"]);
    $ad_id_value = mysqli_escape_string($dbconnect->conn, $_POST["id"]);

    // Update data in the database
    $userData = [
        "status" => $dist_status,
    ];

    $conditions = ["distribution_id" => $_POST["id"]];
    $updateStatusRec = $updateController->update($table["tbl_distribution"],$userData,$conditions
    );

    if ($updateStatusRec) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST["pub_status"])) {
    $dist_status = mysqli_escape_string($dbconnect->conn,$_POST["pub_status"]);
    $ad_id_value = mysqli_escape_string($dbconnect->conn, $_POST["id"]);

    // Update data in the database
    $userData = [
        "status" => $dist_status,
    ];

    $conditions = ["publisher_id" => $_POST["id"]];
    $updateStatusRec = $updateController->update($table["tbl_publishers"],$userData,$conditions
    );

    if ($updateStatusRec) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST["pub_dist_status"])) {
    $dist_status = mysqli_escape_string($dbconnect->conn,$_POST["pub_dist_status"]);
    $ad_id_value = mysqli_escape_string($dbconnect->conn, $_POST["id"]);

    // Update data in the database
    $userData = [
        "status" => $dist_status,
    ];

    $conditions = ["publication_name_dist_id" => $_POST["id"]];
    $updateStatusRec = $updateController->update($table["tbl_publisher_and_distributor"],$userData,$conditions
    );

    if ($updateStatusRec) {
        return true;
    } else {
        return false;
    }
}

?>

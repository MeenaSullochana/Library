<?php
include "plugin.core.php";
if(isset($_GET['userid'])){

    $userid = mysqli_escape_string($dbconnect->conn,$_GET['userid']);
    $userDataCondition = [
        'where'=>[
            'publication_name_dist_id'=>$userid
        ],
        'return_type'=>'single'
    ];
    $userProfileData = $viewController->getRows($table['tbl_publisher_and_distributor'],$userDataCondition);
    // echo "<pre>";
    // print_r($userProfileData);
    // echo "</pre>";
}
?>
<?php
include "plugin.core.php";

/****************************************************************
 ====================== View  Publisher List*********************
 ****************************************************************/
$publisherCondition = [];
$userlistpub_dis = $viewController->getRows($table['tbl_publisher_and_distributor'], $publisherCondition);
// echo "<pre>";
// print_r($publisherList);
// echo "</pre>";

/****************************************************************
 ====================== View  Inactive Publisher List*********************
 ****************************************************************/
$inactivepublisherandDestCondition = [
    'where'=>[
        'status'=>'inactive'
        ]
];
$inactivepublisherandDestList = $viewController->getRows($table['tbl_publisher_and_distributor'], $inactivepublisherandDestCondition);

/****************************************************************
 ====================== View  Pending Publisher List*********************
 ****************************************************************/
$pendingpublisherandDestCondition = [
    'where'=>[
        'status'=>'pending'
        ]
];
$pendingpublisherandDestList = $viewController->getRows($table['tbl_publisher_and_distributor'], $pendingpublisherandDestCondition);

?>

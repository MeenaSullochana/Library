<?php
include "plugin.core.php";

/****************************************************************
 ====================== View  Publisher List*********************
 ****************************************************************/
$publisherCondition = [];
$publisherList = $viewController->getRows($table['tbl_publishers'], $publisherCondition);

/****************************************************************
 ====================== View  Inactive Publisher List*********************
 ****************************************************************/
$inactivepublisherCondition = [
    'where'=>[
        'status'=>'inactive'
        ]
];
$inactivedistriputorList = $viewController->getRows($table['tbl_publishers'], $inactivepublisherCondition);

/****************************************************************
 ====================== View  Pending Publisher List*********************
 ****************************************************************/
$pendingpublisherCondition = [
    'where'=>[
        'status'=>'pending'
        ]
];
$pendingpublisherList = $viewController->getRows($table['tbl_publishers'], $pendingpublisherCondition);

?>

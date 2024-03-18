<?php
include "plugin.core.php";

/****************************************************************
 ====================== View  Publisher List*********************
 ****************************************************************/
$distriputorCondition = [];
$distriputorList = $viewController->getRows($table['tbl_distribution'], $distriputorCondition);


/****************************************************************
 ====================== View Inactive Publisher List*********************
 ****************************************************************/
$ActivedistriputorCondition = [
    'where'=>[
        'status'=>'inactive'
        ]
];
$ActivedistriputorList = $viewController->getRows($table['tbl_distribution'], $ActivedistriputorCondition);

/****************************************************************
 ====================== View  Pending Publisher List*********************
 ****************************************************************/
$PendingdistriputorCondition = [
    'where'=>[
        'status'=>'pending'
        ]
];
$pendingdistriputorList = $viewController->getRows($table['tbl_distribution'], $PendingdistriputorCondition);




?>

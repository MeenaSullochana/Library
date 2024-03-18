<?php
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
    $notificationCondition = [
        'where'=>['user_id'=>$userid],
        'order_by' => 'id'
    ];
    $notificationBar = $viewController->getRows($table['tbl_notifications'], $notificationCondition);
}
?>
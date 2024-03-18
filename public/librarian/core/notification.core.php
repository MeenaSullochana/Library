<?php
// include "plugin.core.php";

function sendNotification($userid,$title,$message){

    $userInput = [
    'user_id'           =>          $userid,
    'title'             =>          $title,
    'message'           =>          $message,
    'timestamp'         =>          $GLOBALS['commenttoday'],
    'is_read'           =>            '0'
    ];

    $insertNotification = $GLOBALS['insertController']->insertData($userInput,'tbl_notifications');
    if($insertNotification){
        return true;
    }else{
        return false;
    }
}
?>
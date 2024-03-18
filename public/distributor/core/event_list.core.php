<?php
include "plugin.core.php";

/*****************************************************************************/
/*                                 Home Page                                 */
/*****************************************************************************/
$viewEventCondition=[];

$viewEventList = $viewController->getRows($table['tbl_event'],$viewEventCondition);
// print_r($viewEventList);

if(isset($_GET['event_id'])){

    $event_id = mysqli_escape_string($dbconnect->conn,$_GET['event_id']);

    $eventCondition = [
        'where'=>[
            'event_id'=>$event_id
        ],
        'return_type'=>'single'
    ];

    $eventData = $viewController->getRows($table['tbl_event'],$eventCondition);
}

if (isset($_POST['update'])) {

    $updateEventid = mysqli_escape_string($dbconnect->conn,$_GET['event_id']);
    
    $eventData = [
        'event_name'                =>     mysqli_escape_string($dbconnect->conn, $_POST['event_name'        ]),
        'event_date_time'           =>     mysqli_escape_string($dbconnect->conn, $_POST['event_date_time'   ]),
        'location_detail'           =>     mysqli_escape_string($dbconnect->conn, $_POST['location'          ]),
        'description'               =>     mysqli_escape_string($dbconnect->conn, $_POST['description'       ]),
        'comment'                   =>     mysqli_escape_string($dbconnect->conn, $_POST['comment'           ]),
        'contact_number'            =>     mysqli_escape_string($dbconnect->conn, $_POST['contact_number'    ]),
        'contact_name'              =>     mysqli_escape_string($dbconnect->conn, $_POST['contact_name'      ]),
        'website'                   =>     mysqli_escape_string($dbconnect->conn, $_POST['website'           ]),
        'email'                     =>     mysqli_escape_string($dbconnect->conn, $_POST['email'           ]),
        'create_at'                 =>     $commenttoday,
        'status'                    =>     'Active'
    ];

    $eventDataCondition = [
        'event_id'=>$updateEventid
    ];

    $updateEvent = $updateController->Update($table ['tbl_event'],$eventData,$eventDataCondition);
    if($updateEvent){
        // echo "Data Saved";
        $success_message[] = "
        <script>
            Toastify({
                text: 'Successfully Updated',
                duration: 3000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                  },
                }).showToast();
            </script>";
    }else{
        // echo "Data Not Saved";
        $error_message[] = "
            <script>
                Toastify({
                    text: '!Sorry, Could not be add',
                    duration: 3000,
                    style: {
                        background: 'linear-gradient(red, #f06d06)',
                        },
                    }).showToast();
                </script>";
    }
}
?>
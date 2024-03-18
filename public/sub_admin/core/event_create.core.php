<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();

include "plugin.core.php";

/*****************************************************************************/
/*                                 Home Page                                 */
/*****************************************************************************/

if (isset($_POST['submit'])) {
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

    $insertEvent = $insertController->insertData($eventData,$table ['tbl_event']);
    if($insertEvent){
        // echo "Data Saved";
        $success_message[] = "
        <script>
            Toastify({
                text: 'Successfully Added',
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


/*****************************************************************************/
/*                                 Home Page                                 */
/*****************************************************************************/

?>


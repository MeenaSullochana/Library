<?php

include "core/notification.core.php";

session_start();

$displayquestion = array();
$userData = array();
$commentList = array();
$commentuserdetails = array();


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();


//If User Click Subscategory Question
/*****************************************************************************/
/*               View Question Details Using GET Method                      */
/*****************************************************************************/
if(isset($_GET['questioned_id'])){
    
    // $ConfigData[] = '';
    $showCategoryQuestion = [ 
        'where'=>[
            'status'        =>'Active',
            'question_id'   =>$_GET['questioned_id']
        ],
        'status'=>'Active'
    ];
    $question = $viewController->getRows($table['tbl_questions'], $showCategoryQuestion);
    // echo "<pre>";
    // print_r($questionListData);
    // echo "</pre>";
    if (!empty($question)) {
        foreach ($question as $questionList) {
            $displayquestion[] = $questionList;
            // echo "<pre>";
            // print_r($questionListData);
            // echo "</pre>";
        }
    }

    $sql_userdata = "SELECT * FROM ".$table['tbl_user']." RIGHT JOIN ".$table['tbl_questions']." ON ".$table['tbl_questions'].".asker_id = ".$table['tbl_user'].".user_id WHERE question_id = ".$_GET['questioned_id']."";
    $exe_Query = $dbconnect->conn->query($sql_userdata);
    if($exe_Query->num_rows > 0){
        while($row = $exe_Query->fetch_assoc()){
            $userData[] = $row;
        }
    }
        // echo $sql_userdata;
}

/*****************************************************************************/
/*                            Make Comment                                  */
/*****************************************************************************/

if(isset($_POST['make_comment'])){

    $userCommentData = [
        'userid'        => mysqli_escape_string($dbconnect->conn, $_POST['userid'       ]),
        'question_id'   => mysqli_escape_string($dbconnect->conn, $_POST['questione_id' ]),
        'comment_text'  => mysqli_escape_string($dbconnect->conn, $_POST['comment'      ]),
        'cmt_status'        => 'Active',
        'created_at'    => $commenttoday
    ];

    $insertComment = $insertController->insertData($userCommentData,$table['tbl_question_comments']);

    if($insertComment){
        $success_message[] = "
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your work Done',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function() { 
                window.location.href = 'question.php';
            }, 2000);
        </script>";
    }else{
        $error_message[] = "
            <script>
            Toastify({
                text: 'Could N't Insert',
                duration: 3000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                  },
                }).showToast();
            </script>";
    }
}

/*****************************************************************************/
/*                            Show Comments                                  */
/*****************************************************************************/

// $ConfigData[] = '';
    $commentCondition= [ 
        'where'=>[
            'cmt_status'        =>'Active',
            'question_id'   =>$_GET['questioned_id']
        ],
        'cmt_status'=>'Active'
    ];
    $question = $viewController->getRows($table['tbl_question_comments'], $commentCondition);
    
    // echo "<pre>";
    // print_r($questionListData);
    // echo "</pre>";

    if (!empty($question)) {
        foreach ($question as $questionList) {
            $commentList[] = $questionList;
        }
    }

    /*****************************************************************************/
    /*                            Show Comments user data                        */
    /*****************************************************************************/
    $sql_commentuserdata = "SELECT * FROM 
    ".$table['tbl_user']." 
        RIGHT JOIN 
    ".$table['tbl_question_comments']." 
        ON 
    ".$table['tbl_question_comments'].".userid = ".$table['tbl_user'].".user_id 
        WHERE 
    question_id = ".$_GET['questioned_id']." AND
    cmt_status = 'Active'";

    $exe_Query = $dbconnect->conn->query($sql_commentuserdata);
    if($exe_Query->num_rows > 0){
        while($row = $exe_Query->fetch_assoc()){
            $commentuserdetails[] = $row;
        }
    }

    /*****************************************************************************/
    /*                            Show Comments user data                        */
    /*****************************************************************************/

    if(isset($_POST['make_book'])){

        $BookingUserData = [
            'advisor_id'                =>mysqli_escape_string($dbconnect->conn,$_POST['advisor_id'             ]),
            'seeker_id'                 =>mysqli_escape_string($dbconnect->conn,$_POST['seeker_id'              ]),
            'question_id'               =>mysqli_escape_string($dbconnect->conn,$_POST['questione_id'           ]),
            'conversation_date_time'    =>mysqli_escape_string($dbconnect->conn,$_POST['booking_date'           ]),
            'progress'                  =>'start',
            'created_at'                =>$commenttoday,
            'status'                    =>'Active'                                                         
        ];

        $insertBooking = $insertController->insertData($BookingUserData,$table['tbl_chatlist']);

        if($insertBooking){

            $advisor_id = mysqli_escape_string($dbconnect->conn,$_POST['advisor_id' ]);
            $seeker_id  = mysqli_escape_string($dbconnect->conn,$_POST['seeker_id'  ]);

            $advisor_title      = $message['advisor_lead_message_title'             ];
            $advisor_message    = $message['advisor_lead_message_message'           ];
            $seeker_title       = $message['seeker_lead_message_title'              ];
            $seeker_message     = $message['seeker_lead_message_message'            ];

            $sendNoti = sendNotification($advisor_id, $advisor_title, $advisor_message  );
            $sendNoti = sendNotification($seeker_id, $seeker_title, $seeker_message     );

            $success_message[] = "
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your work Done',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() { 
                        window.location.href = 'index.php';
                    }, 2000);
                </script>";
        }else{
            $error_message[] = "
                <script>
                Toastify({
                    text: 'Could N't Insert',
                    duration: 3000,
                    style: {
                        background: 'linear-gradient(to right, #00b09b, #96c93d)',
                    },
                    }).showToast();
                </script>";
        }
    }
?>  
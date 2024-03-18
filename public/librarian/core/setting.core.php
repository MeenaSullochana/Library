<?php
session_start();

include "plugin.core.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$userid = $_SESSION['userid'];

/*****************************************************************************/
/*                                 Setting Page                              */
/*                          Retrive Current User Information                 */
/*****************************************************************************/

$condition = ['where' => ['user_id' => $userid]];
$userinfo = $viewController->getRows($table['tbl_user'],$condition);

/*****************************************************************************/
/*                                 Setting Page                              */
/*                          Update User Information                          */
/*****************************************************************************/

if(isset($_POST['update_basic_info'])){

    $userBasicData = [
        'first_name'    =>mysqli_escape_string($dbconnect->conn,$_POST['fname'      ]),
        'last_name'     =>mysqli_escape_string($dbconnect->conn,$_POST['lname'      ]),
        'role'          =>mysqli_escape_string($dbconnect->conn,$_POST['user_type'  ]),
        'email'         =>mysqli_escape_string($dbconnect->conn,$_POST['email'      ]),
    ];

    $conditions_basic_update = array('user_id' => $userid); 
    $update_basic_Data = $updateController->Update($table['tbl_user'],$userBasicData,$conditions_basic_update);
    if($update_basic_Data){
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
                            window.location.href = '/';
                        }, 2000);
                    </script>";
    }else{
        $error_message[] = "
        <script>
        Toastify({
            text: 'Could N't Update',
            duration: 3000,
            style: {
                background: 'linear-gradient(to right, #00b09b, #96c93d)',
              },
            }).showToast();
        </script>";
    }
}
/*
*************************************************************************
                        If User update Basic Data      
*************************************************************************
*/
if(isset($_POST['update_first_info'])){

    $targetDir = "profile_pic/advisor/";
    $unique = uniqid();
    $fileName = basename($_FILES["profile"]["name"]);
    $newFileName = $unique . $fileName;
    $targetFilePath = $targetDir.$newFileName;
    // echo $targetFilePath;
    // die();

    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){

        // Upload file to serverytttt
        if(move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFilePath)){

            // Insert image file name into database
            $tableGenral_setting = $table['tbl_user'];

            //Array Image File Url
            $userUpdateInput =array (
                'profile_pic'       =>      $newFileName,
                'username'          =>      mysqli_escape_string($dbconnect->conn, $_POST['username']),
                'bio'               =>      mysqli_escape_string($dbconnect->conn, $_POST['bio'])
            );

            $basicDataUpdateCondition = [
                'user_id'=>$userid
            ]; 
            $updateUserBasicRecord = $updateController->Update($table['tbl_user'],$userUpdateInput,$basicDataUpdateCondition);

            if($updateUserBasicRecord){
                $success_message[] = "
                <script>
                    setTimeout(function() {
                        swal.fire({
                            position: 'center',
                            title: 'Wow!',
                            text: 'Your work has been saved!',
                            type: 'success'
                        }, function() {
                            window.location = 'category_manage.php';
                        });
                    }, 1000);
                </script>
                    ";
            }else{
                $error_message[] = "
                    <script>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Your work did not saved',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>";
            }

        }else{
            $error_message[] = "
            <script>
              Swal.fire({
                 position: 'center',
                 icon: 'Error',
                 title: 'Sorry, there was an error uploading your file.',
                 showConfirmButton: false,
                 timer: 1500
              });
           </script>
                ";
        }
    }else{
        $error_message[] = "
            <script>
            Swal.fire({
                position: 'center',
                icon: 'Error',
                title: 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.',
                showConfirmButton: false,
                timer: 1500
            });
        </script>";
    }
}

/*
*************************************************************************
                        If User Update Password      
*************************************************************************
*/

if(isset($_POST['update_password'])){

    $current_password   = mysqli_escape_string($dbconnect->conn,$_POST['current_password'   ]);
    $new_password       = mysqli_escape_string($dbconnect->conn,$_POST['new_password'       ]);
    $verify_password    = mysqli_escape_string($dbconnect->conn,$_POST['verify_password'    ]);

    if($new_password == $verify_password){
        $verifiypassword = $AuthController->password_verify($current_password,$table['tbl_user'],$userid);
        if($verifiypassword){
            
            $ency_pass = md5($verify_password);

            $updatePasswordInput = ['password'=>$ency_pass];
            $updateConditionPassword = ['user_id'=>$userid];

            $updatePassword = $updateController->Update($table['tbl_user'],$updatePasswordInput,$updateConditionPassword);
            if($updatePassword){
                $success_message[] = "
                    <script>
                        setTimeout(function() {
                            swal.fire({
                                position: 'center',
                                title: 'Wow!',
                                text: 'Password Changed Successfully!',
                                type: 'success'
                            }, function() {
                                window.location = 'category_manage.php';
                            });
                        }, 1000);
                    </script>
                        ";
            }
        
        }else{
            $error_message[] = "
                    <script>
                    setTimeout(function() {
                        swal.fire({
                            position: 'center',
                            title: 'Oops!',
                            text: 'Your Old Password Did Not Matched!',
                            type: 'error'
                        }, function() {
                            window.location = 'category_manage.php';
                        });
                    }, 1000);
                </script>
                    ";
        }
    }else{
        $error_message[] = "
                <script>
                setTimeout(function() {
                    swal.fire({
                        position: 'center',
                        title: 'Oops!',
                        text: 'You Enter Password Did Not Matched!',
                        type: 'error'
                    }, function() {
                        window.location = 'category_manage.php';
                    });
                }, 1000);
            </script>
                ";
    }
}

?>
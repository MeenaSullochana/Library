<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

date_default_timezone_set("Asia/Calcutta");

//Get Current Date Time
$today = date("y/m/d h:i:s");

//Db Config
session_start();

//Error Handling
$error_message = array();
$success_message = array();

//Db Config
include "config/dbconnect.php";
include "class/Auth.class.php";
include "component/tables.php";

//Initialize Class
$dbconnect = new DatabaseConnection;
$LoginAuth = new auth;


if (isset($_POST['register'])) {

	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	// die();

	// User Enter Variable Value Getting
    $fname              = mysqli_escape_string($dbconnect->conn, $_POST['fname']);
    $lname              = mysqli_escape_string($dbconnect->conn, $_POST['lname']);
    $username           = mysqli_escape_string($dbconnect->conn, $_POST['username']);
    $email              = mysqli_escape_string($dbconnect->conn, $_POST['email']);
	$signup_password    = mysqli_escape_string($dbconnect->conn, $_POST['signup_password']);
    $confirm_password   = mysqli_escape_string($dbconnect->conn, $_POST['confirm_password']);
    $user_type          = mysqli_escape_string($dbconnect->conn, $_POST['user_type']);

	//Empty Check in user Enter Values
	if (empty($fname) || empty($lname) || empty($username) || empty($signup_password) || empty($confirm_password) || empty($user_type)) {
		$error_message[] = "<script>
							Swal.fire({
								position: 'center',
								icon: 'error',
								title: 'All Fields are mandatory',
								showConfirmButton: true,
								timer: 3000
							});
   						</script>";
	} else {
        $checkUserExisit = $LoginAuth->check_user_exists($username);
        if($checkUserExisit){
            $error_message[] = "<script>
							Swal.fire({
								position: 'center',
								icon: 'error',
								title: 'User Already Exisit Please Try Other Names',
								showConfirmButton: true,
								timer: 3000
							});
   						</script>";
        }else{

            if($signup_password == $confirm_password){

                $c_password_enc = md5($confirm_password);

                $userInput = [
                    'first_name'    =>     mysqli_escape_string($dbconnect->conn, $fname),
                     'last_name'    =>     mysqli_escape_string($dbconnect->conn, $lname),
                     'username'     =>     mysqli_escape_string($dbconnect->conn, $username),
                     'email'        =>     mysqli_escape_string($dbconnect->conn, $email),
                     'password'     =>     mysqli_escape_string($dbconnect->conn, $c_password_enc),
                     'role'         =>     mysqli_escape_string($dbconnect->conn, $user_type)
                ];
                $register = $LoginAuth->Register($userInput, $table['tbl_user']);
                if ($register == false) {
                    $error_message[] = "
                            <script>
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Sorry!, Not Register So please Try Lator',
                                    showConfirmButton: true,
                                    timer: 3000
                                });
                            </script>";
                } else {
                    $success_message[] =
                        "<script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Success to login',
                                showConfirmButton: true,
                                timer: 3000
                            });
                        </script>";
                        echo "<script>
                            setInterval(function () {
                            window.location.href = 'index.php';
                            }, 4000);
                            </script>";
                }
            }else{
                $error_message[] = "<script>
							Swal.fire({
								position: 'center',
								icon: 'error',
								title: 'Password Does Not Match',
								showConfirmButton: true,
								timer: 3000
							});
   						</script>";
            }
        }
		
	}
}
?>
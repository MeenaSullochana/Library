<?php
@ob_start();
session_start();

include "plugin.core.php";
if (isset($_POST['login'])) {
// session_start();
	// User Enter Variable Value Getting
	$username = mysqli_escape_string($dbconnect->conn, $_POST['username']);
	$password = mysqli_escape_string($dbconnect->conn, $_POST['password']);

	//Empty Check in user Enter Values
	if (empty($username) || empty($password)) {
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
		if(isset($_POST['keep_login'])){
			$keep_login = mysqli_escape_string($dbconnect->conn, $_POST['keep_login']);
			$tablename = 'admin_users';
			$loginuser = $LoginAuth->Login($username, $password, $tablename, $keep_login);
	
			if ($loginuser == false) {
				$error_message[] = "
						<script>
							Swal.fire({
								position: 'center',
								icon: 'error',
								title: 'Wrong Creditional',
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
			$userlogin = $AuthController->Login($username, $password, $table ['tbl_admin']);
			if ($userlogin == false) {
				$error_message[] = "
						<script>
							Swal.fire({
								position: 'center',
								icon: 'error',
								title: 'Wrong Creditional',
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
		}
	}
}
?>
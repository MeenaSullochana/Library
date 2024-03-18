<?php
class auth{
   
   public function __construct()
   {
       $db = new DatabaseConnection;
       $this->conn = $db->conn;
   }
    public function Login($username, $password, $tablename,$keeplogin=''){

        $enc_pass = md5($password);
        $sql = "SELECT userid,email,name,username,password,role FROM $tablename WHERE (username='$username' OR email='$username') AND password='$enc_pass' LIMIT 1";

        $run_query = $this->conn->query($sql);
      //   print_r($run_query); 
        if ($run_query->num_rows > 0) {

           $row = $run_query->fetch_assoc();
           $uname    = $row['username' ];
           $uid      = $row['userid'  ];

           if(!empty($keeplogin) || $keeplogin == 'yes'){
              // Username is stored as cookie for 10 years as
              // 10years * 365days * 24hrs * 60mins * 60secs
              setcookie("username", $uname, time()+(10 * 365 * 24 * 60 * 60),"../","localhost","0");
              // Password is stored as cookie for 10 years as 
              // 10years * 365days * 24hrs * 60mins * 60secs
              setcookie("password", $password, time()+(10 * 365 * 24 * 60 * 60),"../","localhost","0");
              // After setting cookies the session variable will be set
              setcookie("usersid", $uid, time()+(10 * 365 * 24 * 60 * 60),"../","localhost","0");
              // Store Username Keep user logged  
              $_SESSION['email']       = $row['email'          ];
              $_SESSION['username']    = $row['username'       ];
              $_SESSION['userid']      = $row['userid'        ];
              $_SESSION['role']        = $row['role'           ];
              $_SESSION['name']        = $row['name'     ];
              $_SESSION['success']     = "1";
            //   header('location:../index.php');
              return true;
           }else{
            //   ob_start();
            //     session_start();
               $_SESSION['email']       =       $row['email'      ];
               $_SESSION['username']    =       $row['username'   ];
               $_SESSION['userid']      =       $row['userid'    ];
               $_SESSION['success']     =       "1";
               $_SESSION['role']        =       $row['role'       ];
               $_SESSION['name']        =       $row['name' ];
            //  header('location:../index.php');
            return true;
           }
        } else {
         return false;
        }
    }

    public function check_user_exists($username){
     $sql = "SELECT email,username FROM tbl_user WHERE username='$username' OR email='$username' LIMIT 1";
     $execute_query=$this->conn->query($sql);
     if($execute_query->num_rows > 0){
         return true;
     }else{
         return false;
     }
   }

      public function Register($userData, $tablename){
         
         $sql_insert = "INSERT INTO $tablename(";            
         $sql_insert .= implode(",", array_keys($userData)) .') VALUES (';
         $sql_insert .= "'" . implode("','", array_values($userData)) . "')";

         $result =$this->conn->query($sql_insert);
         if($result){   
            $lastInsertId = $this->conn->insert_id;
            $sql = "SELECT userid,email,username,password,role FROM $tablename WHERE user_id = '$lastInsertId' LIMIT 1";

            $run_query = $this->conn->query($sql);
            //   print_r($run_query); 
            if ($run_query->num_rows > 0) {
               $row = $run_query->fetch_assoc();

               $_SESSION['username']      = $row['username'    ];
               $_SESSION['userid']        = $row['user_id'     ];
               $_SESSION['success']       = "1";
               $_SESSION['role']          = $row['role'        ];

            return true;
         }else{
            return false;
         }
      }
   }
   public function password_verify($userpassword, $tablename,$whereid){
         $run_query = $this->conn->query("SELECT user_id,password FROM $tablename WHERE user_id = '$whereid' LIMIT 1");
         //   print_r($run_query); 
         if ($run_query->num_rows > 0) {
            $row = $run_query->fetch_assoc();

            $currentPassword  = $row['password'];
            $userPassword     = md5($userpassword);

            if($currentPassword == $userPassword){
               return true;
               // echo "true";
               // die();
            }else{
               return false;
            }
      }
   }
   
}
?>

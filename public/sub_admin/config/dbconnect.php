<?php

// define('DB_HOST','localhost');
// define('DB_USER','gladintech_usr11');
// define('DB_PASSWORD','AQY2qMST9g6$');
// define('DB_DATABASE','gladintech_11');

// $connect = new PDO("mysql:host=localhost;dbname=gladintech_11", "gladintech_usr11", "AQY2qMST9g6$");

// class DatabaseConnection
// {
//     public function __construct()
//     {
//         $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

//         if($conn->connect_error)
//         {
//             die ("<h1>Database Connection Failed</h1>");
//         }
//         // echo "Database Connected Successfully";
//         return $this->conn = $conn;
//     }
// }

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','book_fair');

class DatabaseConnection

{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        if($conn->connect_error)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
        // echo "Database Connected Successfully";
        return $this->conn = $conn;
    }
}

?>


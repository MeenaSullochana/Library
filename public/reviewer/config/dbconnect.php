<?php

define('DB_HOST','localhost');
define('DB_USER','gladindia_usr55t66t');
define('DB_PASSWORD','$TQ&cuEHi8!a');
define('DB_DATABASE','gladindia_dbrgry6yy');

$connect = new PDO("mysql:host=localhost;dbname=gladindia_dbrgry6yy", "gladindia_usr55t66t", '$TQ&cuEHi8!a');

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

// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASSWORD','');
// define('DB_DATABASE','book_fair');

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

?>


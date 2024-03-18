<?php
class UpdateController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function Update($table_name, $fields, $where_condition)  
    {  
         $query = '';  
         $condition = '';  
         foreach($fields as $key => $value)  
         {  
              $query .= $key . "='".$value."', ";  
         }  
         $query = substr($query, 0, -2);  
         /*This code will convert array to string like this-  
         input - array(  
              'key1'     =>     'value1',  
              'key2'     =>     'value2'  
         )  
         output = key1 = 'value1', key2 = 'value2'*/  
         foreach($where_condition as $key => $value)  
         {  
              $condition .= $key . "='".$value."' AND ";  
         }  
         $condition = substr($condition, 0, -5);  
         /*This code will convert array to string like this-  
         input - array(  
              'id'     =>     '5'  
         )  
         output = id = '5'*/  
         $query = "UPDATE ".$table_name." SET ".$query." WHERE ".$condition."";  
     //     echo $query;
     //     echo "<br>";
         if(mysqli_query($this->conn, $query))  
         {  
              return true;  
         }  
    }  
}
?>
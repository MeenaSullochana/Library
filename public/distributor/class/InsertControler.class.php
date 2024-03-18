<?php
class InsertController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }   
    // Stockits Function 
    public function insertData($inputData,$tableName){

        $sql_insert_brand_name = "INSERT INTO $tableName(";            
        $sql_insert_brand_name .= implode(",", array_keys($inputData)) .') VALUES (';
        $sql_insert_brand_name .= "'" . implode("','", array_values($inputData)) . "')";

        // echo $sql_insert_brand_name;
        // echo "</br>";
        
        $result_addbrand =$this->conn->query($sql_insert_brand_name);
        if($result_addbrand){   
            return true;
        }else{
            return false;
        }
    }

    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($table, $data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            if(!array_key_exists('created', $data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified', $data)){
                $data['modified'] = date("Y-m-d H:i:s");
            }
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$val."'";
                $i++;
            }
            $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$values.")";
            $insert = $this->conn->query($query);
            return $insert?$this->conn->insert_id:false;
        }else{
            return false;
        }
    }
}
?>
<?php
class Search{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function ViewSearchRetailer($query){
        $ViewRetailerListArray = array();
        $sql_ViewRetailer = "SELECT * FROM retailer WHERE shop_name LIKE '%" .trim($query) ."%'";

        $exe_sql_ViewRetailer =$this->conn->query($sql_ViewRetailer);
        $check_no_rec =$exe_sql_ViewRetailer->num_rows;
        if($check_no_rec>0){
            while($ViewRetailer_item =$exe_sql_ViewRetailer->fetch_assoc()){
                $ViewRetailerListArray[] = $ViewRetailer_item;
            }
            return $ViewRetailerListArray;
        }else{
            return null;
        }
    }
}
?>
<?php
class ViewController{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

       /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($table, $conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select", $conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$table;
        if(array_key_exists("where", $conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        
        if(array_key_exists("like", $conditions) && !empty($conditions['like'])){
            $sql .= (strpos($sql, 'WHERE') !== false)?' AND ':' WHERE ';
            $i = 0;
            $likeSQL = '';
            foreach($conditions['like'] as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $likeSQL .= $pre.$key." LIKE '%".$value."%'";
                $i++;
            }
            $sql .= '('.$likeSQL.')';
        }
        
        if(array_key_exists("like_or", $conditions) && !empty($conditions['like_or'])){
            $sql .= (strpos($sql, 'WHERE') !== false)?' AND ':' WHERE ';
            $i = 0;
            $likeSQL = '';
            foreach($conditions['like_or'] as $key => $value){
                $pre = ($i > 0)?' OR ':'';
                $likeSQL .= $pre.$key." LIKE '%".$value."%'";
                $i++;
            }
            $sql .= '('.$likeSQL.')';
        }
        
        if(array_key_exists("order_by", $conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by']; 
        }
        
        if(array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
        }elseif(!array_key_exists("start", $conditions) && array_key_exists("limit", $conditions)){
            $sql .= ' LIMIT '.$conditions['limit']; 
        }
        $result = $this->conn->query($sql);
        
        if(array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $result->num_rows;
                    break;
                case 'single':
                    $data = $result->fetch_assoc();
                    break;
                default:
                    $data = '';
            }
        }else{
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
        }
        return !empty($data)?$data:false;
    } 

    public function ViewAdmininfo(){
        $ViewAdmininfoArray = array();
        $sql_ViewRetailer = "SELECT * FROM admin_login";

        $exe_sql_admin_info =$this->conn->query($sql_ViewRetailer);
        $check_no_rec =$exe_sql_admin_info->num_rows;
        if($check_no_rec>0){
            while($ViewRetailer_item =$exe_sql_admin_info->fetch_assoc()){
                $ViewAdmininfoArray[] = $ViewRetailer_item;
            }
            return $ViewAdmininfoArray;
        }else{
            return null;
        }
    }

    public function fetchData($tableName){
        $fetchinfoArray = array();
        $sql = "SELECT * FROM $tableName";
        $exe_sql =$this->conn->query($sql);
        $check_no_rec =$exe_sql->num_rows;
        if($check_no_rec>0){
            while($row =$exe_sql->fetch_assoc()){
                $fetchinfoArray[] = $row;
            }
            return $fetchinfoArray;
        }else{
            return null;
        }
    }

    public function checkAlreadyExist($tableName,$condition,$conditionName){
        // $fetchinfoArray = array();
        $sql = "SELECT * FROM $tableName WHERE $conditionName = $condition";
        $exe_sql =$this->conn->query($sql);
        $check_no_rec =$exe_sql->num_rows;
        if($check_no_rec>0){
            return false;
        }else{
            return true;
        }
    }

    public function getCategoryName($tableName,$conditionValue,$conditionName){
        // $fetchinfoArray = array();
        $sql = "SELECT * FROM $tableName WHERE $conditionName = $conditionValue";
        $exe_sql =$this->conn->query($sql);
        $check_no_rec =$exe_sql->num_rows;
        if($check_no_rec>0){
            while($fetch_data =$exe_sql->fetch_assoc()){
                $viewArray[] = $fetch_data;
            }
            return $viewArray;
        }else{
            return null;
        }
    }

    public function ViewDates(){
        $viewArray = array();
        $sql_View = "SELECT * FROM tbl_date";

        $exe_sql =$this->conn->query($sql_View);
        $check_no_rec =$exe_sql->num_rows;
        if($check_no_rec>0){
            while($fetch_data =$exe_sql->fetch_assoc()){
                $viewArray[] = $fetch_data;
            }
            return $viewArray;
        }else{
            return null;
        }
    }

    public function ViewDatesWithWhere($whereId){
        $viewArray = array();
        $sql_View = "SELECT * FROM tbl_date WHERE date_id = '$whereId' limit 1";

        $exe_sql =$this->conn->query($sql_View);
        $check_no_rec =$exe_sql->num_rows;
        if($check_no_rec>0){
            while($fetch_data =$exe_sql->fetch_assoc()){
                $viewArray[] = $fetch_data;
            }
            return $viewArray;
        }else{
            return null;
        }
    }


    public function getGameName($where_order_id){
        $ViewOrdersitemListArray = array();
        $sql_getBrandName = "SELECT * FROM tbl_date WHERE date_id = '$where_order_id' LIMIT 1";

        $exe_sql_BrandName =$this->conn->query($sql_getBrandName);
        $check_no_rec =$exe_sql_BrandName->num_rows;
        if($check_no_rec>0){
            while($getBrandNamedetails =$exe_sql_BrandName->fetch_assoc()){
                $ViewOrdersitemListArray = $getBrandNamedetails['title_page'];
            }
            return $ViewOrdersitemListArray;
        }else{
            return null;
        }
    }

    // Report Using Between Two Dates
    // Sales Man Report
    public function ViewSalesManDateReports($sales_id,$fdate,$tdate){
        $fdateSe = new DateTime($fdate);
        $fdate = $fdateSe->format('Y-m-d');

        $tdateSe = new DateTime($tdate);
        $tdate = $tdateSe->format('Y-m-d');

        $ViewStockistListArray = array();
        // $sql_ViewStockist = "SELECT * from  product_order WHERE salemen_id =$sales_id AND order_date between $fdate AND $tdate";
        $sql_ViewStockist = "SELECT * FROM product_order WHERE salemen_id = $sales_id AND order_date BETWEEN '$fdate' AND '$tdate' ";
        $exe_sql_Viewstockist =$this->conn->query($sql_ViewStockist);
        $check_no_rec =$exe_sql_Viewstockist->num_rows;
        // echo $check_no_rec;
        if($check_no_rec>0){
            while($ViewStockist_item =$exe_sql_Viewstockist->fetch_assoc()){
                $ViewStockistListArray[] = $ViewStockist_item;
            }
            return $ViewStockistListArray;
        }else{
            return null;
        }
    }

}
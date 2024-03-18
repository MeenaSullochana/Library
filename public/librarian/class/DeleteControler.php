<?php
class DeleteControler
{   
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function Delete($tableName,$itemId,$whereconditionName){
        try{
                $sql_delete_product_item = "DELETE FROM $tableName WHERE $whereconditionName='$itemId'";
                $exe_delete_query =$this->conn->query($sql_delete_product_item);
                if($exe_delete_query){
                    return true;
                }else{
                    return false;
                }
            }
            //catch exception
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }
    public function DeleteFile($path){

        date_default_timezone_set("Asia/Calcutta");
        $today = date("y/m/d h:i:s");
        //India time (GMT+5:30)

        $errorMessage = array();
        if (file_exists($path)){
            if (unlink($path)) {   
                $errorMessage = [
                    'success' =>'Deleted Successfully',
                    'date-time' =>$today
                ];
            } else {
                $errorMessage = [
                    'fail' =>'Could Not Delete',
                    'date-time' =>$today
                ];   
            }   
        } else {
            $errorMessage = [
                'fail' =>'File Not Exisit',
                'date-time' =>$today
            ];
        }
        return json_encode($errorMessage);
    }
        
}

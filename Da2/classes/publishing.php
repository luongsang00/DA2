<?php

$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class publishing
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_publishing ($publishingName){
            $publishingName = $this->fm->validation($publishingName);
            
            $publishingName= mysqli_real_escape_string($this->db->link, $publishingName);
           
            if(empty($publishingName)){
                $alert = "<span class='error'>Tên không được để trống</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_publishing(publishingName) VALUES('$publishingName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Thêm thất bại</span>";
                    return $alert;
                }
            }
         }
        
        public function show_publishing(){
            $query = "SELECT * FROM tbl_publishing order by publishingId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getpublishingbyId($id){
            $query = "SELECT * FROM tbl_publishing where publishingId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_publishing($publishingName,$id){
            $publishingName = $this->fm->validation($publishingName);  
            $publishingName= mysqli_real_escape_string($this->db->link, $publishingName);
            $id= mysqli_real_escape_string($this->db->link, $id);
           
            if(empty($publishingName)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_publishing set publishingName = '$publishingName' where publishingId ='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class='success'>Cập nhật thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Cập nhật thất bại</span>";
                    return $alert;
                }
            }
        }
        public function del_publishing($id){
            $query = "DELETE FROM tbl_publishing where publishingId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert="<Category class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Xóa thất bại</span>";
                return $alert;
            }
        }
    }
    
?>
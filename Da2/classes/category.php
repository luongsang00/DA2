<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class category
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catName){
            $catName = $this->fm->validation($catName);
            
            $catName= mysqli_real_escape_string($this->db->link, $catName);
           
            if(empty($catName)){
                $alert = "<span class='error'>Category must be not empty</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Thêm không thành công</span>";
                    return $alert;
                }
            }
         }
        
        public function show_category(){
            $query = "SELECT * FROM tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getcatbyId($id){
            $query = "SELECT * FROM tbl_category where catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_category($catName,$id){
            $catName = $this->fm->validation($catName);  
            $catName= mysqli_real_escape_string($this->db->link, $catName);
            $id= mysqli_real_escape_string($this->db->link, $id);
           
            if(empty($catName)){
                $alert = "<span class='error'>Tên không được để trống</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_category set catName = '$catName' where catId ='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class='success'>Cật nhật thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Cật nhật không thành công</span>";
                    return $alert;
                }
            }
        }
        public function del_category($id){
            $query = "DELETE FROM tbl_category where catId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert="<Category class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        public function show_category_frontend(){
            $query = "SELECT * FROM tbl_category order by catId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_product_by_cat($id){
            $query = "SELECT * FROM tbl_product Where catId='$id' order by catId desc limit 8";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_name_by_cat($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_category.catId from tbl_product,tbl_category  Where tbl_product.catId=tbl_category.catId and tbl_product.catId ='$id' limit 1";
            $result = $this->db->select($query);
            return $result;
        }
    }
    
?>
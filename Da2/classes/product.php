<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data, $files){
           
            $productName= mysqli_real_escape_string($this->db->link, $data['productName']);
            $category= mysqli_real_escape_string($this->db->link, $data['category']);
            $publishing= mysqli_real_escape_string($this->db->link, $data['publishing']);
            $product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $author= mysqli_real_escape_string($this->db->link, $data['author']);
            $price= mysqli_real_escape_string($this->db->link, $data['price']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array('jpn', 'jpeg', 'png','gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
           
            if($productName =="" ||$category =="" ||$publishing =="" ||$product_desc ==""||$type=="" ||$price =="" ||$file_name==""||$author==""){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{

                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_product(productName, catId, publishingId, product_desc,author, price, type, image) VALUES('$productName', '$category', '$publishing','$product_desc','$author','$price','$type','$unique_image')";
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


         public function insert_slider($data, $files){
            $sliderName= mysqli_real_escape_string($this->db->link, $data['siderName']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array('jpn', 'jpeg', 'png','gif', 'jpg');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

             if($sliderName =="" ||$type =="" ){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                //nếu người dùng chọn ảnh
                if(!empty($file_name)){
                    if($file_size>2048000){
                        $alert = "<span class='error'>Kích thước ảnh không vượt quá 2MB!</span>";
                        return $alert;
                        
                    }else if(in_array($file_ext, $permited)===false){
                        $alert = "<span class='error'>Bạn chỉ có thể up những file:-".implode(', ', $permited)."</span>";
                        return $alert;   
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_slider(sliderName, type, slider_image) VALUES('$sliderName', '$type', '$unique_image')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert="<span class='success'>Thêm slider thành công</span>";
                        return $alert;
                    }else{
                        $alert="<span class='error'>Thêm slider không thành công</span>";
                        return $alert;
                    }
                }
                
            }
         }
        public function show_slider(){
            $query= "SELECT * FROM tbl_slider where type='1' order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function showall_slider(){
            $query= "SELECT * FROM tbl_slider order by sliderId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_type_slider($id,$type){
            $type= mysqli_real_escape_string($this->db->link, $type);
 
            $query= "UPDATE tbl_slider SET type='$type' where sliderId='$id'";
            $result = $this->db->update($query);
            return $result;
        }
        public function del_slider($id){
            $query = "DELETE FROM tbl_slider where sliderId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert="<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        public function show_product(){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_publishing.publishingName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId= tbl_category.catId
            INNER JOIN tbl_publishing ON tbl_product.publishingId= tbl_publishing.publishingId
              order by tbl_product.productId desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            
            $productName= mysqli_real_escape_string($this->db->link, $data['productName']);
            $category= mysqli_real_escape_string($this->db->link, $data['category']);
            $publishing= mysqli_real_escape_string($this->db->link, $data['publishing']);
            $product_desc= mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $author= mysqli_real_escape_string($this->db->link, $data['author']);
            $price= mysqli_real_escape_string($this->db->link, $data['price']);
            $type= mysqli_real_escape_string($this->db->link, $data['type']);
            
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào foder uploads
            $permited = array('jpn', 'jpeg', 'png','gif', 'jpg');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

             if($productName =="" ||$category =="" ||$publishing =="" ||$product_desc ==""||$type=="" ||$price =="" ||$author=="" ){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                //nếu người dùng chọn ảnh
                if(!empty($file_name)){
                    if($file_size>2048000){
                        $alert = "<span class='error'>Kích thước ảnh không vượt quá 2MB!</span>";
                        return $alert;
                        
                    }else if(in_array($file_ext, $permited)===false){
                        $alert = "<span class='error'>Bạn chỉ có thể up những file:-".implode(', ', $permited)."</span>";
                        return $alert;   
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product set
                    productName = '$productName', 
                    catId = '$category', 
                    publishingId = '$publishing', 
                    product_desc = '$product_desc', 
                    price = '$price', 
                    type = '$type', 
                    image = '$unique_image'
                    where productId ='$id'";
                }else{
                // nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product set
                
                productName = '$productName', 
                    catId = '$category', 
                    publishingId = '$publishing', 
                    product_desc = '$product_desc', 
                    author='$author',
                    price = '$price', 
                    type = '$type'
                    where productId ='$id'";
                }
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
        public function del_product($id){
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert="<span class='success'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Xóa không thành công</span>";
                return $alert;
            }
        }
        //end backend
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '1'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_new(){
            $sp_tungtrang=4;
            if(!isset($_GET['trang'])){
                $trang=1;
            }else{
                $trang=$_GET['trang'];
            }
            $tungtrang=($trang-1)*$sp_tungtrang;
            $query = "SELECT * FROM tbl_product order by productId desc limit $tungtrang,$sp_tungtrang";
            $result = $this->db->select($query);
            return $result;
        }
        public function getproduct_book(){
            $sp_tungtrang=12;
            if(!isset($_GET['trang'])){
                $trang=1;
            }else{
                $trang=$_GET['trang'];
            }
            $tungtrang=($trang-1)*$sp_tungtrang;
            $query = "SELECT * FROM tbl_product order by productId desc limit $tungtrang,$sp_tungtrang";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_all_product(){
            $query = "SELECT * FROM tbl_product  ";
            $result = $this->db->select($query);
            return $result;
        }
        public function get_detail($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_publishing.publishingName 
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId= tbl_category.catId
            INNER JOIN tbl_publishing ON tbl_product.publishingId= tbl_publishing.publishingId
            where tbl_product.productId='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        
       public function getLastestKD(){
        $query = "SELECT * FROM tbl_product Where publishingId='9' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestVH(){
        $query = "SELECT * FROM tbl_product Where publishingId='1' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestTD(){
        $query = "SELECT * FROM tbl_product Where publishingId='6' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function getLastestBL(){
        $query = "SELECT * FROM tbl_product Where publishingId='11' order by productId desc LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
       }
       public function insertWlishlist($productid,$customer_id){
            $productid = $this->fm->validation($productid);
            $customer_id= mysqli_real_escape_string($this->db->link, $customer_id);
            

            $check_wlist="SELECT * FROM tbl_wishlist where productId ='$productid' and customer_id='$customer_id'";
            $result_check_wlist=$this->db->select($check_wlist);
            
            if($result_check_wlist){
                $msg="<span class='error'>Sách đã được thêm vào mục yêu thích</span>";
                return $msg;
            }else{

                $query= "SELECT * FROM tbl_product where productId ='$productid'";
                $result = $this->db->select($query)->fetch_assoc();

                $productName =$result['productName'];
                $price=$result['price'];
                $image=$result['image'];
                    $query_insert = "INSERT INTO tbl_wishlist(productId, price, image, customer_id, productName ) VALUES('$productid', '$price', '$image','$customer_id','$productName')";
                    $insert_wlist = $this->db->insert($query_insert);
                    if($insert_wlist){
                        $alert="<span class='success'>Thêm thành công</span>";
                        return $alert;
                    }else{
                        $alert="<span class='error'>Thêm không thành công</span>";
                        return $alert;
                }
            }

       }
       public function get_withlist($customer_id){
        $query = "SELECT * FROM tbl_wishlist Where customer_id='$customer_id' order by id desc  ";
        $result = $this->db->select($query);
        return $result;
       }
       public function del_book_wishlist($proid,$customer_id){
        $query = "DELETE FROM tbl_wishlist where productId = '$proid' and customer_id='$customer_id'";
        $result = $this->db->delete($query);
        return $result;
       }
       public function search_book($tukhoa){
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_product Where productName like '%$tukhoa%'";
            $result = $this->db->select($query);
            return $result;
       }

    }
    
?>
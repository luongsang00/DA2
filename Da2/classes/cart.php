<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantily,$id){
            $quantily = $this->fm->validation($quantily);
            $quantily= mysqli_real_escape_string($this->db->link, $quantily);
            $id= mysqli_real_escape_string($this->db->link, $id);
            $sId= session_id();

            // $check_cart="SELECT * FROM tbl_cart where productId ='$id' and sId='$sId'";
            // if($check_cart){
            //     $msg="Sách đã được thêm vào giỏ hàng";
            //     return $msg;
            // }else{

            $query= "SELECT * FROM tbl_product where productId ='$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $image =$result['image'];
            $price=$result['price'];
            $productName=$result['productName'];
                $query_insert = "INSERT INTO tbl_cart(productId, quantily, sId, image, price, productName ) VALUES('$id', '$quantily', '$sId','$image','$price','$productName')";
                $insert_cart = $this->db->insert($query_insert);
                if($result){
                    header('location:cart.php');
                }else{
                    header('location:404.php');
                }
            //}
        }
        public function get_product_cart(){
            $sId= session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantily_Cart($quantily,$cartId){
            $quantily= mysqli_real_escape_string($this->db->link, $quantily);
            $cartId= mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE tbl_cart set
            quantily = '$quantily'
            where cartId ='$cartId'";
            $result = $this->db->update($query);
            if($result){
                header('location:cart.php');
            }else{
                $msg="<span style='color:red; font-size:18 px'>Cập nhật không thành công</span>";
                return $msg;
            }
            
        }
        public function del_book_cart($cartid){
            $cartid= mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('location:cart.php');
                
            }else{
                $msg="<span style='color:red; font-size:18 px'>Xóa không thành công</span>";
                return $msg;
            }

        }
        public function check_cart(){
            $sId= session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function check_order($customer_id){
            $sId= session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id ='$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function dell_all_data_cart(){
            $sId= session_id();
            $query = "DELETE  FROM tbl_cart WHERE sId ='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertOrder($customer_id){
            $sId= session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result=$get_product->fetch_assoc()){
                    $productid=$result['productId'];
                    $productName=$result['productName'];
                    $quantily=$result['quantily'];
                    $customer_id=$customer_id;
                    $price=$result['price'] * $quantily;
                    $image=$result['image'];
                    $query_insert = "INSERT INTO tbl_order(productId, productName, quantily, customer_id, price, image ) VALUES('$productid', '$productName', '$quantily','$customer_id','$price','$image')";
                    $insert_order = $this->db->insert($query_insert);
                    // if($result){
                    //     header('location:cart.php');
                    // }else{
                    //     header('location:404.php');
                    // }
                }

            }
        }
        public function getAmountPrice($customer_id){
            
            $query = "SELECT price FROM tbl_order WHERE customer_id ='$customer_id' ";
            $get_price = $this->db->select($query);
            return $get_price;

        }
        public function get_cart_ordered($customer_id)
        {
            $query = "SELECT * FROM tbl_order WHERE customer_id ='$customer_id' ";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }
        public function get_inbox_cart(){
            $query = "SELECT * FROM tbl_order order by date_order ";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }
        public function shifted($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link, $id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            
            $query = "UPDATE tbl_order set
            status = '1'
            where id ='$id'and date_order='$time' and price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg="<span class='success'>Cập nhật thành công</span>";
                return $msg;
            }else{
                $msg="<span erorr'>Cập nhật không thành công</span>";
                return $msg;
            }
        }
        public function del_shifted($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link, $id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);

            $query = "DELETE FROM tbl_order 
            where id ='$id'and date_order='$time' and price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg="<span class='success'>Xóa thành công</span>";
                return $msg;
            }else{
                $msg="<span erorr'>Xóa không thành công</span>";
                return $msg;
            }
        }
        public function shifted_confirm($id,$time,$price){
            $id= mysqli_real_escape_string($this->db->link, $id);
            $time= mysqli_real_escape_string($this->db->link, $time);
            $price= mysqli_real_escape_string($this->db->link, $price);
            
            $query = "UPDATE tbl_order set
            status = '2'
            where customer_id ='$id'and date_order='$time' and price ='$price'";
            $result = $this->db->update($query);
            return $result;
            
        }
    }
    
?>
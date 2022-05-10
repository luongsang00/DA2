<?php
$filepath= realpath(dirname(__FILE__));

include_once($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>

<?php
    class customer
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
		
        public function insert_coment(){
            $product_id=$_POST['product_id_binhluan'];
            $tenbinhluan=$_POST['tennguoibinhluan'];
            $binhluan=$_POST['binhluan'];
            // echo $binhluan;
            // echo $tenbinhluan;
            if($tenbinhluan==""||$binhluan==""){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_comment(commentName, comment,product_id) VALUES('$tenbinhluan', '$binhluan', '$product_id')";
                $result = $this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Bình luận thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Bình luận không thành công</span>";
                    return $alert;
                }
            }
        }
        public function get_all_comment(){
            $product_id=$_POST['product_id_binhluan'];
            $query = "SELECT * FROM tbl_comment where product_id= '$product_id' ";
            $result = $this->db->select($query);
            return $result;
        }
        public function insert_customer($data){
            $name= mysqli_real_escape_string($this->db->link, $data['name']);
            $city= mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode= mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email= mysqli_real_escape_string($this->db->link, $data['email']);
            $address= mysqli_real_escape_string($this->db->link, $data['address']);
            $country= mysqli_real_escape_string($this->db->link, $data['country']);
            $phone= mysqli_real_escape_string($this->db->link, $data['phone']);
            $password= mysqli_real_escape_string($this->db->link, md5($data['password']));
            
            if($name =="" ||$city =="" ||$zipcode =="" ||$email ==""||$address=="" ||$country =="" ||$phone==""||$password==""){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                $check_email ="SELECT * FROM    tbl_customer where email = '$email' limit 1 ";
                $result_check=$this->db->select($check_email);
                if($result_check){
                    $alert = "<span class='error'>Email đã được đăng ký! Hãy sử dụng email khác</span>";
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(name, city, zipcode, email, address, country, phone,password) VALUES('$name', '$city', '$zipcode','$email','$address','$country','$phone','$password')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert="<span class='success'>Tạo thành công</span>";
                        return $alert;
                    }else{
                        $alert="<span class='error'>Tạo không thành công</span>";
                        return $alert;
                    }
                }
            }
        }
        public function login_customer($data){
            $email= mysqli_real_escape_string($this->db->link, $data['email']);
            $password= mysqli_real_escape_string($this->db->link, md5($data['password']));
            if($email ==""||$password==""){
                $alert = "<span class='error'>Email và mật khẩu không được rỗng</span>";
                return $alert;
            }else{
                $check_login ="SELECT * FROM    tbl_customer where email = '$email' and password='$password' ";
                $result_check=$this->db->select($check_login);
                if($result_check!=false){
                    $value=$result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('location:products.php');
                    
                }else{
                    $alert = "<span class='error'>Email hoặc mật khẩu không đúng</span>";
                    return $alert;
                }
            }
        }
        public function show_customer($id){
            $querry ="SELECT * FROM tbl_customer where id = '$id' ";
            $result=$this->db->select($querry);
            return $result;
                
        }
        public function update_customer($data,$id){
            $name= mysqli_real_escape_string($this->db->link, $data['name']);
            $zipcode= mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email= mysqli_real_escape_string($this->db->link, $data['email']);
            $address= mysqli_real_escape_string($this->db->link, $data['address']);
            $phone= mysqli_real_escape_string($this->db->link, $data['phone']);
            
            if($name =="" ||$zipcode =="" ||$email ==""||$address==""  ||$phone==""){
                $alert = "<span class='error'>Các trường không được rỗng</span>";
                return $alert;
            }else{
                
                $query = "UPDATE tbl_customer SET name='$name', zipcode='$zipcode', email='$email', address='$address', phone='$phone' where id='$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert="<span class='success'>Cập nhật thành công</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Cập nhật không thành công</span>";
                    return $alert;
                }
                
            }
        }
        
    }
    
?>
<style>
    .success{
	font-size: 18px;
	color: green;
    }
    .error{
        font-size: 18px;
        color: red;
    }
</style>
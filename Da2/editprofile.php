<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
  	$login_check=Session::get('customer_login');
      if($login_check==false){
        header('location:login.php');
	  }
?>
<?php
	// if(!isset($_GET['proid']) || $_GET['proid']==null){
	// 	echo "<script>window.location='404.php'</script>";
	// }else{
	// $id=$_GET['proid'];
	// }
    $id = Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])){
		
		$updateCustomer = $cs->update_customer($_POST,$id);
	}

?>

 <div class="main">
    <div class="content">
    <div class="content_top">
    		<div class="heading">
    		<h3>Chỉnh sửa thông tin tài khoản</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
			<form action="" method="post">
            <table class="tblone" >
               <tr>
                   
                    <?php 
                    if(isset($updateCustomer)){
                        echo '<td colspan="3">'.$updateCustomer.'</td>';
                    }
                    ?>
                      
                   
               </tr>
                <?php
                $id = Session::get('customer_id');
                $get_customer=$cs->show_customer($id);
                if($get_customer){
                    while($result=$get_customer->fetch_assoc()){
                
                ?>
                <tr>
                    <td>Tên</td>
                    <td>:</td>
                    <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
                </tr>
                <!-- <tr>
                    <td>Tỉnh/Thành phố</td>
                    <td>:</td>
                    <td><input type="text" name="city" value="<?php echo $result['city'] ?>"></td>
                    
                </tr> -->
                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><input type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
                </tr>
                <!-- <tr>
                    <td>Quốc gia</td
                    <td>:</td>
                    <td><?php echo $result['country'] ?></td>
                </tr> -->
                <tr>
                    <td>Mã bưu điện</td>
                    <td>:</td>
                    <td><input type="text" name="zipcode" value="<?php echo $result['zipcode'] ?>"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="text" name="email" value="<?php echo $result['email'] ?>"></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Lưu"></td>
                </tr>
                <?php
                }
            }
            ?>

            </table>
            </form>
 		</div>
 	</div>
</div>
<?php
include 'inc/footer.php';

?>
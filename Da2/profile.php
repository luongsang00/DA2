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
	// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
	// 	$quantily=$_POST['quantily'];
	// 	$AddtoCart= $ct->add_to_cart($quantily,$id);
	// }

?>

 <div class="main">
    <div class="content">
    <div class="content_top">
    		<div class="heading">
    		<h3>Thông tin tài khoản</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
			
            <table class="tblone">
                <?php
                $id = Session::get('customer_id');
                $get_customer=$cs->show_customer($id);
                if($get_customer){
                    while($result=$get_customer->fetch_assoc()){
                
                ?>
                <tr>
                    <td>Tên</td>
                    <td>:</td>
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Tỉnh/Thành phố</td>
                    <td>:</td>
                    <td><?php echo $result['city'] ?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td>:</td>
                    <td><?php echo $result['phone'] ?></td>
                </tr>
                <!-- <tr>
                    <td>Quốc gia</td>
                    <td>:</td>
                    <td><?php echo $result['country'] ?></td>
                </tr> -->
                <tr>
                    <td>Mã bưu điện</td>
                    <td>:</td>
                    <td><?php echo $result['zipcode'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>:</td>
                    <td><?php echo $result['address'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">Chỉnh sửa</a></td>
                </tr>
                <?php
                }
            }
            ?>

            </table>
 		</div>
 	</div>
</div>
<?php
include 'inc/footer.php';

?>
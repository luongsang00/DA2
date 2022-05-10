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
    		<h3>Phương thức thanh toán</h3>
    	</div>
        
    	<div class="clear"></div>
        <div class="wrapper_method">
            <h3 class="payment">Chọn phương thức thanh toán</h3>
            <a  href="offlinepayment.php">Trực tiếp</a>
            <a  href="onlinepayment.php">Chuyển khoản</a><br><br>
            <a style="background: grey;" href="cart.php">Trở lại giỏ hàng</a>
        </div>
        
    </div>
    	
            
 		</div>
 	</div>
</div>
<?php
include 'inc/footer.php';

?>
<style>
    .payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
        color:violet;
    }
    .wrapper_method{
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .wrapper_method a{
        padding:5px;
        background:darksalmon;
        color:white;
    }
    .wrapper_method h3{
        margin-bottom: 20px;
    }

</style>
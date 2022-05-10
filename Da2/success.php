<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$inserOrder= $ct->insertOrder($customer_id);
		$del_cart=$ct->dell_all_data_cart();
		header('location:success.php');
	}
	// if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
	// 	$quantily=$_POST['quantily'];
	// 	$AddtoCart= $ct->add_to_cart($quantily,$id);
	// }

?>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
            <h3 class="success">Đặt sách thành công</h3>
			<?php
			$customer_id = Session::get('customer_id');
			$get_amount=$ct->getAmountPrice($customer_id);
			if($get_amount){
				$amount=0;
				while($result=$get_amount->fetch_assoc()){
					$price=$result['price'];
					$amount+=$price;
				}
			}
			?>
			<p class="order">Số tiền bạn đã mua sách ở website: <?php echo $fm->format_currency( $amount) ?> VND</p>
			<p class="order">Chúng tôi sẽ liên lạc với bạn sớm nhất có thể. Xem lại đơn hàng  <a href="orderdetails.php">tại đây</a></p>
        
 		</div>
 	</div>
     
	 
</div>
</form>
<?php
include 'inc/footer.php';

?>
<style type="text/css">
    .success{
        text-align: center;
        color:green;
    }
	.order{
		text-align: center;
		padding: 8px;
		font-size: 18px;
	}
</style>
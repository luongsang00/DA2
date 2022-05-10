<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	if(isset($_GET['cartid']) ){
		$cartid=$_GET['cartid'];
		$delBook= $ct->del_book_cart($cartid);
	}
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		$cartId = $_POST['cartId'];	
		$quantily=$_POST['quantily'];
		$update_quantily_Cart= $ct->update_quantily_Cart($quantily,$cartId);
		if($quantily<=0){
			$delBook= $ct->del_book_cart($cartId);
		
		}
	}
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0; url=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage"> 
			    	<h2>Giỏ hàng của bạn</h2>
					<?php
					if(isset($update_quantily_Cart)){
						echo $update_quantily_Cart;
					}
					?>
					<?php
					if(isset($delBook)){
						echo $delBook;
					}
					?>
						<table class="tblone">
							<tr>
								<th width="20%">Tên sách</th>
								<th width="10%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Xóa</th>
							</tr>
							<?php
							$get_product_cart= $ct->get_product_cart();
							if($get_product_cart){
								$subtotal=0;
								$qty=0;
								while($result = $get_product_cart->fetch_assoc()){
									
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency( $result['price']).' '."VND" ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId"  value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantily" min="0" value="<?php echo $result['quantily'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>
									<?php
									$total=$result['price']*$result['quantily'];
									echo $fm->format_currency( $total)." "."VND";
									?>
								</td>
								<td><a onclick="return confirm('Bạn có chắc muốn xóa <?php echo $result['productName'] ?>?');" href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
							<?php
							$subtotal+= $total;
							$qty=$qty+$result['quantily'];
								}
							}?>
							
							
						</table>
						<?php
							$check_cart = $ct->check_cart();
								if($check_cart){
									
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng giá : </th>
								<td>
									<?php
									
									echo $fm->format_currency( $subtotal)." "."VND";
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
									?>
								</td>
							</tr>
							<!-- <tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>
									<?php
									$vat=$subtotal*0.1;
									$gtotal=$subtotal+$vat;
									echo $gtotal;
									?>
								</td> -->
							</tr>
					   </table>
					   <?php 
					   }else{
						   echo "Giỏ hàng trống! Hãy mua sách ngay";
					   }
					   ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';

?>

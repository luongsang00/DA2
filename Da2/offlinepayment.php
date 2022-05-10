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
        <div class="heading">
    	</div>
        
    	<div class="clear"></div>
        <div class="box_left">
        <div class=""> 
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
                                <th width="5%">Stt</th>
								<th width="15%">Tên sách</th>
								<!-- <th width="10%">Hình ảnh</th> -->
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<!-- <th width="10%">Xóa</th> -->
							</tr>
							<?php
							$get_product_cart= $ct->get_product_cart();
							if($get_product_cart){
								$subtotal=0;
								$qty=0;
                                $i=0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
							<tr>
                                <td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<!-- <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td> -->
								<td><?php echo $fm->format_currency( $result['price']) ?></td>
								<td>
									
                                <?php echo $result['quantily'] ?>
										
								</td>
								<td>
									<?php
									$total=$result['price']*$result['quantily'];
									echo $fm->format_currency( $total)." "."VND";
									?>
								</td>
								<!-- <td><a href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td> -->
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
						<table style="float:right;text-align:left;margin: 5px;" width="40%">
                            
							<tr>
								<th>Tổng giá : </th>
								<td>
									<?php
									
									echo $subtotal." "."VND";
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
        </div>
        <div class="box_right"><table class="tblone">
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
     <div class="button"><a href="?orderid=order" class="submit_order">Mua sách</a></div><br>
	 
</div>
</form>
<?php
include 'inc/footer.php';

?>
<style type="text/css">
    .box_left{
        width: 46%;
        border: 1px solid #666;
        float: left;
        padding: 5px;
    }
    .box_right{
        width: 46%;
        border: 1px solid #666;
        float:right;
        padding: 5px;
    }
    .submit_order{
        padding: 10px 70px;
        border: none;
        background: green;
        font-size: 25px;
        color:white;
        display: inline-block;
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
		border-bottom-left-radius: 3px;
		border-bottom-right-radius: 3px;
		cursor: pointer;
        
    }
    .button{
        text-align: center;
    }
</style>
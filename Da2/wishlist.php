<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
   
    if(isset($_GET['proid']) ){
        $customer_id=Session::get('customer_id');
        $proid=$_GET['proid'];
        $del_wlist= $product->del_book_wishlist($proid,$customer_id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage"> 
			    	<h2>Sản phẩm yêu thích</h2>
						<table class="tblone">
							<tr>
                                <th width="10%">Stt</th>
								<th width="30%">Tên sách</th>
								<th width="20%">Hình ảnh</th>
								<th width="30%">Giá</th>
								<th width="10%">Xóa</th>
							</tr>
							<?php
                            $customer_id=Session::get('customer_id');
							$get_wlist= $product->get_withlist($customer_id);
							if($get_wlist){
                                    $i=0;
								while($result = $get_wlist->fetch_assoc()){
									$i++;
							?>
							<tr>
                                <td><?php echo $i ?></php></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" width="120px" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								
								
								<td>
                                    <a href="detals.php?proid=<?php echo $result['productId'] ?>">Mua</a> ||
                                    <a href="?proid=<?php echo $result['productId'] ?>">Xóa</a> 
                                    
                                </td>
							</tr>
							<?php
							
								}
							}?>
							
							
						</table>
						
						
					  
					   
					</div>
					<!-- <div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						
					</div> -->
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
	include 'inc/footer.php';

?>

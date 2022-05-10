<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['proid']) || $_GET['proid']==null){
		 echo "<script>window.location='404.php'</script>";
	}else{
	$id=$_GET['proid'];
	}
	$customer_id=Session::get('customer_id');
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['withlist'])){
		
		$productid=$_POST['productid'];
		$insert_wlist= $product->insertWlishlist($productid,$customer_id);
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		
		$quantily=$_POST['quantily'];
		$insert_cart= $ct->add_to_cart($quantily,$id);
	}
	if(isset($_POST['binhluan_submit']))
	{
		$binhluan=$cs->insert_coment();
		
		
	}

?>

 <div class="main">
    <div class="content">
    	<div class="section group">
			<?php
			$get_product_detail=$product->get_detail($id);
			if($get_product_detail){
				while($result_detail=$get_product_detail->fetch_assoc()){

				

			?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_detail['image'] ?>" alt="" />
					</div>
					<div class="desc span_3_of_2">
						<h2><?php echo $result_detail['productName'] ?></h2>
						<!-- <p><?php echo $fm->textShorten( $result_detail['product_desc'],200) ?></p>					 -->
						<div class="price">
							<p>Giá: <span><?php echo $fm->format_currency( $result_detail['price'])." "."VND" ?></span></p>
							<p>Thể loại: <span><?php echo $result_detail['catName'] ?></span></p>
							<p>NXB:<span><?php echo $result_detail['publishingName'] ?></span></p>
						</div>
						<div class="add-cart">
							<form action="" method="post">
								<!-- <input type="number" class="buyfield" name="quantily" value="1" min="1"/> -->
								<!-- <input type="submit" class="buysubmit" name="submit" value="Mua sách"/> -->
							</form>	
							<!-- <?php
							if(isset($AddtoCart)){
								echo '<span style="color:red; font-size:18 px">Sản phẩm đã được thêm vào giỏ hàng</span>';
							}
							?>			 -->
						</div>
						
						<div class="add-cart">
							<form action="" method="POST">
								<input type="number" class="buyfield" name="quantily" value="1" min="1"/>
								<input type="submit" class="buysubmit" name="submit" value="Mua sách"/>
								<?php
								if(isset($AddtoCart)){
									echo '<span style="color:red; font-size:18 px">Sản phẩm đã được thêm vào giỏ hàng</span>';
								}
								?>		
								<!-- <a class="buysubmit" href="?wlist=<?php echo $result_detail['productId'] ?>">Thêm vào sách yêu thích</a> -->
								<input type="hidden" name="productid" value="<?php echo $result_detail['productId'] ?>"/>	
								<?php 
								$customer_id=Session::get('customer_id');
								if($customer_id)
								{
								?>
								<input type="submit" class="buysubmit" name="withlist" value="Sách yêu thích"/>
								<?php
								}?>
								<?php 
								if(isset($insert_wlist)){
									echo $insert_wlist;
								}
								?>
							</form>
						</div>
					</div>
					<div class="product-desc">
						<h2>CHI TIẾT SÁCH</h2>
						<p><?php echo $result_detail['product_desc']?></p>
					</div>

					
				
				</div>
				<?php
				}
			}?>
				<div class="rightsidebar span_3_of_1">
					<h2>Thể Loại Sách</h2>
					<?php 
					$getall_category=$cat->show_category_frontend();
					if($getall_category){
						while($result_allcat=$getall_category->fetch_assoc()){		
					?>
					<ul>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
				      <?php
					  }
					}?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	 <!-- <div class="binhluan">
		<div class="row">
			<div class="col-md-8">
				<h5>Ý kiến sản phẩm</h5>
				<?php
				if(isset($binhluan)){
					echo $binhluan;
				}?>
				<form action="" method="post">
				<p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
				<p><input type="text" class="form-control" name="tennguoibinhluan" placeholder="Tên người bình luận"></p>
				<p><textarea rows="5" style="resize: none;" class="form-control" name="binhluan" placeholder="Bình luận"></textarea></p>
				<p><input type="submit" class="btn btn-success" value="Gửi bình luận" name="binhluan_submit" ></p>
				</form>
			</div>
		</div>
	 </div>
	 <div>
		 <?php
		 $get_all_comment=$cs->get_all_comment();
		 if($get_all_comment){
			 while($result_comment=$get_all_comment->fetch_assoc()){
		 ?>
		 	<p><?php echo $result_comment['commnetName'] ?></p>
			 <p><?php echo $result_comment['commne'] ?></p>
		 <?php }}?>
	 </div> -->
</div>
<?php
include 'inc/footer.php';

?>
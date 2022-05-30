<?php
	include 'inc/header.php';
	include 'inc/slider.php';

?>

 <div class="main">
	 
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sách nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			  $product_feathered=$product->getproduct_feathered();
			  if($product_feathered){
				  while($result=$product_feathered->fetch_assoc()){
			  ?>
				<!-- <div class="grid_1_of_4 images_1_of_4">
					 <a href="detals.php?proid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php $fm->textShorten($result['productName'],50) ?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50)  ?></p>
					 <p><span class="price"><?php echo $fm->format_currency( $result['price']).' '.'VND' ?></span></p>
					 <p><span class="author">Tác giả: <?php echo $result['author'] ?></span></p>
				     <div class="button"><span><a href="detals.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết sách</a></span></div>
				</div> -->
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>  "  height="200px" alt="" /></a>
					 <h2><?php echo $fm->textShorten( $result['productName'],50 )?> </h2>
					 <p ><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency( $result['price'])." "."VND" ?></span></p>
					 <p><span class="author"> <?php echo $result['author'] ?></span></p>
				     <div class="button"><span><a href="detals.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết Sách</a></span></div>
				</div>
				<?php
			  }
			}
			  ?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sách mới </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			  <?php
			  $product_new=$product->getproduct_new();
			  if($product_new){
				  while($result=$product_new->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="detals.php?proid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $fm->textShorten( $result['productName'],50 )?> </h2>
					 <p ><?php echo $fm->textShorten($result['product_desc'],50)  ?></p>
					 <p><span class="price"><?php echo $fm->format_currency( $result['price']).' '.'VND' ?></span></p>
					 <p ><span class="author"> <?php echo $result['author'] ?></span></p>
				     <div class="button"><span><a href="detals.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết sách</a></span></div>
				</div>
				<?php
			  }
			}
			  ?>
				
			</div>
			<div class="">
				<?php
				$product_all=$product->get_all_product();
				$product_count= mysqli_num_rows($product_all);
				$product_button = $product_count/4;
				$i=0;
				echo '<p>Trang: </p>';
				for($i=1;$i<=$product_button;$i++){
					echo '<a style="margin:0 5px" href="index.php?trang='.$i.'">'.$i.'</a>';
				}
				?>
			</div>
			
    </div>
 </div>

 <?php
	include 'inc/footer.php';

?>
<style>
	/* span.author {
    font-size: 9px;
}  */

</style>
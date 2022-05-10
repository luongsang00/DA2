
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				
					$getLastestKD=$product->getLastestKD();
					if($getLastestKD){
						while($resultKD=$getLastestKD->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="detals.php?proid=<?php echo $resultKD['productId']?>"> <img src="admin/uploads/<?php echo $resultKD['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>NXB Kim Đồng</h2>
						<p><?php echo $resultKD['productName'] ?></p>
						<div class="button"><span><a href="detals.php?proid=<?php echo $resultKD['productId'] ?>">Mua Sách</a></span></div>
				   </div>
			   </div>	
			   <?php
					}
				}
				?>	
				<?php
				
				$getLastestVH=$product->getLastestVH();
				if($getLastestVH){
					while($resultVH=$getLastestVH->fetch_assoc()){

				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
					<a href="detals.php?proid=<?php echo $resultVH['productId']?>"> <img src="admin/uploads/<?php echo $resultVH['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>NXB Văn Học</h2>
						  <p><?php echo $resultVH['productName'] ?></p>
						  <div class="button"><span><a href="detals.php?proid=<?php echo $resultVH['productId'] ?>">Mua Sách</a></span></div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
			<div class="section group">
				<?php
				
				$getLastestTD=$product->getLastestTD();
				if($getLastestTD){
					while($resultTD=$getLastestTD->fetch_assoc()){

				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detals.php?proid=<?php echo $resultTD['productId']?>"> <img src="admin/uploads/<?php echo $resultTD['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>NXB Thời Đại</h2>
						<p><?php echo $resultTD['productName'] ?></p>
						<div class="button"><span><a href="detals.php?proid=<?php echo $resultTD['productId'] ?>">Mua Sách</a></span></div>
				   </div>
			   </div>	
			   <?php
					}
				}
				?>	
				<?php
				
				$getLastestBL=$product->getLastestBL();
				if($getLastestBL){
					while($resultBL=$getLastestBL->fetch_assoc()){

				?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						<a href="detals.php?proid=<?php echo $resultBL['productId']?>"> <img src="admin/uploads/<?php echo $resultBL['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Bloombury</h2>
						  <p><?php echo $resultBL['productName'] ?></p>
						  <div class="button"><span><a href="detals.php?proid=<?php echo $resultBL['productId'] ?>">Mua Sách</a></span></div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
						$get_slider = $product->show_slider();
						if($get_slider){
							while($resuilt_slider=$get_slider->fetch_assoc()){
						?>
						<li><img src="admin/uploads/<?php echo $resuilt_slider['slider_image']?>" alt="<?php echo $resuilt_slider['sliderName']?>"/></li>
						<?php
						}
					}
					?>
						
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>
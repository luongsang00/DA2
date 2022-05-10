<?php
	include 'inc/header.php';
	include 'inc/slider.php';

?>

 <div class="main">
	 
    <div class="content">
    	<div class="content_top">
    		
    		<div class="clear"></div>
    	</div>
	      
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sách </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
		<div class="section group">
			  <?php
			  $product_new=$product->getproduct_book();
			  if($product_new){
				  while($result=$product_new->fetch_assoc()){
			  ?>
				<div class="grid_1_of_41 images_1_of_41">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>  "  height="200px" alt="" /></a>
					 <h2><?php echo $fm->textShorten( $result['productName'],30 )?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],30) ?></p>
					 <p><span class="price"><?php echo $fm->format_currency( $result['price'])." "."VND" ?></span></p>
                     <p><span class="author">Tác giả: <?php echo $result['author'] ?></span></p>
				     <div class="button"><span><a href="detals.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết Sách</a></span></div>
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
				$product_button = $product_count/12;
				$i=0;
				echo '<p>Trang: </p>';
				for($i=1;$i<=$product_button;$i++){
					echo '<a style="margin:0 5px" href="products.php?trang='.$i.'">'.$i.'</a>';
				}
				?>
			</div>
			
    </div>
 </div>

 <?php
	include 'inc/footer.php';

?>
<style>
	span.author {
    font-size: 9px;
	
	}
	.grid_1_of_41{
	display: block;
	float:left;
	margin: 1% 0 1% 1%;
	box-shadow: 0px 0px 3px rgb(150, 150, 150);
    }
     
    .images_1_of_41 {
        width: 20.8%;
        padding:1.5%;
        text-align:center;
        position:relative; 
    }
    .images_1_of_41  img{
        max-width:100%;
    }
    .images_1_of_41 .button {
    float: left;
    line-height: 1.9em;
    margin-top: 0.3em;
    width: 100%;
    }
    .images_1_of_41 .button a{
            padding:7px 20px;
            font-size:0.8em;
    }
    .images_1_of_41 .button a{
        font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
        font-size: 14px;
        line-height: 15px;
        text-transform: none;
        color: #737370;
        text-decoration: none!important;
        background: url(../images/button-bg.png) repeat-x 0 0 #e1caf3;
        display: inline-block;
        border-left: 1px solid #D4D4D4!important;
        border-right: 1px solid #ADADAD!important;
        border-top: 1px solid #E0E0E0!important;
        border-bottom: 1px solid #9C9C9C!important;
        cursor: pointer!important;
        margin: 0 2px;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
    }
    .images_1_of_41 .button a:hover{
        color:#70389C;
        background: #E8E8E8;
    }
    .images_1_of_41 .button span img{
        position:absolute;
    }
    .images_1_of_41 .button a.cart-button{
        padding:7px 5px 7px 38px; 
    }
</style>
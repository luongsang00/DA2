</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Menu</h4>
						<ul>
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="products.php">Sách</a></li>
						<?php 
							$check_cart = $ct->check_cart();
								if($check_cart==true){
									echo '<li><a href="cart.php">Giỏ hàng</a></li>';
								}else{
									echo '';
								}
						?>

						
						<?php 
						$login_check=Session::get('customer_login');
						$check_cart = $ct->check_cart();
							if($check_cart==true){
								echo '<li><a href="offlinepayment.php">Thanh toán</a></li>';
							}else{
								echo '';
							}
						?>
						
						</ul>
					</div>
				
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							
							<li><a href="index.php">Đăng Nhập</a></li>
							<li><?php
								$login_check=Session::get('customer_login');
								if($login_check){		 
									echo '<li><a href="wishlist.php">Sách yêu thích</a> </li>';
								}
							?></li>
							<li><?php 
								$customer_id = Session::get('customer_id');
							$check_order = $ct->check_order($customer_id);
								
								if($check_order==true){
									echo '<li><a href="orderdetails.php">Chi tiết đơn hàng</a></li>';
								}else{
									echo '';
								}
							?></li>
							
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>18520411@gm.uit.edu.vn</span></li>
							<li><span>18520415@gm.uit.edu.vn</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Training with live project &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>

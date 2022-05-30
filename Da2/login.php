<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
 <?php
	$login_check=Session::get('customer_login');
		if($login_check){
		header('location:index.php');
		}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		

		$inserCustomer= $cs->insert_customer($_POST);
	}
?>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
		

		$login_Customer= $cs->login_customer($_POST);
	}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<!-- <p>Sign in with the form below.</p> -->
			<?php
			if(isset($login_Customer)){
				echo $login_Customer;
			}
			?>
        	<form action="" method="POST" >
                	<input  type="text" name="email" class="field" placeholder="Email...">
                    <input  type="password" name="password" class="field" placeholder="Mật khẩu...">
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons"><div><input type="submit" name="login" class="grey" value="Đăng nhập"></input></div></div>
			</form>
         </div>
		<?php

		?>
    	<div class="register_account">
    		<h3>Tạo tài khoản</h3>
			<?php
			if(isset($inserCustomer)){
				echo $inserCustomer;
			}
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input  type="text" name="name" placeholder="Nhập tên..."  >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Thành phố..." >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Mã bưu chính...">
							</div>
							<div>
								<input type="text" name="email" placeholder="Emai...">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ...">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Chọn quốc gia</option>    
							<option value="null">Việt Nam</option>      
							

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Số điện thoại...">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Mật khẩu...">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" name="submit" class="grey" value="Tạo tài khoản"></input></div></div>
		    <!-- <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p> -->
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 include 'inc/footer.php';

?>
<style>
	

</style>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'?>
<?php
$product=new product();
if(isset($_GET['type_slider']) && isset($_GET['type'])){
	$id=$_GET['type_slider'];
	$type=$_GET['type'];
	$update_slider=$product->update_type_slider($id,$type);
}
if(isset($_GET['slider_del']) ){
	$id=$_GET['slider_del'];
	$del_slider=$product->del_slider($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
			<?php 
			if(isset($del_slider)){
				echo $del_slider;
			}
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Stt</th>
					<th>Tên slider</th>
					<th>Ảnh slider</th>
					<th>Ẩn/Hiện</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$product=new product();
				$get_slider = $product->showall_slider();
				if($get_slider){
					$i=0;
					while($resuilt_slider=$get_slider->fetch_assoc()){
						$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $resuilt_slider['sliderName'] ?></td>
					<td><img src="uploads/<?php echo $resuilt_slider['slider_image']?>" height="120px" width="500px"/></td>
					<td>
						<?php 
						if($resuilt_slider['type']==1){
						?>
						<a href="?type_slider=<?php echo $resuilt_slider['sliderId'] ?>&type=0">Tắt</a>
						<?php
						}else{
						?>
						<a href="?type_slider=<?php echo $resuilt_slider['sliderId'] ?>&type=1">Bật</a>
						
						<?php
							
						}?>
					</td>			
				<td>
					<!-- <a href="">Edit</a> ||  -->
					<a href="?slider_del=<?php echo $resuilt_slider['sliderId'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa!');" >Xóa</a> 
				</td>
					</tr>	
					<?php
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

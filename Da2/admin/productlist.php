<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/publishing.php';?>
<?php include_once '../classes/product.php';?>
<?php include_once '../helpers/format.php' ?>
<?php $fm= new Format();
	$pd=new product();
if(isset($_GET['productid']) ){
	$id=$_GET['productid'];
	$delBook= $pd->del_product($id);
   }

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Book List</h2>
        <div class="block">  
			<?php
			if(isset($delBook))
			echo $delBook;
			?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sách</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Thể loại</th>
					<th>Nhà xuất bản </th>
					<th>Tác giả</th>
					<th>Mô tả</th>
					<th>Loại</th>
					<th>Sửa/Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				
				$pdlist = $pd->show_product();
				if($pdlist){
					$i=0;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $fm->textShorten( $result['productName'],50 )?></td>
					<td><?php echo $result['price'] ?> </td>
					<td><img src="uploads/<?php echo $result['image']?>" width="80"></td>
					<td><?php echo $result['catName'] ?> </td>
					<td><?php echo $result['publishingName'] ?> </td>
					<td><?php echo $result['author'] ?> </td>
					<td><?php echo $fm->textShorten( $result['product_desc'],50 )?> </td>

					<td>
					<?php
                            switch ($result['type'])
                            {
                                case 0:
                                    echo 'Sách không nổi bật';
                                    break;
                                case 1:
                                    echo 'Sách nổi bật';
                                    break;
                                
                            }
                            ?>
						
					</td>

					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit</a> || <a onclick="return confirm('Bạn thật sự muốn xóa?')" href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>
				</tr>
				<?php
					}
				}?>
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

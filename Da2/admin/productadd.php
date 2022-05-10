
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/publishing.php';?>
<?php include_once '../classes/product.php';?>

<?php
	$pd = new product();
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		

		$inserProduct= $pd->insert_product($_POST, $_FILES);
	}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sách</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <?php 
                if(isset($inserProduct))
                echo $inserProduct;
                ?>
               
                <tr>
                    <td>
                        <label>Tên sách</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Nhập tên sách..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thể loại</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>-----Chọn danh mục-----</option>
                            <?php
                            $cat= new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                            
                            ?>


                            <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
                            <?php 
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả sách</label>
                    </td>
                    <td>
                        <textarea name="product_desc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Nhập giá" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Nhà xuất bản</label>
                    </td>
                    <td>
                        <select id="select" name="publishing">
                            <option>-----Chọn NXB-----</option>
                            <?php
                            $publishing= new publishing();
                            $publishinglist = $publishing->show_publishing();
                            if($publishinglist){
                                while($result = $publishinglist->fetch_assoc()){
                            
                            ?>


                            <option value="<?php echo $result['publishingId'] ?>"><?php echo $result['publishingName'] ?></option>
                            <?php 
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tác giả</label>
                    </td>
                    <td>
                        <input type="text" name="author" placeholder="Tác giả..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thuộc tính</label>
                    </td>
				    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Không nổi bật</option>
                            <option value="1">Nổi bật</option>
                            


                        </select>
                    </td>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



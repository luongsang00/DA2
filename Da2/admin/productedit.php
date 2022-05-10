
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/category.php';?>
<?php include_once '../classes/publishing.php';?>
<?php include_once '../classes/product.php';?>

<?php
	$pd = new product();

    if(!isset($_GET['productid']) || $_GET['productid']==null){
        echo "<script>window.location='productlist.php'</script>";
    }else{
     $id=$_GET['productid'];
    }

	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
		

		$updateProduct= $pd->update_product($_POST, $_FILES,$id);
	}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sách</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
            <?php 
                if(isset($updateProduct))
                echo $updateProduct;
                ?>
            <?php
            $get_product_by_id=$pd->getproductbyId($id);
            if($get_product_by_id){
                while($result_product=$get_product_by_id->fetch_assoc()){
            ?>

                <tr>
                    <td>
                        <label>Tên sách</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $result_product['productName']  ?>" class="medium" />
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


                            <option
                            <?php
                            if($result['catId']==$result_product['catId'])
                            {
                                echo 'selected';
                            }
                            ?>
                            value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
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
                        <textarea name="product_desc" class="tinymce" ><?php echo $result_product['product_desc'] ?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price']  ?>" class="medium" />
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


                            <option 
                            <?php
                            if($result['publishingId']==$result_product['publishingId']){echo 'selected';}
                            ?>
                            value="<?php echo $result['publishingId'] ?>"><?php echo $result['publishingName'] ?></option>
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
                        <input type="text" name="author" value="<?php echo $result_product['author']  ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh/label>
                    </td>
                    <td>
                    <img src="uploads/<?php echo $result_product['image']?>" width="120"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thuộc tính</label>
                    </td>
				    <td>
                        <select id="select" name="type">
                            <option>Chọn thuộc tính</option>
                            <?php
                            if ($result_product['type']=0)
                            {?>
                                <option  value="0">Không nổi bật</option>
                                <option selected value="1">Nổi bật</option>
                                
                            <?php
                            }else{?>
                                <option selected value="0">Không nổi bật</option>
                                <option  value="1">Nổi bật</option>
                            <?php
                            }
                            
                            ?>


                        </select>
                    </td>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
            }
        }
            ?>
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



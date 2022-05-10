<?php include 'inc/header.php';?>
<?php include '../classes/publishing.php'?>
<?php include 'inc/sidebar.php';?>
<?php
	$publishing = new publishing();
	if($_SERVER['REQUEST_METHOD']==='POST'){
		$publishingName = $_POST['publishingName'];

		$inserPublishing= $publishing->insert_publishing($publishingName);
	}
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm nhà xuất bản</h2>
               <div class="block copyblock"> 
               <?php 
                if(isset($inserPublishing))
                echo $inserPublishing;
                ?>
                 <form action="publishingadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="publishingName" placeholder="Nhập tên nhà xuất bản..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
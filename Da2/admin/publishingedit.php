<?php include 'inc/header.php';?>
<?php include '../classes/publishing.php';?>
<?php include 'inc/sidebar.php';?>
<?php
	$cat = new publishing();
   if(!isset($_GET['publishingid']) || $_GET['publishingid']==null){
       echo "<script>window.location='publishinglist.php'</script>";
   }else{
    $id=$_GET['publishingid'];
   }
   if($_SERVER['REQUEST_METHOD']==='POST'){
    $publishingName = $_POST['publishingName'];

    $updatePublishing= $cat->update_publishing($publishingName,$id);
}
   


   
	
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa nhà xuất bản</h2>
               <div class="block copyblock"> 
               <?php 
                    if(isset($updatePublishing))
                    echo $updatePublishing;
                ?>
                <?php
                    $get_publishing_name = $cat->getpublishingbyId($id);
                    if($get_publishing_name){
                        while($result = $get_publishing_name->fetch_assoc()){

                        
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['publishingName'] ?>" name="publishingName" placeholder="Sửa danh nhà xuất bản..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php
                }
            }?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
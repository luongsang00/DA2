<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/publishing.php';?>
<?php
	$publishing = new publishing();
	if(isset($_GET['delid']) ){
	 $id=$_GET['delid'];
	 $delPublishing= $publishing->del_publishing($id);
	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Publishing List</h2>
                <div class="block"> 
				<?php 
                    if(isset($delPublishing))
                    echo $delPublishing;
                ?>       
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Publishing Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_publishing = $publishing->show_publishing();
						if($show_publishing){
							$i=0;
							while($result = $show_publishing->fetch_assoc()){
								$i++;
							
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['publishingName'] ?></td>
							<td><a href="publishingedit.php?publishingid=<?php echo $result['publishingId'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['publishingId'] ?>">Delete</a></td>
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


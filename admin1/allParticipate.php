<?php include'inc/header.php'; ?>
<?php
	if (isset($_GET['deleteSupporter']) ) {
        $delid = mysqli_real_escape_string($db->link,$_GET['deleteSupporter']);
   
        $query = "select * from tbl_support where id ='$delid'";
        $getData = $db->select($query);
        if ($getData) {
          while ($delimg = $getData->fetch_assoc()) {
            $dellink = $delimg['image'];
            unlink($dellink);
          }
        }


        $delquery = "DELETE FROM tbl_support WHERE id = '$delid'";
		$deldata = $db->delete($delquery);
		if ($deldata){
          echo "<script>alert('Data Delete successfully.');</script>";
        }else{
           	echo "<script>alert('Data Delete Not successfully.');</script>";
        }
    }
?>
<?php include'inc/sidebar.php'; ?>
<div class="grid_10">
<div class="box round first grid">
<h2>Post List</h2>
<div class="block">  
<table class="data display datatable" id="example">
<thead>
<tr>
	<th>No. </th>
	<th>Name</th>
	<th>Phone</th>
	<th>Email</th>
	<!--<th>Address</th>-->
	<!--<th>Description</th>-->
	<th>Image</th>
	<th>Description</th>
	<!--<th>User Id</th>-->
	<th>Total Vote</th>
	<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$query = "SELECT * FROM tbl_support
	ORDER BY id DESC "; 
	$post = $db->select($query);
	if ($post) {
		$i = 0 ;
		while ($result = $post->fetch_assoc()) {
		$i++;  //$fm->textshorten($result['body'],50 );

	$explode = explode("/", $result['image']);
	if($explode[0] == "admin"){
		$photos = substr($result['image'], 6);
	}else{  $photos = $result['image']; }
?>
<tr class="odd grades">
	<td><?php echo $result['id']; ?></th>
	<td><?php echo $result['name']; ?></td>
	<td><?php echo $result['phone']; ?></td>
	<td><?php echo $result['email']; ?></td>
	<!--<td><?php echo $result['address']; ?></td>-->
	<!--<td><?php echo $fm->textshorten($result['description'],50 ); ?></td>-->
	<td><img src="<?php echo $photos; ?>" height="40px" width="40px" /></td>
	<td><?php echo $result['description']; ?></td>
	<!--<td><?php echo $result['user_login_id']; ?></td>-->
	<td><?php  echo $result['total_vote'];  ?></td>
<td>
	<!-- 	<a href="supporter.php?id=<?php echo $result['id'];?>">View</a>  -->
<?php if (Session::get('userRole') == '1' || Session::get('userRole') == '111' ) {  ?>	
	<!--  <a href="?publication_id=<?php echo $result['id'];?>">Edit Publication Status</a> ||  -->
	 <a onclick="return confirm('Are you sure to Delete this photo ?')" href="?deleteSupporter=<?php echo $result['id'];?>">Delete</a></td>
<?php } ?>
</tr>
<?php } } ?>
</tbody>
</table>

</div>
</div>
</div>
<div class="clear">
</div>
</div>

<script type="text/javascript">
$(document).ready(function () {
setupLeftMenu();
$('.datatable').dataTable();
setSidebarHeight();
});
</script>
<?php include'inc/footer.php'; ?>
<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php
    if (!isset($_GET['viewid']) || $_GET['viewid'] == NULL ) {
       // header("location:catlist.php");
        echo "<script>window.location ='userlist.php'; </script>";
    }else{
        $viewid = mysqli_real_escape_string($db->link,$_GET['viewid']);
    }
?>
<div class="grid_10">
<div class="box round first grid">
<h2>User Details</h2>
<?php
   /* if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $username = mysqli_real_escape_string($db->link,$_POST['username']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $details = mysqli_real_escape_string($db->link,$_POST['details']);
   
 
    if ($name == "" || $username == "" || $email == "" || $details == ""  ) {
       echo "<span class='error'>filed must not be empty .</span>";
}else{
    $query = "   UPDATE tbl_user SET name = '$name', username = '$username', email = '$email', 
    details = '$details' WHERE id ='$userid' ";


        $updateuser = $db->update($query);
        if($updateuser){
            echo "<span style='color:green'>Data Update Successfully</span>";
        }else{
            echo "<span style='color:red'>Data NOt Update Successfully</span>";
        }
}
}
*/
    ?> 
<div class="block">    
<?php 
    $query = "SELECT * FROM tbl_user WHERE id = '$viewid' ";
    $user = $db->select($query);
    if (isset($user)) {
        while ($getresult = $user->fetch_assoc()) {
?>


<form action="userlist.php" method="POST" enctype="">
<table class="form">
   
    <tr>
        <td>
            <label>Name</label>
        </td>
        <td>
            <input type="text" readonly name="name" value="<?php echo $getresult['name']; ?>" class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>User Name</label>
        </td>
        <td>
            <input type="text" readonly name="username" value="<?php echo $getresult['username']; ?>" class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="email" readonly name="email" value="<?php echo $getresult['email']; ?>" class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Details</label>
        </td>
        <td>
            <textarea class="tinymce" readonly name="details">
                <?php echo $getresult['details']; ?>
            </textarea>
        </td>
    </tr>
   <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Ok" />
        </td>
    </tr>
    <?php } } ?>
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

<?php include'inc/footer.php'; ?>

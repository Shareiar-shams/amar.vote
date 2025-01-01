
<?php include'inc/header.php';
    $userid   = Session::get('UserId');
 ?>
<?php include'inc/sidebar.php'; ?>
<?php
    $show_query = "SELECT * FROM tbl_user WHERE id='$userid'";
    $page = $db->select($show_query);
    if($page){
        while ($result = $page->fetch_assoc()) {
            $ps = $result['password'];
        }
    }
?> 
<h2><?php echo $result['name']; ?>
<div class="grid_10">
<div class="box round first grid">
    <h2>Change Password</h2>
    <div class="block">   
<?php 


 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $old        = $fm->validation($_POST['old']);
    $new        = $fm->validation($_POST['new']);
    $again      = $fm->validation($_POST['again']);

    $old        = md5(mysqli_real_escape_string($db->link, $old));
    $new        = md5(mysqli_real_escape_string($db->link, $new));
    $again      = md5(mysqli_real_escape_string($db->link, $again));


    if ($old != $ps) {
        echo "<span style='color:red; '>Password Not Match ...</span>";
    }elseif ($new != $again) {
        echo "<span style='color:red; '>New Password & Confirm password Not Match ...</span>";
    }else{
        $confirm = $new ; 
        $query = "UPDATE tbl_user SET password = '$confirm' WHERE id = '$userid'";
        $Updatequery =  $db->update($query);
        if ($Updatequery) {
           echo "<span style='color:green; '>Password Change Succesfully...</span>";
        }else {
            echo "<span style='color:red; '>Password NOt Change Succesfully...</span>";
        }
    }
}

?>            
     <form action="" method="POST">
        <table class="form">					
            <tr>
                <td>
                    <label>Old Password</label>
                </td>
                <td>
                    <input type="password" placeholder="Enter Old Password..." required name="old" class="medium" />
                </td>
            </tr>
			 <tr>
                <td>
                    <label>New Password</label>
                </td>
                <td>
                    <input type="password" placeholder="Enter New Password..." required name="new" class="medium" />
                </td>
            </tr>
			 <tr>
                <td>
                    <label>Confirm Password</label>
                </td>
                <td>
                    <input type="password" placeholder="Enter Confirm Password..." required name="again" class="medium" />
                </td>
            </tr>
			
			 <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="submit" Value="Update Password" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>
<?php include'inc/footer.php'; ?>

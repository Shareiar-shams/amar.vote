<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php 
    if (!Session::get('userRole') == '111') { 
        header("Location:index.php");
    }
?>
<div class="grid_10">
<div class="box round first grid">
<h2>Add New User</h2>
<div class="block copyblock"> 
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $fm->validation($_POST['username']);
    $password = $fm->validation(md5($_POST['password']));
    $email = $_POST['email'];
    $role = $fm->validation($_POST['role']);

    $username = mysqli_real_escape_string($db->link, $username);
    $password = mysqli_real_escape_string($db->link, $password);
    $role = mysqli_real_escape_string($db->link, $role);

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        echo "<span style:'color:red'>This email is not valid: </span>".$email; 
    }
    elseif(empty($username) || empty($password) || empty($role) || empty($email) ){
        echo "<span class='error'>Field Must not be empty !</span>";
    }else{ 

    $mailquery = "SELECT * FROM tbl_user WHERE email = '$email' limit 1 ";
    $mailcheck = $db->select($mailquery);
    if ($mailcheck['email'] == '$email' ) {
        echo "This Email Already Exits";
    }
    else{
        $query = "INSERT INTO tbl_user (username, password, role, email) VALUES ('$username'
        ,'$password','$role','$email')";
        $adduser = $db->insert($query);
    
        if ($adduser){
           echo "<span class='sucess'>User Add successfully.</span>";
        }else{
            echo "<span class='error'>User not Add</span>";
        }
    }

        } 
} 
?>


 <form action="" method="POST">
    <table class="form">					
        <tr>
            <td>
                <label>User Name</label>
            </td>
            <td>
                <input type="text" name="username" placeholder="Enter Your User Name..." class="medium" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Password </label>
            </td>
            <td>
                <input type="password" name="password" placeholder="Enter Your User password..." class="medium" />
            </td>
        </tr>
        <tr>
        <td>
                <label>Email </label>
            </td>
            <td>
                <input type="text" name="email" placeholder="Plz Enter Valid Emmail Address" />
                </td>
         </tr>
        <tr>
            <td>
                <label>User Role </label>
            </td>
            <td>
                <select id="select" name="role">
                    <option >Select User Role</option>
                    <option value="0">Admin</option>
                    <option value="1">Author</option>
                    <option value="2">Editor</option>
                </select>
            </td>
        </tr>
        
		<tr> 
            <td>
                <input type="submit" name="submit" Value="Create" />
            </td>
        </tr>
    </table>
    </form>
</div>
</div>
</div>

<?php include'inc/footer.php'; ?>


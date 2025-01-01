<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<div class="grid_10">

<div class="box round first grid">
<h2>Add New Post</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $phone = mysqli_real_escape_string($db->link,$_POST['phone']);
    // $image = mysqli_real_escape_string($db->link,$_POST['image']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $address = mysqli_real_escape_string($db->link,$_POST['address']);
    $description = mysqli_real_escape_string($db->link,$_POST['description']);
    $support_team = mysqli_real_escape_string($db->link,$_POST['support_team']);
 //   $user_login_id = $_SESSION['user_login_id'];
    $publication_status = '1';

    $user_login_id = "110011";

    $permited   = array('jpg','jpeg','png','gif');
    $file_name  = $_FILES['image']['name']; 
    $file_size  = $_FILES['image']['size']; 
    $file_temp  = $_FILES['image']['tmp_name'];

    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $uniqre_image = substr(md5(time()),0,10).'.'.$file_ext;
    $uploaded_image = "uploads/".$uniqre_image ;

 
    if ($name == "" || $phone == "" || $email == "" || $title == "" || $address == "" || $description == "" || $support_team == "" || $file_name == "" || $user_login_id == "" ) {
       echo "<span class='error'>filed must not be empty .</span>";
    
    }elseif($file_size > 1000000){
            echo "<span style='color:red'>U can't file select 1MB Upper </span>";
   
   }elseif(in_array($file_ext,$permited) === false){
            echo "<span style='color:red'>Ypu Can Upload Only :- ".implode(' ,',$permited)." </span>";
    
    }else{
        move_uploaded_file($file_temp,$uploaded_image);
        $start = 0;
        if(strlen($phone) == 14){
            $start = 4;
        }elseif(strlen($phone) == 13){
            $start = 3;
        }elseif(strlen($phone) == 11){
            $start = 1;
        }
        $phone =substr($phone, $start);

                
       $query = "INSERT INTO tbl_support (name, phone , email, title , address ,description ,image,support_team ,user_login_id ,publication_status) VALUES ('$name','$phone', '$email', '$title','$address','$description','$uploaded_image','$support_team','$user_login_id', '$publication_status') ";
        $addpost = $db->insert($query);
        if($addpost){
            echo "<span style='color:green'>Data INSERT Successfully</span>";
        }else{
            echo "<span style='color:red'>Data NOt Insert Successfully</span>";
        }
    }
}

?>
<div class="block">               
<form action="" method="POST" enctype="multipart/form-data">
<table class="form">
   
    <tr>
        <td>
            <label>Name</label>
        </td>
        <td>
            <input type="text" name="name" placeholder="Enter Post Name..." class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Phone</label>
        </td>
        <td>
            <input type="text" name="phone" placeholder="Enter Post Phone..." class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="email" name="email" placeholder="Enter Post Email..." class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Address</label>
        </td>
        <td>
            <input type="text" name="address" placeholder="Enter Post Address..." class="medium" />
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea name="description" class="tinymce"></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label>Upload Image</label>
        </td>
        <td>
            <input name="image" type="file" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Select His/Her Team</label>
        </td>
        <td>
            <input list="browsers" name="support_team">
                                <datalist id="browsers">
<?php $string = "Russia, Brazil, Iran, Japan, Mexico, Belgium, South Korea, Saudi Arabia, Germany, England, Spain, Nigeria, Costa Rica, Poland, Egypt, Iceland, Serbia, Portugal, France, Uruguay, Argentina, Colombia, Panama, Senegal, Morocco, Tunisia, Switzerland, Croatia, Sweden, Denmark, Australia, Peru";
$explode = explode(',' , $string);
foreach ($explode as $show) {   ?>
    <option value="<?php echo $show; ?>"></option>
<?php } ?>
                                </datalist>
        </td>
    </tr>
    <tr>
        <td>
            <label>User Id or Which User</label>
        </td>
        <td>
            <input type="text" name="user_login_id" placeholder="Enter user Login Id..." class="medium" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Author</label>
        </td>
        <td>
            <input type="text" readonly name="author" value="<?php echo Session::get('username'); ?>" class="medium" />
            <input type="hidden" readonly name="userid" value="<?php echo Session::get('UserId'); ?>" class="medium" />
        </td>
    </tr>


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

<?php include'inc/footer.php'; ?>
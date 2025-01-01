
<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/sidebar.php' ?>

<?php
    require_once '../vendor/autoload.php';
    $vote = new App\classes\Vote;

    if(isset($_POST['btn']))    {
        $message = $vote->saveVoteInfo($_POST);
    }
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Add New User</li>
</ol>
<!-- Page Content -->

<div class="row">
    <div class="col-md-8  mt-2 mx-auto ">
        <h4 class="text-primary text-center">
            <?php
                if(isset($message)) {
                    echo $message;
                }
            ?>
        </h4>
        <div class="card alert-success">
            <h5 class="card-header text-center text-success">Add New User</h5>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row mt-5">
                        <label for="firstName" class="col-sm-3 col-form-label text-right">Topic Name :</label>
                        <div class="col-sm-9">
                            <input type="text" name="topic" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label text-right">Description :</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label text-right">Publication Status :</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="exampleFormControlSelect1" name="status">
                                <option value=""> -- Select Status -- </option>
                                <option value="1">Published </option>
                                <option value="0">Unpublished </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-8 col-form-label"></label>
                        <div class="col-sm-4">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<?php require_once 'includes/footer.php' ?>
<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/sidebar.php' ?>

<?php
    require_once '../vendor/autoload.php';
    use App\classes\Vote;

$id = " ";
$message='';

if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $message =Vote::deleteVoteInfo($id);
}

$queryResult = Vote::getAllVoteInfo($id);


?>

    <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">View Manifesto List</li>
      </ol>
    <!-- Page Content -->
    <style>
        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
        }
    </style>

    <!-- Box Content -->
        <div class="row">
            <div class="col-md-12">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                  <th>#</th>
                                  <th>Topic</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th style="width: 40px;">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    $i = 1;
                                    while ($data = mysqli_fetch_assoc($queryResult)){
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++;?></th>
                                        <td><?php echo $data['topic'];?></td>
                                        <td><?php echo $data['name'].'<br>'.$data['phone'].'<br>'.$data['election_area'];?></td>
                                        <td><?php echo $data['comment'];?></td>
                                        <td class="text-right">
                                            <!--<a type="button" class="btn btn-success btn-sm"><!-- ?php echo $data['status'];?> Approved</a>-->
                                            <!--<a type="button" class="btn btn-secondary btn-sm">Hide</a>-->
                                            <a href="?delete=true&id=<?php echo $data['id'];?>" onclick="return confirm('Are you sure to reject this?)" type="button" class="btn btn-success btn-sm">Reject</a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                    </table>
            </div>
        </div>




<?php require_once 'includes/footer.php' ?>
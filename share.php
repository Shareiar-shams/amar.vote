<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>

<?php

    $db = new Database();
    $fm = new format();
    if (isset($_GET['page_no']) && !empty($_GET['page_no'])) {
        $page_no = (int)$_GET['page_no'];
    } else {
        $page_no = 1;
    }
    
    $db = new Database();
    $fm = new format();
    $cookie_name = "user";
    $user = $_GET['user'];
    if($user == NULL) {
        #__Cookies are not set
        
        //$cookie_value = substr(md5(mt_rand()), 0, 50);
        //setcookie($cookie_name, $cookie_value, time() +60*60*24*30);
        header('Location: index.php');
        
    }else{
        $result = $db->select("select * from vote where user_id ='$user'");
        
        $no_of_records_per_page = 10;
        $offset = ($page_no-1) * $no_of_records_per_page;
        $total_rows = $result->num_rows;
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $vote = $db->select("select * from vote where user_id ='$_COOKIE[$cookie_name]' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    }
?>

<?php
    if(isset($_GET['likeMe'])){
        
        $cookie_name = "user";
        
        $supporter_id = $_GET['likeMe'];
        
        $tbl_vote_count = $db->select("select * from tbl_vote_count where supporter_id ='$supporter_id' AND voter_ip='$_COOKIE[$cookie_name]'");
        
        if($tbl_vote_count->num_rows){
            
            echo"<script type='text/javascript'> alert('You have already support this topic');</script>";
            
        }else{
            
            $vote = '';
            $tbl_vote_count_insert_query = "INSERT INTO `tbl_vote_count` (`id`, `supporter_id`, `voter_ip`, `vote`) VALUES (NULL, '$supporter_id', '$_COOKIE[$cookie_name]', '')";
            
            $db->insert($tbl_vote_count_insert_query);
            
            $vote_result = $db->select("select * from vote where id='$supporter_id'");
        
            $vote_row = $vote_result->fetch_object();
        
            $newLike = $vote_row->like_count + 1;
        
            $vote_query = "UPDATE vote SET like_count='$newLike' WHERE id='$supporter_id'";
            
            if($db->insert($vote_query)){
                $neww = str_replace('likeMe','voteStatus',$_SERVER['QUERY_STRING']);
                header('Location:'.$_SERVER['PHP_SELF'].'?'.$neww);
                //echo"<script type='text/javascript'>alert('You have successfully supported this topic !');</script>";
                
            }else{
                
                echo"<script type='text/javascript'>alert('Something went wrong !');</script>";
                
            }
        }
        //$query = ;
        //

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title> View Total Vote </title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bt_menu.css">
    <link rel="stylesheet" href="css/style.css">
    

    <style type="text/css">
      
    </style>
   <?php include 'tracker.php'; ?>
  </head>
  <body>
        
        <input type="hidden" value="<?php if (isset($_GET['voteStatus'])){echo $_GET['voteStatus'];} ?>" id="voteStatus">
         <!-- header
    ================================================== -->
    <header class="s-header" style="background: #0C0C0C">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="assets/img/amarVotebd.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Navigation</h3>
                
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="index.php#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="index.php#about" title="about">About</a></li>
                    <li><a href="view_vote.php" title="view">View Total Vote</a></li>
                    <li><a class="smoothscroll"  href="index.php#vote" title="clients">Vote</a></li>
                </ul>
    
                <p>Perspiciatis hic praesentium nesciunt. Et neque a dolorum <a href='#0'>voluptatem</a> porro iusto sequi veritatis libero enim. Iusto id suscipit veritatis neque reprehenderit.</p>
    
                <ul class="header-nav__social">
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-behance"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->
    <style>
        .from_border_r {
            border-radius: .25rem 0 0 .25rem;
            border-color: #28a745;
        }
        
        .from_border_l {
            border-radius: 0 .25rem .25rem 0;
        }
        
        
        
.sonar-wrapper {
  position: relative;
  z-index: 0;
  /*overflow: hidden;*/
  /*padding: 2rem 0;*/
}

/* The circle */
.sonar-emitter {
  position: relative;
  margin: 0 auto;
  margin-right: 25px;
  width: 130px;
  height: 38px;
  /*border-radius: 9999px;*/
  background-color: rgb(11, 148, 68);
}

/* the 'wave', same shape and size as its parent */
.sonar-wave {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*border-radius: 9999px;*/
  background-color: rgb(11, 148, 68);
  opacity: 0;
  z-index: -1;
  pointer-events: none;
}

/*
  Animate!
  NOTE: add browser prefixes where needed.
*/
.sonar-wave {
  animation: sonarWave 2s linear infinite;
}

@keyframes sonarWave {
  from {
    opacity: 0.4;
  }
  to {
    transform: scale(3);
    opacity: 0;
  }
}

.uber_btn {
    width: 130px;
    color: #28a745;
    background-color: transparent;
    background-image: none;
    border-color: #28a745;
    border-radius: .25rem;
}
    </style>
    
    
<div class="container-fluid">
    <div class="row" style="margin-top: 96px;">
        <div class="col-md-12 pl-0 pr-0">
            <div class="card">
                <div class="card-header alert-success">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h4 class="pl-1 pt-3">তৈরি হচ্ছে জনতার ইশতিহার </h4>
                        </div>
                        <div class="col-md-6 col-12">
                                <form class="form-inline float-right custom-form pt-2" method="get">
                                    <div class="form-group custom-form-group no-mr media-100">
                                        <div class="sonar-wrapper">
                                    	    <div class="sonar-emitter">
                                    	        <a href="index.php#vote" type="button" class="btn btn-outline-success uber_btn">Add Vote</a>
                                                <div class="sonar-wave">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <button name="share" type="submit" value="submit" class="btn btn-outline-success mr-3"><i class="fas fa-share"></i> Share All</button>
                                        <label for="topic" class="mr-2">Filter Topic</label>
                                        <div class="form-group no-mr media-100">
                                          <select name="topic" class="form-control from_border_r" id="topic">
                                            <option value=''> Select Filter Topic...</option>
                                            <option value="Education">Education</option>
                                            <option value="Health">Health</option>
                                            <option value="Employment">Employment</option>
                                            <option value="Youth">Youth</option>
                                            <option value="Freedom of Speech">Freedom of Speech</option>
                                            <option value="Women Issue">Women Issue</option>
                                            <option value="Children Issue">Children Issue</option>
                                            <option value="Liberation War">Liberation War</option>
                                            <option value="Others">Others</option>
                                          </select>
                                    </div>
                                    
                                        <button name="search_topic" type="submit" value="submit" class="btn btn-outline-success from_border_l"><i class="fas fa-chart-line"></i> Filter</button>
                                </form>
                        </div>
                    </div>
                </div>
                <div class="card-body pl-0 pr-0">

              <!--<div class="card mb-3">-->
              <!--  <div class="card-body">-->
              <!--    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
              <!--    <a href="#" class="btn btn-danger btn-sm"><i class="far fa-thumbs-up"></i> Vote</a>-->
              <!--    <a href="#" class="btn btn-primary btn-sm"><i class="fab fa-facebook-f"></i> Share</a>-->
              <!--    <a href="#" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> Total Votes: 5,140</a>-->
              <!--    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-filter"></i><strong> Catagory: </strong> Education</a>-->
              <!--  </div>-->
              <!--</div>-->
              
                <?php
                    while($row = $vote->fetch_object()){ //var_dump($row); ?>
                
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text"><?= $row->comment; ?></p>
                            <a href="?likeMe=<?= $row->id; ?><?php if(isset($_GET['topic'])){ echo "&topic=".$_GET['topic'];} if(isset($_GET['page_no'])){ echo "&page_no=".$_GET['page_no'];} ?>" class="btn btn-danger btn-sm mb-2"><i class="far fa-thumbs-up"></i> Support</a>
                            <a href="#" class="btn btn-primary btn-sm mb-2"><i class="fab fa-facebook-f"></i> Share</a>
                            <a href="#" class="btn btn-info btn-sm mb-2"><i class="fas fa-box-open"></i> Total Votes: <?= $row->like_count; ?></a>
                            <a href="#" class="btn btn-success btn-sm mb-2"><i class="fas fa-filter"></i><strong> Catagory: </strong><?= $row->topic; ?></a>
                        </div>
                    </div>
                    
                <?php } ?>
             
              <?php
            	if (isset($_GET['topic'])) { $topic = $_GET['topic']; ?>
                        <nav aria-label="Page navigation example" class="pr-3">
                          <ul class="pagination justify-content-end">
                            <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php echo"?topic=".$topic; if($page_no <= 1){ echo '#'; } else { echo "&page_no=".($page_no - 1); } ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                                for($i=1; $total_pages >= $i; $i++){
                                    
                                    echo'<li class="page-item"><a class="page-link" href="?topic='.$topic.'&page_no='.$i.'">'.$i.'</a></li>';
                                }
                            ?>
                            <li class="page-item <?php if($page_no >= $total_pages){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php "?topic=".$topic; if($page_no >= $total_pages){ echo '#'; } else { echo "?page_no=".($page_no + 1); } ?>">Next</a>
                            </li>
                          </ul>
                        </nav>
            	<?php }else{ ?>
                        <nav aria-label="Page navigation example" class="pr-3">
                          <ul class="pagination justify-content-end">
                            <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page_no <= 1){ echo '#'; } else { echo "?page_no=".($page_no - 1); } ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                                for($i=1; $total_pages >= $i; $i++){
                                    
                                    echo'<li class="page-item"><a class="page-link" href="?page_no='.$i.'">'.$i.'</a></li>';
                                }
                            ?>
                            <li class="page-item <?php if($page_no >= $total_pages){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page_no >= $total_pages){ echo '#'; } else { echo "?page_no=".($page_no + 1); } ?>">Next</a>
                            </li>
                          </ul>
                        </nav>
            
            	<?php }
            ?>
                          
          </div>
            </div>
        </div>
    </div>
      


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var voteStatus = $('#voteStatus').val();
            console.log(voteStatus);
            
            if(voteStatus === 'already_done'){
                swal("You have already support this topic", "", "error");
            }else if(voteStatus === 'vot_submitted'){
                swal("You have support this topic !", "", "success");
            }else if(voteStatus == ''){
                
            }
        });
    </script>
    


  </body>
</html>




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
    if(!isset($_COOKIE[$cookie_name])) {
        #__Cookies are not set
        
        header('Location: index.php');
        
    }else{
        $result = $db->select("select * from vote where user_id ='$_COOKIE[$cookie_name]'");
        
        $no_of_records_per_page = 10;
        $offset = ($page_no-1) * $no_of_records_per_page;
        $total_rows = $result->num_rows;
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $vote = $db->select("select * from vote where user_id ='$_COOKIE[$cookie_name]' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
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
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                    <li><a href="view_vote.php" title="view">View Total Vote</a></li>
                    <li><a class="smoothscroll"  href="#works" title="works">Works</a></li>
                    <li><a class="smoothscroll"  href="#clients" title="clients">Clients</a></li>
                    <li><a class="smoothscroll"  href="#contact" title="contact">Contact</a></li>
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
    </style>
    
    
<div class="container-fluid">
    <div class="row" style="margin-top: 96px;">
        <div class="col-md-12 pl-0 pr-0">
            <div class="card">
                <div class="card-header alert-success">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="">View Total Vote List</h5>
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
                            <button id="<?= $row->id; ?>" class="btn btn-danger btn-sm mb-2 likeMe"><i class="far fa-thumbs-up"></i> Support</button>
                            <a href="#" class="btn btn-primary btn-sm mb-2"><i class="fab fa-facebook-f"></i> Share</a>
                            <a href="#" class="btn btn-info btn-sm mb-2"><i class="fas fa-box-open"></i> Total Votes: <span class="voteNo"><?= $row->like_count; ?></span></a>
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

        <!--<div class="col-md-4">-->
        <!--  <div class="card">-->
        <!--    <div class="card-header text-center alert-success">-->
        <!--      Smart Filter-->
        <!--    </div>-->
        <!--    <div class="card-body">-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
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
    <script>
        $(document).ready(function(){
            $('.likeMe').click(function(){
                var data = $(this).attr("id");
                var getparent = $(this).parent();
    		// AJAX code to send data to php file.
    		
    		    $.ajax({
    		        type: "GET",
    		        url: "support.php",
    		        data: "likeMe=" + data,
    		        dataType: "JSON",
    		        success: function(data) {
    		            console.log(data);
    		            
    		            if(data === "already"){
    		                
    		        	    swal('You have already support this topic', "", "error");
    		            } else if (data.status === "success"){
    		                
    		        	    swal('You have successfully supported this topic !', "", "success");
    		        	    getparent.find('.voteNo').text(data.votes);
    		            }else{
    		                
    		                swal('wrong Something went wrong !', "", "error");
    		            }
    		        },
    		        error: function(err) {
    		        console.log(err);
    		        }
    		    });
            });
        });
    </script>
    

    

  </body>
</html>




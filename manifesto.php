<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>

<?php

    $cookie_name = "user";
    if(!isset($_COOKIE[$cookie_name])) {
        #__Cookies are not set
        date_default_timezone_set('Asia/Dhaka');
        $cookie_value = date("h:i:sa").substr(md5(mt_rand()), 0, 40);
        setcookie($cookie_name, $cookie_value, time() +60*60*24*30);
        header('Location: /index.php');
        
    }

    $db = new Database();
    $fm = new format();
    
    $eid = $_GET['eid'];
    
    if (isset($_GET['page_no']) && !empty($_GET['page_no'])) {
        $page_no = (int)$_GET['page_no'];
    } else {
        $page_no = 1;
    }
    
    if($_GET['share'] != NULL){
            $usid = $_GET['share'];
            
            
            
            $result = $db->select("SELECT * FROM vote WHERE `user_id` LIKE '$usid'");
                $no_of_records_per_page = 10;
                $offset = ($page_no-1) * $no_of_records_per_page;
                $total_rows = $result->num_rows;
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $vote = $db->select("SELECT * FROM vote WHERE `user_id` LIKE '$usid'");
                
            
            
        }
        elseif($_GET['mid'] != NULL)
        {
             $mnid = $_GET['mid'];
            
            $result = $db->select("SELECT * FROM vote WHERE `id` LIKE '$mnid'");
                $no_of_records_per_page = 10;
                $offset = ($page_no-1) * $no_of_records_per_page;
                $total_rows = $result->num_rows;
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $vote = $db->select("SELECT * FROM vote WHERE `id` LIKE '$mnid'");
        }
    elseif(isset($_GET['search_topic']) && !empty($_GET['search_topic'])){
        
        // $topic = $_GET['topic'];
        // $result = $db->select("select * from vote where topic= '$topic'");
        // $no_of_records_per_page = 10;
        // $offset = ($page_no-1) * $no_of_records_per_page;
        // $total_rows = $result->num_rows;
        // $total_pages = ceil($total_rows / $no_of_records_per_page);
        // $vote = $db->select("select * from vote where topic= '$topic' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
        
        
        if(isset($_GET['topic']) && !empty($_GET['topic'])){
            if(isset($_GET['topic']) && $_GET['topic'] == 'bylike'){
               // echo"hi";
                
                //$topic = $_GET['topic'];
                $result = $db->select("SELECT * FROM vote ORDER BY `like_count` DESC");
                $no_of_records_per_page = 10;
                $offset = ($page_no-1) * $no_of_records_per_page;
                $total_rows = $result->num_rows;
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $vote = $db->select("SELECT * FROM `vote` ORDER BY `vote`.`like_count` DESC LIMIT $offset, $no_of_records_per_page");
                
               // exit;
            }else{
                $topic = $_GET['topic'];
                $result = $db->select("select * from vote where topic= '$topic' && eid='$eid'");
                $no_of_records_per_page = 10;
                $offset = ($page_no-1) * $no_of_records_per_page;
                $total_rows = $result->num_rows;
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $vote = $db->select("select * from vote where topic= '$topic' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
            }
            
        } } else{
            $result = $db->select('select * from vote');
            $no_of_records_per_page = 10;
            $offset = ($page_no-1) * $no_of_records_per_page;
            $total_rows = $result->num_rows;
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            $vote = $db->select("SELECT * FROM vote ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
            
        }
        
    // }else{
    //     $result = $db->select('select * from vote');
    //     $no_of_records_per_page = 10;
    //     $offset = ($page_no-1) * $no_of_records_per_page;
    //     $total_rows = $result->num_rows;
    //     $total_pages = ceil($total_rows / $no_of_records_per_page);
    //     $vote = $db->select("SELECT * FROM vote ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
        
    // }
    // if(isset($_GET['topic']) && !empty($_GET['topic'])){
    //     $topic = $_GET['topic'];
    //     $result = $db->select("select * from vote where topic= '$topic'");
    //     $no_of_records_per_page = 10;
    //     $offset = ($page_no-1) * $no_of_records_per_page;
    //     $total_rows = $result->num_rows;
    //     $total_pages = ceil($total_rows / $no_of_records_per_page);
    //     $vote = $db->select("select * from vote where topic= '$topic' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    // }
    
    
    $email1 = $_POST['email1'];
    if ($email1 != NULL)
    {
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
              
              $db->insert("INSERT INTO `email` (`email`) VALUES ('$email1')");
        ?><script>
        alert("ধন্যবাদ । আমরা আপনাকে আপডেটেড রাখব । ");
        </script><?php
              
              
            } else {
             ?><script>
        alert("Opps! Invalid email address.");
        </script><?php
            }
        
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <?php if ($_GET['share'] == $_COOKIE['user']) { $added = 'added'; $extraa = 'my'; } else { $added = 'notadded'; $extraa = ''; } ?>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>Amar.Vote | Youth Participation in Election Process | Public Manifesto</title>
    <meta property="og:title" content="Amar.Vote | Youth Participation in Elections Process" />
    <meta property="og:url" content="https://www.amar.vote" />
    <meta property="og:image" content="/assets/img/fbPost<?php echo $extraa; ?>.png" />
    <meta name="og:description" content="কেমন বাংলাদেশ চাই ? তৈরি করুন জনতার ইশতিহার What should be the future of Bangladesh ? Create Your Public Manifesto" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bt_menu.css">
    <link rel="stylesheet" href="/css/style_04.css">
    

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
            <a class="site-logo" href="/index.php">
                <img src="/assets/img/amarVotebd.png" alt="Homepage">
            </a>
        </div>

       <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span><!----></span></a>

            <div class="header-nav__content">
                <!--<h3>Menu</h3>-->
                
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">বাংলা ভার্শন</a></li>
                    <li><a href="/english" title="about">English Version</a></li>
                    <li><a class="smoothscroll"  href="/index.php#about" title="about">About</a></li>
                    <li><a href="/evm" title="view">Use of EVM</a></li>
                    <li><a href="/map" title="view">Election Map</a></li>
                    <li><a href="/party_manifesto" title="view">Party Manifestos</a></li>
                    <li><a href="/manifesto" title="view">See Public Inputs</a></li>
                    <li><a class="smoothscroll"  href="/index.php#vote" title="Vote">Add Your Inputs</a></li>
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
                                    	        <?php if($_GET['fb']=='1') {
                                    	        $pg1 = $_GET['share'];
                                    	        //$page = '/?'.$_SERVER['QUERY_STRING'];
                                    	        
                                    	        //$pg = str_replace(".php","/?",$page);
                                    	        
                                    	        //$pg = str_replace("fb=","f=",$page);
                                    	        
                                    	        $pg = 'manifesto/?share='.$pg1.'&search_topic=submit';
                                    	        
                                    	        ?>
                                    	        <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote/<?php echo $pg;?>&redirect_uri=https%3A%2F%2Famar.vote" type="button" class="btn btn-success uber_btn">Share</a>
                                    	        <?php } else { ?>
                                    	        <a href="/index.php#vote" type="button" class="btn btn-success uber_btn">Add Your Points</a>
                                    	        <?php } ?>
                                                <div class="sonar-wave">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote/manifesto&redirect_uri=https%3A%2F%2Famar.vote" class="btn btn-outline-success mr-3"><i class="fas fa-share"></i> Share All</a>
                                    </div>    
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form class="form-inline custom-form pt-2" method="get">
                                
                                    <label for="topic" class="mr-2">Filter Topic</label>
                                    <div class="form-group no-mr media-100">
                                        <select name="topic" class="form-control from_border_r" id="topic">
                                            <option value=''> Select Filter Topic...</option>
                                            <option value="bylike">Top Supported</option>
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
                               
                                
                                <button name="search_topic" type="submit" value="submit" class="btn btn-outline-success from_border_l filter_btn"><i class="fas fa-chart-line"></i> Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card-body pl-0 pr-0">
                    
                    
                <?php
                    if ($vote == NULL)
                    {
                        echo "Nothing found on this topic.";
                    }
                
                    while ( $vote && $row = $vote->fetch_object() )   {  ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text"><?= $row->comment; ?></p>
                            <!--<?php echo $row->id; ?>-->
                            <button id="<?= $row->id; ?>" class="btn btn-danger btn-sm mb-2 likeMe"><i class="far fa-thumbs-up"></i> Support</button>
                            <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote/manifesto/?mid=<?php echo $row->id; ?>&redirect_uri=https%3A%2F%2Famar.vote" class="btn btn-primary btn-sm mb-2"><i class="fab fa-facebook-f"></i> Share</a>
                            <a href="#" class="btn btn-info btn-sm mb-2"><i class="fas fa-box-open"></i> Total Supports: <span class="voteNo"><?= $row->like_count; ?></span></a>
                            <a href="?topic=<?= $row->topic; ?>&search_topic=submit" class="btn btn-success btn-sm mb-2"><i class="fas fa-filter"></i><strong> Topic: </strong><?= $row->topic; ?></a>
                        </div>
                    </div>
                <?php } ?>
                <?php
            	if (isset($_GET['topic']) && 1!=1) { $topic = $_GET['topic']; ?>
                        <nav aria-label="Page navigation example" class="pr-3">
                          <ul class="pagination justify-content-end">
                            <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php echo"?topic=".$topic; if($page_no <= 1){ echo '#'; } else { echo "&page_no=".($page_no - 1); } ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                                for($i=1; 5 >= $i; $i++){
                                    
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
                              <?php  $pg_topic = $_GET['topic'];   if($pg_topic != NULL) { $pg_top_nav = 'topic='.$pg_topic.'&search_topic=submit&'; } else  { $pg_top_nav = ''; } ?>
                              <li class="page-item disabled">
                              <a class="page-link" href="<?php if($page_no <= 1){ echo '#'; } else { echo "?page_no=".($page_no - 1); } ?>" tabindex="-1"><?php echo $total_pages; if ($total_pages >1) echo ' Pages'; else echo ' Page';  ?></a>
                            </li>
                            <li class="page-item <?php if($page_no <= 1){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page_no <= 1){ echo '#'; } else { echo "?'.$pg_top_nav.'page_no=".($page_no - 1); } ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php
                                
                            
                                for($i = $page_no ; $i > $page_no -1 ; $i--){
                                    
                                    if($i < $total_pages){
                                        $n1 = $i-1;
                                        $n2 = $i-2;
                                        if($n2>0){
                                            echo'<li class="page-item"><a class="page-link" href="?'.$pg_top_nav.'page_no='.$n2.'">'.$n2.'</a></li>';
                                        }
                                        if($n1 > 0 ){
                                            echo'<li class="page-item"><a class="page-link" href="?'.$pg_top_nav.'page_no='.$n1.'">'.$n1.'</a></li>';
                                        }
                                    }
                                    
                                }
                                for($i = $page_no ; $i < $page_no +2 ; $i++){
                                    if($i < $total_pages){
                                        echo'<li class="page-item';
                                        if($i == $page_no){
                                            echo" active";
                                        }
                                        echo'"><a class="page-link" href="?'.$pg_top_nav.'page_no='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                            ?>
                            <li class="page-item <?php if($page_no >= $total_pages){ echo 'disabled'; } ?>">
                              <a class="page-link" href="<?php if($page_no >= $total_pages){ echo '#'; } else { echo '?'.$pg_top_nav.'page_no='.($page_no + 1); } ?>">Next</a>
                            </li>
                          </ul>
                        </nav>
            	<?php } ?>
                </div>
                
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
<style>
    footer{
        background: #111111;
        color:rgba(255, 255, 255, 0.3);
    }
    footer h4{
        color: #FFF;
    }
    .footer-logo {
    display: block;
    margin: -.6rem 0 3.6rem 0;
    padding: 0;
    outline: 0;
    border: none;
    width: 240px;
    height: 60px;
    background: url(/assets/img/amarVotebd.png) no-repeat center;
    background-size: 240px 60px;
    font: 0/0 a;
    text-shadow: none;
    color: transparent;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
</style>
        <!-- footer
================================================== -->
<footer class="col-md-12 pt-5 pb-5">
    
    <div class="container">

    <div class="row footer-main">

        <div class="col-md-6 tab-full left footer-desc">

            <div class="footer-logo"></div>
            Amar.Vote is an open platform initiatied by Preneur Lab - Social Good Company. The aim is to empower and engage mass people, specially youth, in positive and constructive politicial process.

        </div>

        <div class="col-md-6 tab-full right footer-subscribe">

            <h4>Get Notified</h4>
            <p>More features and area-wise candidate list will be launched soon. Please subscribe to get more updates on National Elections 2018.</p>

            <div class="subscribe-form">
                <form id="mc-form" class="group" novalidate="true" action="/index.php" method="post">
                    <input type="email" value="" name="email1" class="email" id="mc-email" placeholder="Email Address">
                    <input type="submit" name="subscri" value="Subscribe">
                    <label for="mc-email" class="subscribe-message"></label>
                </form>
            </div>

        </div>

    </div> <!-- end footer-main -->

    <div class="row text-center mt-5">

        <div class="col-md-12">
            <div class="copyright">
                <span>© Copyright 2018</span> 
                <span>Initiative of <a href="http://www.preneurlab.com/">Preneur Lab - Social Good Company</a></span>	
            </div>

        </div>

    </div> <!-- end footer-bottom -->
        
    </div>

</footer> <!-- end footer -->
      


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var voteStatus = $('#voteStatus').val();
            console.log(voteStatus);
            
            if(voteStatus === 'already_done'){
                swal("You have already support this topic", "", "error");
            }else if(voteStatus === 'vot_submitted'){
                
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
		        url: "/support.php",
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




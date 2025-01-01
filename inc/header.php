<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'helpers/format.php';?>

<?php
    $db = new Database();
    $fm = new format();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  //header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!-- Clear Clachs er code gulor opore-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-73942782-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73942782-4');
</script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php 
    if(isset($_GET['id']) and !empty($_GET['id'])){
        $id = mysqli_real_escape_string($db->link,$_GET['id']);
        $query = "SELECT * FROM tbl_support
            WHERE id = ".$id; 
            $post = $db->select($query);
            if ($post) {
                $i = 0 ;
                while ($result = $post->fetch_assoc()) {
                $i++;  //$fm->textshorten($result['body'],50 );
    
        $explode = explode("/", $result['image']);
        
         $explode2 = explode(".", $result['image']);
    if($explode[0] == "admin"){
        $photos = $result['image'];
    }else{  $photos = "admin/".$result['image']; }
    if ($explode2['1'] == NULL) { $photos = "assets/img/logo2.png"; }
?>  
    <!--    [Site Title] -->
    <title>Torun Digital | Praava Health presents "Grand Stories of Grandparents"</title>
                      
    <meta property="og:image" content="<?php echo $photos; ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1000" />
    <meta property="og:title" content="<?php echo $result['name']; ?> shared Grandparent's story" />
    <meta property="og:description" content="Vote for <?php echo $result['name']; ?> or share your story to win 1 year FREE annual membership plans from Pravaa Health." />
    
    
<?php    
                } } }   
                else 
                { ?>
<meta property="og:image" content="http://www.torundigital.com/grandstories/assets/img/pravaa-12001000.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="1000" />
    <meta property="og:title" content="Torun Digital | Praava Health presents 'Grand Stories of Grandparents'" />
    <meta property="og:description" content="জিতে নাও তোমার দাদা, দাদি,  নানা কিংবা নানির জন্য  Praava Health এর পক্ষ থেকে এক বছরের চিকিৎসা সেবা!" />
              <?php      
                }
?>
    <!--<meta property="og:title" content=" " />-->
    <!--<meta property="og:type" content="" />-->
    
    <!--<meta property="og:image" content="" />-->
    <!--<meta property="og:image:width" content="1200" />-->
    <!--<meta property="og:image:height" content="1000" />-->


    <!--    [Bootstrap Css] -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    

    <!--    [Animate Css]-->
    <link rel="stylesheet" href="assets/css/animate.css">
    

    <!--    [FontAwesome Css] -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    

    <!--    [IcoFont Css] -->
    <link rel="stylesheet" href="assets/css/icofont.css">
    

    <!--    [OwlCarousel Css]-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    
    
    <!--    [select 2 css]  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    
    <!--    [Custom Stlesheet]-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive3.css">


    <!--    [Favicon] -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/fev.png">


</head>

<body>
<style>
    .pulse-button {
        position: relative;
        width: 100%;
        height: 38px;
        border: none;
        box-shadow: 0 0 0 0 rgba(232, 76, 61, 0.7);
        background-color: #e84c3d;
        cursor: pointer;
        -webkit-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -moz-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        -ms-animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
        animation: pulse 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
    }
    
    .pulse-button:hover {
        -webkit-animation: none;
        -moz-animation: none;
        -ms-animation: none;
        animation: none;
    }
    
    @-webkit-keyframes pulse {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }
    
    @-moz-keyframes pulse {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }
    
    @-ms-keyframes pulse {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }
    
    @keyframes pulse {
        to {
            box-shadow: 0 0 0 45px rgba(232, 76, 61, 0);
        }
    }
    
    
    .top-banner {
        margin-top: 65px;
    }
    .custom-menu {
        margin-top:  65px;
        text-align:  center;
    }
    
    .custom-menu li {
        background: #ccc;
        margin-bottom:  1px;
    }
    
    .custom-menu li a {
        padding:  6px 0;
        display:  block;
        color:  #000;
        font-weight:  bold;
        font-size:  16px;
    }
    .submit-fl {
        margin-top: -38px;
    }
    .submit-flow-2{
        position: fixed;
        z-index: 9999;
        right: 12px;
        top: 103px;
    }
</style>
    <!--    [ Strat Header Area]-->
    <header>
        <!--    [ Strat Logo Area]-->
        <div id="" class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                    <a class="navbar-brand" href="index.php">
                        <div class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link" href="popular.php">Popular</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">
                                <a class="nav-link" href="stars-story.php">Story</a>
                            </li>-->
                            <li class="nav-item">
                                <a style="color:#fff;" class="nav-link pulse-button" href="admin-submit.php#submission">Submit</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
               <!-- <div class="custom-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="populer.php">Popular</a></li>
                        <li><a style="color:#fff;" class="nav-link pulse-button" href="admin-submit.php#submission">Submit</a></li>
                    </ul>
                </div>-->
            </div>
        </div>
        <div class="sister-consurn-content">
            <div class="container">
                <!--<div class="top-banner">-->
                <!--    <img class="img-responsive" src="assets/img/topbar-f.jpg" alt="">-->
                <!--</div>-->
                <div id="submit-flow" class="submit-fl">
                    <a style="color:#fff;" class="nav-link pulse-button" href="admin-submit.php#submission">Submit</a>
                </div>
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="sister-consurn">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="consurn d-table">
                                            <div class="consurn-content d-table-cell">
                                                <div class="campaign-pic">
                                                    <img src="assets/img/ban02.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="web-title text-center">
                                            <h2>Torun Digital World Cup</h2>
                                            <div class="total-submission text-center">
                                                <a href="#">Total Submissions: 
                                                <?php
                                                    $query = "SELECT * FROM tbl_support"; 
                                                    $checks = $db->select($query);
                                                    if($checks){
                                                        $count = mysqli_num_rows($checks);
                                                    }else{
                                                        $count = 0;
                                                    }
                                                    echo $count;
                                                ?>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="partners-logo owl-carousel">
    
                                            <div class="partners-content text-center">
                                                <img class="img-responsive" src="assets/img/plab02.png" alt="">
                                            </div>
    
                                            <div class="partners-content text-center">
                                                <img class="img-responsive" src="assets/img/sl01.png" alt="">
                                            </div>
                                            <div class="partners-content text-center">
                                                <img class="img-responsive" src="assets/img/sl002.png" alt="">
                                            </div>
                                            <div class="partners-content text-center">
                                                <img class="img-responsive" src="assets/img/sl003.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
            </div>
        </div>
        <!--    [Finish Logo Area]-->
    </header>
    <!--    [Finish Header Area]-->

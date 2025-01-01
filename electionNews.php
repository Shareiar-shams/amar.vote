<?php

if(isset($_GET['pageNo'])){
    $pageNo = $_GET['pageNo'];
}else{
    $pageNo= 0;
}

$apiURL= file_get_contents('https://www.thedailystar.net/json/newsList?catId=3240&count=10&offset='.$pageNo.'0');
$data = json_decode($apiURL);

// echo "<pre>";
// foreach ($data->newslist as $key => $value) {
// 	# code...
// // 	echo '<br><br>'.$key.'<br><br>';
// 	var_dump($value);
// // 	echo '<img src="'.$value->images[0]->img_url.'">';
// exit();
// }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
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
body{background-color:#f1f1f2 !important;}
h3.h3{text-align:center;padding:1.5em 0em;text-transform:capitalize;font-size:1.5em;}

img{
    max-width: 100% !important;
    padding-bottom: 0;
}

/******************  News Slider Demo-1 *******************/

.post-slide{
    overflow: hidden;
    margin-right: 15px;
    background-color:#fff !important;
}
.post-slide .post-img {
    float: left;
    width:40%;
    position: relative;
}
.post-slide .post-img img{
    width: 100%;
    height: auto;
}
.post-slide .post-date{
    background: #ec3c6a;
    color:#fff;
    position: absolute;
    top: 0;
    right: 0;
    display: block;
    /*padding: 2% 3%;*/
    width: 150px;
    height: 60px;
    text-align: center;
    transition:all 0.50s ease;
}
.post-slide .date{
    display: block;
    font-size:20px;
    font-weight: 700;
}
.post-slide .month{
    display: block;
    font-size:11px;
    text-transform: uppercase;
}
.post-slide .post-review {
    padding: 5% 3% 1% 0;
    border-top: 3px solid #38cfd8;
    width: 60%;
    padding-left: 30px;
}
.post-slide:hover .post-review{
    border-top-color:#ec3c6a;
}
.post-slide .post-title{
    margin:0 0 10px 0;
}
.post-slide .post-title a{
    font-size:20px;
    color:#333;
    text-transform:uppercase;
}
.post-slide .post-title a:hover{
    text-decoration:none;
    font-weight: bold;
}
.post-slide .post-bar{
    padding:0;
    list-style:none;
    text-transform:uppercase;
    position: relative;
    margin-bottom: 20px;
}
.post-slide .post-bar:after,
.post-slide .post-bar:before{
    border: 1px solid #38cfd8;
    bottom: -10px;
    content: "";
    display: block;
    position: absolute;
    width: 25px;
}
.post-slide .post-bar:before{
    border: 1px solid #ec3c6a;
    margin-left: 25px;
}
.post-slide .post-bar li{
    color:#555;
    font-size:10px;
    margin-right:10px;
    display:inline-block;
}
.post-slide .post-bar li a{
    font-size: 13px;
    text-decoration:none;
    text-transform:uppercase;
    color:#ec3c6a;
}
.post-slide .post-bar li a:hover{
    color:#ec3c6a;
}
.post-slide .post-bar li i{
    color:#777;
    margin-right:5px;
}
.post-slide .post-description{
    font-size:12px;
    line-height:21px;
    color:#444454;
}
.owl-theme .owl-controls{
    margin-top: 30px;
}
.owl-theme .owl-controls .owl-page span{
    background: #fff;
    border: 2px solid #37a6a4;
}
.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span{
    background: #37a6a4;
}
@media only screen and (max-width: 990px) {
    .post-slide .post-img {
        width:100%;
    }
    .post-slide .post-review{
        width:100%;
        border-bottom: 4px solid #ec3c6a;
    }
    .post-slide .post-bar:before{
        left: 0;
    }
    .post-slide .post-bar:after{
        left: 25px;
    }
}

    </style>
</head>
  <body>
    <!-- header ================================================== -->
    <header class="s-header" style="background: #0C0C0C">

        <div class="header-logo">
            <a class="site-logo" href="/index.php">
                <img src="/assets/img/amarVotebd.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Navigation</h3>
                
                  <ul class="header-nav__list">
                    <li><a href="#home" title="home">বাংলা ভার্শন</a></li>
                    <li><a  href="/english" title="about">English Version</a></li>
                    <li><a  href="/english#about" title="about">About</a></li>
                    <li class="current"><a href="#" title="view">See Public Inputs</a></li>
                    <li><a href="/index.php#vote" title="Vote">Add Your Inputs</a></li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->
    
    
<div class="container">
    <div class="row" style="margin-top: 96px;">
        <div class="col-md-12">
            
            <?php foreach ($data->newslist as $key => $value): ?>
                <div class="post-slide my-3 d-flex">
                    <div class="post-img">
                        <a href="#">
                            <img src="<?= $value->images[0]->img_thumb;?>" alt="">
                            <div class="post-date">
                                <span><?= $value->updatedatatime; ?></span>
                                <!--<span class="date">10</span>-->
                                <!--<span class="month">jan</span>-->
                            </div>
                        </a>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="<?= $value->url; ?>"><?= $value->headline; ?></a></h3>
                        <ul class="post-bar">
                            <li><i class="fa fa-user"></i><a target='_blank' href="https://www.thedailystar.net"><?= $value->byline; ?><br>source : Thedailystar.net</a></li>
                        </ul>
                        <p class="post-description"><?= strlen($value->news_content ) > 300 ? substr(strip_tags($value->news_content) , 0, 299).' . . .' :  strip_tags($value->news_content).' . . .' ?> <a href="<?= $value->url; ?>">[Read More]</a></p>
                    </div>
                </div>
             <?php endforeach ?>
                    
        </div>
    </div>
    <div class="row m-0">
        <div class="col-md-12">
            <nav aria-label="pagination" class="float-right">
              <ul class="pagination">
                <li class="page-item <?= ($pageNo <= 0) ?'disabled' : '' ?>">
                  <a class="page-link" href="?pageNo=<?= $pageNo-1 ?>">Previous</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="?pageNo=<?= $pageNo+1 ?>">Next</a>
                </li>
              </ul>
            </nav>
        </div>
    </div>

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
  </body>
</html>




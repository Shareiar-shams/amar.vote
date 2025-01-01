
<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>
<?php
$db = new Database();


if(isset($_GET['district_name'])){
    
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
    <title>Amar.Vote | Youth Participation in Election Process | Public Manifesto</title>
    <meta property="og:title" content="Amar.Vote | Youth Participation in Elections Process" />
    <meta property="og:url" content="https://www.amar.vote" />
    <meta property="og:image" content="/assets/img/fbPost<?php echo $extraa; ?>.png" />
    <meta name="og:description" content="কেমন বাংলাদেশ চাই ? তৈরি করুন জনতার ইশতিহার What should be the future of Bangladesh ? Create Your Public Manifesto" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="/css/bt_menu.css">
    <link rel="stylesheet" href="/css/style_04.css">
    <link rel="stylesheet" href="/css/candidets.css">
    <style>
    body{
        font-family: kalpurush;
        font-weight: light;
    }
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
  </head>
  <body>
        
        <input type="hidden" value="<?php if (isset($_GET['voteStatus'])){echo $_GET['voteStatus'];} ?>" id="voteStatus">
         <!-- header
    ================================================== -->
    <header class="s-header" style="background: #0C0C0C">

        <div class="header-logo">
            <a class="site-logo" href="/index.php">
                <img src="https://amar.vote/assets/img/amarVotebd.png" alt="Homepage">
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

    </header> 
<!--========================== end s-header =========================-->


  <div class="container-fluid">
      <div class="row" style="margin-top: 96px;">
        <div class="container mt-5">
          <div class="row text-center">
            <div class="col-md-6">
                <h3>নির্বাচনি ইশতেহার-২০১৮</h3>
                <hr>
                <h3>বাংলাদেশ আওয়ামী লীগ</h3>
                <div class="row">
                    <div class="col-md-12">
                        <iframe src="https://drive.google.com/file/d/1l4ePA8Z038Z7YSJhreyDGPyXMGt5vte1/preview" style="max-width:100%;" width="100%" height="500"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3>নির্বাচনি ইশতেহার-২০১৮</h3>
                <hr>
                <h3>বিএনপি<h3>
                <div class="row">
                    <div class="col-md-12">
                        <iframe src="https://drive.google.com/file/d/1sSkKPUr0kFQA6ESbVNBbsaequB29K51e/preview" style="max-width:100%;" width="100%" height="500"></iframe>
                        
                    </div>
            </div>
          </div>
        </div>
      </div>
  </div>



<!-- =============footer==================== -->
<footer class="col-md-12 pt-5 pb-5 mt-5">
    
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
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    
  </body>
</html>
<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>
<?php header('Content-type: text/html; charset=UTF-8'); ?>
<?php
    
    $db = new Database();
    $fm = new format();
    $email1 = isset($_POST['email1']) ? $_POST['email1'] : '';
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
    $districts = $db->select('select * from districts');
    $cookie_name = "user";
    
    if(!isset($_COOKIE[$cookie_name])) {
        #__Cookies are not set
        //echo "<script>alert('Our system do not support Incognito or Private Mode')</script>";
        date_default_timezone_set('Asia/Dhaka');
        $cookie_value = date("h:i:sa").substr(md5(mt_rand()), 0, 40);
        setcookie($cookie_name, $cookie_value, time() +60*60*24*30);
        
    } else {
        #__If cookies are set
        #echo $_COOKIE[$cookie_name];
        
        
        
        if(isset($_POST['submit_vote'])){
            
            $name = safeOutput($_POST['name']);
            $phone = safeOutput($_POST['phone']);
            $email = safeOutput($_POST['email']);
            $district = safeOutput($_POST['district']);
            $election_area = safeOutput($_POST['election_area']);
            $topic = $_POST['topic'];
            $comments = $_POST['comment'];
            
            foreach ($topic as $key => $value) {
                $string=$comments[$key];
                $commentss = str_replace("'"," ",$string);
                $comment = safeOutput($commentss);
                if($topic[$key] == NULL) $tpc = "Others"; else $tpc = $topic[$key];
             	$db->insert("INSERT INTO `vote` (`id`, `name`, `phone`, `email`, `election_area`, `topic`, `comment`, `user_id`) VALUES (NULL, '$name', '$phone', '$email', '$election_area', '$tpc', '$comment', '$_COOKIE[$cookie_name]')");
            }
                header('Location: /manifesto/?share='.$_COOKIE['user'].'&fb=1');
        }
        
    }
    

?>


<?php
    require_once 'vendor/autoload.php';
    use App\classes\Vote;

    $id = " ";
    $vote = new Vote(); // Create an instance of the Vote class
    $queryResult = $vote->getAllVoteInfo($id); 
?>

<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Amar.Vote</title>
    <meta property="og:title" content="Amar.Vote | Youth Participation in Elections Process" />
    <meta property="og:url" content="https://www.amar.vote" />
    <meta property="og:image" content="/assets/img/fbPost.png" />
    <meta name="og:description" content="কেমন বাংলাদেশ চাই ? তৈরি করুন জনতার ইশতিহার What should be the future of Bangladesh ? Create Your Public Manifesto">
    

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    
  
    
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/select2.min.css">
   
    <style>* {font-family: 'Kalpurush' !important; font-size: 18px;} .fab {font-family: "Font Awesome 5 Brands" !important;}</style>
    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="fav.png" type="image/x-icon">
    <link rel="icon" href="fav.png" type="image/x-icon">
<script>
$(document).ready(function() {
	var max_fields      = 10; //maximum input boxes allowed
	var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	var add_button      = $(".add_field_button"); //Add button ID
	
	var x = 1; //initlal text box count
	$(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			$('#allFields').append(' <div class="form-field"><select name="topic['+x+']" class="full-width topic"><option value="">-- টপিক --</option><option value="Education">শিক্ষা</option><option value="Health">স্বাস্থ্য</option><option value="Employment">কর্মসংস্থান</option><option value="Youth">যুব উন্নয়ন</option><option value="Freedom of Speech">বাক স্বাধীনতা</option><option value="Women Issue">নারী উন্নয়ন</option><option value="Children Issue">শিশু বিষয়ক</option><option value="Liberation War">মুক্তিযুদ্ধ বিষয়ক</option><option value="Others">অন্যান্য</option></select></div><div class="form-field"><textarea name="comment[' + x + ']" id="contactMessage[]" placeholder="আপনার বার্তা / ম্যানিফেস্টো" rows="10" cols="50" class="full-width"></textarea></div>');
			//add input box
		}else{
		    alert('একবারে ১০টির বেশি যোগ করা যাবে না ।  ');
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});    
    
</script>
<?php include 'tracker.php'; ?>


<style>
    .s-pages{
        min-height: 100px;
        position: relative;
    }
    .s-pages .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: .6;
        background-color: #000000;
    }
    .s-pages .shadow-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: .4;
        background: -moz-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        background: -webkit-linear-gradient(top, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
        filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#cc000000', GradientType=0);
    }
    .vote_list_box {
        height: 80vh;
        overflow: hidden;
        margin-top: -100px;
        /*border: 1px solid #009966;*/
        padding: 5px;
    }
    
    .card_design {
        position: relative;
        padding: .75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: .25rem;
        color: #094586;
        background-color: rgba(204, 229, 255, 0.7);
        border-color: #b8daff;
    }
    
    .card_design p {
        margin-bottom: 2px;
    }
    
    .voteNo {
        font-size: 15px;
    }
    
    .success {
        background: #218838;
        color: #fff;
    }
    
    .primary {
        background: #0069d9;
        color: #fff;
    }
    
    .info {
        background: #138496;
        color: #fff;
    }
    
    .danger {
        background: #dc3545;
        color: #fff;
    }
    
    .btn_custom {
        display: inline-block;
        font-family: "montserrat-medium", sans-serif;
        padding-left: 5px;
        padding-right: 5px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        border: 0;
        border-radius: 5px;
        margin-bottom: 1rem;
        font-size: 15px;
    }
    
    .btn_custom:hover {
        background: #F44336;
        color: #fff;
    }
    
    .like_icon {
        width: 20px;
        margin-bottom: -6px;
    }
    
    @media only screen and (max-width: 400px) {
        .vote_list_box {
            margin-top: 0px;
        }
    }

    
    
</style>
</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="assets/img/amarVotebd.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span><!----></span></a>

            <div class="header-nav__content">
                <!--<h3>Menu</h3>-->
                
                <ul class="header-nav__list">
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">বাংলা ভার্শন</a></li>
                    <li><a href="/english" title="about">English Version</a></li>
                    <li><a class="smoothscroll"  href="#about" title="about">About</a></li>
                    <li><a href="evm" title="view">Use of EVM</a></li>
                    <li><a href="map" title="view">Election Map</a></li>
                    <li><a href="party_manifesto" title="view">Party Manifestos</a></li>
                    <li><a href="manifesto" title="view">See Public Inputs</a></li>
                    <li><a class="smoothscroll"  href="#vote" title="Vote">Add Your Inputs</a></li>
                </ul>
    
     

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <!--<span class="header-menu-text">Menu</span>-->
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="images/shapla.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">
                <div class="col-six">
                    <h3>#আমারভোট </h3>

                    <h1>
                        কেমন বাংলাদেশ চাই <br>
                        তৈরি করুন <br>
                        জনতার ইশতিহার <br><br><br><br>
                    </h1>
                </div>
                
                <div class="col-six vote_list_box" id="vot-tricker">
                     <ul >
                    <?php
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($queryResult)){
                    ?>
                    <div class="card-body card_design">
                        <p class="card-text text-justify"> </p>
                        <a id=" <?= $data['id'];?>" class="btn_custom success likeMe"><img class="like_icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANlSURBVGhD7ZlLbExhGIbrLqlrQ4M0gtBYuUR00VXLgp2NayIqgkVFJCxslLrWQpogLAjVRkywIRELCRsSRNKEBeJSC1KaJjREqOrU89U7k9ZME+ecOef8k8yTvPnOvP8536XTnvN3pqhAgQLRk0wmy9AN1I0+oKNojJbzAxqeit71AbHXosHxXcJwneY2NDqMhm+r8fuoBC1FH+Vt0KluQ6O71XA7KpVt/g75CVnuQp9LaNT+JnrRctn98Lpag9yT5SY0OB69UrMNstPg1Wrtoiw3ocEWNfqIMEp2GvzHWl8tyz1obqM1CV0cz5adBq/CFokdhNGy3YLm5qGvajTrHQm/WeuHZbmF/XRp7omazPq7j2/PFLsB9KDpst2Cxk5oiBeoWPYg8PfpnKuy3ILGViLjJ1osexD0b+9YuwaplO0O9DWNxj6pwV2yM2Btk85pleUO9GVbkDtq8Ja91lIGNoDOWyfLHWhqr5qzX5kpsjNgrUrndaJyDuf8K/wy4uQsGqs04UDhCpTagiyTnRXWEzTkG65vQ3Uot1t/Ek5Ab1XkmOwh4Zxt6Lld8x/qQJ8HqLt/GuDYtv4ZOwXfkPCcEj8kjJQdCpafOtXovdWE7VoKBgkXIOMHmis7dKi11aYgNssKBolOK2GjrEgYMMgFWcEg0UslzPrgCwvqHVLdA7L8Qx57bthdqofjEbIjgZoNGuQbWivbH+SZaMmgS1ZkUHMcA5y14sRfqFxL3iFHbIOkoPalvy301cvyDhfHPgjvxBZrgNgkyztc78Igl60B4kFZ3uH6WAeh+T3ICPYMY4DYBqHxStW2d+OIbH+QI7ZBqGl3rZtWnPgFzdCSd8jhwt/IdWuAWCfLO1wf+yDU3mwNMEje37WuqIdAzxHbotg/U785jnSLQr1J1D1jExBtizRfS/4gyWslWygrEqiX+kfOfpA1sv1DkpOWEI7LigTqpj68qJUVDHItIpntgL9zPFN26FBvpwY5JSs4JGtS0meoRHaoUC51t2qRFRySFdsQSvyGUKWlUKCGfd/yVPWG/BDQFyQsRQ8sucGxfRdST6whrsmFyLUe7UdtvLYarSj33waT2z7PtY1cpxUKE2rYJ/2zVDocKGADrSDaO3KeeC0XIlcCNaJVvM6Pr7ILFCgQJUVFfwACGbYukKU8yQAAAABJRU5ErkJggg=="> <?php echo $data['like_count'];?> Support</a>
                        <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote/manifesto/?mid=<?php echo $data['id']; ?>&redirect_uri=https%3A%2F%2Famar.vote" class="btn_custom primary"><i class="fab fa-facebook-f"></i> Share</a>
                       <?php if($data['election_area'] != NULL) { echo '<a href="#" class="btn_custom info">From <span class="voteNo">'.$data['election_area'].'</span></a>'; } ?>
                        <a href="/manifesto/?topic=<?php echo $data['topic'];?>&search_topic=submit" class="btn_custom danger"><?php echo $data['topic'];?></a>
                    </div>
                     <?php } ?>
                    </ul >
                </div>
                
                <div class="home-content__buttons">
                    <a href="#vote" class="smoothscroll btn btn--stroke">আপনার পয়েন্ট যুক্ত করুন</a>
                    <a href="/manifesto" class="btn btn--stroke">অন্যদের যুক্ত করা ইশতিহার দেখ</a>
                </div>
                
            </div>
            <!--other Page links-->
            
            <div class="row home-content__main">
                <style>
                    .other-pages .btn.custom {
                        width: 215px !important;
                        border-color: #FFFFFF;
                        color: #FFFFFF;
                        margin: 1.5rem 1.5rem 0 0;
                        letter-spacing: .25rem;
                        -webkit-transition: all 0.5s ease-in-out;
                        transition: all 0.5s ease-in-out;
                        background: transparent !important;
                        font-weight: bold;
                    }
                    a.btn.custom:hover{
                        background: #ffffff !important;
                        color: #000 !important;
                    }
                </style>
                <div class="col-full">
                    <div class="other-pages text-center">
                        <a class="btn custom" href="map">Election Map</a>
                        <a class="btn custom" href="party_manifesto">Political Manifestos</a>
                        <a class="btn custom" href="evm">Intro To EVM</a>
                    </div>
                </div>
            </div>





            <div class="home-content__scroll">
                <a href="/english" class="scroll-link">
                    <span>Go to English Version</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <!-- li>
                <a href="#1"><i class="fas fa-language" aria-hidden="true"></i><span>Language</span></a>
            </li -->
            <li>
                <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote&redirect_uri=https%3A%2F%2Famar.vote"><i class="fab fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="https://twitter.com/home?status=%23Bangladesh%20Youth%20are%20crowdsourcing%20a%20manifesto%20for%20General%20%23Elections%20https%3A//amar.vote"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <!--<li>-->
            <!--    <a href="#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>-->
            <!--</li>-->
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->

    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-2 display-2--light">আমার ভোট কি ?</h1>
                <!--<h2>এটি আমার ভোট প্ল্যাটফরম এর বিটা ভার্সন </h2>-->
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full">
                <p>        ম্যানিফেস্টো বা ইশতিহার হচ্ছে একটি বিবৃতি যা কোন ব্যক্তি বা দল, বিশেষত কোন রাজনৈতিক দল, বা কোন সরকার দ্বারা প্রকাশিত হয়, যা দ্বারা তারা তাদের লক্ষ্য এবং নীতি প্রকাশ করে। নির্বাচনী ইশতিহার একটি রাজনৈতিক দল দ্বারা প্রকাশিত একটি বিবৃতি, যা তারা নির্বাচনে জয়লাভ করলে কী করবে তা ব্যাখ্যা করে। নির্বাচনী ইশতিহারের মাধ্যমে ভোটাররা যে দলগুলোকে ভোট দিতে যাচ্ছেন তার নীতিগুলি সম্পর্কে জানতে পারে। ভোটাররা রাজনৈতিক দল্গুলোর ইশতিহার পাঠ করার মাধ্যমে সহজে নির্ধারন করতে পারে কোন রাজনৈতিক দল কে তারা ভোট দিবে অথবা দিতে চায়। 
<br><br>
জনগণের অংশগ্রহণ, বিশেষ করে তরুণদের এই প্রক্রিয়ার অংশগ্রহণ নিশ্চিত করাই এই প্ল্যাটফরমের মূল লক্ষ্য। তরুণদের জন্য রাজনৈতিক প্রক্রিয়ায় নিজেদের মতামত তুলে ধরার সীমিত সুযোগ রয়েছে। এ কারনেই “আমার.ভোট” প্লাটফরম তৈরি করা হয়েছে।  এ প্ল্যাটফর্মের বৈশিষ্ট্য হচ্ছে এখানে আপনার কাছে যে বিষয়গুলো অগ্রাধিকারপ্রাপ্ত সেগুলি এখানে যোগ করতে পারবেন। আপনি পরবর্তী সরকারের কাছে কি আশা করেন এবং কিভাবে তারা সুষ্ঠভাবে দেশ পরিচালনা করতে পারে সে বিষয়গুলিও আপনি এখানে উপস্থাপন করতে পারবেন। এছাড়াও আপনি অন্যান্য ব্যবহারকারীদের দ্বারা যোগ করা অন্যান্য ম্যানিফেস্টো সমর্থন করতে পারবেন। এভাবেই আমার.ভোট প্লাটফরম সাধারণ মানুষের, বিশেষত তরুণদের ইচ্ছা এবং আকাঙ্ক্ষা প্রতিফলিত করবে। বাংলাদেশের রাজনৈতিকদলগুলো এভাবেই আমার.ভোট প্লাটফরম থেকে জনসাধারণের এবং তরুণদের মতামত জেনে তাদের নিজস্ব নির্বাচনী ম্যানিফেস্টো বা ইশতিহারে সেগুলো যোগ করতে পারবে। 
</p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">
                
            <div class="col-block stats__col ">
                <div class="stats__count"><?php echo $count_visitor ?></div>
                <h5>জন দেখেছেন</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count"><?php echo $count_points ?></div>
                <h5>টি সাবমিশন </h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count"><?php echo $count_support ?></div>
                <h5>টি সাপোর্ট</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">1</div>
                <h5>বাংলাদেশ</h5> 
            </div>

        </div> <!-- end about-stats -->

        <div class="about__line"></div>

    </section> <!-- end s-about -->


   

    <!-- contact
    ================================================== -->
    <section id="vote" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-2 display-2--light">তৈরি করুন জনতার ইশতিহার </h1>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">
            
            
            <style>
                .topic option {
                    color: #39b54a;
                }
            </style>
            
            <div class="contact-primary">

                <h3 class="h6"></h3>

                 <div>
                    ইশতিহারে নতুন কিছু যোগ করার সময় শেষ হয়েছে। ধন্যবাদ । 
                </div> 

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>

            </div> <!-- end contact-primary -->

            <div class="contact-secondary">
                <div class="contact-info">

                    <!-- h3 class="h6 hide-on-fullwidth">Contact Info</h3 -->

                    <div class="cinfo">
                        <h5>নাম, ফোন নম্বর কি বাধ্যতামূলক ? </h5>
                        <p>
                            নাম, ইমেইল, ফোন বাধ্যতামূলক নয় । কিন্তু নকল / ভুয়া মেসেজ পরিহারের জন্য এই তথ্য সহায়ক । ফোন নম্বর কিংবা ইমেইল কখনই প্রকাশিত হবে না । <br>
                           
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>ইলেকশন এরিয়া কি ?</h5>
                        <p>
                            আপনি যে এলাকা থেকে ভোটার সেটি আপনার ইলেকশন এরিয়া । আপনার ভোটিং এলাকা না জানা থাকলে এই ক্ষেত্রটি খালি রাখতে পারেন । 

                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>টপিক কি ? </h5>
                        <p>
                            আপনি যে বিষয়ে আপনার আকাঙ্ক্ষাটি যুক্ত করতে চান সেটি হচ্ছে টপিক । আপনি সব মেসেজ / পয়েন্ট একই টপিকের দিতে পারেন কিংবা আলাদা আলাদাও দিতে পারেন । 
 
                        </p>
                    </div>

                    <!-- ul class="contact-social"
                        <li>
                            <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
                        </li>
                    </ul --> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

                <div class="footer-logo"></div>
                <!--Amar.Vote is an open platform initiatied by Preneur Lab - Social Good Company. This is the beta version of the system. The aim is to empower and engage mass people, specially youth, in positive and constructive politicial process.-->

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>More features and area-wise candidate list will be launched soon. Please subscribe to get more updates on National Elections 2018.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true" action="index.php" method="post">
                        <input type="email" value="" name="email1" class="email" id="mc-email" placeholder="Email Address">
                        <input type="submit" name="subscri" value="Subscribe">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>

            </div>

        </div> <!-- end footer-main -->

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright 2024</span> 
                    <span>Initiative of <a href="">Shareiar Islam</a></span>	
                </div>

                <div class="go-top">
                    <a class="" title="Back to Top" href="/english"><i class="icon-language" aria-hidden="true">English</i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- photoswipe background
    ================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                    "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                    "Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
                "Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div> <!-- end photoSwipe background -->
    
    <style>
        .loder_wide {
            width: 10%;
        }
    </style>


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <img src="https://amar.vote/images/photoswipe/loading.gif" class="loder_wide" alt="Logo">
            <!--<div class="line-scale-pulse-out">-->
            <!--    <div></div>-->
            <!--    <div></div>-->
            <!--    <div></div>-->
            <!--    <div></div>-->
            <!--    <div></div>-->
            <!--</div>-->
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/vaakash/jquery-easy-ticker/master/jquery.easy-ticker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        
        $(document).ready(function() {
            var voteStatus = $('#voteStatus').val();
            if(voteStatus === 'alreadyDone'){
                swal("You have already submit your vote !", "", "error");
            }
        });
    </script>
    
    <script>
        $(document).ready(function(){
            	var dd = $('#vot-tricker').easyTicker({
            		direction: 'up',
            		easing: 'easeInOutBack',
            		speed: 'slow',
            		interval: 2000,
            		height: '80vh',
            		visible: 1,
            		mousePause: 1,
            		hoverpause: true
            	});
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
<?php include'config/config.php';?>
<?php include'lib/Database.php';?>
<?php include'lib/functions.php';?>
<?php include'helpers/format.php';?>

<?php
    
    $db = new Database();
    $fm = new format();
    $email1 = $_POST['email1'];
    if ($email1 != NULL)
    {
        if (filter_var($email1, FILTER_VALIDATE_EMAIL)) {
              
              $db->insert("INSERT INTO `email` (`email`) VALUES ('$email1')");
        ?><script>
        alert("Thank You! We will keep you posted.");
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
    
    $queryResult = Vote::getAllVoteInfo($id);


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
    <meta property="og:url" content="https://www.amar.vote/english.php" />
    <meta property="og:image" content="/assets/img/fbPost<?php echo $extraa; ?>.png" />
    <meta name="og:description" content="কেমন বাংলাদেশ চাই ? তৈরি করুন জনতার ইশতিহার What should be the future of Bangladesh ? Create Your Public Manifest
    
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/vendor.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <!-- script
    ================================================== -->
    <script src="/js/modernizr.js"></script>
    <script src="/js/pace.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="/fav.png" type="image/x-icon">
    <link rel="icon" href="/fav.png" type="image/x-icon">
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
			$('#allFields').append(' <div class="form-field"><select name="topic['+x+']" class="full-width topic"><option value="">-- Select Topic --</option><option value="Education">Education</option><option value="Health">Health</option><option value="Employment">Employment</option><option value="Youth">Youth</option><option value="Freedom of Speech">Freedom of Speech</option><option value="Women Issue">Women Issue</option><option value="Children Issue">Children Issue</option><option value="Liberation War">Liberation War</option><option value="Others">Others</option></select></div><div class="form-field"><textarea name="comment[' + x + ']" id="contactMessage[]" placeholder="Your Message" rows="10" cols="50" class="full-width"></textarea></div>');
			//add input box
		}else{
		    alert('Maximum fields added...');
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
	})
});    
    
</script>
<?php include 'tracker.php'; ?>

<style>
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
    
    .amartext h1 {
       font-size: 48px; 
    }
    @media only screen and (max-width: 400px) {
        .vote_list_box {
            margin-top: 0px;
        }
    }
</style>
</head>

<body id="top">
    
    <input type="hidden" value="<?php if (isset($_GET['voteStatus'])){echo $_GET['voteStatus'];} ?>" id="voteStatus">

    <!-- header
    ================================================== -->
    <header class="s-header">

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

        <a class="header-menu-toggle" href="/#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="/images/shapla.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">
                
                <div class="col-six amartext">
                    <h3>#AmarVote</h3>

                    <h1>
                        What should be the future of Bangladesh ? <br>
                        Create Your <br>
                        Public Manifesto<br><br>
                    </h1>
                </div>
                
                <div class="col-six vote_list_box" id="vot-tricker">
                     <ul >
                    <?php
                        $i = 1;
                        while ($data = mysqli_fetch_assoc($queryResult)){
                    ?>
                    <div class="card-body card_design">
                        <p class="card-text text-justify">  <?= strlen($data['comment'] ) > 601 ? substr($data['comment'] , 0, 600) :  $data['comment'] ?><? if(strlen($data['comment'] ) > 601) echo '...'; ?></p>
                        <a id=" <?php echo $data['id'];?>" class="btn_custom success likeMe"><img class="like_icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAANlSURBVGhD7ZlLbExhGIbrLqlrQ4M0gtBYuUR00VXLgp2NayIqgkVFJCxslLrWQpogLAjVRkywIRELCRsSRNKEBeJSC1KaJjREqOrU89U7k9ZME+ecOef8k8yTvPnOvP8536XTnvN3pqhAgQLRk0wmy9AN1I0+oKNojJbzAxqeit71AbHXosHxXcJwneY2NDqMhm+r8fuoBC1FH+Vt0KluQ6O71XA7KpVt/g75CVnuQp9LaNT+JnrRctn98Lpag9yT5SY0OB69UrMNstPg1Wrtoiw3ocEWNfqIMEp2GvzHWl8tyz1obqM1CV0cz5adBq/CFokdhNGy3YLm5qGvajTrHQm/WeuHZbmF/XRp7omazPq7j2/PFLsB9KDpst2Cxk5oiBeoWPYg8PfpnKuy3ILGViLjJ1osexD0b+9YuwaplO0O9DWNxj6pwV2yM2Btk85pleUO9GVbkDtq8Ja91lIGNoDOWyfLHWhqr5qzX5kpsjNgrUrndaJyDuf8K/wy4uQsGqs04UDhCpTagiyTnRXWEzTkG65vQ3Uot1t/Ek5Ab1XkmOwh4Zxt6Lld8x/qQJ8HqLt/GuDYtv4ZOwXfkPCcEj8kjJQdCpafOtXovdWE7VoKBgkXIOMHmis7dKi11aYgNssKBolOK2GjrEgYMMgFWcEg0UslzPrgCwvqHVLdA7L8Qx57bthdqofjEbIjgZoNGuQbWivbH+SZaMmgS1ZkUHMcA5y14sRfqFxL3iFHbIOkoPalvy301cvyDhfHPgjvxBZrgNgkyztc78Igl60B4kFZ3uH6WAeh+T3ICPYMY4DYBqHxStW2d+OIbH+QI7ZBqGl3rZtWnPgFzdCSd8jhwt/IdWuAWCfLO1wf+yDU3mwNMEje37WuqIdAzxHbotg/U785jnSLQr1J1D1jExBtizRfS/4gyWslWygrEqiX+kfOfpA1sv1DkpOWEI7LigTqpj68qJUVDHItIpntgL9zPFN26FBvpwY5JSs4JGtS0meoRHaoUC51t2qRFRySFdsQSvyGUKWlUKCGfd/yVPWG/BDQFyQsRQ8sucGxfRdST6whrsmFyLUe7UdtvLYarSj33waT2z7PtY1cpxUKE2rYJ/2zVDocKGADrSDaO3KeeC0XIlcCNaJVvM6Pr7ILFCgQJUVFfwACGbYukKU8yQAAAABJRU5ErkJggg=="> <?php echo $data['like_count'];?> Support</a>
                        <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote/manifesto/?mid=<?php echo $data['id']; ?>&redirect_uri=https%3A%2F%2Famar.vote" class="btn_custom primary"><i class="fab fa-facebook-f"></i> Share</a>
                       <?php if($data['election_area'] != NULL) { echo '<a href="#" class="btn_custom info">From <span class="voteNo">'.$data['election_area'].'</span></a>'; } ?>
                        <a href="/manifesto/?topic=<?php echo $data['topic'];?>&search_topic=submit" class="btn_custom danger"><?php echo $data['topic'];?></a>
                    </div>
                     <?php } ?>
                    </ul >
                </div>
                
                <div class="home-content__buttons">
                    <a href="/english#vote" class="smoothscroll btn btn--stroke">Submit Your Points</a>
                    <a href="/manifesto" class="btn btn--stroke">See Others' Posts</a>
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
                        <a class="btn custom" href="/map">Election Map</a>
                        <a class="btn custom" href="/party_manifesto">Political Manifestos</a>
                        <a class="btn custom" href="/evm">Intro To EVM</a>
                    </div>
                </div>
            </div>


            </div>

            <div class="home-content__scroll">
                <a href="/index.php" class="scroll-link">
                    <span>বাংলা ভার্শন দেখুন</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <!-- li>
                <a href="/#1"><i class="fas fa-language" aria-hidden="true"></i><span>Language</span></a>
            </li -->
            <li>
                <a href="https://www.facebook.com/dialog/share?app_id=589133134568238&display=popup&href=https%3A%2F%2Famar.vote&redirect_uri=https%3A%2F%2Famar.vote"><i class="fab fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="https://twitter.com/home?status=%23Bangladesh%20Youth%20are%20crowdsourcing%20a%20manifesto%20for%20General%20%23Elections%20https%3A//amar.vote"><i class="fab fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <!--<li>-->
            <!--    <a href="/#0"><i class="fab fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="/#0"><i class="fab fa-behance" aria-hidden="true"></i><span>Behance</span></a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a href="/#0"><i class="fab fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>-->
            <!--</li>-->
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-2 display-2--light">What is "amar.vote" ?</h1>
                <!--<h2>This is the beta version of the platform</h2>-->
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full">
                <p>
                Amar.Vote is an open platform. Amar.Vote will help mass people to make their voices heard. There are two core features of i) Crowdsourced Manifesto and ii) Candidate Information. Manifesto is a public declaration of policy and aims, specially one issued before an election by a political party or candidate. Manifesto reflects the position on different important issues and also directions which will be followed by the party or candidate. 
                
                <br><br>
                
                
Amar.Vote aims to engage mass people, specially youth in the political process in positive and constructive way. There is a limited opportunity for mass people to have their say on national important issues. Amar.Vote aims to solve that. Here you can add the topics and points you think should be part of manifestos of political parties. You can add your expectations and what future you want for Bangladesh. You can also support points added by others. This is how a crowdsourced manifesto will be created that refelcts the voice of mass people. The manifesto will be handed over to the political parties to consider. Political parties will be able take the inputs and reflect the voice of the mass people in their policies for Bangladesh
</p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">
                
            <div class="col-block stats__col ">
                <div class="stats__count"><?php echo $count_visitor ?></div>
                <h5>Page Views</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count"><?php echo $count_points ?></div>
                <h5>Submissions </h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count"><?php echo $count_support ?></div>
                <h5>Supports</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">1</div>
                <h5>Bangladesh</h5> 
            </div>

        </div>  <!-- end about-stats -->

        <div class="about__line"></div>

    </section> <!-- end s-about -->


   

    <!-- contact
    ================================================== -->
    <section id="vote" class="s-contact">

        <div class="overlay"></div>
        <div class="contact__line"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h1 class="display-2 display-2--light">Create Your Manifesto </h1>
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

                <form name="contactForm" id="contactForm" method="post" action="" novalidate="novalidate">
                    <fieldset>
                        
                        <div id="allFields">
                            <div class="form-field">
                                <input name="name" type="text" id="name" placeholder="Your Name" value="" class="full-width">
                            </div>
                            
                            <div class="form-field">
                                <input name="phone" type="number" id="number" placeholder="Your Number" value=""  class="full-width">
                            </div>
                            
                            <div class="form-field">
                                <input name="email" type="email" id="email" placeholder="Your Email" value="" class="full-width">
                            </div>
                            
                            <div class="form-row form-field">
                                <div class="form-group">
                                      <select name="election_area" class="form-control js-example-basic-single full-width topic" id="exampleFormControlSelect1">
                                          <option value="">-- Select Election Area (Optional) --</option>
                                          <?php
                                            while($row = $districts->fetch_object()){
                                                echo '<option value="'.$row->election_area.'">'.$row->election_area.'</option>';
                                            }
                                          ?>
                                      </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <select name="topic[1]" class="full-width topic">
                                    <option value="">-- Select Topic --</option>
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
                            
                        
                            <div class="form-field">
                                <textarea name="comment[1]" id="contactMessage" placeholder="Your Message" rows="5" cols="50" class="full-width"></textarea>
                            </div>
                            
                        </div>
                    
                    <div class="input_fields_wrap">
                        <button class="add_field_button">Add More Fields</button>
                    </div>
                    
                    <div class="form-field">
                        <button class="full-width btn--primary" type="submit" name="submit_vote">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

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
                        <h5>Is it mandatory to add name and phone number ?
                             </h5>
                        <p>
                            Name, email and phone number are not mandatory but these will help to identify between real and fake inputs. Phone numbers and email addresses will never be published anywhere.
                              <br>
                           
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>What is "Election Area"
                            </h5>
                        <p>
                            "Election Area" is the area you are voter form. If you don't know your area you can leave it empty.
                       

                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>What is "Topic" ?
                            </h5>
                        <p>
                            "Topic" is the category of the point you are adding. You can add all points under same topic or under different topics.
                            
 
                        </p>
                    </div>

                    <!-- ul class="contact-social"
                        <li>
                            <a href="/#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="/#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="/#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="/#"><i class="fab fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="/#"><i class="fab fa-dribbble" aria-hidden="true"></i></a>
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
                Amar.Vote is an open platform initiatied by Preneur Lab - Social Good Company. The aim is to empower and engage mass people, specially youth, in positive and constructive politicial process.

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>More features and area-wise candidate list will be launched soon. Please subscribe to get more updates on National Elections 2018.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true" action="english.php" method="post">
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
                    <span>© Copyright 2018</span> 
                    <span>Initiative of <a href="http://www.preneurlab.com/">Preneur Lab - Social Good Company</a></span>	
                </div>

                <div class="go-top">
                    <a class="" title="Back to Bangla" href="/index.php"><i class="icon-language" aria-hidden="true">Bangla</i></a>
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
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/select2.min.js"></script>
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
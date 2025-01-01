<?php
//tracker starts
?>
<!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="/fav.png" type="image/x-icon">
    <link rel="icon" href="/fav.png" type="image/x-icon">
    <?php
//echo 'here: ';
$uip = $_SERVER['REMOTE_ADDR'];
$cookie = $_COOKIE['user'];
$page = $_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];

$track = $db->insert("INSERT INTO `analytics` (`userip`, `cookie`, `page`) VALUES ('$uip', '$cookie', '$page')");

$count_visitor = $db->counts("SELECT COUNT(`id`) AS `visitors` FROM `analytics`");

$count_points = $db->counts("SELECT COUNT(`id`) AS `visitors` FROM `vote`");

$count_support =  $db->counts("SELECT COUNT(`id`) AS `visitors` FROM `tbl_vote_count`");


//$cnt=mysql_fetch_assoc($cnt1);
//echo $cntn;

 ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?i$_SERVER['REMOTE_ADDR']d=UA-73942782-7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-73942782-7');
</script>
<?php
//tracker ends
?>
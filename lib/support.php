<?php 
include'../config/config.php';
include'Database.php';
include'functions.php';
include'../helpers/format.php';
$cookie_name = "user";
$db = new Database();

if(isset($_POST['likeId'])){
    
    $cookie_name = "user";
    
    $supporter_id = $_POST['likeId'];
    
    $tbl_vote_count = $db->select("select * from tbl_vote_count where supporter_id ='$supporter_id' AND voter_ip='$_COOKIE[$cookie_name]'");
    
    if($tbl_vote_count->num_rows){
        
        // header('Location: http://amar.vote/view_vote.php?voteStatus=already_done');
        
        echo '{"status" : "You already comlpete your vote"}';
        
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
            echo'You have successfully complete your vote';
            
            //echo"<script type='text/javascript'>alert('You have successfully supported this topic !');</script>";
            
        }else{
            
            // echo"<script type='text/javascript'>alert('Something went wrong !');</script>";
            echo"Something went wrong !";
            
        }
    }
    //$query = ;
    //

}

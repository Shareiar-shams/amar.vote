<?php
include'config/config.php';
include'lib/Database.php';
include'lib/functions.php';
include'helpers/format.php';

$db = new Database();
$fm = new format();

if(isset($_GET['likeMe'])){
    
    $cookie_name = "user";
    
    $supporter_id = $_GET['likeMe'];
    
    $tbl_vote_count = $db->select("select * from tbl_vote_count where supporter_id ='$supporter_id' AND voter_ip='$_COOKIE[$cookie_name]'");
    
    if($tbl_vote_count->num_rows){
        echo json_encode('already');
        
    }else{
        
        $vote = '';
        $tbl_vote_count_insert_query = "INSERT INTO `tbl_vote_count` (`id`, `supporter_id`, `voter_ip`, `vote`) VALUES (NULL, '$supporter_id', '$_COOKIE[$cookie_name]', '')";
        
        $db->insert($tbl_vote_count_insert_query);
        
        $vote_result = $db->select("select * from vote where id='$supporter_id'");
    
        $vote_row = $vote_result->fetch_object();
    
        $newLike = $vote_row->like_count + 1;
    
        $vote_query = "UPDATE vote SET like_count='$newLike' WHERE id='$supporter_id'";
        
        if($db->insert($vote_query)){
            $new_vote_result = $db->select("select * from vote where id='$supporter_id'");
            $new_vote_row = $new_vote_result->fetch_object();
            
            $return = ['status'=>'success', 'votes'=>$new_vote_row->like_count];
            echo json_encode($return);
            
        }else{
            
            // echo"<script type='text/javascript'>alert('Something went wrong !');</script>";
            echo json_encode('wrong Something went wrong !');
            
        }
    }

}
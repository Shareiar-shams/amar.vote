<?php
namespace App\classes;
use App\classes\Database;


class Vote
{
    public function saveVoteInfo($data) {
        $sql = "INSERT INTO vote (topic,description,status) VALUES ('$data[topic]','$data[description]','$data[status]')";

        if (mysqli_query(Database::dbConnection(), $sql)) {
            $message = 'Vote save successfully';
            return $message;
        } else {
            die('Query problem' .mysqli_error(Database::dbConnection()));
        }
    }

    public function getAllVoteInfoNew($election_name){
        if($election_name != NULL)
        {
        $sql = "SELECT * FROM `vote` WHERE `eid` LIKE '$election_name' ORDER BY `id` DESC";
        }
        else $sql = "SELECT * FROM `vote` ORDER BY `id` DESC";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult =  mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }
    public function getAllVoteInfo($id) {
        $db = new Database(); // Create an instance of the Database class
        $connection = $db->dbConnection(); 
        $sql = "SELECT * FROM `vote` ORDER BY `id` DESC";
        if(mysqli_query($connection, $sql)){ 
            $queryResult = mysqli_query($connection, $sql);
            return $queryResult;
        } else {
            die('Query problem' . mysqli_error($connection)); 
        }
    }
    
       public function getAllDelVoteInfo($id){
        $sql = "SELECT * FROM `vote_delete` ORDER BY `id` DESC";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult =  mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteVoteInfo($id){
        $sql = "INSERT INTO vote_delete SELECT * FROM vote WHERE id = '$id'";
        //$sql= "UPDATE `vote` SET `status`='0' WHERE `id` LIKE '$id'";
        $sql2 = "DELETE FROM vote WHERE id = '$id' ";
        if(mysqli_query(Database::dbConnection(),$sql) && mysqli_query(Database::dbConnection(),$sql2)){
            $message = "Vote info delete success";
            return $message;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

    public function getAllPublishedVote(){
        $sql = "SELECT * FROM vote WHERE status = 1 ";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult = mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
        }else{
            die('Query problem'.mysqli_error(Database::dbConnection()));
        }
    }

}
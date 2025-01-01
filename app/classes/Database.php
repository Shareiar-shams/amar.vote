<?php
namespace App\classes;

class Database
{
    public function dbConnection() {
        $hostName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'amarvote_2018';
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        //mysqli_set_charset($link,"utf8");
        return $link;
    }
}
<?php

    $server_name=$_SERVER['HTTP_HOST'];
    $username="root";
    $password="";

    $conn=mysqli_connect($server_name,$username,$password);
    if(!$conn){
        echo "Connection Problem";
    }
    else{
        // Connection is Ok
        $query="CREATE DATABASE IF NOT EXISTS ImageO;";
        if(mysqli_query($conn,$query)){
            $query="USE ImageO;";
            if(mysqli_query($conn,$query)){
                // echo "Database Created";
            }
            else{
                // echo "Database not Created";
            }
            
        }

    }


    function createTable($query){
        global $conn;
        if(mysqli_query($conn,$query)){
            return true;
        }
        else{
            return false;
        }
    }

    function insertInTable($query){
        global $conn;
        if(mysqli_query($conn,$query)){
            return true;
        }
        else{
            return false;
        }
    }



?>
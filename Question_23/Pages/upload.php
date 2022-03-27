<?php
    session_start();

    include_once "./../conn.php";
    function createImagesTable(){
        global $conn;
        $createTable="CREATE TABLE IF NOT EXISTS Images(

            imgId INT PRIMARY KEY AUTO_INCREMENT,
            imgUrl TEXT NOT NULL,
            uid INT,
            FOREIGN KEY(uid) REFERENCES Users(id)
            );";
    
            $status=mysqli_query($conn,$createTable);
            if($status){
                return true;
            }
            else{
                return false;
            }

    }
    function insertInImages($imgUrl,$uid){
        global $conn;
        $query="INSERT INTO Images(imgUrl,uid) VALUES('$imgUrl','$uid');";
        $status=mysqli_query($conn,$query);
        if($status){
            return true;
        }
        else{
            return false;
        }
    }
    $files=$_FILES['file'];
    $fileName=$files['name'];
    $from=$files['tmp_name'];

    $target_dir = "Images/";
    $target_file = $fileName;
    $to=$target_dir.basename($target_file);

    if(move_uploaded_file($from,$to)){
        // Create Images Table
        // Insert Url in Image table
        if(createImagesTable()){
            $imgUrl=$to;
            if(insertInImages($imgUrl,$_COOKIE['imageO_user'])){
                echo 200;
            }
        }


    }
    else{
        echo 500;
    }




?>
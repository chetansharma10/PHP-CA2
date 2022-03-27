<?php
    session_start();

    if($_SESSION['validated']){
        session_destroy();
        $_SESSION['validated']=false;
        $_SESSION['allUsers']=NULL;
        header("Location:index.php");
    }

?>
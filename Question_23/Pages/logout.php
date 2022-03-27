<?php
    session_start();
    if(count($_SESSION['imageO_user'])>0  ){
        
        $_SESSION['imageO_user']=array();
        setcookie('imageO_user',"",time()+ (86400 * 30), "/");
        session_destroy();
        $url="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_23/Pages/";

        header("location:$url");
        

    }

?>
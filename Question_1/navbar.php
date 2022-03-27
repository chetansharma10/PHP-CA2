<div class="nav">
    <?php
    session_start();
    $loginUrl="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_1/loginUser.php";
    $logOutUrl="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_1/logOut.php";
    $sessionUrl="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_1/session_details.php";

    if($_SESSION['validated']){
        echo '
        <a style="background-color:red;" href="'.$logOutUrl.'">Logout</a>
        ';

        echo '
        <a href="'.$sessionUrl.'">Sessions</a>
        ';
    }
    else{
        echo '
        <a href="'.$loginUrl.'">Login</a>
    ';

    }
   

  


    ?>

</div>
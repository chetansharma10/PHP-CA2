<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login -User</title>
    <link rel="stylesheet" href="./css/index.css">

</head>
<body>
    <div class="container" >

     
        <?php 
            $error="";
            $name=$_POST['name'];
            $password=$_POST['password'];
            $login=$_POST['login'];
            function validateUser($name,$password){
                $isOk=false;
                for($i=0;$i<count($_SESSION['allUsers']);$i++){
                    $dbName=$_SESSION['allUsers'][$i]['name'];
                    $dbPassword=$_SESSION['allUsers'][$i]['password'];

                    if( ($dbName==$name)&& (password_verify($password,$dbPassword))){
                        $isOk=true;
                        break;
                    }


                }
                if($isOk){
                    return 1;
                }
                return 0;
            }
            if(isset($login)){
                $error="Error";
                if(validateUser($name,$password)){
                    $_SESSION['validated']=true;
                    $url="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_1/session_details.php";
                    header("Location:".$url);
                    $error="<p style='color:green;font-family:sans-serif;font-size:13px;'>Success,Verified User</p>";
                }
                else{
                    $_SESSION['validated']=false;
                    $error="<p style='color:red;font-family:sans-serif;font-size:13px;'>Invalid Username and Password</p>";
                }
                
            }
            else{
                $error="<p style='color:red;font-family:sans-serif;font-size:13px;'>Invalid Account Details</p>";
            }

        ?>
        <form action="./loginUser.php" method="POST">
                <img src="./images/login.png">
                <input type="text" placeholder="Username here" name="name">
                <input type="password" placeholder="Password here" name="password">
                <input type="submit" id="btn" name="login" value="Login Account">
                <?php echo $error;?>
        </form>
    </div>
</body>
</html>

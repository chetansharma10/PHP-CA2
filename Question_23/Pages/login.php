<?php

    session_start();
    function setCook($name,$value){
        setcookie($name,$value,time()+ (86400 * 30), "/");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ImageO-Login Page</title>
  </head>
  <body>
    <div class="container">
        <?php  
            include_once "nav.php";
        ?>

        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-6 ">
                <h2>Login Here</h2>
                <form action="./login.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <div id="emailHelp" class="form-text">Password length should be at least 8 digits.</div>

                    </div>
                  
                    <button type="submit" class="btn btn-primary">Login Now</button>
                    <?php
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        if(strlen($email)>0 && strlen($password)>=8){
                            $query="SELECT * FROM Users WHERE email='$email' ;";
                            $result=mysqli_query($conn,$query);
                            if($result){
                                $data=mysqli_fetch_row($result);
                                $pass_new=$data[3];
                                if(password_verify($password,$pass_new)){

                                    if($data[5]){
                                        //Cookie Set Here
                                        $_SESSION['imageO_user']=$data;

                                        setCook("imageO_user",$data[0]);

                                        $url="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_23/Pages/";
                                        header("location:$url");
                                    }
                                    else{
                                        echo "<p class='text-danger'>Please verify your account or check your email for verification link</p>";

                                    }
                               

                                    
                                }
                                else{
                                    echo "<p class='text-danger'>Invalid Password</p>";

                                }
                            }
                            else{
                                echo "<p class='text-danger'>Invalid Email or Password</p>";
                            }
                        }
                        else{
                            echo "<p class='text-danger'>Please fill required fields properly</p>";
                        }

                    




                    ?>
                </form>

            </div>
        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>

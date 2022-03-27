<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ImageO-Sign Up Page</title>
  </head>
  <body>
    <div class="container">
        <?php  
            include_once "nav.php";
        ?>

        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-6 ">
                <h2>Sign Up Here</h2>
                <form action="./signup.php" method="POST" >

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="usernameHelp" class="form-text">Your Username should be unique and straight forward.</div>
                   
                    </div>

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
                  
                    <button type="submit" class="btn btn-primary">Create your account now</button>
                    <?php
                        $createTableQuery=" CREATE TABLE IF NOT EXISTS Users
                                (id INT AUTO_INCREMENT PRIMARY KEY,
                                username VARCHAR(100) UNIQUE NOT NULL,
                                email VARCHAR(200) UNIQUE NOT NULL,
                                password VARCHAR(200) NOT NULL,
                                activation_code VARCHAR(200),
                                is_verified BOOLEAN DEFAULT False);";

                        $message="";
                        function generate_activation_code(): string
                        {
                            return bin2hex(random_bytes(16));
                        }
                        

                        if(createTable($createTableQuery)){
                            $username=$_POST['username'];
                            $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
                            $email=$_POST['email'];

                           
                            $pattern = "/".$username."/i";
                            $isOk=preg_match($pattern, $email);
                            if(!$isOk){
                                echo "<p class='text-danger'>Email Should contain Username</p>";
                            }
                            else{
                                $activationCode=generate_activation_code();
                                if(strlen($username)>0 && strlen($password)>=8 && strlen($email)>0)
                                {   

                                    
                                    $insertRecordQuery="INSERT INTO Users(username,email,password,activation_code)
                                    VALUES('$username','$email','$password','$activationCode')";
                                    if(insertInTable($insertRecordQuery))
                                    {
                                        $activation_link="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_23/verify.php?email=".$email."&activation_code=".$activationCode;
                                        include_once ".././mail.php";


                                        if(sendMail($email,$activation_link)){
                                            echo "<p class='text-success'>Mail Successfully Sended,Please check your email address</p>";
                                        }

                                        else{
                                            echo "<p class='text-danger'>Something went wrong,Please Try again</p>";
                                        }


                                    }
                                    else{
                                        echo "<p class='text-danger'>Something went wrong,Please Try again</p>";

                                    }

                                }
                                else{
                                            echo "<p class='text-danger'>Invalid Credentials</p>";
                                }//EndIF
                            }//EndIF
                        }
                        else{
                            echo "Server Problem 500";
                        }//EndIF
            
                    ?>
                </form>

            </div>
        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>

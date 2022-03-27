<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ImageO-Loading...</title>
  </head>
  <body>


    <div class="container">
        <div class="row align-items-center justify-content-center">
        <?php
            include_once "../Question_23/conn.php";
            $email=$_GET['email'];
            $activation_code=$_GET['activation_code'];

            function updateUser($email,$activation_code){
                global $conn;
                $query="UPDATE Users SET is_verified='1' WHERE email='$email' && activation_code='$activation_code'; ";
                $result=mysqli_query($conn,$query);
                if($result){
                    $url="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_23/Pages/login.php";
                    header("location:$url");
                }
                else{
                    echo "<p>Invalid Credentials</p>";

                }
            }
            function verifyCredentials($email,$activation_code){
                global $conn;
            
                $query="SELECT * from Users WHERE email='$email' && activation_code='$activation_code';";
                $result=mysqli_query($conn,$query);
                if($result){
                    $data=mysqli_fetch_row($result);
                    if(count($data)>0){
                        updateUser($email,$activation_code);
                    }
                    else{
                        echo "<p>Invalid Credentials</p>";
                    }
                }
                else{
                    echo "Error Founded";
                }


            }
            verifyCredentials($email,$activation_code);

        ?>
        </div>
    </div>

</body>
</html>
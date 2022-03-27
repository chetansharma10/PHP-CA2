<?php
    session_start();
?>

<form action="./registerUser.php" method="POST">
        <img src="./images/login.png">
        <input type="text" placeholder="Username here" name="name">
        <input type="password" placeholder="Password here" name="password">
        <input type="date" name="age" >
        <input type="submit" id="btn" name="save" value="Create Account">
        <?php
            if($_SESSION['status']==NULL){
                echo "<p style='color:red;font-family:sans-serif;font-size:13px;'>Invalid Fields</p>";
            }
            else{
               if($_SESSION['status']==200){
                   echo "<p style='color:green;font-family:sans-serif;font-size:13px;'>Account Created Successfully</p>";
                   
                }
            }
        ?>
</form>


<?php
  session_start();
  include_once ".././conn.php";

?>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-xl">
    <a class="navbar-brand" href="#">
        <strong>Image-O</strong>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image-alt" viewBox="0 0 16 16">
            <path d="M7 2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zm4.225 4.053a.5.5 0 0 0-.577.093l-3.71 4.71-2.66-2.772a.5.5 0 0 0-.63.062L.002 13v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4.5l-4.777-3.947z"/>
        </svg>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <?php 
            $host=$_SERVER['HTTP_HOST'];
            $baseUrl="http://".$host."/Assignment/Question_23/";
            echo '<a class="nav-link active" aria-current="page" href="'.$baseUrl.'Pages">Home</a>';            
          ?>

         </li>

         <li class="nav-item">


          <?php 
      
            if($_SESSION['imageO_user'] || strlen($_COOKIE['imageO_user'])>0  ){
              echo '<a class="nav-link active" aria-current="page" href="'.$baseUrl.'Pages/logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                  
                Logout
              </a>';

            }
            else{
              echo '<a class="nav-link active" aria-current="page" href="'.$baseUrl.'Pages/login.php">Login</a>';
            }

          ?>


         </li>


         <li class="nav-item">
          <?php 
            echo '<a class="nav-link active" aria-current="page" href="'.$baseUrl.'Pages/signup.php">Sign Up</a>';
          ?>
         </li>





      </ul>
  
    </div>
  </div>
</nav>
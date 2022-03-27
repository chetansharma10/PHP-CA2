<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ImageO-Home Page</title>
  </head>
  <body>
    <div class="container">
        <?php  
            include_once "nav.php";

            if($_SESSION['imageO_user']  && strlen($_COOKIE['imageO_user'])>0 )
            {
              echo '
              <div class="mb-3">
                <label for="formFile" class="form-label">Please select your favourite image  </label>
                <input id="selectedFile" class="form-control" type="file" accept="images/*" id="formFile">
              </div>';
            }
            else{
              echo '<h5 class="p-3">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
              </svg>
              Unauthenticated Users are not allowed to use this feature.
              
              
              </h5>';
            }

        ?>
        <p id="res" class="text-success"></p>

      

        <div class="d-flex justify-content-between " >
          <div class="p-2">
              <?php

                $ID=$_COOKIE['imageO_user'];
                $query="SELECT (imgUrl) FROM Images WHERE uid='$ID'";
                $result=mysqli_query($conn,$query);
                if($result){
                  $data=mysqli_fetch_all($result);
                  for($i=0;$i<count($data);$i++){
                    $urlx="http://".$_SERVER['HTTP_HOST']."/Assignment/Question_23/Pages/".$data[$i][0];
                    echo '<img src="'.$urlx.'" class="rounded"  width="250" alt="...">';
                  }
                }
                else{
                  echo "Not Founded";
                }  ?>
          </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./Js.js"></script>
  </body>
</html>
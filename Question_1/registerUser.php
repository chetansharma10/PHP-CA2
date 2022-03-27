
<?php
  session_start();
  function storeInSessions($data){
      
      if($_SESSION['allUsers']==NULL){
          // Create Session Storage
          $_SESSION['allUsers']=[];
       
      }
      
          // If Already Exists Than Add Data In It
          $prevSessionsValues=$_SESSION['allUsers'];
          array_push($prevSessionsValues,$data);
          $_SESSION['allUsers']=$prevSessionsValues;
      
      
  }

      $_SESSION['status']=NULL;
      $name=$_POST['name'];
      $password=$_POST['password'];
      $age=$_POST['age'];
      $set=$_POST['save'];
      if(isset($set)){
          if($name!=NULL && $age!=NULL && $password!=NULL){
              $password=password_hash($password,PASSWORD_DEFAULT);
              $dataObj=[
                'name'=>$name,
                'password'=>$password,
                'age'=>$age

              ];
            
              storeInSessions($dataObj);
              $_SESSION['status']=200;
              header("Location:index.php");
          }
          else{
             $_SESSION['status']=NULL;
             header("Location:index.php");
          }
      }
      else{
          header("Location:index.php");
      }
?>

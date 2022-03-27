<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
</head>
<body>
<?php
    session_start();
    if($_SESSION['validated']){
        $size=count( $_SESSION['allUsers'] );
        echo '<table>
                <tr>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Age</th>
                </tr>
        
        ';

       for($i=0; $i<$size;$i++ ){
            echo '
            <tr>
                <td>'.$_SESSION['allUsers'][$i]['name'].'</td>
                <td>'.$_SESSION['allUsers'][$i]['password'].'</td>
                <td>'.$_SESSION['allUsers'][$i]['age'].'</td>
            </tr>
            
            ';
       }
       echo '</table>';
    }
    else{
        header("Location:index.php");
    }
?>
</body>
</html>

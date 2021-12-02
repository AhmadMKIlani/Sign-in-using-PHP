<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <div>
<h1 style="color:red;">
<?php
    
    if(isset($_SESSION["welcome"])){
    print_r ($_SESSION["welcome"]);
    echo "<br>";
    die;
    }
?>
</h1>
    <h1>Hello Please Choose to sign in or register</h1>
    <img src="others/depositphotos_89930444-stock-illustration-student-with-laptop.jpg" alt="desk image" width = 600px>
    <a href="sign-in.php"><button type="button" class="btn btn-primary btn-lg btn-block" >Login</button></a>
    <a href="register.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Register</button></a>
    
    </div>
</body>
</html>
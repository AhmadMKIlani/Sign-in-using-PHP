<?php
session_start();
//session_destroy();

$_SESSION["Admin"] = array(
    "email"     => "Admin@hotmail.com",
    "firstnmae" => "Amid",
    "lastnmae"  => "Kilo",
    "DOB"       => "10/15/1991",
    "mNumber"   => "0123456789012345",
    "password"  => "Kilani12345!") ;



if(isset($_POST["submit"])){

    foreach ($_SESSION as $key => $value) {

        if ($key == "Admin") {
            if (is_array($value)) {
                if ($value["email"] == $_POST["email"] && $value["password"] == $_POST["password"]) {
                    header("location:Adminpage.php");
                    die();
                }
            }
        } else {
            if (is_array($value)) {
                if ($value["email"] == $_POST["email"] && $value["password"] == $_POST["password"] )
                 {  
                    $_SESSION["welcome"] = " Welcome my friend ". $_POST["email"]. " you are the main man ";
                    header("location:index.php");
                    die();
                }
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<!------ Include the above in your HEAD tag ---------->
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h1>Login</h1>
						 </div>
					</div>
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login">
                       
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="text" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="register.php" id="signup">Sign up here</a></p>
                           </div>
                        </form>
                 
				        </div>
			        </div>
                </div>
			</div>
		</div>
      </div>   
 
</body>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
</html>


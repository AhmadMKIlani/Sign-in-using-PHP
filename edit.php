<?php
     session_start();

     if(!isset($_SESSION["counter"])){
         $_SESSION["counter"] = 0;
        }
     $emailError = $mNumberError="";
    $fNameError = $lNameError =  $DOBError="";

     if(isset($_POST["email"])){
         $check = true;
            
           if(empty($_POST["firstname"])){
               $fNameError = "this feiled is required";
               $check = false;
               }
           if(empty($_POST["lastname"])){
               $lNameError = "this feiled is required";
               $check = false;
               }
           if(empty($_POST["DOB"])){
               $DOBError = "this feiled is required";
               $check = false;
               }elseif((date("Y") - substr($_POST["DOB"],0,4)) < 16){
                   $DOBError = "you are too young my freind";
                   $check = false;
                   }
           if(empty($_POST["mNumber"])){
               $mNumberError = "this feiled is required";
               $check = false;
               }else if(!preg_match("/^[0-9]{14}$/", $_POST["mNumber"])){
                   $mNumberError = "please enter a valid number";
                   $check = false;
                   }
           if(empty($_POST["email"])){
               $emailError = "this feiled is required";
               $check = false;
               }else if(!preg_match("/^[A-z0-9._-]+@(hotmail|gmail|yahoo).com$/", $_POST["email"])){
                   $emailError = "please enter a valid email";
                   $check = false;
                   }
         } 
         
$userEdite=$_GET["id"];

if (isset($_POST["edite-submit"])) {
    $_SESSION[$userEdite]["firstnmae"]  =   $_POST["firstname"];
    $_SESSION[$userEdite]["lastnmae"]   =   $_POST["lastname"];
    $_SESSION[$userEdite]["DOB"]        =   $_POST["DOB"];
    $_SESSION[$userEdite]["mNumber"]    =   $_POST["mNumber"];
    $_SESSION[$userEdite]["email"]      =   $_POST["email"];

    header("location:Adminpage.php");
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
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form name="registration" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text" value="<?php echo $_SESSION[$userEdite]["firstnmae"]?>" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                              <div  id ="first-feild "><?php echo $fNameError;?></div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text" value="<?php echo $_SESSION[$userEdite]["lastnmae"]?>" name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                              <div id ="second-feild"> <?php echo $lNameError;?> </div>  
                            </div>
                           <div class="form-group">
                              <label for="mobile number">Mobile Number</label>
                              <input type="text" value="<?php echo $_SESSION[$userEdite]["mNumber"]?>" name="mNumber" class="form-control" id="mNumber" aria-describedby="mobile-number" placeholder="Enter number">
                              <div id ="third-feild"><?php echo $mNumberError;?></div>   
                            </div>
                            <div class="form-group">
                              <label for="date of birth">D.O.B</label>
                              <input type="date" value="<?php echo $_SESSION[$userEdite]["DOB"]?>" name="DOB" class="form-control" id="DOB" aria-describedby="DOB" placeholder="Date Of Birth">
                              <div id ="DOB-feild"><?php echo $DOBError;?></div>   
                            </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="text" value="<?php echo $_SESSION[$userEdite]["email"]?>" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                              <div id ="fourth-feild"><?php echo $emailError;?></div>   
                            </div>
                           <div class="col-md-12 text-center mb-3">
                              <input  type="submit" name="edite-submit" class=" btn btn-block mybtn btn-primary tx-tfm" value= "submit"> 
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
         
</body>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<!-- <script src="JS/script.js"></script> -->
</html>


<?php
           
    session_start();


     if(!isset($_SESSION["counter"])){
        $_SESSION["counter"]= 1;
        }
    $passError = $emailError = $mNumberError="";
    $fNameError = $lNameError = $confPassError= $DOBError="";

    if(isset($_POST["email"])){
         $check = true;
                                
        if(empty($_POST["firstname"])){
            $fNameError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }
        if(empty($_POST["lastname"])){
            $lNameError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }
        if(empty($_POST["DOB"])){
            $DOBError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }elseif((date("Y") - substr($_POST["DOB"],0,4)) < 16){
                $DOBError ="<span style='color:red;'> you are too young my freind </span>";
                $check = false;
                }
        if(empty($_POST["mNumber"])){
            $mNumberError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }else if(!preg_match("/^[0-9]{14}$/", $_POST["mNumber"])){
                $mNumberError = "<span style='color:red;'> please enter a valid number </span>";
                $check = false;
                }
        if(empty($_POST["email"])){
            $emailError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }else if(!preg_match("/^[A-z0-9._-]+@(hotmail|gmail|yahoo).com$/", $_POST["email"])){
                $emailError ="<span style='color:red;'> please enter a valid email </span>";
                $check = false;
                }
        if(empty($_POST["password"])){
            $passError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }else if(!preg_match('#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#', $_POST["password"])){
                $passError ="<span style='color:red;'> please enter a valid password</span>";
                $check = false;
                }
        if(empty($_POST["confPassword"])){
            $confPassError = "<span style='color:red;'> this feiled is required </span>";
            $check = false;
            }else if($_POST["confPassword"] != $_POST["password"]){
                $confPassError ="<span style='color:red;'> passwords dont match</span>";
                $check = false;
                }

        if($check == true){
            $_SESSION["user". $_SESSION["counter"]] =array(
                "id"        => $counter ++,
                "email"     => $_POST['email'],
                "firstnmae" => $_POST["firstname"],
                "lastnmae"  => $_POST["lastname"],
                "DOB"       => $_POST["DOB"],
                "mNumber"   => $_POST["mNumber"],
                "password"  => $_POST["password"]) ;

                $_SESSION["counter"]++;
                header("location: index.php");
                die();
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

                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form name="registration" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text"  name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter Firstname">
                              <div  id ="first-feild "><?php echo $fNameError;?></div>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text"  name="lastname" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter Lastname">
                              <div id ="second-feild"> <?php echo $lNameError;?> </div>  
                            </div>
                           <div class="form-group">
                              <label for="mobile number">Mobile Number</label>
                              <input type="text"  name="mNumber" class="form-control" id="mNumber" aria-describedby="mobile-number" placeholder="Enter number">
                              <div id ="third-feild"><?php echo $mNumberError;?></div>   
                            </div>
                            <div class="form-group">
                              <label for="date of birth">D.O.B</label>
                              <input type="date"  name="DOB" class="form-control" id="DOB" aria-describedby="DOB" placeholder="Date Of Birth">
                              <div id ="DOB-feild"><?php echo $DOBError;?></div>   
                            </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="text" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                              <div id ="fourth-feild"><?php echo $emailError;?></div>   
                            </div>
                         
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                              <div id ="fifth-feild"><?php echo $passError;?></div>    
                            </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Confirm Password</label>
                              <input type="password" name="confPassword" id="confPassword"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                              <div id ="sixth-feild"><?php echo $confPassError;?></div>  
                            </div>
                           <div class="col-md-12 text-center mb-3">
                              <input  type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm" value= "submit"> 
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <p class="text-center"><a href="sign-in.php" id="signin">Already have an account?</a></p>
                              </div>
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


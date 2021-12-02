
<?php
session_start();


if (isset($_POST["delete"])) {
    $id=$_POST["delete-user"];
    unset($_SESSION[$id]);
    header("location:Adminpage.php");
}

?>

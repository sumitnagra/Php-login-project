<?php
include 'navbar.php';
    echo '<h1>You are now logged in to our website </h1>';
    session_start();
    echo "Welcome". $_SESSION['username'];
    if(!$_SESSION['username']){
        echo "Please log in to continue";
        header("location:login.php");
    }
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
        session_unset();
        session_destroy();
    }
    if(!$_SESSION['username']){
        echo "Please log in to continue";
        header("location:login.php");
    }
?>
<form action="http://localhost/project/welcome.php" method="post">
    <button type="submit" class="btn btn-danger my-3 btn-lg text-start">Log out</button>

</form>
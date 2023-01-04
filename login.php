<?php
include 'navbar.php';
include 'server/account.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

$username=$_POST["email"];
$password=$_POST["password"];
$sql="Select * from project where Email='$username'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);
  if(password_verify($password,$row["Password"])){
  session_start();
  $_SESSION["username"]="$username";

  if($_SESSION["username"]){
    header("location:welcome.php");
    }  
}else{
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>Username and Password does not exist
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';  
}
}}
?>
<html>
<head>
  <title>Log in</title>
</head>
<div class="container col-md-4 my-4 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height:390px;width:600px;border-radius: 8px;";>
    <h1 class="text-end" >Log In</h1>
<div class="mb-3 ">
  <form action="http://localhost/project/login.php" method="post">
  <label for="exampleFormControlInput1" class="form-label my-2"><h4>Your Email</h4></label>
  <input type="email" name="email" class="form-control " placeholder="Enter your email" id="exampleFormControlInput1" >
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"><h4>Password</h4></label>
  <input type="password" class="form-control " id="exampleFormControlInput1" placeholder="Password" name="password">
</div>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="reset" class="btn btn-danger my-3 btn-lg text-start">Reset</button>
      <button class="btn btn-success my-3 btn-lg" type="submit">Log In</button>
      </form>
</div>
Didn't have account <a href="signup.php">Create an acount</a>
</html>
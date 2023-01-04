<?php
include 'navbar.php';
include 'server/account.php';
$error=false;
$exist=false;
$showAlert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $username=$_POST["email"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $sql="Select * from project where Email='$username'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
  $exist=true;
  
}
 else if($password==$cpassword ){
$hash=password_hash($password,PASSWORD_DEFAULT);
  $sql="INSERT INTO project ( `Email`, `Password`) VALUES ('$username', '$hash')";
   $result= mysqli_query($con,$sql);
   if($result){
    $showAlert=true;
   }
  }else{
    $error=true;
  }
}
?>
<?php
if($showAlert){
echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created now you can login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($error){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Password does not match
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if($exist){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> This user name is already used 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
</head>
<body>

<div class="container col-md-4 my-4 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height:455px;width:600px;border-radius: 8px;";>
    <h1 class="text-end" >Create Account</h1>
<div class="mb-3 ">
  <form action="http://localhost/project/signup.php" method="post">
  <label for="exampleFormControlInput1" class="form-label my-2"><h4>Your Email</h4></label>
  <input type="email" name="email" class="form-control " id="exampleFormControlInput1" placeholder="Please enter your valid email">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label"><h4>Password</h4></label>
  <input type="password"  name="password"class="form-control " id="exampleFormControlInput1" placeholder="Choose a strong password">
</div>
<div class="mb-3">

  <label for="exampleFormControlTextarea1" class="form-label"><h4>Confirm Password</h4></label>
  <input type="password" name="cpassword" class="form-control " id="exampleFormControlInput1" placeholder="Confirm Password">
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="reset" class="btn btn-danger my-3 btn-lg text-start">Reset</button>
      <button class="btn btn-success my-3 btn-lg" type="submit">Sign up</button>
</form>
</div>

Already have an account <span><a href="login.php">Log In</a></span>
</div>

</div>
  
</body>
</html>
<?php
include 'functions.php';
/*
if(){
  $user=$_POST['username'];
  $pw=$_POST['password'];
  $cpw=$_POST['confpassword'];
  $name=$_POST['fullname'];
  $bio=$_POST['bio'];
  $type=$_POST['usertype'];

  $query="CALL registerUser($user,$pw,$cpw,$name,$bio,$type)";
  mysqli_query($db, $query);
}*/
?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><i class="fa fa-cube fa-lg" aria-hidden="true"></i></a>
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      
    </ul>

    <ul class='navbar-nav'>
      <li class="nav-item">
          
      </li>
      <li class="nav-item">
        
      </li>
      
    </ul>
    

  </div>
</nav>

<div class='container'><div class='row'><div class='col-lg-3'>
</div>
  <div class='col-lg-6 col-sm-12 align-self-center'>
<div align='center'><br>
    <i class="fa fa-cube fa-5x" aria-hidden="true"></i><h3>Sign Up!</h3>
    <input type='text' id='error' style='border:0;text-align:center;padding:5px;' readonly>
    <br>
</div>
      <form class='signup'>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="staticEmail" name='username'>
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name='email'>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label" >Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword" name='password'>
    </div>
  </div>

  <div class="form-group row">
    <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="confirmPassword" name='confpassword'>
    </div>
  </div>
    

  <div class="form-group row">
    <label for="fullName" class="col-sm-3 col-form-label">Full Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="fullName" name='fullname'>
    </div>
  </div>

  <div class="form-group row">
    <label for="userBio" class="col-sm-3 col-form-label">Bio</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="userBio" rows="3" name='bio'></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="userType" class="col-sm-3 col-form-label">I'm a</label>
    <div class="col-sm-9">
      <select id="userType" class="form-control" name='usertype'>
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
  </div>
<div align='center'>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-secondary">Clear</button>
  <button type="button" class="btn btn-outline-secondary" name='btnsubmit' onclick='newUser()'>Submit</button>
</div>
</div>

</form>
<br>

  </div>
</div></div>





</body>
<?php include "footer.php"; ?>

</html>
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
if(isset($_COOKIE['newUser'])){
  registerUser();
  }
?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="login"><i class="fa fa-cube fa-lg" aria-hidden="true"></i></a>
  

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
    <br>
</div>
      <form class='signup needs-validation' onsubmit="registerUser(document.getElementById('inputUsername').value,
      document.getElementById('inputEmail').value,document.getElementById('inputPassword').value,document.getElementById('fullName').value,document.getElementById('userType').value)">

  <div class="form-group row">
    <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputUsername" name='username' required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" name='email' required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label" >Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword" name='password' onblur='checkPw()' required>
      
    </div>
    
  </div>

  <div class="form-group row">
    <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="confirmPassword" name='confpassword' onblur='checkPw()' required>
      <div class="invalid-tooltip" id='confpwtooltip'>
      </div>
    </div>
  </div>
    

  <div class="form-group row">
    <label for="fullName" class="col-sm-3 col-form-label">Full Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="fullName" name='fullname' required>
    </div>
  </div>

<!--   <div class="form-group row">
    <label for="userBio" class="col-sm-3 col-form-label">Bio</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="userBio" rows="3" name='bio'></textarea>
    </div>
  </div> -->

  <div class="form-group row">
    <label for="userType" class="col-sm-3 col-form-label">I'm a</label>
    <div class="col-sm-9">
      <select id="userType" class="custom-select" name='usertype' required>
        <?php loadDropdown('tbl_usertype','type','3'); ?>
      </select>
      <div class="invalid-feedback">Example invalid custom select feedback</div>
    </div>
  </div>
<div align='center'>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-secondary" onclick='clearRegisterPage()'>Clear</button>
  <button type="submit" class="btn btn-outline-secondary" name='btnsubmit' id='btnsubmit'>Submit</button>
</div>
</div>

</form>
<br>

  </div>
</div></div>





</body>
<?php include "footer.php"; ?>

</html>
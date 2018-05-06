<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>7Cube VLMS</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
<!--	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	-->

<link rel="stylesheet" href="bootstrap-cdn.min.css">

<script src="jquery/jq.slim.min.js"></script>
<script src="jquery/popper.min.js"></script>
<script src="js-cdn.min.js"></script>


	<!--
	<script src="js/bootstrap.min.js"></script>
	 
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	

	<script src="js/bootstrap.min.js"></script>
	-->

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src='script.js'></script>
	</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><i class="fa fa-cube fa-lg" aria-hidden="true"></i></a>
  

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
      <form class='signup'>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="staticEmail">
    </div>
  </div>

  <div class="form-group row">
    <label for="exampleFormControlInput1" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>

  <div class="form-group row">
    <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="confirmPassword">
    </div>
  </div>
    

  <div class="form-group row">
    <label for="fullName" class="col-sm-3 col-form-label">Full Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="fullName">
    </div>
  </div>

  <div class="form-group row">
    <label for="userBio" class="col-sm-3 col-form-label">Bio</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="userBio" rows="3"></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="userType" class="col-sm-3 col-form-label">I'm a</label>
    <div class="col-sm-9">
      <select id="userType" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
  </div>
<div align='center'>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-secondary">Clear</button>
  <button type="button" class="btn btn-outline-secondary">Submit</button>
</div>
</div>

</form>
<br>

  </div>
</div></div>





</body>
<?php include "footer.php"; ?>

</html>
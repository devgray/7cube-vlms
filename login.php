<?php include 'functions.php'; 

  if(isset($_POST['btnlogin'])){
     if(checkLogin($_POST['uname'],$_POST['pw'])){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
          Logging in...
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
            $_SESSION['loggedin']=true;
            header("Refresh:1; URL=browse");
        }else{
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert" align="center">
          Incorrect username and/or password!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        deleteCookies();
        }
  }

/*  if(isset($_COOKIE['newUser'])){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
          Account created.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        deleteCookies();     
  }*/

?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>

	</head>

<body style="margin-bottom: 50px;">

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand cyan" href="#" ><i class="fa fa-cube fa-lg" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      
    </ul>

    <ul class='navbar-nav'>
      <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="" method="POST">
      <input style='border-radius:0;width:200px;border:none;'class="form-control mr-sm-2" type="search" placeholder="Username" aria-label="Search" style='border-radius:0;width:200px;' id='username' name='uname' required>
      <input style='border-radius:0;width:200px;border:none;' class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search" style='border-radius:0;width:200px;' id='password' name='pw' required>
      <button type="submit" class="btn btn-outline-info" id='btnlogin' name='btnlogin'>Login</button>&nbsp;
      <button type="button" class="btn btn-outline-info" id='btnregister' onclick='clickregister()'>Register</button>
    </form>
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
    

  </div>

</nav>

<!-- <div class="container-fluid">
  <div class='row'><div class='col-sm-12'> -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/3.jpg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--   </div></div>
</div> -->



</body>
<?php include "footer.php"; ?>

</html>
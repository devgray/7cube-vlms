<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><i class="fa fa-cube fa-lg" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="browse.php">Browse <span class="sr-only">(current)</span></a>
      </li>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style='border-radius:0;width:350px;'>
    </form>
    </ul>

    <ul class='navbar-nav'>
    	<li class="nav-item">
        <div class="btn-group" role="group" aria-label="Basic example">
        <div class="dropdown">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @username
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="user.php">View Profile</a>
    <a class="dropdown-item" href="#">Account Settings</a>
    <a class="dropdown-item" href="logout.php" >Logout</a>
  </div>
</div>
      <!-- </li>
      <li class="nav-item"> -->
        <button type="button" class="btn btn-outline-info" onclick="gotoUpload()">Upload</button></div>
      </li>
      
    </ul>
    

  </div>
</nav>

<script>
function gotoUpload(){
  window.location.href = 'upload.php';
}
</script>
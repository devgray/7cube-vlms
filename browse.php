<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login.php");
}?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<?php

 ?>
<body>

<?php include "nav.php"; ?>
<div class='content'>

<div class='container'>
<br>

  <h5 class='category-header'>@Category 1</h5>
  <div class='row'>
    <div class='col-lg-6 col-sm-6'>
          <div class='row category-panel'>
                <div class='col-lg-6 col-sm-12'><a href="#" class='thumb'>
                <video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video></a>
                </div>

                <div class='col-lg-6 col-sm-12'>
                <div class='thumb-title browse'>Video Title</div><br>
                Description
                </div>
          </div>
    </div>

    <div class='col-lg-6 col-sm-6'>
          <div class='row category-panel'>
                <div class='col-lg-6 col-sm-12'><a href="#" class='thumb'>
                <video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video></a>
                </div>

                <div class='col-lg-6 col-sm-12'>
                <div class='thumb-title browse'>Video Title</div><br>
                Description
                </div>
          </div>
    </div>

  </div><!-- end row -->

  <h5 class='category-header'>@Category 2</h5>
  <div class='row'>
    <div class='col-lg-6 col-sm-6'>
          <div class='row category-panel'>
                <div class='col-lg-6 col-sm-12'><a href="#" class='thumb'>
                <video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video></a>
                </div>

                <div class='col-lg-6 col-sm-12'>
                <div class='thumb-title browse'>Video Title</div><br>
                Description
                </div>
          </div>
    </div>

    <div class='col-lg-6 col-sm-6'>
          <div class='row category-panel'>
                <div class='col-lg-6 col-sm-12'><a href="#" class='thumb'>
                <video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video></a>
                </div>

                <div class='col-lg-6 col-sm-12'>
                <div class='thumb-title browse'>Video Title</div><br>
                Description
                </div>
          </div>
    </div>

  </div><!-- end row -->


</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>
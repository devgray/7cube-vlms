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

<?php include "nav.php"; ?>
<div class='content'>
<div class='container'><div class='row'>

	<div class='col-lg-6 col-sm-12'>
		<br>
		<table class='table table-borderless'>
			<tr><td>
				<img class='avatar'/>
			</td>
			<td style='padding:20px;'>
				<h5>@username, <span class='subtext'>@usertype</span></h5>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
			</td>
			</tr>
		</table>
		<table class='table table-borderless'>
			<tr>
				<td style='padding:20px;' align='center'>

<div class="btn-group" role="group" aria-label="Basic example">
  
  <button type="button" class="btn btn-outline-secondary active">Manage Videos</button>
  <button type="button" class="btn btn-outline-secondary">Manage Subscription</button>
  <button type="button" class="btn btn-outline-secondary">Manage Favorites</button>
</div>
</td>

			</tr>
		</table>
	</div>
	<div class='col-lg-6 col-sm-12' align='right'>
		<div class='featured-video' style='padding-top:20px;'>
			<video width='100%' controls>
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video>
		</div>
		<div class="btn-group" role="group" aria-label="Basic example">
		  
		  <button type="button" class="btn btn-outline-secondary">Subscribe</button>
		  <button type="button" class="btn btn-outline-secondary">Browse Videos</button>
		</div>

	</div>


</div>
</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>
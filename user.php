<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login.php");
}?>
 <!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
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

		<table class='table'>
			<tr>
				<td width='40%'><a href="#"><video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video></a></td>
                <td><b>Video Title</b><br>
                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</td>
                <td width='10%'>
                	<button type="button" class="btn btn-outline-secondary active">Delete</button>
                </td>
            </tr>
		</table>

	</div>
	<div class='col-lg-6 col-sm-12' align='right'>
		<div class='featured-video' style='padding-top:20px;'>
			<table class='table table-borderless' style='border-bottom: 1px solid #c0c0c0;'><!-- VIDEO HEADER -->
		<tr><td>
			<div class='video'>
				<video width='100%' controls>
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video>
			</div></td>
	</tr>
	<tr>
		<td>
		<h2>Video Title</h2>
		</td>
	</tr>
	<tr>
		<td>
		1,234 views
		</td>
	</tr>

	</table>
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
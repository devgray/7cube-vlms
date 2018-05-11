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
<div class='container'><div class='row' ><div class='col-lg-9 col-sm-12'>

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

	<table class='table table-borderless'> 
			<tr>
				<td width="60"><img class='avi-thumb'/></td>
				<td width="70%"><button type="button" class="btn btn-light" style='text-align:left;padding-left:0px;'>@username, <span class='subtext'>@usertype</span><br>Uploaded on @date</button></td>
				<td><div class="btn-group" role="group" aria-label="Basic example">
					<button type="button" class="btn btn-outline-info"><i class="fa fa-plus" aria-hidden="true"></i> Favorites</button>
					<button type="button" class="btn btn-outline-info">Subscribe</button></div>
				</td>
				</tr>
	</table>

	<table class='table table-borderless' style='border-bottom: 1px solid #c0c0c0;'> <!-- VIDEO DESCRIPTION -->
			<tr>
				<td><blockquote class="blockquote">
  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <footer class="blockquote-footer">tags, tags, tags <cite title="Source Title"><button type="button" class="btn btn-outline-info" style='border:0;'>@category</button></cite></footer>
</blockquote></td>
				</tr>
	</table>


<table class='table table-borderless'> <!-- NEW COMMENT SECTION -->
			<tr>
				<td width="60"><img class='avi-thumb'/></td>
				<td width="100%"><blockquote class='blockquote comment'>@username, <span class='subtext'>@usertype</span><br>
					<form><div class="form-group">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br>
    <button type="button" class="btn btn-outline-info" style='float:right;'> Post Comment</button>
  </div>
</form></blockquote>
</td>
				
			</tr>
			<tr>
				<td></td>
				<td align='right'></td>
			</tr>
	</table>

	<table class='table table-borderless'> <!-- COMMENT SECTION -->
			<tr>
				<td width="60"><img class='avi-thumb'/></td>
				<td width="90%"><blockquote class='blockquote comment'>@username, <span class='subtext'>@usertype</span><br>Finished her are its honoured drawings nor. Pretty see mutual thrown all not edward ten.
					Particular an boisterous up he reasonably frequently.</blockquote></td>
				<td><button type="button" class="btn btn-outline-danger btn-sml">Report Comment</button></td>
			</tr>
	</table>

</div>

	<div class='col-lg-3 col-md-4 col-sm-12'>
		<table class='table table-borderless'>

			<tr>
			<td>
				<a href="#" class='thumb'>
				<video width='100%' >
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video>
				<div class='thumb-title'><b>Video Title</b><br>by @username</div>
				</a>
			</td>
			</tr>

			<tr>
			<td>
				<a href="#" class='thumb'>
				<video width='100%' >
                <source src='videos/Dispersion Effect- Photoshop Tutorial.mp4' type='video/mp4' >
                </video>
				<div class='thumb-title'><b>Video Title</b><br>by @username</div>
				</a>
			</td>
			</tr>

		</table>


	</div>


</div>
</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>
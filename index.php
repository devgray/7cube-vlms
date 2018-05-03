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
<div class='container'><div class='row'><div class='col-lg-9 col-md-10 col-sm-12'>

	<table class='table table-borderless' style='border-bottom: 1px solid #c0c0c0;'><!-- VIDEO HEADER -->
		<tr><td>
			<div class='video'>

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
				<td><button type="button" class="btn btn-outline-info"><i class="fa fa-plus" aria-hidden="true"></i> Favorites</button></td>
				<td><button type="button" class="btn btn-outline-info">Subscribe</button></td>
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
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form></blockquote></td>
				
			</tr>
			<tr>
				<td></td>
				<td align='right'><button type="button" class="btn btn-outline-info"> Post Comment</button></td>
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

</div></div>
</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>
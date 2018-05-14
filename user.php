<script>

</script>
<?php include 'functions.php'; 
getUserInfo($_GET['u']);

if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login");
}else if(!isset($_GET['u'])){
	header("Refresh:0; URL=index");
}
if(isset($_COOKIE['delvideo'])){
	deleteVideo($_COOKIE['delvideo']);
}

?>
 <!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body <?php if(!isset($_SESSION['logid']) || !isset($_GET['u'])){
  echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='content'>
<div class='container'><div class='row'>

	<div class='col-lg-6 col-sm-12'>
		<br>
		<table class='table table-borderless'>
			<tr><td width="20%">
				<img class='avatar'/>
			</td>
			<td style='padding:20px;'>
				<h4><?php {echo $_SESSION['fname'];} ?></h4>
				<h5><?php {echo $_SESSION['username'];} ?>, <span class='subtext' id='usertype'><?php {echo $_SESSION['usertype'];} ?></span></h5>
				<p><?php {echo $_SESSION['bio'];} ?></p>
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

		<?php echo manageVideos($_GET['u']); ?>

	</div>
	<div class='col-lg-6 col-sm-12' align='right'>
		<div class='featured-video' style='padding-top:20px;'>
			<table class='table table-borderless' style='border-bottom: 1px solid #c0c0c0;'><!-- VIDEO HEADER -->
		<tr><td>
			<div class='video'>
				<video width='100%' controls>
                <source id='uservideo' <?php if(isset($_GET['v'])){ echo "src='".getFilePath($_GET['v'])."'"; }?> type='video/mp4' >
                </video>
			</div></td>
	</tr>
	<tr>
		<td>
		<h2 id='usertitle'><?php if(isset($_GET['v'])){ echo getVideoTitle($_GET['v']); }?></h2>
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

<?php if(isset($_POST['btnconfirmdelete'])){
	//deleteVideo($_POST[]);
}

?>

<!-- MODALS -->
<div class="modal fade" id="deleteVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
        	<div class="col-sm-12">
		    <label for="userType" class="col-sm-12 col-form-label">This action cannot be undone.</label>
		    </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <a type="button" class="btn btn-danger" onclick='confirmdeletevideo()' <?php echo "href='user?u=".$_SESSION['logusername']."'"; ?> >Delete</a>
      </div>
    </div>
  </div>
</div>

</html>
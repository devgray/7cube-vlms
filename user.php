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
if(isset($_POST['btnsub'])){
    subscribe($_SESSION['id'],$_SESSION['logid']);
    header("Location: user?u=".$_GET['u']);
}
if(isset($_POST['btnunsub'])){
    unsubscribe($_SESSION['id'],$_SESSION['logid']);
    header("Location: user?u=".$_GET['u']);
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
<div class='userheader'></div>
<div class='content' style='margin-top:-100px;'>

<div class='container'><div class='row'>

	<div class='col-lg-6 col-sm-12'>
		<br>
		<div class='userpanel'>
		<table class='table table-borderless'>
			<tr><td width="20%">
				<img class='avatar' src="img/avi.png" />
			</td>
			<td  style='padding:28px 10px 0px 10px;'>
				<h4><?php {echo $_SESSION['fname'];} ?></h4>
				<h5><a <?php echo "href='user?u=".$_SESSION['username']."'"; ?>><?php {echo $_SESSION['username'];} ?></a>, <span class='subtext' id='usertype'><?php {echo $_SESSION['usertype'];} ?></span></h5>
			<!-- 	<p style='height:35px;'><?php {echo $_SESSION['bio'];} ?></p> -->

				<div class="btn-group" role="group" aria-label="Basic example">
				  <form action="" method="post" style='padding:0;margin:0;'>
				  <?php 
				  if($_SESSION['logusername']!=$_GET['u']){
					  	if(checkSub($_SESSION['id'],$_SESSION['logid'])){
									echo '<button style="margin-right:7px;" type="submit" class="btn btn-info" name="btnunsub">Subscribed</button>';
								}else{
									echo '<button type="submit" class="btn btn-outline-info" name="btnsub">Subscribe</button>';
								}
				  }
				  
							?>
				</form>
				</div>
				<label style="font-weight:bold;font-size:15px;"><?php echo getSubCount($_SESSION['id']); ?> Subscriber/s</label>

				
			</td>
			</tr>

		</table>


		<table class='table table-borderless'>
			<tr>

				<td align='left'>
					

	</td>
<!-- 				<td style='padding:20px;' align='center' <?php if($_SESSION['logusername']!=$_GET['u']){echo "hidden";}else{echo "";} ?>>

<div class="btn-group" role="group" aria-label="Basic example"  >
  
  <button type="button" class="btn btn-outline-secondary active">Manage Videos</button>
  <button type="button" class="btn btn-outline-secondary">Manage Subscription</button>
  <button type="button" class="btn btn-outline-secondary">Manage Favorites</button>
</div>

</td> -->

			</tr>

		</table></div>
<div class='pad'>
	<div class='featured-video' <?php if(!isset($_GET['v'])){echo "hidden";}else{echo "";} ?> >
			<table class='table table-borderless'><!-- VIDEO HEADER -->
		<tr><td>
			<div class='video'>
				<video width='100%' controls>
                <source id='uservideo' <?php if(isset($_GET['v'])){ echo "src='".getFilePath($_GET['v'])."'"; }?> type='video/mp4' >
                </video>
			</div></td>
	</tr>
	<tr>
		<td>
		<a <?php if(isset($_GET['v'])){ echo "href='index?v=".$_GET['v']."'"; }?> ><h2 id='usertitle'><?php if(isset($_GET['v'])){ echo getVideoTitle($_GET['v']); }?></h2></a>
		</td>
	</tr>
	</table>
		</div>
		<?php echo manageVideos($_GET['u']); ?>
</div>
	</div>
	
	<div class='col-lg-3 col-sm-12'>
		<br>
		<div class='userpanel'>
			<div class='pad'>
			<h4>Liked Videos</h4>
				<?php loadFavList($_GET['u']); ?>
			</div>
			</div>
	</div>

	<div class='col-lg-3 col-sm-12'>
		<br>
		<div class='userpanel'>
			<div class='pad'>
			<h4>Subscribed Users</h4>
				<?php loadSubUsers($_GET['u']); ?>
			</div>
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
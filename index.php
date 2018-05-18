<?php include 'functions.php';
getVideoInfo($_GET['v']);

if(!isset($_SESSION['loggedin'])){
  header("location: login");
}else if(!isset($_GET['v'])){
	header("location: browse");
}
if(isset($_POST['btnreportvid'])){
	reportVideo($_GET['v'],$_POST['reportreason'],$_POST['inputDesc']);
}
if(isset($_POST['btnsub'])){
    subscribe($_SESSION['viduserid'],$_SESSION['logid']);
    header("Location: index?v=".$_GET['v']);
}
if(isset($_POST['btnunsub'])){
    unsubscribe($_SESSION['viduserid'],$_SESSION['logid']);
    header("Location: index?v=".$_GET['v']);
}
if(isset($_POST['btnfav'])){
    addfav($_SESSION['vidid'],$_SESSION['logid']);
    header("Location: index?v=".$_GET['v']);
}
if(isset($_POST['btnunfav'])){
    unfav($_SESSION['vidid'],$_SESSION['logid']);
    header("Location: index?v=".$_GET['v']);
}
function reportVideo($code,$head,$info){
    global $db; 
    $logid=$_SESSION['logid'];
    $query="CALL reportVideo('$code','$head','$info',$logid)";
    if(mysqli_query($db,$query)){
    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
          Video reported successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        header("Refresh:2,URL: index?v=$code");
    }
}


?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body <?php if(!isset($_GET['v'])){
	echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='content'>
<div class='container'><div class='row' ><div class='col-lg-9 col-sm-12'>

	<table class='table table-borderless'><!-- VIDEO HEADER -->
		<tr><td>
			<div class='video'>
				<video width='100%' controls>
                <source src='<?php echo $_SESSION["vidfilepath"]; ?>' type='video/mp4' >
                </video>
			</div></td>
	</tr>
	<tr>
		<td>
		<h2><?php echo $_SESSION['vidtitle']; ?></h2>
		</td>
	</tr>
	<tr>
		<td>
		<?php echo $_SESSION['vidviews']; ?> views
		</td>

	</tr>

	</table>
<div class='pad' style='background:#effcff;'>
	<table class='table table-borderless'  style='margin-bottom:0px;'>
			<tr>
				<td width="60"><a <?php echo "href='user?u=".$_SESSION['vidusername']."'"; ?>><img class='avi-thumb' src="img/avi.png" /></a></td>
				<td style='font-size:16px;'><a <?php if(isset($_GET['v'])){ echo "href='user?u=".$_SESSION['vidusername']."'"; }?>><?php echo $_SESSION['vidusername']; ?></a>, 
					
					<span class='subtext'><?php echo $_SESSION['vidusertype']; ?></span><br><div style='font-size:12px;'><?php echo getSubCount($_SESSION['viduserid']); ?> Subscriber/s</div></td>
				<td width="20%" align='right'>

					<form action="" method="post">
					<div class="btn-group" role="group" aria-label="Basic example" <?php if($_SESSION['logusername']==$_SESSION['vidusername']){echo "hidden";}else{echo "";} ?> >
					<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#reportVideoModal">Report Video</button>
					
					
					<?php 
					if(checkFav($_SESSION['vidid'],$_SESSION['logid'])){
						echo '<button type="submit" class="btn btn-info" name="btnunfav"><i class="fa fa-heart" aria-hidden="true"></i> Added</button>';
					}else{
						echo '<button type="submit" class="btn btn-outline-info" name="btnfav"><i class="fa fa-plus" aria-hidden="true"></i> Favorites</button>';
					}

					if(checkSub($_SESSION['viduserid'],$_SESSION['logid'])){
						echo '<button type="submit" class="btn btn-info" name="btnunsub">Subscribed</button>';
					}else{
						echo '<button type="submit" class="btn btn-outline-info" name="btnsub">Subscribe</button>';
					}
					?>

					
				</div></form>
				</td>
				</tr>
	</table></div>
<div class='pad' style='background:#effcff;margin-bottom:10px;'>
	<table class='table table-borderless' style='margin-bottom:0;' > <!-- VIDEO DESCRIPTION -->
			<tr>
				<td><blockquote style='font-size:13px;margin-bottom:0;'>
  <p class="mb-0" style='text-align:justify;font-size:16px;'><?php echo $_SESSION['vidinfo']; ?></p><br><br><hr>
  <p style='margin-bottom:0;'><span style='font-size:12px;'>Tags: <?php echo $_SESSION['vidtags']; ?><br>Category: 
  	<?php echo $_SESSION['vidcategory']; ?>
  <br>Uploaded on <?php echo $_SESSION['viddate']; ?></span></p>

</blockquote></td>
				</tr>
	</table></div>


<table class='table table-borderless' style='display:none;'> <!-- NEW COMMENT SECTION -->
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

	<table class='table table-borderless' style='display:none;'> <!-- COMMENT SECTION -->
			<tr>
				<td width="60"><img class='avi-thumb'/></td>
				<td width="90%"><blockquote class='blockquote comment'>@username, <span class='subtext'>@usertype</span><br>Finished her are its honoured drawings nor. Pretty see mutual thrown all not edward ten.
					Particular an boisterous up he reasonably frequently.</blockquote></td>
				<td><button type="button" class="btn btn-outline-danger btn-sml">Report Comment</button></td>
			</tr>
	</table>

</div>

	<div class='col-lg-3 col-md-4 col-sm-12'>
		<?php loadVideos(); ?>


	</div>


</div>
</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

<div id='php'></div>
<!-- MODALS -->
<div class="modal fade" id="reportVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form action="" method="post" style="margin:0;padding:0;">
      <div class="modal-header">
        <h5 class="modal-title" id="modallabel">Report Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
		    <label for="userType" class="col-sm-3 col-form-label">Reason</label>
		    <div class="col-sm-9">
		      <select id="userType" class="form-control" name='reportreason'>
		        <option value='Inappropriate Content' selected>Inappropriate Content</option>
		        <option value='Incorrect Category'>Incorrect Category</option>
		        <option value='Copyright Content'>Copyright Content</option>
		      </select>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputDesc" class="col-sm-3 col-form-label">Description</label>
		    <div class="col-sm-9">
		      <textarea class="form-control" id="inputDesc" rows="5" name='inputDesc' required maxlength='200'></textarea>

		      <sub><br>200 characters max</sub>
		    </div>
  		</div>
      </div>
      <div class="modal-footer">
      	
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name='btnreportvid' >Submit</button>
    	
      </div></form>
    </div>
  </div>
</div>


</html>
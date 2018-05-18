<?php include 'functions.php'; 
if(!isset($_SESSION['modid'])){
  header("Refresh:0; URL=login");
}
if(isset($_GET['v'])){
  getVideoInfo($_GET['v']);
}else{
  $_SESSION['vidtitle']="";
  $_SESSION['vidusername']="";
  $_SESSION['vidinfo']="";
  $_SESSION['vidcategory']="";
}
if(isset($_COOKIE['delvideo'])){
  deleteVideo($_COOKIE['delvideo']);
}
if(isset($_POST['btnclosereport'])){
  closeReport($_GET['v']);
}
?>
 <!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body <?php if(!isset($_SESSION['modid'])){
  echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='content'>

	<div class='container'><div class='row'>
		<div class='col-sm-12'><br>
			<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h6>Manage Reported Videos</h6>
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      	<div class='row'>
      		<div class='col-sm-6'>
        		<div class='scroll' style="height:500px;overflow:auto;"><?php loadReportedVideos(); ?></div>
		</div>

			<div class='col-sm-6'>
				<video width='100%' style='padding-bottom:10px;' controls>
                <source id='repvideo' <?php if(isset($_GET['v'])){ echo "src='".getFilePath($_GET['v'])."'"; }?> type='video/mp4' >
                </video>
                <table class='table table-borderless'>
                	<tr>
                		<td width='30%'>Video Title</td>
                		<td><a <?php if(isset($_GET['v'])){ echo "href='index?v=".$_GET['v']."'"; }?>><?php echo $_SESSION['vidtitle']; ?></a></td>
                	</tr>
                	<tr>
                		<td>Uploader</td>
                		<td><a <?php if(isset($_GET['v'])){ echo "href='user?u=".$_SESSION['vidusername']."'"; }?>><?php echo $_SESSION['vidusername']; ?></a></td>
                	</tr>
                	<tr>
                		<td>Description</td>
                		<td><?php echo $_SESSION['vidinfo']; ?></td>
                	</tr>
                	<tr>
                		<td>Category</td>
                		<td><?php echo $_SESSION['vidcategory']; ?></td>
                	</tr>


                </table>
                <div align='right'>
                <div class="btn-group" role="group" aria-label="Basic example" style='padding-bottom:10px;' <?php if(!isset($_GET['v'])){echo "hidden";}else{echo "";} ?> >
		  
				  <button type="button" class="btn btn-outline-secondary" class='btn btn-outline-secondary'
          data-toggle='modal' data-target='#closereportmodal'>Close Report</button>
          <button type='button' <?php echo "value='".$_SESSION['vidfilepath']."'"; ?> onclick='delvideo(this.value)' class='btn btn-outline-secondary'
          data-toggle='modal' data-target='#deleteVideoModal'>Remove Video</button>

				</div>
				</div>
			</div>

	</div>

        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h6>Manage Reported Comments</h6>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        
          <table class='table'>
              <tr>
                  <th width='40%'>
                      Comment
                  </th>
                <th width='15%'>
                    Posted by
                </th>
                <th width='15%'>
                    Reported by
                </th>
                <th width='10%'>
                    Video ID
                </th>
                <th width='20%'>
                    Action
                </th>
              </tr>

              <tr>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                </td>
                <td>
                  @username
                </td>
                <td>
                  @username
                </td>
                <td>
                  asdefasdadfas
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example" style='padding-bottom:10px;'>
                  <button type="button" class="btn btn-outline-secondary">Delete Comment</button>
                  <button type="button" class="btn btn-outline-secondary">Close Report</button>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                </td>
                <td>
                  @username
                </td>
                <td>
                  @username
                </td>
                <td>
                  asdefasdadfas
                </td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example" style='padding-bottom:10px;'>
                  <button type="button" class="btn btn-outline-secondary">Delete Comment</button>
                  <button type="button" class="btn btn-outline-secondary">Close Report</button>
                  </div>
                </td>
              </tr>

          </table>

        </div>
    </div>
  </div>

</div>

		</div>
	</div></div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

<!-- MODALS -->
<div class="modal fade" id="deleteVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Video</h5>
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
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <a type="button" class="btn btn-danger" onclick='confirmdeletevideo()' <?php echo "href='mod'"; ?> >Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- MODALS -->
<div class="modal fade" id="closereportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Close Report</h5>
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
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button><form style="margin:0;padding:0;" action="" method="post">
        <button type="submit" class="btn btn-danger" name='btnclosereport'>Submit</button></form>
      </div>
    </div>
  </div>
</div>

</html>
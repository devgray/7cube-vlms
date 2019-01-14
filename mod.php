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
if(isset($_POST['btnaddcategory'])){
  addcategory($_POST['inputcategory']);
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
<br>
	<div class='container'><div class='row'>
    <div class='col-sm-3'>
<!-- 
      <h4>Subscriptions</h4>
      <div class="form-group row">
    <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="subusername" name='subusername' pattern="[A-Za-z0-9]*" title="Only alphanumeric characters" required>
    </div>
  </div> 

  <div class="form-group row">
    <label for="inputUsername" class="col-sm-3 col-form-label">Sub to</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="subusername" name='subusername' pattern="[A-Za-z0-9]*" title="Only alphanumeric characters" required>
    </div>
  </div>  -->

      <h4>Categories</h4>
      <?php loadcategories() ?>

<button type="button" class="btn btn-outline-secondary" data-toggle='modal' data-target='#addcategoryModal'>Add Category</button>

    </div>
		<div class='col-sm-9'>



<h4>Reported Videos</h4>

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

<div class="modal fade" id="addcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form class='signup needs-validation' method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-sm-12">

        <div class="form-group row">
    <label for="inputUsername" class="col-sm-3 col-form-label">Category</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name='inputcategory' pattern="[A-Za-z]+" required>
    </div>
  </div>

        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="btnaddcategory">Submit</a>
      </div>
    </div>
  </div>
</form>
</div>

</html>
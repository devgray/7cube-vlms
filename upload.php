<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login");
}
if(isset($_POST['btnUpload'])){
  upload($_POST['inputTitle'],$_POST['inputDesc'],$_POST['inputCategory'],$_POST['inputTags']);
}

?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body <?php if(!isset($_SESSION['logid'])){
  echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='content'>
<div class='container'><div class='row'><div class='col-lg-3'>
</div>
  <div class='col-lg-6 col-sm-12 align-self-center'>
<div align='center'><br>
    <i class="fa fa-cube fa-5x" aria-hidden="true"></i><h3>Upload</h3>
    <br>
</div>
      <form class='signup' action="" method="post" enctype='multipart/form-data'>

  <div class="form-group">
    <label for="exampleFormControlFile1">Choose File</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name='file' required>
  </div>

  <div class="form-group row">
    <label for="inputTitle" class="col-sm-3 col-form-label">Title</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputTitle" name='inputTitle' required maxlength='50'>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputDesc" class="col-sm-3 col-form-label">Description</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="inputDesc" rows="5" name='inputDesc' required maxlength='300'></textarea>
    </div>
  </div>

   <div class="form-group row">
    <label for="inputTags" class="col-sm-3 col-form-label">Tags</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputTags" name='inputTags' placeholder="travels, tutorials, photoshop, etc" required maxlength='50'>
    </div>
  </div>

  <div class="form-group row">
    <label for="userType" class="col-sm-3 col-form-label">Category</label>
    <div class="col-sm-9">
      <select id="userType" class="form-control" name='inputCategory' required>
        <?php loadDropdown('tbl_category','name',''); ?>
      </select>
    </div>
  </div>
<div align='center'>
<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-outline-secondary">Clear</button>
  <button type="submit" class="btn btn-outline-secondary" name='btnUpload'>Upload</button>
</div>
</div>

</form>
<br>

  </div>
</div></div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>
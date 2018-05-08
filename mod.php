<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body>

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
        		<table class='table'>
					<tr>
		                <td><b>Report Header</b><br>
		                	Report content - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</td>
		                <td width='10%'>
		                	<button type="button" class="btn btn-outline-secondary active">Play</button>
		                </td>
		            </tr>

		            <tr>
		                <td><b>Report Header</b><br>
		                	Report content - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</td>
		                <td width='10%'>
		                	<button type="button" class="btn btn-outline-secondary active">Play</button>
		                </td>
		            </tr>
				</table>
		</div>

			<div class='col-sm-6'>
				<video width='100%' controls>
                <source src='videos/Photoshop Tutorial- Water Splash in Bulb.mp4' type='video/mp4' >
                </video>
                <table class='table table-borderless'>
                	<tr>
                		<td width='30%'>Video Title</td>
                		<td>Lorem ipsum </td>
                	</tr>
                	<tr>
                		<td>Uploader</td>
                		<td>@username</td>
                	</tr>
                	<tr>
                		<td>Description</td>
                		<td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</td>
                	</tr>
                	<tr>
                		<td>Category</td>
                		<td><select id="userType" class="form-control">
					        <option selected>Choose...</option>
					        <option>...</option>
					      </select></td>
                	</tr>


                </table>
                <div align='right'>
                <div class="btn-group" role="group" aria-label="Basic example" style='padding-bottom:10px;'>
		  

		  		  <button type="button" class="btn btn-outline-secondary">Update</button>
				  <button type="button" class="btn btn-outline-secondary">Close Report</button>
				  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">Remove Video</button>

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
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		    <label for="userType" class="col-sm-3 col-form-label">Select Reason</label>
		    <div class="col-sm-9">
		      <select id="userType" class="form-control">
		        <option selected>Choose...</option>
		        <option>...</option>
		      </select>
		    </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Remove</button>
      </div>
    </div>
  </div>
</div>

</html>
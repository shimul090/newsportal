<!-- Col Start -->
<div class="col">
	<!-- Category Modal Start-->
	<!-- Add Category Start -->
	<div class="modal fade" id="add_category">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add Category</h5>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>
	      <form action="<?php echo site_url('dashboards/add_category'); ?>" method="post" class="needs-validation" novalidate>
	      <div class="modal-body">
	        	<div class="form_group input-group">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fa fa-plus-square"></i></span>
	        		</div>
	        		<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" required>
	        		<div class="invalid-feedback">
	        			Please provide new category name
	        		</div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="add_category_submit" value="Save">
	      </div>
	  </form>
	    </div>
	  </div>
	</div>
	<!-- Add Category End -->

	<!-- Edit Category Start -->
	<div class="modal fade" id="edit_category">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Update Category</h5>
	        <button type="button" class="close" data-dismiss="modal">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="<?php echo site_url('dashboards/update_category'); ?>" method="post" class="needs-validation" novalidate>
	      <div class="modal-body">

	      		<div class="form_group input-group">
	        		<!--<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fa fa-plus-square"></i></span>
	        		</div>-->
	        		<input type="hidden" class="form-control" id="category_id_for_update" name="category_id_for_update" required readonly>
	        	</div>
	        
	        	<div class="form_group input-group">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fa fa-plus-square"></i></span>
	        		</div>
	        		<input type="text" class="form-control" id="category_name" name="update_category_name" placeholder="Updated Category Name" required>
	        		<div class="invalid-feedback">
	        			Please insert updated category name
	        		</div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="edit_category_submit" value="Update">
	      </div>
	  </form>
	    </div>
	  </div>
	</div>
	<!-- Edit Category End -->

	<!-- Category Modal End-->
	<h2 class="mt-3 mb-3"><?php echo $page_header ?></h2>
	<div class="card">
              <div class="card-header">
              		<span class="card-title h3">Categories</span>
        			<button type="button" class="btn btn-primary" data-toggle="modal" style="float:right;" data-target="#add_category">Add</button>
    				<?php  
					echo validation_errors();
					echo '<br>';
	        		if(!empty($success_msg)){ 
	            		echo '<p class="alert alert-success mt-3">'.$success_msg.'</p>'; 
	        		}elseif(!empty($error_msg)){ 
	            		echo '<p class="alert alert-danger mt-3">'.$error_msg.'</p>'; 
	        		} 
    			?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $row = 1;
                  	if(!empty($category_lists)){
                  		foreach($category_lists as $category_list){
                  			echo '<tr>';
                  			echo '<td>'.$row.'</td>';
                  			echo '<td>'.$category_list['category_name'].'</td>';
                  			echo '<td>';
                  			echo '<button type="button" class="btn btn-info edit_category_by_id mr-3" data-id="'. $category_list['id'] .'">Edit</button>';
                  			echo '<a href="'. site_url('dashboards/delete_category/').$category_list['id'] . '" class="btn btn-danger">Delete</a>';
                  			echo '</td>';
                  			echo '</tr>';
                  			$row++;
                  		}
                  		
                  	} else {
                  		echo '<td colspan = "3" style="text-align:center;">No data available</td>';
                  	}
				  ?>
				  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

</div>
<!-- Col End -->

<script type="text/javascript">
	$(document).ready(function() {
	    $(document).on('click',function(){
	    	$("#add_categ").modal()
	    })
	});
</script>



<script type="text/javascript">
	(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>


<script>
$(".edit_category_by_id").click(function () {
    var ids = $(this).attr('data-id');
    $("#category_id_for_update").val( ids );
    $('#edit_category').modal('show');
});
</script>

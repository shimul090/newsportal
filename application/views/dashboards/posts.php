<!-- Col Start -->
<div class="col">
	<!-- Post Modal Start-->

	<!-- Edit Post Start -->
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
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fa fa-plus-square"></i></span>
	        		</div>
	        		<input type="text" class="form-control" id="category_id_for_update" name="category_id_for_update" required readonly>
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
	<!-- Edit Post End -->

	<!-- Post Modal End-->
	<h2 class="mt-3 mb-3"><?php echo $page_header ?></h2>
	<div class="card">
              <div class="card-header">
              		<span class="card-title h3">Posts</span>
        					<a href="<?php echo site_url('dashboards/add_post'); ?>" class="btn btn-primary" style="float:right;">Add</a>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Entry By</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $row = 1;
                  	if(!empty($post_lists)){
                  		foreach($post_lists as $post_list){
                  			echo '<tr>';
                  			echo '<td>'.$row.'</td>';
                  			echo '<td>'.$post_list['category_name'].'</td>';
                  			echo '<td>'.$post_list['title'].'</td>';
                  			echo '<td>'.$post_list['description'].'</td>';
                  			echo '<td> <img src="'. site_url('assets/img/').$post_list['image']. '" style="height: 300px; width: 200px;" alt="Not found"></td>';
                  			echo '<td>'.$post_list['full_name'].'</td>';
                  			echo '<td>';
                  			echo '<a href="'. site_url('dashboards/update_post/').$post_list['id'] .'" class="btn btn-info">Edit</a>';
                  			echo '<a href="'. site_url('dashboards/delete_post/').$post_list['id'] .'/'.$post_list['image']. '" class="btn btn-danger">Delete</a>';
                  			echo '</td>';
                  			echo '</tr>';
                  			$row++;
                  		}
                  		
                  	} else {
                  		echo '<td colspan = "7" style="text-align:center;">No data available</td>';
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



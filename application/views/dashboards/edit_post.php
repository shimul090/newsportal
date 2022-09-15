<!-- Col Start -->
<div class="col">
	<!-- SELECT2 EXAMPLE -->
        <div class="card mt-3">
          <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
            <?php 
	        	if(!empty($success_msg)){ 
	            	echo '<p class="alert alert-success mt-3">'.$success_msg.'</p>'; 
	        	}elseif(!empty($error_msg)){ 
	            	echo '<p class="alert alert-danger mt-3">'.$error_msg.'</p>'; 
	        	} 
    			?>
          </div>
          <!-- /.card-header -->
          <form method="post" class="needs-validation" action="<?php echo site_url('dashboards/update_post'); ?>" enctype='multipart/form-data' novalidate>
          <div class="card-body">
            <div class="row">
                  <input type="hidden" name="id" value="<?php echo $get_post_info['id'] ?>">
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label>Title</label>
	                  <input type="text" name="title" class="form-control" value="<?php if(!empty($get_post_info)){ echo $get_post_info['title']; } ?>" placeholder="Title.." required>
	                  <?php
	                  if(!empty(form_error('title'))){
	                  		echo '<div class="alert alert-danger">'. form_error('title') . '</div>';
	                  }
	                	?>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                  <label>Description</label>
	                  <textarea class="form-control" name="description" value="<?php echo $get_post_info['description']; ?>" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
	              	  <?php
	                  if(!empty(form_error('description'))){
	                  		echo '<div class="alert alert-danger">'. form_error('description') . '</div>';
	                  }
	                	?>
	                </div>
	                <!-- /.form-group -->
	              </div>
	              <!-- /.col -->
	              <div class="col-md-6">
	                <div class="form-group">
	                  <label>Category</label>
	                  <select class="form-control" name="category" style="width: 100%;" required>
	                  	<!--<option value="" disabled selected="selected">Select Category</option>-->
	                  	<?php
	                  	foreach($category_lists as $category_list) {
	                  		if(!empty($get_post_info) && $get_post_info['category'] == $category_list['id']){
	                  			echo '<option value="'. $category_list['id'] .'" selected="selected">'. $category_list['category_name'].'</option>';
	                  		}else {
	                  			echo '<option value="'. $category_list['id'] .'">'. $category_list['category_name'].'</option>';
	                  		}
	                  	}
	                  	?>
	                  </select>
	                  <?php
		                  if(!empty(form_error('category'))){
		                  		echo '<div class="alert alert-danger">'. form_error('category') . '</div>';
		                  }
	                	?>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                  <label>Is Feature ?</label>
	                  <select class="form-control" name="is_feature" style="width: 100%;">
	                    <option <?php if(isset($get_post_info) && $get_post_info['is_feature'] == 1){?> selected="selected" <?php } ?> value="1">Yes</option>
	                    <option <?php if(isset($get_post_info) && $get_post_info['is_feature'] == 0){?> selected="selected" <?php } ?> value="0">No</option>
	                  </select>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                  <label>Upload Image</label>
	                  <input type="file" class="form-control" name="image">
	                  <?php  
	                  	if(isset($get_post_info) && !empty($get_post_info['image'])){
	                  		echo '<img src="'.site_url('assets/img/').$get_post_info['image'].'" width="50" height="50" alt="Image not found">';
	                  	}
	                  ?>
	                </div>
	                <!-- /.form-group -->
	                <div class="form-group">
	                  <label>Image Caption</label>
	                  <input type="text" name="image_caption" class="form-control" value="<?php if(isset($get_post_info) && !empty($get_post_info['image_caption'])){ echo $get_post_info['image_caption']; } ?>" placeholder="Image Caption..">
	                </div>
	                <!-- /.form-group -->
	                <div class="text-center">
	                	<input type="submit" class="btn btn-primary" name="edit_post_submit" value="Edit">
	                </div>
	              </div>
	              <!-- /.col -->
          	    
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
      </form>
        </div>
        <!-- /.card -->
</div>
<!-- Col End -->


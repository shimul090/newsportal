<!-- Col Start -->
<div class="col" style="background-color: #454d55;">
    <!-- Row Start -->
	<div class="row mt-3">
		<div class="col-sm-4">
            <div class="info-box">
              	<span class="info-box-icon bg-info"><i class="fas fa-cog"></i></span>

              	<div class="info-box-content">
                	<span class="info-box-text">Total User</span>
                	<span class="info-box-number"><?php echo $dashboard_info['total_user']->total_users ?></span>
              	</div>
              	<!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->


        <div class="col-sm-4">
            <div class="info-box mb-3">
        	    <span class="info-box-icon bg-danger"><i class="fas fa-thumbs-up"></i></span>

              	<div class="info-box-content">
                	<span class="info-box-text">Total Category</span>
                	<span class="info-box-number"><?php echo $dashboard_info['total_cat']->total_category ?></span>
              	</div>
              	<!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-sm-4">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Post</span>
                	<span class="info-box-number"><?php echo $dashboard_info['total_post']->total_posts ?></span>
                </div>
              	<!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
	</div>
    <!-- Row End -->

    <!-- Row Start -->
    <div class="row mt-3">
        <!-- Col -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category Wise Post Count</h3>
                </div>
                <div class="card-body">
                    <div class="d-md-flex">
                        <div id="pie_chart" style="height: 500px; margin: 0 auto"></div>
                    </div><!-- /.d-md-flex -->
                </div>
            </div>
        </div>

        <!-- Col -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Wise Post Count</h3>
                </div>
                <div class="card-body">
                    <div class="d-md-flex">
                        <div id="pie_chart_for_user" style="height: 500px; margin: 0 auto"></div>
                    </div><!-- /.d-md-flex -->
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Col End -->


	<style>
	.container .top-add {
		overflow: hidden;
		margin: 10px 0;
	}

	.container #breaking-news {
    	background-color: #fff;
    	overflow: hidden;
    	margin: 0px 0px 10px 0px;
    	border-radius: 3px;
	}

	.minimum_height {
		min-height: 900px;
	}

	.post img {
		width: 100%;
	}

	</style>

		<div class="container minimum_height">
			<div class="section">
				<div class="row">
					<div class="col-md-9 col-sm-8">
						<div id="site-content">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="left-content">
										<div class="section lifestyle-section">
											<h1 class="section-title"><?php echo $news['category']; ?></h1>
											<h2><?php echo $news['title']; ?></h2>
											<div class="post medium-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<figure class="figure">
  															<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $news['image']; ?>" alt="">
  															<figcaption class="figure-caption text-center"><?php echo $news['image_caption']; ?></figcaption>
														</figure>
													</div>
												</div>
												<div class="post-content">
													<div class="entry-meta">
														<ul class="list-inline">
															<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo $news['created_at']; ?> </a></li>
															<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
															<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
														</ul>
													</div>
													<p> <?php echo $news['description']; ?> </p>
												</div>
											</div><!--/post-->
										</div><!--/.lifestyle -->
									</div><!--/.left-content-->
								</div>
							</div>
						</div><!--/#site-content-->
					</div>
					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget">
								<h1 class="section-title title">Related News</h1>
								<ul class="post-list">
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/news/images/post/rising/1.jpg" alt="" />
												</div>
											</div>
											<div class="post-content">
												<div class="video-catagory"><a href="#">World</a></div>
												<h2 class="entry-title">
													<a href="news-details.html">3 students arrested after body-slamming principal</a>
												</h2>
											</div>
										</div><!--/post-->
									</li>
								</ul>
							</div><!--/#widget-->
						</div><!--/#sitebar-->
					</div>
				</div>
			</div><!--/.section-->
		</div><!--/.container-->



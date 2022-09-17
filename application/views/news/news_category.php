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

	.img-responsive {
		display: block;
		width: 100%;
		height: 200px;
	}

	</style>

		<div class="container">

			<div class="section">
				<div class="row">
					<div class="col-md-9 col-sm-8">
						<div id="site-content">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="left-content">
										<div class="section lifestyle-section">
											<h1 class="section-title"><?php echo $this->uri->segment(4); ?></h1>
											<div class="row">
												<?php if (isset($news[0])) {?>
													<div class="col-md-4">
														<div class="post medium-post">
															<div class="entry-header">
																<div class="entry-thumbnail">
																	<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $news[0]['image']; ?>" alt="" />
																</div>
															</div>
															<div class="post-content">
																<div class="entry-meta">
																	<ul class="list-inline">
																		<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($news[0]['created_at'], 0, 10); ?> </a></li>
																		<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																		<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																	</ul>
																</div>
																<h2 class="entry-title">
																	<?php echo '<a href="' . site_url('news/news_details/') . $news[0]['id'] . '">' . $news[0]['title'] . '</a>'; ?>
																</h2>
															</div>
														</div>
													</div>
												<?php }?>
												<?php if (isset($news[1])) {?>
													<div class="col-md-8">
														<div class="post medium-post">
															<div class="entry-header">
																<div class="entry-thumbnail">
																	<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $news[1]['image']; ?>" alt="" />
																</div>
															</div>
															<div class="post-content">
																<div class="entry-meta">
																	<ul class="list-inline">
																		<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($news[1]['created_at'], 0, 10); ?> </a></li>
																		<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																		<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																	</ul>
																</div>
																<h2 class="entry-title">
																	<?php echo '<a href="' . site_url('news/news_details/') . $news[1]['id'] . '">' . $news[1]['title'] . '</a>'; ?>
																</h2>
															</div>
														</div><!--/post-->
													</div>
												<?php }?>
											</div>

											<div class="row">
												<?php if (count($news) > 2) {
	for ($i = 2; $i < count($news); $i++) {?>
														<div class="col-md-6">
															<div class="post medium-post">
																<div class="entry-header">
																	<div class="entry-thumbnail">
																		<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $news[$i]['image']; ?>" alt="" />
																	</div>
																</div>
																<div class="post-content">
																	<div class="entry-meta">
																		<ul class="list-inline">
																			<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($news[$i]['created_at'], 0, 10); ?> </a></li>
																			<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																			<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																		</ul>
																	</div>
																	<h2 class="entry-title">
																		<?php echo '<a href="' . site_url('news/news_details/') . $news[$i]['id'] . '">' . $news[$i]['title'] . '</a>'; ?>
																	</h2>
																</div>
															</div><!--/post-->
														</div>
												<?php }}?>
											</div>
										</div><!--/.lifestyle -->
									</div><!--/.left-content-->
								</div>
							</div>
						</div><!--/#site-content-->
					</div>
					<?php if (isset($feature_news)) {?>
						<div class="col-md-3 col-sm-4">
							<div id="sitebar">
								<div class="widget">
									<h1 class="section-title title">Feature News</h1>
									<ul class="post-list">
										<li>
											<div class="post small-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $feature_news['image'] ?>" alt="" />
													</div>
												</div>
												<div class="post-content">
													<div class="video-catagory"><a href="#"><?php echo $feature_news['category_name'] ?></a></div>
													<h2 class="entry-title">
														<?php echo '<a href="' . site_url('news/news_details/') . $feature_news['id'] . '">' . $feature_news['title'] . '</a>'; ?>
													</h2>
												</div>
											</div><!--/post-->
										</li>
									</ul>
								</div><!--/#widget-->
							</div><!--/#sitebar-->
						</div>
					<?php }?>
				</div>
			</div><!--/.section-->
		</div><!--/.container-->



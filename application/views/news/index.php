		<style>
			.container #mainmenu {
				padding-left: 10%;
			}

			.img-responsive {
				display: block;
				width: 100%;
				height: 200px;
			}
		</style>
		<div class="container">
			<div id="breaking-news">
				<span>Breaking News</span>
				<div class="breaking-news-scroll">
					<ul>
						<?php
foreach ($breaking_news as $breaking) {
	echo '<li><i class="fa fa-angle-double-right"></i>
										<a href="news_details/' . $breaking['id'] . '">' . $breaking['title'] . '</a>
									  </li>';
}
?>
					</ul>
				</div>
			</div><!--#breaking-news-->

			<div class="section">
				<div class="row">
					<div class="col-md-9 col-sm-8">
						<div id="site-content">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="left-content">
										<div class="section lifestyle-section">
											<h1 class="section-title">Top News</h1>
											<div class="row">
												<?php foreach ($top_news as $news) {?>
													<div class="col-md-3">
													<div class="post medium-post">
														<div class="entry-header">
															<div class="entry-thumbnail">
																<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $news['image'] ?>" alt="" />
															</div>
														</div>
														<div class="post-content">
															<div class="entry-meta">
																<ul class="list-inline">
																	<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($news['created_at'], 0, 10); ?> </a></li>
																	<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																	<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																</ul>
															</div>
															<h2 class="entry-title">
																<?php echo '<a href="news_details/' . $news['id'] . '">' . $news['title'] . '</a>'; ?>
															</h2>
														</div>
													</div><!--/post-->
												</div>
												<?php }?>
											</div>
										</div><!--/.lifestyle -->

									</div><!--/.left-content-->
								</div>
							</div>
						</div><!--/#site-content-->
					</div>
					<div class="col-md-3 col-sm-4">
						<div id="sitebar">
							<div class="widget">
								<h1 class="section-title title">This is Rising!</h1>
								<ul class="post-list">
									<li>
										<div class="post small-post">
											<div class="entry-header">
												<div class="entry-thumbnail">
													<img class="img-responsive" src="<?php echo base_url(); ?>assets/imag/images/post/rising/1.jpg" alt="" />
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
				<?php if (count($national_news) > 0) {?>
					<div class="row">
						<div class="col-md-9 col-sm-8">
							<div id="site-content">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="left-content">
											<div class="section lifestyle-section">
												<h1 class="section-title">National</h1>
												<div class="row">
													<?php foreach ($national_news as $national) {?>
														<div class="col-md-6">
															<div class="post medium-post">
																<div class="entry-header">
																	<div class="entry-thumbnail">
																		<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $national['image'] ?>" alt="" />
																	</div>
																</div>
																<div class="post-content">
																	<div class="entry-meta">
																		<ul class="list-inline">
																			<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($national['created_at'], 0, 10); ?> </a></li>
																			<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																			<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																		</ul>
																	</div>
																	<h2 class="entry-title">
																		<?php echo '<a href="news_details/' . $national['id'] . '">' . $national['title'] . '</a>'; ?>
																	</h2>
																</div>
															</div><!--/post-->
														</div>
													<?php }?>
												</div>
											</div>

										</div><!--/.left-content-->
									</div>
								</div>
							</div><!--/#site-content-->
						</div>
						<div class="col-md-3 col-sm-4">
							<div id="sitebar">
								<div class="widget">
									<ul class="post-list">
										<li>
											<div class="post small-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/122223004260fd290821961.jpg" alt="" />
													</div>
												</div>
												<div class="post-content">
													<div class="video-catagory"><a href="#">National</a></div>
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
				<?php	}?>


				<?php if (count($international_news) > 0) {?>
					<div class="row">
						<div class="col-md-9 col-sm-8">
							<div id="site-content">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="left-content">
											<div class="section lifestyle-section">
												<h1 class="section-title">International</h1>
												<div class="row">
													<?php foreach ($international_news as $international) {?>
														<div class="col-md-6">
															<div class="post medium-post">
																<div class="entry-header">
																	<div class="entry-thumbnail">
																		<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $international['image'] ?>" alt="" />
																	</div>
																</div>
																<div class="post-content">
																	<div class="entry-meta">
																		<ul class="list-inline">
																			<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($international['created_at'], 0, 10); ?> </a></li>
																			<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																			<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																		</ul>
																	</div>
																	<h2 class="entry-title">
																		<?php echo '<a href="news_details/' . $international['id'] . '">' . $international['title'] . '</a>'; ?>
																	</h2>
																</div>
															</div><!--/post-->
														</div>
													<?php }?>
												</div>
											</div>

										</div><!--/.left-content-->
									</div>
								</div>
							</div><!--/#site-content-->
						</div>
						<div class="col-md-3 col-sm-4">
							<div id="sitebar">
								<div class="widget">
									<ul class="post-list">
										<li>
											<div class="post small-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/122223004260fd290821961.jpg" alt="" />
													</div>
												</div>
												<div class="post-content">
													<div class="video-catagory"><a href="#">International</a></div>
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
				<?php	}?>
				<?php if (count($sports_news) > 0) {?>
					<div class="row">
						<div class="col-md-9 col-sm-8">
							<div id="site-content">
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="left-content">
											<div class="section lifestyle-section">
												<h1 class="section-title">Sports</h1>
												<div class="row">
													<?php foreach ($sports_news as $sports) {?>
														<div class="col-md-6">
															<div class="post medium-post">
																<div class="entry-header">
																	<div class="entry-thumbnail">
																		<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $sports['image'] ?>" alt="" />
																	</div>
																</div>
																<div class="post-content">
																	<div class="entry-meta">
																		<ul class="list-inline">
																			<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> <?php echo substr($sports['created_at'], 0, 10); ?> </a></li>
																			<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
																			<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
																		</ul>
																	</div>
																	<h2 class="entry-title">
																		<?php echo '<a href="news_details/' . $sports['id'] . '">' . $sports['title'] . '</a>'; ?>
																	</h2>
																</div>
															</div><!--/post-->
														</div>
													<?php }?>
												</div>
											</div>

										</div><!--/.left-content-->
									</div>
								</div>
							</div><!--/#site-content-->
						</div>
						<div class="col-md-3 col-sm-4">
							<div id="sitebar">
								<div class="widget">
									<ul class="post-list">
										<li>
											<div class="post small-post">
												<div class="entry-header">
													<div class="entry-thumbnail">
														<img class="img-responsive" src="<?php echo base_url(); ?>assets/img/122223004260fd290821961.jpg" alt="" />
													</div>
												</div>
												<div class="post-content">
													<div class="video-catagory"><a href="#">Sports</a></div>
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
				<?php	}?>
			</div><!--/.section-->
		</div>



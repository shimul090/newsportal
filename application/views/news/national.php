<div class="content-wrapper">
	<div class="container">
		<div class="row">

			<div class="col-lg-9">
				<div class="contentitem">
					<?php
						foreach($national_news as $news){
							$string = strip_tags($news['content']);
							if (strlen($string) > 250) {
    							$stringCut = substr($string, 0, 230);
    							$endPoint = strrpos($stringCut, ' ');

    							//if the string doesn't contain any space then it will cut without word basis.
    							$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    							$string .= '... <a href="'. site_url('news/open_news/'.str_replace(' ','-',$news['title'])) .'">Read More</a>';
							}	
							echo '<div class="box-red">
								  		<h2 class="box-red_title">'.$news['title'].'</h2>
										<div class="box-red_content">
											<div class="box-red_content_item">
												<p>'.
												$string
												.'</p>
											</div>
										</div>
								   </div>';
						}
					?>
					<div class="box-red">
						<h2 class="box-red_title">First News</h2>
						<div class="box-red_content">
							<div class="box-red_content_item">
								<p>Body</p>
							</div>
						</div>
					</div>

					<div class="box-red">
						<h2 class="box-red_title">Second News</h2>
						<div class="box-red_content">
							<div class="box-red_content_item">
								<p>Body</p>
							</div>
						</div>
					</div>

					<div class="box-red">
						<h2 class="box-red_title">Third News</h2>
						<div class="box-red_content">
							<div class="box-red_content_item">
								<p>Body</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="rightsidebar">
					<div class="rightsidebar_content">
						<div class="rightsidebar_content_box">
							<h2>Test Heading</h2>
							<p>Test Body</p>
						</div>

						<div class="rightsidebar_content_box">
							<h2>Test Heading</h2>
							<p>Test Body</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
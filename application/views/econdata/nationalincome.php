<div class="content-wrapper">
	<section class="content">
		<!--Start Breadcrumbs-->

		<section class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
					</div>
				</div>
			</div>
		</section>
		<!--End Breadcrumbs-->
		<!--<div class="container">

			<div class="row">
				<div class="col-lg-3">

					<div class="bbsidebar-sidebar">

						<div class="single-widget categories">
							<h3 class="title">Related links</h3>
							<ul>
								<li><a href="#"><i class="fa fa-angle-right"></i>Print this page</a></li>
							</ul>
						</div>
					</div>
				</div>
-->
				<div class="container">

			<div class="row">
				<div class="col-lg-3">

					<div class="bbsidebar-sidebar">

						<div class="single-widget categories">
							<h3 class="title">search previous data</h3><br>
							<div class="form">
								<span class="form-msg"></span>
                                <form method="post" action="<?php echo site_url("econdata/nationalincome") ?>" id="search-form">

									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
										</div>
										<select class="custom-select"  name="cboYear" id="cboYear">
											<option value="">Select Year</option>
                                                <?php
for ($i = 1; $i < 5; $i++) {
	echo "<OPTION value=";
	echo (date('Y') - $i - 1) . "-" . (date('Y') - $i);
	echo ">";
	echo (date('Y') - $i - 1) . "-" . (date('Y') - $i);
	echo "</OPTION>";
}
?>
										</select>

									</div>

									<div class="form_group mt-3">
										<button type="submit" class="form_submit">Search</button>
									</div>
                               </form>
                             </div>
                         </div>
                      	</div>
                    </div>
				<!--Right side of the content-->
				<div class="col-lg-9">
					<div class="row">
						<div class="col-12">
							<div class="page_header"><?php
echo $page_header;
?></div>
							<span class="data-container">
								<div class="content-circular">
									<?php
$i = 0;
foreach ($national_income_years as $national_income_year) {
	$arrYear[$i] = $national_income_year['nia_finance_year'];
	$i++;
}
?>
									<table class="table table-striped table-bordered" id="sortableTable">
										<thead>
											<tr>
												<th scope="col" rowspan="2">Items</th>
												<th scope="col" rowspan="2"><?php echo $arrYear[0] ?></th>
												<th scope="col" rowspan="2"><?php echo $arrYear[1] ?></th>
												<th scope="col" colspan="2">Changes over previous year</th>
											</tr>
											<tr>
												<th scope="col">absolute</th>
												<th scope="col">percentage</th>
											</tr>
										</thead>

										<tbody>
										<?php
$row_starter[0] = "GDP at current prices, in million Taka";
$row_starter[1] = "GNI at current prices, in million Taka";
$row_starter[2] = "GDP at constant prices (base 2005-06),<br>in million Taka";
$row_starter[3] = "GNI at constant prices (base  2005-06),<br>in million Taka";
$row_starter[4] = "Per Capita GDP at current prices, in Taka";
$row_starter[5] = "Per Capita GDP at constant prices (base  2005-06),<br>in Taka";
$row_starter[6] = "Per Capita GNI at current prices, in Taka";
$row_starter[7] = "Per Capita GNI at constant prices (base  2005-06),<br>in Taka";

$new_counter = 0;
$row_counter = 0;
foreach ($national_income_data as $info) {
	if ($new_counter == 0) {
		echo '<tr>';
		echo '<td>' . $row_starter[$row_counter] . '</td>';
		$row_counter++;
	}
	if ($new_counter % 3 == 0 && $new_counter != 0) {
		echo '<td>' . $info['nia_amount'] . '%' . '</td>';
	} else {
		echo '<td>' . $info['nia_amount'] . '</td>';
	}
	$new_counter++;
	if ($new_counter == 4) {
		echo '</tr>';
		$new_counter = 0;
	}
}

?>
										</tbody>
									</table>



									<!--End of container-->
								</div>
							</span>
								<a id="close-pdf-detail" href="#" style="display: none;"><< Back</a>
							<iframe id="pdf-details" src=""
									style="width:100%; height:400px; right:0; top:0; bottom:0; display: none;"></iframe>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!-- /.row -->
		<!-- Main row -->

		<!-- /.row (main row) -->

	</section>
	<!-- /.content --><!--
</div>
</div>-->

<script type="text/javascript">
	$(document).ready(function () {
		$('.pdf-file').click(function (e) {
			e.preventDefault();
			var url = $(this).attr('pdf-link');
			$('.data-container').hide('slow');
			$('#pdf-details').attr('src', url);
			$('#pdf-details').show('slow');
			$('#close-pdf-detail').show();
		});

		$('#close-pdf-detail').click(function (e) {
			e.preventDefault();
			$(this).hide();
			$('.data-container').show('slow');
			$('#pdf-details').hide('slow');

		});
	});

</script>
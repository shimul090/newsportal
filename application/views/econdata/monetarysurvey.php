<div class="content-wrapper">
  <section class="content">
    <!--Start Breadcrumbs-->

    <section class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <?php //echo $Breadcrumbs; ?>
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
              <h3 class="title">
                <?php echo "search previous data"; ?>

              </h3><br>
              <div class="form">
                <span class="form-msg"></span>
                <?php
echo validation_errors('<div class="alert alert-danger">', '</div>');
?>
                  <form method="post" class="needs-validation" action="<?php echo site_url("econdata/monetarysurvey") ?>" id="search-form" novalidate>


                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    </div>
                    <select class="custom-select"  name="select_month" id="select_month" required>
                      <option value="" disabled selected>Select Month</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>

                    <div class="invalid-feedback">
                        Please select month
                    </div>

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    </div>
                    <select class="custom-select"  name="select_year" id="select_year" required>
                      <option value="" disabled selected>Select Year</option>
                      <?php
for ($i = 0; $i < 4; $i++) {
	echo "<option value=" . (date(Y) - $i) . ">" . (date(Y) - $i) . "</option>";
}
?>
                    </select>
                    <div class="invalid-feedback">
                      Please select year
                    </div>
                  </div>


                  <div class="form_group mt-3">
                    <input type="submit" name="monetarysurvey_submit" value="Search" class="form_submit btn btn-primary btn-block">
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
              <div class="page_header"><?php echo $page_header; ?></div>
              <span class="data-container">
                <div class="content-circular">

                  <table class="table table-striped table-bordered" id="sortableTable">
                        <?php
if (count($table_headers) == 3 && count($table_data) == 95) {
	?>
                      <thead class="text-center">
                          <tr>
                              <th colspan="6" class="text-right">(Taka in Million)</th>
                          </tr>
                          <tr>
                              <th rowspan="2">Components</th>
                              <?php
foreach ($table_headers as $table_header) {
		echo '<th rowspan="2">' . date("M, Y", strtotime($table_header['ms_date'])) . '</th>';
	}?>
                              <th colspan="2">Percentage Changes</th>
                          </tr>
                          <tr>
                              <th><?php echo date("M, Y", strtotime($table_headers[0]['ms_date'])) . '<br>over<br>' . date("M, Y", strtotime($table_headers[1]['ms_date'])); ?></th>
                              <th><?php echo date("M, Y", strtotime($table_headers[0]['ms_date'])) . '<br>over<br>' . date("M, Y", strtotime($table_headers[2]['ms_date'])); ?></th>
                          </tr>
                      </thead>

                      <tbody>
                          <?php
$msurvey_row_starter[0] = "1.  NET   FOREIGN   ASSETS";
	$msurvey_row_starter[1] = "&nbsp;(a)  BANGLADESH BANK";
	$msurvey_row_starter[2] = "&nbsp;(b) DEPOSIT MONEY BANKS";
	$msurvey_row_starter[3] = "2.  NET   DOMESTIC   ASSETS";
	$msurvey_row_starter[4] = "&nbsp;A.  DOMESTIC CREDIT (a+b)";
	$msurvey_row_starter[5] = "&nbsp;&nbsp;(a) BANGLADESH BANK";
	$msurvey_row_starter[6] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Public Sector";
	$msurvey_row_starter[7] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Govt.(net)";
	$msurvey_row_starter[8] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Other Public";
	$msurvey_row_starter[9] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Private Sector";
	$msurvey_row_starter[10] = "&nbsp;&nbsp;(b) DEPOSIT MONEY BANKS";
	$msurvey_row_starter[11] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Public Sector";
	$msurvey_row_starter[12] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Govt.(net)";
	$msurvey_row_starter[13] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Other Public";
	$msurvey_row_starter[14] = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Claims on Private Sector";
	$msurvey_row_starter[15] = "&nbsp;&nbsp;B. NET OTHER ASSETS";
	$msurvey_row_starter[16] = "&nbsp;&nbsp;(a) BANGLADESH BANK";
	$msurvey_row_starter[17] = "&nbsp;&nbsp;(b) DEPOSIT MONEY BANKS";
	$msurvey_row_starter[18] = "3. BROAD MONEY(1+2)";
	$row_starter = 0;
	$row = 0;
	foreach ($table_data as $info) {
		if ($row_starter == 0) {
			echo '<tr>';
			echo '<td class="text-left">' . $msurvey_row_starter[$row] . '</td>';
			$row++;
		}
		echo '<td>' . round($info['msurvey_amount'], 2) . '</td>';
		$row_starter++;
		if ($row_starter == 5) {
			echo '</tr>';
			$row_starter = 0;
		}
	}
	?>

                      </tbody>

<?php } else {
	echo '<thead><tr><th class="text-center">Data Not Available</th></tr></thead>';
}?>
</table><br>

<p>
    <b>Source :</b> Statistics Department, Bangladesh Bank<br>
p := Provisional
</p>

                  <!--End of container-->
                </div>
              </span>
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

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
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






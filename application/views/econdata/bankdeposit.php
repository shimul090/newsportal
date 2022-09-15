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
              <h3 class="title">
                <?php
echo "search previous data";
?>

              </h3><br>
              <div class="form">
                <span class="form-msg"></span>
                <?php
echo validation_errors('<div class="alert alert-danger">', '</div>');
?>
                  <form method="post" action="<?php echo site_url("econdata/bankdeposit") ?>" id="search-form">


                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    </div>
                    <select class="custom-select"  name="select_month" id="select_month">
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
                        Please select a month
                    </div>

                  </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    </div>
                    <select class="custom-select"  name="select_year" id="select_year">
                      <option value="" disabled selected>Select Year</option>
                      <?php
for ($i = 0; $i < 4; $i++) {
	echo "<OPTION value=" . (date(Y) - $i) . ">" . (date(Y) - $i) . "</option>";
}
?>
                    </select>
                    <div class="invalid-feedback">
                      Please select year
                    </div>
                  </div>


                  <div class="form_group mt-3">
                    <input type="submit" name="bankdeposit_submit" value="Search" class="form_submit btn btn-primary btn-block">
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

                  <table class="table table-striped table-bordered" id="sortableTable">
                        <?php
if (count($table_headers) == 3 && count($deposit_data) == 15) {
	?>
                      <thead>
                          <tr>
                              <th class="text-left">Deposits held in DMBs</th>
                              <th colspan="5" class="text-right">(Taka in Millions)</th>
                          </tr>
                          <tr>
                              <th rowspan="2">Items</th>
                              <?php
foreach ($table_headers as $table_header) {
		echo '<th rowspan="2">' . date("M, Y", strtotime($table_header['deposit_date'])) . '</th>';
	}?>
                              <th colspan="2">Percentage Changes</th>
                          </tr>
                          <tr>
                              <th><?php echo date("M, Y", strtotime($table_headers[0]['deposit_date'])) . '<br>over<br>' . date("M, Y", strtotime($table_headers[1]['deposit_date'])); ?></th>
                              <th><?php echo date("M, Y", strtotime($table_headers[0]['deposit_date'])) . '<br>over<br>' . date("M, Y", strtotime($table_headers[2]['deposit_date'])); ?></th>
                          </tr>
                      </thead>

                      <tbody>
                          <?php
$deposit[0] = "Demand Deposits";
	$deposit[1] = "Time Deposits";
	$deposit[2] = "Total";
	$row_starter = 0;
	$row = 0;
	foreach ($deposit_data as $d_data) {
		if ($row_starter == 0) {
			echo '<tr>';
			echo '<td>' . $deposit[$row] . '</td>';
			$row++;
		}
		echo '<td>' . round($d_data['deposit_amount'], 2) . '</td>';
		$row_starter++;
		if ($row_starter == 5) {
			echo '</tr>';
			$row_starter = 0;
		}
	}
	?>

                      </tbody>

<?php } else {
	echo '<thead><tr><th class="text-center">Deposit Data Not Available</th></tr></thead>';
}?>
</table>

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






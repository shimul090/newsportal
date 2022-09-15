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
//echo validation_errors('<div class="alert alert-danger">', '</div>');
?>
                  <form method="post" class="needs-validation" action="<?php echo site_url("econdata/w_avg_interest") ?>" id="search-form" novalidate>


                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                    </div>
                    <select class="custom-select"  name="select_bank_type" id="select_bank_type" value="<?php echo set_value('select_bank_type') ?>">
                        <option value="" disabled selected>Select Bank Type</option>
                        <option value="1">State Owned Banks</option>
                        <option value="2">Specialised Banks</option>
                        <option value="3">Private Banks</option>
                        <option value="4">Foreign Banks</option>
                    </select>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                      </div>
                      <select class="custom-select"  name="select_month" id="select_month" value="<?php echo set_value('select_month'); ?>" required>
                          <?php
$select_month = "";
if (isset($_REQUEST["select_month"])) {
	$select_month = $_REQUEST["select_month"];
}
?>
                          <option value="" disabled selected>Select Month</option>
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10" >October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                      <?php
if (!empty(form_error('select_month'))) {
	echo '<div class="alert alert-danger">' . form_error('select_month') . '</div>';
}
?>
                      <div class="invalid-feedback">
                        Please select month
                      </div>
                  </div>

                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-caret-down" aria-hidden="true"></i></label>
                      </div>
                                                <?php
$select_year = "";
if (isset($_REQUEST["select_year"])) {
	$select_year = $_REQUEST["select_year"];
}
?>
                      <select class="custom-select"  name="select_year" id="select_year" required>
                        <option value="" disabled selected>Select Year</option>
                        <?php
for ($i = 0; $i < 9; $i++) {
	echo "<option value=" . (date(Y) - $i) . ">" . (date(Y) - $i) . "</option>";
}
?>
                      </select>
                      <?php
if (!empty(form_error('select_year'))) {
	echo '<div class="alert alert-danger">' . form_error('select_year') . '</div>';
}
?>
                      <div class="invalid-feedback">
                        Please select year
                      </div>
                  </div>


                  <div class="form_group mt-3">
                    <input type="submit" name="interest_rate_spread_submit" value="Search" class="form_submit btn btn-primary btn-block">
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
                  <?php if (empty($interest_rate_spread)) {
	echo "Data Not Available";
} else {
	echo '<table class="table table-striped table-bordered" id="sortableTable">
                              <thead>';
	if (!empty($select_month) && !empty($select_year)) {
		if (($select_month <= 6 && $select_year == 2016) || ($select_year < 2016)) {
			echo $select_month . '   ' . $select_year;
			echo "<tr>
                                  <th></th>
                                  <th></th>
                                  <th colspan='3'>Interest Rate Spread (Overall)</th>
                              </tr>
                              <tr>
                                  <th>Sl No</th>
                                  <th>Name of Banks</th>
                                  <th>W. Avg. Deposits</th>
                                  <th>W. Avg. Advances</th>
                                  <th>Spread</th>
                              </tr>";
			$showColums = 1; //only 1 marge column
		} elseif (($select_year == 2020 && $select_month <= 7) or ($select_year == 2016 && $select_month >= 7) or ($select_year > 2016 && $select_year < 2020)) {
			echo "<tr>";
			echo "<th></th>";
			echo "<th></th>";
			echo "<th colspan='3'>Interest Rate Spread (Overall)</th>";
			echo "<th colspan='3'>Interest Rate Spread (Excl. Consumer Finance & Credit Card)</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Sl No</th>";
			echo "<th>Name of Banks</th>";
			echo "<th>W. Avg. Deposits</th>";
			echo "<th>W. Avg. Advances</th>";
			echo "<th>Spread</th>";

			echo "<th>W. Avg. Deposits</th>";
			echo "<th>W. Avg. Advances</th>";
			echo "<th>Spread</th>";
			echo "</tr>";
			$showColums = 2; //only 2 marge column
		} elseif (($select_year == 2020 && $select_month >= 8) || ($select_year > 2020)) {
			echo "<tr>";
			echo "<th width='5%'></th>";
			echo "<th width='20%'></th>";
			echo "<th width='25%' colspan='3' style='background-color:#2e8b57'><font color='#FFFFFF'>Interest Rate Spread (Overall)</font></th>";
			echo "<th width='25%' colspan='3' style='background-color:#20b2aa'><font color='#FFFFFF'>Interest Rate Spread (Excl.  Credit Card)</font></th>";
			echo "<th width='25%' colspan='3' style='background-color:#93dfb8'><font color='#FFFFFF'>Interest Rate Spread (Excl. Consumer Finance & Credit Card)</font></th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th width='5%'>Sl No</th>";
			echo "<th width='20%'>Name of Banks</th>";
			echo "<th width='10%'>W. Avg. Deposits</th>";
			echo "<th width='10%'>W. Avg. Advances</th>";
			echo "<th width='5%'>Spread</th>";

			echo "<th width='10%'>W. Avg. Deposits</th>";
			echo "<th width='10%'>W. Avg. Advances</th>";
			echo "<th width='5%'>Spread</th>";

			echo "<th width='10%'>W. Avg. Deposits</th>";
			echo "<th width='10%'>W. Avg. Advances</th>";
			echo "<th width='5%'>Spread</th>";
			echo "</tr>";

			$showColums = 3; //3 marge column
		}

	} else {
		echo "<tr>
                              <th></th>
                              <th></th>
                              <th colspan='3'>Interest Rate Spread (Overall)</th>
                              <th colspan='3'>Interest Rate Spread (Excl. Credit Card)</th>
                              <th colspan='3'>Interest Rate Spread (Excl. Consumer Finance & Credit Card)</th>
                          </tr>
                          <tr>
                              <th>Sl No</th>
                              <th>Name of Banks</th>
                              <th>W. Avg. Deposits</th>
                              <th>W. Avg. Advances</th>
                              <th>Spread</th>

                              <th >W. Avg. Deposits</th>
                              <th >W. Avg. Advances</th>
                              <th >Spread</th>

                              <th >W. Avg. Deposits</th>
                              <th >W. Avg. Advances</th>
                              <th >Spread</th>
                          </tr>";
		$showColums = 3; //3 marge column
	}

	echo '</thead>
                      <tbody>
                        <tr>
                            <th class="text-center" colspan="11">' . $interest_rate_spread[0]['prd_month'] . ', ' . $interest_rate_spread[0]['prd_year'] . '</th>
                        </tr>';

	$rowCounter = 1;
	$dbrowCounter = 1;
	$prevBnkType = '';
	foreach ($interest_rate_spread as $rate_spread) {
		echo '<tr>';
		if ($rate_spread['is_active'] == 'A') {
			echo '<td>' . $rowCounter . '</td>';
			$rowCounter++;
		} else {
			echo '<td></td>';
		}
		echo '<td>' . $rate_spread['bank_name'] . '</td>';
		echo '<td>' . number_format((float) $rate_spread['wavg_deporate'], 2, '.', '') . '</td>';
		echo '<td>' . number_format((float) $rate_spread['wavg_advrate'], 2, '.', '') . '</td>';
		echo '<td>' . number_format((float) $rate_spread['spread'], 2, '.', '') . '</td>';
		if ($showColums == 1) {
			echo '</tr>';
		} elseif ($showColums >= 2) {
			echo '<td>' . number_format((float) $rate_spread['wavg_deporate_o'], 2, '.', '') . '</td>';
			echo '<td>' . number_format((float) $rate_spread['wavg_advrate_o'], 2, '.', '') . '</td>';
			echo '<td>' . number_format((float) $rate_spread['spread_o'], 2, '.', '') . '</td>';
			if ($showColums == 2) {
				echo '</tr>';
			} else {
				echo '<td>' . number_format((float) $rate_spread['wavg_deporate_1'], 2, '.', '') . '</td>';
				echo '<td>' . number_format((float) $rate_spread['wavg_advrate_1'], 2, '.', '') . '</td>';
				echo '<td>' . number_format((float) $rate_spread['spread_1'], 2, '.', '') . '</td>';
				echo '</tr>';
			}
		}
	}

	echo '</tbody>
                  </table>';
}
?>
    <p><b>Note:&nbsp;&nbsp;&nbsp;&nbsp;</b>Interest Rate Spread (Excluding Consumer Finance & Credit Card) available from July, 2016.<br>
            Interest Rate Spread (Excluding Credit Card) available from August, 2020<br>
            <b>Source</b>  : Statistics Department, Bangladesh Bank, Head Office.</p>



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






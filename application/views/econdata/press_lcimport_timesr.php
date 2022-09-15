<?php
$serial_column = array(
	"1",
	"2",
	"3",
	"4",
	"5",
	"6",
	"7",
	"8",
	"",
	"",
	"9",
	"10",
	"11",
	"12",
	"13",
	"14",
	"15",
	"",
	"",
	"16",
	"17",
	"18",
	"19",
	"20",
	"21",
	"22",
	"23",
	"24",
	"25",
	"26",
	"");

$commodity_column = array("Rice",
	"Wheat",
	"Sugar",
	"Onion",
	"Fresh Fruits & Dry Fruits",
	"Pulses (all sorts )",
	"Milk Food",
	"Edible Oil",
	"a)Crude",
	"b)Refined",
	"Drugs & Medicine",
	"Oil Seeds/Rape Seeds",
	"Raw Cotton & Synthetic Fibre",
	"Yarn (Cotton, Synthetic, Mixed)",
	"Textile Fabrics & Accessories for Garments",
	"Pharmaceutical Raw Materials",
	"Chemical & Chemical Products",
	"a)&nbsp;&nbsp;Fertilizer",
	"b)&nbsp;&nbsp;Others",
	"P.O.L.",
	"Coal and Coke",
	"Cement",
	"Clinker and Limestone",
	"C.I.Sheets, B.P. Sheets, G.P. Sheet & Tin Plate",
	"Scrap Vessels",
	"Paper & Paper Board",
	"Intermediate Goods",
	"Capital Machinery",
	"Misc.Industrial Machinery",
	"Others",
	"TOTAL:",
);

if ((substr($max_lcdate["lcdate"], 5, 2) >= 7) && (substr($max_lcdate["lcdate"], 5, 2) <= 12)) {
	$year = substr($max_lcdate["lcdate"], 0, 4) . "-" . (substr($max_lcdate["lcdate"], 0, 4) + 1);
} else {
	$year = (substr($max_lcdate["lcdate"], 0, 4) - 1) . "-" . substr($max_lcdate["lcdate"], 0, 4);
}
$curYear = date('Y');
$curMonth = date('m');

$lc_dat = "";
$total_lcdate = "";
$start = 0;
foreach ($import_lc as $lc) {
	if ($lc['lcDate'] != $lc_dat) {
		$start == 0 ? $total_lcdate = $lc['lcDate'] : $total_lcdate = $total_lcdate . '~' . $lc['lcDate'];
		$start++;
		$lc_dat = $lc['lcDate'];
	}
}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped table-bordered" style="font-size: 12px;">
											<?php
if (count($max_lcdate) > 0) {
	$loop_length = explode("~", $total_lcdate);
	echo '<thead><tr>';
	echo '<th>Sl No.</th>';
	echo '<th>Commodity</th>';
	for ($i = 0; $i < count($loop_length); $i++) {
		echo '<th>' . 'Value of import L/Cs opened during July,' . substr($loop_length[0], -4) . ' - ' . substr(strstr($loop_length[$i], ' '), 1) . '</th>';
		echo '<th>' . 'Import L/Cs outstanding as on ' . $loop_length[$i] . '</th>';
	}
	echo '</tr></thead>';

	echo '<tbody>';
	$run_len = count($import_lc) / 31;
	for ($j = 0; $j < 31; $j++) {
		echo '<tr>';
		echo '<td>' . $serial_column[$j] . '</td>';
		echo '<td>' . $commodity_column[$j] . '</td>';
		echo '<td>' . number_format((float) str_replace(',', '', $import_lc[$j]['lcimport_open']), 2, '.', '') . '</td>';
		echo '<td>' . number_format((float) str_replace(',', '', $import_lc[$j]['lcimport_outstanding']), 2, '.', '') . '</td>';

		for ($i = 1; $i < $run_len; $i++) {
			echo '<td>' . number_format((float) str_replace(',', '', $import_lc[(31 * $i) + $j]['lcimport_open']), 2, '.', '') . '</td>';
			echo '<td>' . number_format((float) str_replace(',', '', $import_lc[(31 * $i) + $j]['lcimport_outstanding']), 2, '.', '') . '</td>';
		}
		echo '</tr>';
	}
	echo '</tbody>';
} else {
	echo '<thead><tr><th>Data Not Available</th></tr></thead>';
}
?>
							</table>
			</div>
		</div>
	</div>

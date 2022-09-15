</div><!-- body-row END -->

</body>
</html>

<script type="text/javascript">
    
    // Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('visualization', "1", {
          packages: ['corechart']
      });
</script>

<script language="JavaScript">
  // Draw the Pie chart 
  google.charts.setOnLoadCallback(pieChart);   
  //for month wise
  function pieChart() {
 
        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['Category', 'Count Post'],
            <?php 
             foreach ($chart_data as $row){
             echo "['".$row['category_name']."',".$row['total_post']."],";
             }
             ?>
        ]);
        var options = {
            //title: 'Category Wise Post Count',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, options);
  } 
</script>

<script language="JavaScript">
  // Draw the Pie chart 
  google.charts.setOnLoadCallback(pieChart);   
  //for month wise
  function pieChart() {
 
        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
            ['User', 'Count Post'],
            <?php 
             foreach ($chart_data_for_user as $row){
             echo "['".$row['name']."',".$row['total_post']."],";
             }
             ?>
        ]);
        var options = {
            //title: 'User Wise Post Count',
            is3D: true,
        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart_for_user'));
        chart.draw(data, options);
  } 
</script>
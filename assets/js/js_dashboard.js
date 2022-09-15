<script language="javascript" type="text/javascript">
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

<script>
$(".edit_category_by_id").click(function () {
    var ids = $(this).attr('data-id');
    $("#category_id_for_update").val( ids );
    $('#edit_category').modal('show');
});
</script>
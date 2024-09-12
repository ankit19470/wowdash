  <!-- jQuery library js -->
  <script src="{{url('fronted/js/lib/jquery-3.7.1.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="{{url('fronted/js/lib/bootstrap.bundle.min.js')}}"></script>
  <!-- Apex Chart js -->
  <script src="{{url('fronted/js/lib/apexcharts.min.js')}}"></script>
  <!-- Data Table js -->
  <script src="{{url('fronted/js/lib/dataTables.min.js')}}"></script>
  <!-- Iconify Font js -->
  <script src="{{url('fronted/js/lib/iconify-icon.min.js')}}"></script>
  <!-- jQuery UI js -->
  <script src="{{url('fronted/js/lib/jquery-ui.min.js')}}"></script>
  <!-- Vector Map js -->
  <script src="{{url('fronted/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
  <script src="{{url('fronted/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
  <!-- Popup js -->
  <script src="{{url('fronted/js/lib/magnifc-popup.min.js')}}"></script>
  <!-- Slick Slider js -->
  <script src="{{url('fronted/js/lib/slick.min.js')}}"></script>
  <!-- main js -->
  <script src="{{url('fronted/js/app.js')}}"></script>
  <script src="{{url('fronted/js/validation.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Ensure Iconify script is included -->
  <script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>

<script>
      // ================== Password Show Hide Js Start ==========
      function initializePasswordToggle(toggleSelector) {
        $(toggleSelector).on('click', function() {
            $(this).toggleClass("ri-eye-off-line");
            var input = $($(this).attr("data-toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    // Call the function
    initializePasswordToggle('.toggle-password');
  // ========================= Password Show Hide Js End ===========================
</script>
<script>
    let table = new DataTable('#dataTable');
  </script>



</body>
</html>

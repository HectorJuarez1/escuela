</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
    //Autoclose
    window.setTimeout(function() {
        $(".alert").fadeTo(2000, 0).slideDown(1000, function() {
            $(this).remove();
        });
    }, 1000); //1 segundos y desaparece
</script>
<script src="<?php echo constant('URL'); ?>public/assets/vendors/simple-datatables/simple-datatables.js"></script>

<script src="<?php echo constant('URL'); ?>public/assets/js/feather-icons/feather.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/assets/js/app.js"></script>

<script src="<?php echo constant('URL'); ?>public/assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/assets/js/pages/dashboard.js"></script>

<script src="<?php echo constant('URL'); ?>public/assets/js/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/assets/js/vendors.js"></script>


</body>

</html>
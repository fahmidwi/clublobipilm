<script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<script src="<?php echo base_url('lib/backend/js/vendor/jquery-2.2.4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- jquery latest version -->
<!-- bootstrap 4 js -->
<script src="<?php echo base_url('lib/backend/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/owl.carousel.min.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/metisMenu.min.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/jquery.slimscroll.min.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/jquery.slicknav.min.js') ?>"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script>
// zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
// ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="<?php echo base_url('lib/backend/js/line-chart.js') ?>"></script>
<!-- all pie chart -->
<script src="<?php echo base_url('lib/backend/js/pie-chart.js') ?>"></script>
<!-- others plugins -->
<script src="<?php echo base_url('lib/backend/js/plugins.js') ?>"></script>
<script src="<?php echo base_url('lib/backend/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>

setInterval(function(){
  myFunction();
},4000);

function myFunction() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

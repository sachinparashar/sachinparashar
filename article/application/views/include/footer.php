<!-- BEGIN FOOTER -->
	<div class="page-footer">
		<div class="page-footer-inner">
<div class="copyright">
   <?php echo date('Y'); ?> Birdie
</div>
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- END FOOTER -->
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="./assets/global/plugins/respond.min.js"></script>
<script src="./assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?=base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=base_url(); ?>assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!--<script src="<?=base_url(); ?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>

<script src="<?=base_url(); ?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>-->
<script src="<?=base_url(); ?>assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="<?=base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?=base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>

<script src="<?=base_url(); ?>assets/pages/scripts/charts-flotcharts.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/pages/scripts/charts-flotcharts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<script src="<?php echo base_url();?>assets/jquery.Jcrop.js"></script>
<script src="<?php echo base_url();?>assets/jquery.SimpleCropper.js"></script>
<script src="<?=base_url(); ?>assets/own.js" type="text/javascript"></script>
<script type="text/javascript">  var urlpath = "<?=base_url(); ?>"; </script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features
   Index.init();
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
});
$(document).ready(function (){
        	$('.page-sidebar-open').removeClass('page-sidebar-closed');
        	$('ul.page-sidebar-menu').removeClass('page-sidebar-menu-closed');
        });
</script>


<?php if(strstr($_SERVER['REQUEST_URI'],"admin")){ ?>
<script type="text/javascript">
    $('#example').DataTable();
</script>
<?php } ?>

<?php if(strstr($_SERVER['REQUEST_URI'],"viewStylist")){ 
        if(isset($stylist[0]['latitude']) && isset($stylist[0]['longitude'])){ ?>
          <script type="text/javascript">
          function myMap() {
            var mapCanvas = document.getElementById("map");
            var myCenter = new google.maps.LatLng(<?= $stylist[0]['latitude']?>, <?= ($stylist[0]['longitude'])?>); 
            var mapOptions = {center: myCenter, zoom: 12};
            var map = new google.maps.Map(mapCanvas,mapOptions);
           
            var center = new google.maps.Circle({
              position: myCenter,
              title: "<?php echo $stylist[0]['address']; ?> <br> ",
               strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: myCenter,
                radius: <?php echo $stylist[0]['service_radius']; ?>
              //animation: google.maps.Animation.BOUNCE
            });

          var marker = new google.maps.Marker({
            map: map,
            position: myCenter,
             title: "<?php echo $stylist[0]['address']; ?>"
          });
            
            //options = new google.maps.Circle(populationOptions);
            //marker.setMap(map);
            circle.bindTo('center', marker, 'position');
          }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCC3VnsaC5vRNIpcbe93fgHCdOZozM5rQ&callback=myMap"></script>
<?php } } ?>

<?php if(strstr($_SERVER['REQUEST_URI'],"viewAppointment")){ 
        if(isset($user_location[0]['latitude']) && isset($user_location[0]['longitude'])){ ?>
          <script type="text/javascript">
          function myMap() {
            var mapCanvas = document.getElementById("map1");
            var myCenter = new google.maps.LatLng(<?= $user_location[0]['latitude']?>, <?= ($user_location[0]['longitude'])?>); 
            var mapOptions = {center: myCenter, zoom: 17};
            var map = new google.maps.Map(mapCanvas,mapOptions);


            var marker = new google.maps.Marker({
              map: map,
              position: myCenter,
               title: "<?php echo $user_location[0]['address']; ?>"
            });
            
            //options = new google.maps.Circle(populationOptions);
            marker.setMap(map);
            //circle.bindTo('center', marker, 'position');
          }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCC3VnsaC5vRNIpcbe93fgHCdOZozM5rQ&callback=myMap"></script>
<?php } } ?>




<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
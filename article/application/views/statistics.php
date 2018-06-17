<!-- BEGIN CONTAINER -->
<div class="container">
	<div class="page-container">	
	<?php include("include/sidebar.php"); ?>	
		<!-- BEGIN CONTENT -->
		<div class="page-content-wrapper">
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								 Widget settings form goes here
							</div>
							<div class="modal-footer">
								<button type="button" class="btn blue">Save changes</button>
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title">
				Welcome back <?= $user_name; ?></h3>

				<!-- END PAGE HEADER-->
				<!-- BEGIN DASHBOARD STATS -->
				<div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue">
                            <div class="visual">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $articles; ?>"><?= $articles; ?></span>
                                </div>
                                <div class="desc"> Articles </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red">
                            <div class="visual">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $total_likes; ?>"><?= $total_likes; ?></span>
																	</div>
                                <div class="desc"> Likes</div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green">
                            <div class="visual">
                                <i class="fa fa-camera"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $total_dislikes; ?>"><?= $total_dislikes; ?></span>
                                </div>
                                <div class="desc"> Dislikes </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat purple">
                            <div class="visual">
                                <i class="fa fa-dollar"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="<?= $total_blocks; ?>"><?= $total_blocks; ?></span>
								</div>
                                <div class="desc"> Blocked Articles </div>
                            </div>

                        </div>
                    </div>
                </div>
				<!-- END DASHBOARD STATS -->

				<div class="row">
					<div class="col-md-12 col-sm-12">
	                    <!-- BEGIN PORTLET-->
	                    <div class="portlet light ">
	                        <div class="portlet-title">
	                            <div class="caption">
	                                <i class="icon-share font-red-sunglo hide"></i>
	                                <span class="caption-subject font-red-sunglo bold uppercase">Articles</span>
	                                <span class="caption-helper">monthly stats...</span>
	                            </div>

	                        </div>
	                        <div class="portlet-body">
	                            <div id="site_activities_loading">
	                               <div id="area-example"></div>
		                            <div id="site_activities_content" class="display-none">
		                                <div id="site_activities" style="height: 228px;"> </div>
		                            </div>

	                        	</div>
	                    	</div>
	                    <!-- END PORTLET-->
	               	 	</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
<?php include("include/footer.php"); ?>
	<script type="text/javascript">
	 var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        Morris.Area({
          element: 'area-example',
          data: [
          	<?php  if(!empty($articleChart)){ ?>
            <?php foreach($articleChart as $list){ 
            ?>
            { m: "<?php echo $list['year'].'-'.$list['month']?>", a: "<?php echo $list['total_article'];?>" },
            <?php }} ?>
          ],
          xkey: 'm',
		  ykeys: 'a',
		  labels: 'Series A',
		  xLabelFormat: function (x) { return months[x.getMonth()]; }
        });
        
	</script>

	

	

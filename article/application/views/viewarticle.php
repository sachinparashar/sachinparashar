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
				<div class="pull-right">
					<a class="btn back" style="background-color: #45B6AF;color:#ffffff;">Back</a>
				</div>
				<!-- BEGIN PAGE HEADER-->
				<h3 class="page-title" style="margin-bottom:0px;">Preference: <?=ucfirst($article['cat_name']); ?><h4 style="float:left;margin-left:10px; line-height:25px;" class="text-muted"><Br>Added On - <?= date("M j, Y", strtotime($article['added_on'])) ?></h4></h3>
						<!-- END PAGE HEADER-->
						<!-- BEGIN DASHBOARD STATS -->
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light ">

									<div class="portlet-body">
										<div class="row">

											<div class="margin-bottom-10 visible-sm">
											</div>

											<div class="col-md-12 ">
												<div class="clearfix"></div> <br>
													<h3 class="bold"><?= $article['name'];?></h3>
												<div class="col-md-12">
													<div><?php if(isset($article['image'])){?><img style="width: 900px;height: 200px;" src="<?= base_url()."assets/images/articleimage/".$article['image'] ?>" > <?php } ?></div>
													<div class="col-md-4 ">
														<?php if($status == 1){ ?>
															<button type="button" class="btn btn-md blue uppercase ">Liked</button>
														<?php }else{ ?>
														<button type="button" class="btn btn-md green uppercase like_btn" data-id="<?= $article['id']; ?>">Like</button>
														<?php } ?>
													</div>
													<div class="col-md-4 ">
														<?php if($status == 2){ ?>
															<button type="button" class="btn btn-md blue uppercase">Disliked</button>
														<?php }else{ ?>
															<button type="button" class="btn btn-md green uppercase dislike_btn" data-id="<?= $article['id']; ?>">Dislike</button>
														<?php } ?>
													</div>
													<div class="col-md-4 ">
														<button type="button" class="btn btn-md green uppercase block_btn" data-id="<?= $article['id']; ?>">Block</button>
													</div>
													<div>
														<h4 class="bold">Sumery</h4>
														<?= $article['summery'];?>
													</div>
													<div>
														<h4 class="bold">Detail</h4>
														<?= $article['detail'];?>
													</div>
												</div>
												
												<div class="clearfix"></div> <br>
											</div>
															
											<div class="margin-bottom-10 visible-sm"></div>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix">
					</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	
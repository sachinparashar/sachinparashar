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
				<h3 class="page-title" style="margin-bottom:0px;">&nbsp;&nbsp;Edit Article&nbsp;&nbsp;</h3>
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
											<h4 class="bold">Article Details</h4>
										<div class="col-md-12">
											<form method="post" action="<?= base_url()?>user/saveArticle/<?= $article['id']?>" enctype="multipart/form-data">
											<table class="table table-bordered table-advance table-striped table-condensed flip-content">
												<tbody>
												<tr>
													<td width="30%">
														Article Name
													</td>
													<td>
														<textarea rows="4" cols="50" name="article_name"><?= $article['name']; ?></textarea>
													</td>
												</tr>
												<tr>
													<td width="30%">
														Feature Image
													</td>
													<td>
														<img src="<?= base_url()."assets/images/articleimage/".$article['image'] ?>" >
														<div class="row">
															<div class="col-sm-12 col-xs-12">
																<div class="image-box-select form_with_image">
																	<div class="span4 cropme"  id="landscape" style="width: 100px; height: 100px; margin: 0px;"></div>
																</div>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														 Article Summery
													</td>
													<td>
														<textarea rows="4" cols="50" name="article_summery"><?= $article['summery']; ?></textarea>
													</td>
												</tr>
												<tr>
													<td>
														 Article Details
													</td>
													<td>
														<textarea rows="4" cols="50" name="article_details"><?= $article['detail']; ?></textarea>
														
													</td>
												</tr>

												<tr>
													<td colspan="2" align="center">
														 <input type="submit" name="save">
													</td>
												</tr>
												</tbody>
											</table>
										</form>
										</div>
										
										<div class="clearfix"></div> <br>
									</div>
													
									<div class="margin-bottom-10 visible-sm"></div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->
	
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
					<a class="btn update_profile" style="background-color: #45B6AF;color:#ffffff;">Update</a>
					<a class="btn cancel_update_profile" style=" display:none; background-color: #45B6AF;color:#ffffff;">Cancel</a>
					<a class="btn back" style="background-color: #45B6AF;color:#ffffff;">Back</a>
					<input type="hidden" id="user_id" value="<?= $user['id']?>">
				</div>
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light ">

									<div class="portlet-body">
										<div class="row">

											<div class="margin-bottom-10 visible-sm">
											</div>

											<div class="col-md-12 ">
												<div class="clearfix"></div> <br>
													<h4 class="bold">Personal Details</h4>
												<div class="col-md-12">
													<table class="table table-bordered table-advance table-striped table-condensed flip-content">
														<tbody>
														<tr>
															<td width="30%">
																Name
															</td>
															<td>
																<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="name" id="name1" value="<?= $user['name']; ?>" placeholder="Name" disabled="disabled"/>
															</td>
														</tr>
														<tr>
															<td width="30%">
																Email
															</td>
															<td>
																<input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" name="email" id="email1" value="<?= $user['email']; ?>" placeholder="Email" disabled="disabled"/>
															</td>
														</tr>
														<tr>
															<td>
																 Phone
															</td>
															<td>
																 <input class="form-control form-control-solid placeholder-no-fix" type="number" autocomplete="off" name="phone" id="phone1" value="<?= $user['phone']; ?>" placeholder="Phone" disabled="disabled"/>
															</td>
														</tr>
														<tr>
															<td>
																 Gender
															</td>
															<td>
																 <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="gender" id="gender1" value="<?= $user['gender']; ?>" placeholder="Gender" disabled="disabled"/>
															</td>
														</tr>
														<tr>
															<td>
																 Date of Birth
															</td>
															<td>
																 <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off" name="dob" id="dob1" value="<?= $user['dob']; ?>" placeholder="Date of Birth" disabled="disabled"/>
															</td>
														</tr>
														<tr>
															<td>
																 Password
															</td>
															<td>
																 <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" name="password" id="password1" value="<?= $user['password']; ?>" placeholder="Password" disabled="disabled"/>
															</td>
														</tr>

														<tr>
															<td>
																 Preferences
															</td>
															<td>
																 <?php if(!empty($category)){																 
																	foreach($category as $cat){ ?>
																		<label class="rememberme check"><input type="checkbox" <?php if($cat['checked'] == 'true'){ ?> checked="checked" <?php } ?> class="preferences1" name="<?= $cat['cat_name']?>" value="<?= $cat['id']?>" disabled="disabled"/><?= $cat['cat_name']?> </label>
																	<?php } } ?>
															</td>
														</tr>

														</tbody>
													</table>													
														<button type="button" class="btn btn-md green uppercase confirm_update_btn" style="display:none;">Update</button>
														<button type="button" class="btn btn-md blue uppercase cancel_update_profile" style="display:none;">cancel</button>
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
	
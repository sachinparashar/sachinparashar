<style type="text/css">
#example_filter label{
	float: right;
}
</style>
<!-- BEGIN CONTAINER -->
<div class="container">
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
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
				<!-- BEGIN PAGE HEADER-->
				<div class="pull-right">
					<a class="btn green" href="<?= base_url()?>user/addArticle/">&nbsp;Add Article</a>
				</div>
				<h3 class="page-title">Articles</h3>


				<div class="row">
<div class="col-md-12">
 <div class="portlet box ">


	<div class="portlet-body">

		<table class="table table-bordered table-advance table-striped table-condensed flip-content article_table" id="example">
			<thead class="flip-content">
			<tr>
				<th width="5%">
				  ID
				</th>
				<th>
					Article Name
				</th>
				<th>
					Article Summery
				</th>
				<th>
					Added Date
				</th>
				<th width="15%">
					Action
				</th>
			</tr>
			</thead>
			<tbody>
				<?php $i=0;
				if(!empty($articles)){
						foreach ($articles as $article) {
							$i++;
							?>
							<tr data-id="<?= $article['id']; ?>">
								<td>
									<?= $i; ?>
								</td>
								<td>
									 <?= $article['name']; ?>
								</td>
								<td>
									 <?= $article['summery']; ?>
								</td>
								<td>
									 <?php if(isset($article['added_on'])){ echo date("M j, Y h:i a", strtotime($article['added_on'])); }  ?>
								</td>
								<td>									
									<a href="<?= base_url()?>user/viewMyArticle/<?= $article['id']; ?>" class="btn btn-sm yellow"> <i class="fa fa-search"></i></a>
									<a href="<?= base_url()?>user/editArticle/<?= $article['id']; ?>" class="btn btn-sm yellow"> <i class="fa fa-pencil"></i></a>
									<a href="javascript:void(0)" class="btn btn-sm red delete_article" data-id="<?= $article['id']; ?>"> <i class="fa fa-trash"></i></a><br><br>
									
								</td>
							</tr>
						<?php }
						}
					?>
			</tbody>
			</table>
	</div> </div>
</div>

</div>
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END CONTAINER -->

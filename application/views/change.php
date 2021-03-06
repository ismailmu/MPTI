<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>MPTI - <?php echo $title; ?></title>

		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Page-Level Plugin CSS - Blank -->

		<!-- SB Admin CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

		<link href="<?php echo base_url(); ?>assets/css/plugins/validate/css/screen.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/plugins/validate/css/screen.css" rel="stylesheet">
	</head>

	<body>

		<div id="wrapper">
			<?php $this->view('header'); ?>
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="side-menu">
						<?php $this->view('menu'); ?>
					</ul>
					<!-- /#side-menu -->
				</div>
				<!-- /.sidebar-collapse -->
			</nav>
			<!-- /.navbar-static-side -->
			<?php
				$valCode=$dataFrom['user_code'];
			?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"><?php echo $title; ?></h1>
						<div class="row">
							<div class="col-lg-12">
								<?php
										if (isset($alert)) {
											echo $alert;
										}
									?>
								<div class="panel panel-default">
									<form role="form" id="change" name="change" method="post" action="<?php echo base_url(); ?>index.php/home/changePass">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<tr>
														<td>NIK</td>
														<td>
														<input type="text" maxlength="20" disabled="disabled" id="txtName" name="txtName" size="30" value="<?php echo $valCode; ?>" />
														</td>
													</tr>
													</tr>
													<tr>
														<td>Old passowrd <span class="valid">*</span></td>
														<td>
														<input type="password" id="txtOldPass" name="txtOldPass" />
														</td>
													</tr>
													<tr>
														<td>New passowrd <span class="valid">*</span></td>
														<td>
														<input type="password" id="txtNewPass" name="txtNewPass" />
														</td>
													</tr>
													<tr>
														<td>Confirm passowrd <span class="valid">*</span></td>
														<td>
														<input type="password" id="txtConPass" name="txtConPass" />
														</td>
													</tr>
												</tbody>
											</table>
											<p class="valid">* : Mandatory</p>
											<input type="submit" value="Save" class="btn btn-primary btn-sm" />
											<input type="reset" id="reset" value="Reset" class="btn btn-primary btn-sm" />
											<input type="button" id="back" value="Back" class="btn btn-primary btn-sm" />

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- Core Scripts - Include with every page -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

		<!-- Page-Level Plugin Scripts - Blank -->

		<!-- SB Admin Scripts - Include with every page -->
		<script src="<?php echo base_url(); ?>/assets/js/sb-admin.js"></script>

		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$("#reset").click(function() {
					$("#change").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/home'
				});
			});
			$("#change").validate({
				rules : {
					txtCode : "required",
					txtOldPass : "required",
					txtNewPass : "required",
					txtConPass : {
						required : true,
				    	equalTo: "#txtNewPass"
				   }
				}
			});
		</script>
	</body>
</html>
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
	</head>

	<body>

		<div id="wrapper">
			<?php $this -> load -> view('header'); ?>
			<nav class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="side-menu">
						<?php $this -> load -> view('menu'); ?>
					</ul>
					<!-- /#side-menu -->
				</div>
				<!-- /.sidebar-collapse -->
			</nav>
			<!-- /.navbar-static-side -->
			<?php
				$valCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['group_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['group_code'];
					}else {
						$valCode=$id[0]->group_code;	
					}
				}
				
				$valName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valName=$dataFrom['group_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valName=$dataFrom['group_name'];
					}else {
						$valName=$id[0]->group_name;	
					}
				}
				
				$user="checked='checked' value='1'";
				if ($flag=="Edit") {
					if (isset($dataFrom)) {
						$user=(($dataFrom['is_user']) == 1)?"checked='checked' value='1'":"value='0'";
					}else {
						$user=(($id[0]->is_user) == 1)?"checked='checked' value='1'":"value='0'";
					}
				}
				
				$checked="checked='checked' value='1'";
				if ($flag=="Edit") {
					if (isset($dataFrom)) {
						$checked=(($dataFrom['is_active']) == 1)?"checked='checked' value='1'":"value='0'";
					}else {
						$checked=(($id[0]->is_active) == 1)?"checked='checked' value='1'":"value='0'";
					}
				}
				/*
				if (isset($dataFrom)) {
					$checked=(($dataFrom['is_active']) == 1)?"checked='checked' value='1'":"value='0'";
				}*/
			?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"><?php echo $flag. " " .$title. " "; echo ($flag=="Add")?"":"#".$valCode; ?></h1>
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<form role="form" id="group_ae" name="group_ae" method="post" action="<?php echo base_url(); ?>index.php/group/<?php echo strtolower($flag); ?>Process">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<input type="hidden" name="txtCode" value="<?php echo $valCode; ?>" />
													<tr>
														<td>Group Name <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtName" name="txtName" size="55" value="<?php echo $valName; ?>" />
														</td>
													</tr>
													<tr>
														<td>User</td>
														<td>
														<input type="checkbox" id="chkUser" name="chkUser" <?php echo $user; ?> />
														</td>
													</tr>
													<tr>
														<td>Active</td>
														<td>
														<input type="checkbox" id="chkActive" name="chkActive" <?php echo $checked; ?> />
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
					$("#group_ae").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/group'
				})
				$("#chkActive").click(function() {
					if ($('#chkActive').is(':checked')) {
						$("#chkActive").val('1');
					}else {
						$("#chkActive").val('0');
					}
					
				});
				$("#chkUser").click(function() {
					if ($('#chkUser').is(':checked')) {
						$("#chkUser").val('1');
					}else {
						$("#chkUser").val('0');
					}
					
				});
			});
			$("#group_ae").validate({
				rules : {
					txtName : "required"
				}
			});
		</script>
	</body>
</html>
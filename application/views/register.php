<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>MPTI - <?php echo $title; ?></title>

		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Page-Level Plugin CSS - Tables -->
    	<link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

		<!-- SB Admin CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/plugins/validate/css/screen.css" rel="stylesheet">
	</head>

	<body>

		<div id="wrapper">
			<!-- /.navbar-static-side -->
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
									<form role="form" id="register" name="register" method="post" action="<?php echo base_url(); ?>index.php/register/add">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<tr>
														<td>NIK <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="20" id="txtCode" name="txtCode" size="30"/>
														</td>
													</tr>
													<tr>
														<td>User Name <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtName" name="txtName" size="55"/>
														</td>
													</tr>
													<tr>
														<td>Branch <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtBranchName" name="txtBranchName" disabled="disabled" size="55" />
														<input type="hidden" id="txtBranchCode" name="txtBranchCode" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlBranch">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>Email <span class="valid">*</span></td>
														<td><input type="text" maxlength="45" id="txtEmail" name="txtEmail" size="55" /></td>
													</tr>
													<tr>
														<td>No Ext</td>
														<td><input type="text" maxlength="7" id="txtNoExt" name="txtNoExt" size="17" /></td>
													</tr>
													<tr>
														<td>No HP</td>
														<td><input type="text" maxlength="20" id="txtNoHp" name="txtNoHp" size="30" /></td>
													</tr>
													<tr>
														<td>Departement <span class="valid">*</span></td>
														<td><input type="text" maxlength="45" id="txtDepartement" name="txtDepartement" size="55" /></td>
													</tr>
													<tr>
														<td>Password <span class="valid">*</span></td>
														<td><input type="password" maxlength="45" id="txtPass" name="txtPass" size="55" /></td>
													</tr>
													<tr>
														<td>Confirm Password <span class="valid">*</span></td>
														<td><input type="password" maxlength="45" id="txtConPass" name="txtConPass" size="55" /></td>
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
		
		<!-- Modal Branch -->
		<div class="modal fade" id="mdlBranch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Branch</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblBranch">
							<thead>
								<tr>
									<th>Branch Code</th>
									<th>Branch Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($grid as $key => $value) {
										if ($value->is_active == 1) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseBranch('$value->branch_code','$value->branch_name')\">$value->branch_code</td>";
										echo "<td>$value->branch_name</td>";
										echo "</tr>";
										}
									}
								?>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
		
		<script>
			$(document).ready(function() {
				$('#tbl').dataTable();
				$('#tblBranch').dataTable({"lengthChange": false});
				$("#reset").click(function() {
					$("#register").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/home'
				})	
			});
			
			$("#register").validate({
				rules : {
					txtCode : {
						required: true,
						number : true
					},
					txtName : "required",
					txtBranchCode : "required",
					txtDepartement : "required",
					txtEmail : {
						required : true,
						email : true
					},
					txtNoExt : {
						number : true
					},
					txtNoHp : {
						number : true
					},
					txtPass : "required",
					txtConPass : {
						required : true,
				    	equalTo: "#txtPass"
				   }
				}
			});
			
			function chooseBranch(id,nama) {
				$('#txtBranchCode').val(id);
				$('#txtBranchName').val(nama);
				$('#mdlBranch').modal('hide');
			};
		</script>
	</body>
</html>
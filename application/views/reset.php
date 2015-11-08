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
									<form role="form" id="reset" name="reset" method="post" action="<?php echo base_url(); ?>index.php/reset/resetPass">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<tr>
														<td>NIK <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" disabled="disabled" id="txtName" name="txtName" size="55" />
														<input type="hidden" id="txtCode" name="txtCode" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlUser">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>New passowrd <span class="valid">*</span></td>
														<td>
														<input type="password" id="txtNewPass" name="txtNewPass" value="123" />
														</td>
													</tr>
													<tr>
														<td>Confirm passowrd <span class="valid">*</span></td>
														<td>
														<input type="password" id="txtConPass" name="txtConPass" value="123" />
														</td>
													</tr>
												</tbody>
											</table>
											<p class="valid">* : Mandatory</p>
											<p>default password : 123</p>
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

		<!-- Modal User -->
		<div class="modal fade" id="mdlUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Branch</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tbl">
							<thead>
								<tr>
									<th>NIK</th>
									<th>User Name</th>
									<th>Branch</th>
									<th>Departement</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($grid as $key => $value) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseUser('$value->user_code','$value->user_name')\">$value->user_code</td>";
										echo "<td>$value->user_name</td>";
										echo "<td>$value->branch_name</td>";
										echo "<td>$value->departement</td>";
										echo "</tr>";
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
				$('#tbl').dataTable({"lengthChange": false});
				
				$("#reset").click(function() {
					$("#reset").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/home'
				});
			});
			
			function chooseUser(id,nama) {
				$('#txtCode').val(id);
				$('#txtName').val(nama);
				$('#mdlUser').modal('hide');
			};
			
			$("#reset").validate({
				rules : {
					txtCode : "required",
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
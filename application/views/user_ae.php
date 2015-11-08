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
				$valCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['user_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['user_code'];
					}else {
						$valCode=$id[0]->user_code;	
					}
				}
				
				$valName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valName=$dataFrom['user_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valName=$dataFrom['user_name'];
					}else {
						$valName=$id[0]->user_name;	
					}
				}
				
				$valBranchCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valBranchCode=$dataFrom['branch_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valBranchCode=$dataFrom['branch_code'];
					}else {
						$valBranchCode=$id[0]->branch_code;	
					}
				}
				
				$valBranchName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valBranchName=$dataFrom['branch_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valBranchName=$dataFrom['branch_name'];
					}else {
						$valBranchName=$id[0]->branch_name;	
					}
				}
				
				$valGroupCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valGroupCode=$dataFrom['group_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valGroupCode=$dataFrom['group_code'];
					}else {
						$valGroupCode=$id[0]->group_code;	
					}
				}
				
				$valGroupName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valGroupName=$dataFrom['group_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valGroupName=$dataFrom['group_name'];
					}else {
						$valGroupName=$id[0]->group_name;	
					}
				}
				
				$valNoExt="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valNoExt=$dataFrom['no_ext'];
					}
				}else {
					if (isset($dataFrom)) {
						$valNoExt=$dataFrom['no_ext'];
					}else {
						$valNoExt=$id[0]->no_ext;	
					}
				}
				
				$valNoHp="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valNoHp=$dataFrom['no_hp'];
					}
				}else {
					if (isset($dataFrom)) {
						$valNoHp=$dataFrom['no_hp'];
					}else {
						$valNoHp=$id[0]->no_hp;	
					}
				}
				
				$valDepartement="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valDepartement=$dataFrom['departement'];
					}
				}else {
					if (isset($dataFrom)) {
						$valDepartement=$dataFrom['departement'];
					}else {
						$valDepartement=$id[0]->departement;	
					}
				}
				
				$valEmail="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valEmail=$dataFrom['email'];
					}
				}else {
					if (isset($dataFrom)) {
						$valEmail=$dataFrom['email'];
					}else {
						$valEmail=$id[0]->email;	
					}
				}
				
				$valPass="";
				if ($flag=="Edit") {
					if (isset($dataFrom)) {
						$valPass=$dataFrom['password'];
					}else {
						$valPass=$id[0]->password;	
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
									<form role="form" id="user_ae" name="user_ae" method="post" action="<?php echo base_url(); ?>index.php/user/<?php echo strtolower($flag); ?>Process">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<input type="hidden" id="txtFlag" name="txtFlag" value="<?php echo $flag; ?>" />
													<input type="hidden" id="hidCode" name="hidCode" value="<?php echo $valCode; ?>" />
													<!--<input type="hidden" name="txtCode" value="<?php echo $valCode; ?>" />-->
													<?php if ($flag=="Add") { ?>
													<tr>
														<td>NIK <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="20" id="txtCode" name="txtCode" size="30" value="<?php echo $valCode; ?>" />
														</td>
													</tr>
													<?php } ?>
													<tr>
														<td>User Name <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtName" name="txtName" size="55" value="<?php echo $valName; ?>" />
														</td>
													</tr>
													<tr>
														<td>Group <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtGroupName" name="txtGroupName" disabled="disabled" size="55" value="<?php echo $valGroupName; ?>" />
														<input type="hidden" id="txtGroupCode" name="txtGroupCode" value="<?php echo $valGroupCode; ?>" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlGroup">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>Branch <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtBranchName" name="txtBranchName" disabled="disabled" size="55" value="<?php echo $valBranchName; ?>" />
														<input type="hidden" id="txtBranchCode" name="txtBranchCode" value="<?php echo $valBranchCode; ?>" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlBranch">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>Email <span class="valid">*</span></td>
														<td><input type="text" maxlength="45" id="txtEmail" name="txtEmail" size="55" value="<?php echo $valEmail; ?>" /></td>
													</tr>
													<tr>
														<td>No Ext</td>
														<td><input type="text" maxlength="7" id="txtNoExt" name="txtNoExt" size="17" value="<?php echo $valNoExt; ?>" /></td>
													</tr>
													<tr>
														<td>No HP</td>
														<td><input type="text" maxlength="20" id="txtNoHp" name="txtNoHp" size="30" value="<?php echo $valNoHp; ?>" /></td>
													</tr>
													<tr>
														<td>Departement <span class="valid">*</span></td>
														<td><input type="text" maxlength="45" id="txtDepartement" name="txtDepartement" size="55" value="<?php echo $valDepartement; ?>" /></td>
													</tr>
													<?php if ($flag=="Add") { ?>
													<tr>
														<td>Password <span class="valid">*</span></td>
														<td><input type="password" maxlength="45" id="txtPass" name="txtPass" size="55" value="<?php echo $valPass; ?>" /></td>
													</tr>
													<tr>
														<td>Confirm Password <span class="valid">*</span></td>
														<td><input type="password" maxlength="45" id="txtConPass" name="txtConPass" size="55" value="<?php echo $valPass; ?>" /></td>
													</tr>
													<?php } ?>
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
		
		<!-- Modal Group -->
		<div class="modal fade" id="mdlGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Group</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblGroup">
							<thead>
								<tr>
									<th>Group Code</th>
									<th>Group Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($gridGroup as $key => $value) {
										if ($value->is_active == 1) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseGroup('$value->group_code','$value->group_name')\">$value->group_code</td>";
										echo "<td>$value->group_name</td>";
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
		
		<!-- Modal Type -->
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
									foreach ($gridBranch as $key => $value) {
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
				$('#tblGroup').dataTable({"lengthChange": false});
				$('#tblBranch').dataTable({"lengthChange": false});
				$("#reset").click(function() {
					$("#user_ae").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/user'
				})
				$("#chkActive").click(function() {
					if ($('#chkActive').is(':checked')) {
						$("#chkActive").val('1');
					}else {
						$("#chkActive").val('0');
					}
					
				});
			});
			
			var url="index.php/user/getAlreadyCode?code=" + $("#txtCode").val();
			$("#user_ae").validate({
				rules : {
					txtCode : {
						required : true,
						number : true
					},
					txtName : "required",
					txtGroupCode : "required",
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
					txtPass : {
						required : function(element) {
				    		return ($("#txtFlag").val() == "Add");
				    	}
				   },
					txtConPass : {
						required : function(element) {
							return ($("#txtFlag").val() == "Add");
				    	},
				    	equalTo: "#txtPass"
				   }
				}
			});
			
			function chooseGroup(id,nama) {
				$('#txtGroupCode').val(id);
				$('#txtGroupName').val(nama);
				$('#mdlGroup').modal('hide');
			};
			
			function chooseBranch(id,nama) {
				$('#txtBranchCode').val(id);
				$('#txtBranchName').val(nama);
				$('#mdlBranch').modal('hide');
			};
		</script>
	</body>
</html>
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
						$valCode=$dataFrom['hardware_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['hardware_code'];
					}else {
						$valCode=$id[0]->hardware_code;	
					}
				}
				
				$valName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valName=$dataFrom['hardware_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valName=$dataFrom['hardware_name'];
					}else {
						$valName=$id[0]->hardware_name;	
					}
				}
				
				$valTypeCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valTypeCode=$dataFrom['type_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valTypeCode=$dataFrom['type_code'];
					}else {
						$valTypeCode=$id[0]->type_code;	
					}
				}
				
				$valTypeName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valTypeName=$dataFrom['type_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valTypeName=$dataFrom['type_name'];
					}else {
						$valTypeName=$id[0]->type_name;	
					}
				}
				
				$valMerkCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valMerkCode=$dataFrom['merk_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valMerkCode=$dataFrom['merk_code'];
					}else {
						$valMerkCode=$id[0]->merk_code;	
					}
				}
				
				$valMerkName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valMerkName=$dataFrom['merk_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valMerkName=$dataFrom['merk_name'];
					}else {
						$valMerkName=$id[0]->merk_name;	
					}
				}
				
				$valStatus="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valStatus=$dataFrom['status'];
					}
				}else {
					if (isset($dataFrom)) {
						$valStatus=$dataFrom['status'];
					}else {
						$valStatus=$id[0]->status;	
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
									<form role="form" id="hardware_ae" name="hardware_ae" method="post" action="<?php echo base_url(); ?>index.php/hardware/<?php echo strtolower($flag); ?>Process">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<input type="hidden" name="txtCode" value="<?php echo $valCode; ?>" />
													<tr>
														<td>Hardware Name <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtName" name="txtName" size="55" value="<?php echo $valName; ?>" />
														</td>
													</tr>
													<tr>
														<td>Type <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtTypeName" name="txtTypeName" disabled="disabled" size="55" value="<?php echo $valTypeName; ?>" />
														<input type="hidden" id="txtTypeCode" name="txtTypeCode" value="<?php echo $valTypeCode; ?>" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlType">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>Merk <span class="valid">*</span></td>
														<td>
														<input type="text" maxlength="45" id="txtMerkName" name="txtMerkName" disabled="disabled" size="55" value="<?php echo $valMerkName; ?>" />
														<input type="hidden" id="txtMerkCode" name="txtMerkCode" value="<?php echo $valMerkCode; ?>" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlMerk">
															...
														</button>
														</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>
														<select id="txtStatus" name="txtStatus">
															<option <?php echo ($valStatus=="IN")?' selected="selected" ':''; ?> value="IN">IN</option>
															<option <?php echo ($valStatus=="OUT")?' selected="selected" ':''; ?> value="OUT">OUT</option>
														</select>
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
		
		<!-- Modal Type -->
		<div class="modal fade" id="mdlType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Type</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblType">
							<thead>
								<tr>
									<th>Type Code</th>
									<th>Type Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($gridType as $key => $value) {
										if ($value->is_active == 1) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseType('$value->type_code','$value->type_name')\">$value->type_code</td>";
										echo "<td>$value->type_name</td>";
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
		<div class="modal fade" id="mdlMerk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Merk</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblMerk">
							<thead>
								<tr>
									<th>Merk Code</th>
									<th>Merk Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($gridMerk as $key => $value) {
										if ($value->is_active == 1) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseMerk('$value->merk_code','$value->merk_name')\">$value->merk_code</td>";
										echo "<td>$value->merk_name</td>";
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
				$('#tblType').dataTable({"lengthChange": false});
				$('#tblMerk').dataTable({"lengthChange": false});
				$("#reset").click(function() {
					$("#hardware_ae").validate().resetForm();
				});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/hardware'
				})
				$("#chkActive").click(function() {
					if ($('#chkActive').is(':checked')) {
						$("#chkActive").val('1');
					}else {
						$("#chkActive").val('0');
					}
					
				});
			});
			
			$("#hardware_ae").validate({
				rules : {
					txtName : "required",
					txtTypeCode : "required",
					txtMerkCode : "required"
				}
			});
			
			function chooseType(id,nama) {
				$('#txtTypeCode').val(id);
				$('#txtTypeName').val(nama);
				$('#mdlType').modal('hide');
			};
			
			function chooseMerk(id,nama) {
				$('#txtMerkCode').val(id);
				$('#txtMerkName').val(nama);
				$('#mdlMerk').modal('hide');
			};
		</script>
	</body>
</html>
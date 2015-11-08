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
			<?php
				$valCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['ticket_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valCode=$dataFrom['ticket_code'];
					}else {
						$valCode=$id[0]->ticket_code;	
					}
				}
				
				$valName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valName=$dataFrom['ticket_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valName=$dataFrom['ticket_name'];
					}else {
						$valName=$id[0]->ticket_name;	
					}
				}
				
				$valHardwareCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valHardwareCode=$dataFrom['hardware_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valHardwareCode=$dataFrom['hardware_code'];
					}else {
						$valHardwareCode=$id[0]->hardware_code;	
					}
				}
				
				$valHardwareName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valHardwareName=$dataFrom['hardware_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valHardwareName=$dataFrom['hardware_name'];
					}else {
						$valHardwareName=$id[0]->hardware_name;	
					}
				}
				
				$valProblemType="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valProblemType=$dataFrom['problem_type'];
					}
				}else {
					if (isset($dataFrom)) {
						$valProblemType=$dataFrom['problem_type'];
					}else {
						$valProblemType=$id[0]->problem_type;	
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
				
				$valDateOpen="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valDateOpen=$dataFrom['date_open'];
					}
				}else {
					if (isset($dataFrom)) {
						$valDateOpen=$dataFrom['date_open'];
					}else {
						$valDateOpen=$id[0]->date_open;	
					}
				}
				
				$valDateClosed="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valDateClosed=$dataFrom['date_closed'];
					}
				}else {
					if (isset($dataFrom)) {
						$valDateClosed=$dataFrom['date_closed'];
					}else {
						$valDateClosed=$id[0]->date_closed;	
					}
				}
				
				$valUsername="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valUsername=$dataFrom['user_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valUsername=$dataFrom['user_name'];
					}else {
						$valUsername=$id[0]->user_name;	
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

				$valExtNo="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valExtNo=$dataFrom['no_ext'];
					}
				}else {
					if (isset($dataFrom)) {
						$valExtNo=$dataFrom['no_ext'];
					}else {
						$valExtNo=$id[0]->no_ext;	
					}
				}
				
				$valHpNo="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valHpNo=$dataFrom['no_hp'];
					}
				}else {
					if (isset($dataFrom)) {
						$valHpNo=$dataFrom['no_hp'];
					}else {
						$valHpNo=$id[0]->no_hp;	
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
				
				$valSN="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valSN=$dataFrom['sn'];
					}
				}else {
					if (isset($dataFrom)) {
						$valSN=$dataFrom['sn'];
					}else {
						$valSN=$id[0]->sn;	
					}
				}
				
				$valStatusCode="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valStatusCode=$dataFrom['status_code'];
					}
				}else {
					if (isset($dataFrom)) {
						$valStatusCode=$dataFrom['status_code'];
					}else {
						$valStatusCode=$id[0]->status_code;	
					}
				}
				
				$valStatusName="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valStatusName=$dataFrom['status_name'];
					}
				}else {
					if (isset($dataFrom)) {
						$valStatusName=$dataFrom['status_name'];
					}else {
						$valStatusName=$id[0]->status_name;	
					}
				}
				
				$valDesc="";
				if ($flag=="Add") {
					if (isset($dataFrom)) {
						$valDesc=$dataFrom['desc_status'];
					}
				}else {
					if (isset($dataFrom)) {
						$valDesc=$dataFrom['desc_status'];
					}else {
						$valDesc=$id[0]->desc_status;	
					}
				}
				
				$disabled=($isAllowTicket < 1)?" disabled='disabled' ":"";
				$color=($isAllowTicket < 1)? " style='background-color:rgb(235, 235, 228)' ":"";
			?>
			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header"><?php echo $flag. " " .$title. " "; echo ($flag=="Add")?"":"#".$valCode; ?></h1>
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-default">
									<form role="form" id="ticket_ae" name="ticket_ae" method="post" action="<?php echo base_url(); ?>index.php/ticket/<?php echo strtolower($flag); ?>Process">
										<div class="panel-heading">
											<table class="table table-striped">
												<thead></thead>
												<tbody>
													<input type="hidden" name="txtCode" value="<?php echo $valCode; ?>" />
													<tr>
														<td>Ticket Name <span class="valid">*</span></td>
														<td>
														<input type="text" <?php echo $disabled; ?> maxlength="45" id="txtName" name="txtName" size="55" value="<?php echo $valName; ?>" />
														</td>
													</tr>
													<tr>
														<td>Problem Type <span class="valid">*</span></td>
														<td>
															<select <?php echo $disabled.$color; ?> id="cboProblemType"  name="cboProblemType" onchange="changeType()">
																<option value="">--Select Problem Type--</option>
																<option <?php echo ($valProblemType=="Hardware")?" selected=\"selected\" ":""; ?> value="Hardware">Hardware</option>
																<option <?php echo ($valProblemType=="Software")?" selected=\"selected\" ":""; ?> value="Software">Software</option>
															</select>
														</td>
													</tr>
													<tr id="trType">
														<td>Hardware Type <span class="valid">*</span></td>
														<td>
														<input type="text" <?php echo $disabled; ?> maxlength="45" id="txtTypeName" name="txtTypeName" size="55" value="<?php echo $valTypeName; ?>" />
														<input type="hidden" id="txtTypeCode" name="txtTypeCode" value="<?php echo $valTypeCode; ?>" />
														<?php if($isAllowTicket >= 1) { ?>
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlType">
															...
														</button>
														<?php } ?>
														</td>
													</tr>
													<tr id="trSn">
														<td>Assets / SN <span class="valid">*</span></td>
														<td>
														<input type="text" <?php echo $disabled; ?> maxlength="45" id="txtSN" name="txtSN" size="55" value="<?php echo $valSN; ?>" />
														</td>
													</tr>
													<?php if($isAllowTicket < 1) { ?>
													<tr>
														<td>User Created</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtUserCreated" name="txtUserCreated" size="55" value="<?php echo $valUsername; ?>" />
														</td>
													</tr>
													<tr>
														<td>Ext No</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtExtNo" name="txtExtNo" size="55" value="<?php echo $valExtNo; ?>" />
														</td>
													</tr>
													<tr>
														<td>HP No</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtHpNo" name="txtHpNo" size="55" value="<?php echo $valHpNo; ?>" />
														</td>
													</tr>
													<tr>
														<td>Email</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtEmail" name="txtEmail" size="55" value="<?php echo $valEmail; ?>" />
														</td>
													</tr>
													<tr>
														<td>Departement</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtDepartement" name="txtDepartement" size="55" value="<?php echo $valDepartement; ?>" />
														</td>
													</tr>
													<tr>
														<td>Branch</td>
														<td>
															<input type="text" maxlength="45" disabled="disabled" id="txtBranchName" name="txtBranchName" size="55" value="<?php echo $valBranchName; ?>" />
														</td>
													</tr>
													<?php } ?>
													<tr>
														<td>Status <span class="valid">*</span></td>
														<td>
														<select <?php ($valStatusCode=="ST05")?" disabled='disabled' ":""; ?> id="cboStatus" name="cboStatus">
															<option value="">--Select Status--</option>
															<?php
																foreach ($gridStatus as $key => $value) {
																	$selected=($value->status_code==$valStatusCode)?" selected=\"selected\" ":"";
																	if ($valProblemType=="Software" && $value->status_code=="ST03") {
																		continue;
																	}else {
																		echo "<option $selected value='$value->status_code' >$value->status_name</option>";
																	}
																}
															?>
														</select>
														</td>
													</tr>
													<?php if($isAllowTicket < 1) { ?>
													<tr id="trHardware">
														<td>Hardware GS <span class="valid">*</span></td>
														<td>
														<input type="text" <?php echo $disabled; ?> maxlength="45" id="txtHardwareName" name="txtHardwareName" size="55" value="<?php echo $valHardwareName; ?>" />
														<input type="hidden" id="txtHardwareCode" name="txtHardwareCode" value="<?php echo $valHardwareCode; ?>" />
														<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlHardware">
															...
														</button>
														</td>
													</tr>
													<?php } ?>
													<tr>
														<td>Description <span class="valid">*</span></td>
														<td>
														<textarea <?php ($valStatusCode=="ST05")?" disabled='disabled' ":""; ?> id="txtDesc" name="txtDesc" rows="5" cols="65"><?php echo $valDesc; ?></textarea>
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
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseType('$value->type_code','$value->type_name')\">$value->type_code</td>";
										echo "<td>$value->type_name</td>";
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
		
		<!-- Modal Hardware -->
		<div class="modal fade" id="mdlHardware" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Hardware GS</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tblHardware">
							<thead>
								<tr>
									<th>Hardware Code</th>
									<th>Hardware Name</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$CI =& get_instance();
									$CI->load->model('hardware_model','tblHardware');
									$gridHardware=$CI->tblHardware->getByType($valTypeCode,'IN');
									if (is_array($gridHardware)) {
										foreach ($gridHardware as $key => $value) {
											echo "<tr>";
											echo "<td><a href=\"#\" onclick=\"chooseHardware('$value->hardware_code','$value->hardware_name')\">$value->hardware_code</td>";
											echo "<td>$value->hardware_name</td>";
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
					$("#ticket_ae").validate().resetForm();
				});
				$('#tblType').dataTable({"lengthChange": false});
				$('#tblHardware').dataTable({"lengthChange": false});
				$("#back").click(function() {
					window.location.href='<?php echo base_url(); ?>index.php/ticket'
				});
				
				
				
				if ("<?php echo $flag ?>"=="Add") {
					$("#trType").hide();
				}else if ("<?php echo trim($valProblemType) ?>"=="Hardware") {
					$("#trType").show();
				}else {
					$("#trType").hide();
				}
				
				if ("<?php echo trim($valProblemType) ?>"=="Hardware" && $("#cboStatus").val() == "ST04") {
					$("#trHardware").show();
				}else {
					$("#trHardware").hide();
				}
					
				$("#cboStatus").change(function() {
					//if ($("#cboStatus").val() != "ST04") {
						$("#txtDesc").val("");
					//}
					
					if ($("#cboStatus").val()=="ST04") {
						$("#trHardware").show();
					}else {
						$("#trHardware").hide();
					}
				});
			});
			
			function changeType() {
				if($("#cboProblemType").val()=="Hardware") {
					$("#trType").show();
				}else {
					$("#trType").hide();
				}
			}
			
			function chooseType(id,nama) {
				$('#txtTypeCode').val(id);
				$('#txtTypeName').val(nama);
				$('#mdlType').modal('hide');
			};
			
			function chooseHardware(id,nama) {
				$('#txtHardwareCode').val(id);
				$('#txtHardwareName').val(nama);
				$('#mdlHardware').modal('hide');
			};
			
			$("#ticket_ae").validate({
				rules : {
					txtName : "required",
					txtSN : "required",
					cboStatus : "required",
					cboProblemType: "required",
					txtDesc : {
						required : true,
						maxlength : 160
					},
					txtTypeCode : {
						required : function(element) {
				    		return ($("#cboProblemType").val() == "Hardware");
				    	}
				  },
				  txtHardwareCode : {
						required : function(element) {
				    		return ($("#cboStatus").val() == "ST04");
				    	}
				   }
				}
			});
		</script>
	</body>
</html>
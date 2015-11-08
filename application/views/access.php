<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>MPTI - <?php echo $title; ?></title>

		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- Page-Level Plugin CSS - Tables -->
    	<link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

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
										$selected=($groupSelected=="")?" selected:selected ":"";
									?>
								<p>
									<form id="access" name="access" method="post" action="<?php echo base_url(); ?>index.php/access/changeGroup">
										<select id="cboGroup" name="cboGroup" >
											<option value="" <?php echo $selected; ?>>--Select Group--</option>
											<?php
											foreach ($gridGroup as $key => $value) {
												$selected=($groupSelected==$value->group_code)?" selected=\"selected\" ":"";
												echo "<option $selected value=\"$value->group_code\">$value->group_name</option>";
											}
											?>
										</select><br/>
										<input id="btnGo" type="submit" value="Go" class="btn btn-primary btn-sm" />
									</form>
									<form id="accessSave" name="accessSave" method="post" action="<?php echo base_url(); ?>index.php/access/addProcess">
								</p>
								<input type="hidden" id="txtCode" name="txtCode" value="<?php echo $groupSelected; ?>" />
									<!-- /.panel-heading -->
									<?php 
										if (isset($gridMenu)) {
									?>
										<table class="table table-striped table-bordered table-hover" id="tblMenu">
											<thead>
												<tr>
													<th style="width: 5%">No</th>
													<th style="width: 20%">Menu Code</th>
													<th style="width: 70%">Menu Name</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$i = 1;
												foreach ($gridMenu as $key => $value) {
													echo "<tr>";
													echo "<td class='fCtr'>$i</td>";
													echo "<td>$value->menu_code</td>";
													echo "<td>$value->menu_name</td>";
													$checked=($value->isChecked==1)?" checked=\"checked\"":"";
													$val=($value->isChecked==1)?" value=$value->menu_code ":" value=0 ";
													echo "<td class='fCtr'><input onclick=\"setValMenu('$value->menu_code')\" $checked $val type=\"checkbox\" id=\"chkMenu_$value->menu_code\" name=\"chkMenu[]\"/></td>";
													echo "</tr>";
	
													$i++;
												}
											?>
											</tbody>
										</table>
									<?php } 
									if (isset($gridStatus)) { ?>
										<table class="table table-striped table-bordered table-hover" id="tblStatus">
											<thead>
												<tr>
													<th style="width: 5%">No</th>
													<th style="width: 20%">Status Code</th>
													<th style="width: 70%">Status Name</th>
													<th>View</th>
													<th>Save</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$i = 1;
												foreach ($gridStatus as $key => $value) {
													echo "<tr>";
													echo "<td class='fCtr'>$i</td>";
													echo "<td>$value->status_code</td>";
													echo "<td>$value->status_name</td>";
													$chkView=($value->isView==1)?" checked=\"checked\"":"";
													$valView=($value->isView==1)?" value=$value->status_code ":" value=0 ";
													echo "<td class='fCtr'><input onclick=\"setValView('$value->status_code')\" $chkView $valView type=\"checkbox\" id=\"chkView_$value->status_code\" name=\"chkView[]\"/></td>";
													$chkSave=($value->isSave==1)?" checked=\"checked\"":"";
													$valSave=($value->isSave==1)?" value=$value->status_code ":" value=0 ";
													echo "<td class='fCtr'><input onclick=\"setValSave('$value->status_code')\" $chkSave $valSave type=\"checkbox\" id=\"chkSave_$value->status_code\" name=\"chkSave[]\"/></td>";
													echo "</tr>";
	
													$i++;
												}
											?>
											</tbody>
										</table>
										<?php }
										if ($groupSelected != "") {
											echo '<input type="submit" id="save" value="Save" class="btn btn-primary btn-sm" />';
										} ?>
										</form>
								</div>
								<!-- /.table-responsive -->
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
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
		<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
		<!-- Page-Level Plugin Scripts - Blank -->

		<!-- SB Admin Scripts - Include with every page -->
		<script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>

		<!-- Page-Level Demo Scripts - Blank - Use for reference -->
		<script>
			$(document).ready(function() {
				$("#access").validate({
					rules : {
						cboGroup : "required"
					}
				});
			});
			
			function setValMenu(id) {
				if ($('#chkMenu_'+id).is(':checked')) {
					$('#chkMenu_'+id).val(id);
				}else {
					$('#chkMenu_'+id).val('0');
				}
			}
			function setValView(id) {
				if ($('#chkView_'+id).is(':checked')) {
					$('#chkView_'+id).val(id);
				}else {
					$('#chkView_'+id).val('0');
				}
			}
			function setValSave(id) {
				if ($('#chkSave_'+id).is(':checked')) {
					$('#chkSave_'+id).val(id);
				}else {
					$('#chkSave_'+id).val('0');
				}
			}
		</script>
	</body>
</html>
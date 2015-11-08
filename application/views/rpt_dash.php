<!DOCTYPE html>
<html>

	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>MPTI - <?php echo $title; ?></title>

		<!-- Core CSS - Include with every page -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Page-Level Plugin CSS - Blank -->
		<link href="<?php echo base_url(); ?>assets/css/plugins/validate/css/screen.css" rel="stylesheet">
		
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
						<h1 class="page-header"><?php echo $title;$base=base_url(); ?></h1>
						<div class="row">
							<div class="col-lg-12">
								<form id="rpt" name="rpt" method="get" action="<?php echo base_url(); ?>index.php/rpt/dashResult">
									<div class="panel-heading">
									<table class="table table-striped">
										<thead></thead>
										<tbody>
											<tr>
												<td>Year <span class="valid">*</span></td>
												<td>
													<select id="cboYear" name="cboYear">
														<option value="">--Select Year--</option>
														<?php
															foreach ($grid as $key => $value) {
																echo "<option value='$value->year'>$value->year</option>";
															}
														?>
													</select>
												</td>
											</tr>
											<tr>
												<td>Month <span class="valid">*</span></td>
												<td>
													<select id="cboMonth" name="cboMonth">
														<option value="">--Select Month--</option>
														<option value="1">January</option>
														<option value="2">February</option>
														<option value="3">Maret</option>
														<option value="4">April</option>
														<option value="5">May</option>
														<option value="6">June</option>
														<option value="7">July</option>
														<option value="8">August</option>
														<option value="9">September</option>
														<option value="10">October</option>
														<option value="11">November</option>
														<option value="12">December</option>
													</select>
												</td>
											</tr>
											<tr>
												<td>Status</td>
												<td>
													<select id="cboStatus" name="cboStatus">
														<option value="ST00">--All Status--</option>
														<?php
															foreach ($gridStatus as $key => $value) {
																echo "<option value='$value->status_code'>$value->status_name</option>";
															}
														?>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
									</div>
									<p class="valid">* : Mandatory</p>
									<input type="submit" value="Preview" class="btn btn-primary btn-sm" />
								</form>
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
				$("#year").change(function() {
					if($(this).val() == "") {
						$("#month").disabled=false;
					}else {
						$("#month").disabled=true;
					}
					
				});
				
				$("#rpt").validate({
					rules : {
						cboMonth : "required",
						cboYear : "required"
					}
				});
			});
		</script>
	</body>

</html>
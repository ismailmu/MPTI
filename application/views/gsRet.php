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
								<form id="gs" name="gs" method="post" action="<?php echo base_url(); ?>index.php/gsRet/gsRetResult">
									<div class="panel-heading">
									<table class="table table-striped">
										<thead></thead>
										<tbody>
											<tr>
												<td>Ticket <span class="valid">*</span></td>
												<td>
													<input disabled="disabled" type="text" id="txtName" name="txtName" />
													<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mdlTicket">
														...
													</button>
													<input type="hidden" id="txtCode" name="txtCode" />
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
		
		<!-- Modal Ticket -->
		<div class="modal fade" id="mdlTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Choose Ticket</h4>
					</div>
					<div class="modal-body">
						<table class="table table-striped table-bordered table-hover" id="tbl">
							<thead>
								<tr>
									<th>Ticket Code</th>
									<th>Ticket Name</th>
									<th>Hardware</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($grid as $key => $value) {
										echo "<tr>";
										echo "<td><a href=\"#\" onclick=\"chooseTicket('$value->ticket_code','$value->ticket_name')\">$value->ticket_code</td>";
										echo "<td>$value->ticket_name</td>";
										echo "<td>$value->hardware_name</td>";
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
		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
		<!-- Page-Level Plugin Scripts - Blank -->

		<!-- SB Admin Scripts - Include with every page -->
		<script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>

		<!-- Page-Level Demo Scripts - Blank - Use for reference -->
		<script>
			$(document).ready(function() {
				$('#tbl').dataTable({"lengthChange": false});
				$("#gs").validate({
					rules : {
						txtCode : "required",
						cboType : "required"
					}
				});
			});

			function chooseTicket(id,nama) {
				$('#txtCode').val(id);
				$('#txtName').val(nama);
				$('#mdlTicket').modal('hide');
			};
		</script>
	</body>

</html>
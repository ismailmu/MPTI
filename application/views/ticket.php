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
									?>
								<p>
									<?php
									if ($isAllowTicket>=1) {
									?>
									<button class="btn btn-primary" onclick="gotoAdd('<?php echo base_url(); ?>')">
										<i class="fa fa-plus fa-fw"></i> Add <?php echo $title; ?>
									</button>
									<?php }	?>
								</p>
									<!-- /.panel-heading -->
									<table class="table table-striped table-bordered table-hover" id="tbl">
										<thead>
											<tr>
												<th>No</th>
												<th>Ticket Code</th>
												<th>Ticket Name</th>
												<th>Type</th>
												<th>Date Open</th>
												<th>Date Closed</th>
												<th>Desc</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;

											foreach ($grid as $key => $value) {
												
												echo "<tr>";
												echo "<td class='fCtr'>$i</td>";
												echo "<td>$value->ticket_code</td>";
												echo "<td>$value->ticket_name</td>";
												echo "<td>$value->problem_type</td>";
												$dateOpen=(is_null($value->date_open))?null:date_format(date_create($value->date_open),"d-M-Y");
												echo "<td>$dateOpen</td>";
												$dateClosed=(is_null($value->date_closed))?null:date_format(date_create($value->date_closed),"d-M-Y");
												echo "<td>$dateClosed</td>";
												echo "<td>$value->desc_status</td>";
												echo "<td>$value->status_name</td>";
												$path=base_url();
												if ( $isAllowTicket>=1 && ($value->status_code=="ST01" || $value->status_code=="") ) {
													echo "<td class='fCtr'><button type='button' onclick=\"gotoEdit('$value->ticket_code')\" class='btn btn-outline btn-primary btn-xs'><i class='fa fa-edit fa-fw'></i>Edit</button></td>";
												}else if ( $isAllowTicket < 1 && $value->status_code!="ST05") {
													echo "<td class='fCtr'><button type='button' onclick=\"gotoEdit('$value->ticket_code')\" class='btn btn-outline btn-primary btn-xs'><i class='fa fa-edit fa-fw'></i>Edit</button></td>";
												}else {
													echo "<td></td>";
												}
												echo "</tr>";

												$i++;
											}
											?>
										</tbody>
									</table>
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
		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
		<!-- Page-Level Plugin Scripts - Blank -->

		<!-- SB Admin Scripts - Include with every page -->
		<script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>

		<!-- Page-Level Demo Scripts - Blank - Use for reference -->
		<script>
			$(document).ready(function() {
				$('#tbl').dataTable();
			});
			function gotoAdd(path) {
				window.location.href = path + 'index.php/ticket/add';
			}
			function gotoEdit(id) {
				window.location.href = '<?php echo base_url(); ?>index.php/ticket/edit/'+id;
			}
			
		</script>
	</body>

</html>
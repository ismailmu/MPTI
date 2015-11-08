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
									<button class="btn btn-primary" onclick="gotoAdd('<?php echo base_url(); ?>')">
										<i class="fa fa-plus fa-fw"></i> Add <?php echo $title; ?>
									</button>
								</p>
									<!-- /.panel-heading -->
									<table class="table table-striped table-bordered table-hover" id="tbl">
										<thead>
											<tr>
												<th>No</th>
												<th>Branch Code</th>
												<th>Branch Name</th>
												<th>Address</th>
												<th>Zip Code</th>
												<th>City</th>
												<th>Email</th>
												<th>Active</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;

											foreach ($grid as $key => $value) {
												echo "<tr>";
												echo "<td class='fCtr'>$i</td>";
												echo "<td>$value->branch_code</td>";
												echo "<td>$value->branch_name</td>";
												echo "<td>$value->branch_address</td>";
												echo "<td>$value->zip_code</td>";
												echo "<td>$value->city</td>";
												echo "<td>$value->email</td>";
												$checked = ($value->is_active == 1) ? "checked='checked'" : "";
												echo "<td class='fCtr'><input $checked type='checkbox' disabled='disabled'/></td>";
												$path=base_url();
												echo "<td class='fCtr'><button type='button' onclick=\"gotoEdit('$value->branch_code')\" class='btn btn-outline btn-primary btn-xs'><i class='fa fa-edit fa-fw'></i>Edit</button></td>";
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
				window.location.href = path + 'index.php/branch/add';
			}
			function gotoEdit(id) {
				window.location.href = '<?php echo base_url(); ?>index.php/branch/edit/'+id;
			}
		</script>
	</body>

</html>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/index">MPTI</a>
		<img src="<?php echo base_url(); ?>assets/image/SeraHeader.jpg" style="width: 30%;margin-top: 10px" />
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right"><span style="font-size:large"><?php echo $this->session->userdata('user_session')->user_name; ?></span>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-user">
				<li>
					<a href="<?php echo base_url(); ?>index.php/home/changeIndex"><i class="fa fa-gear fa-fw"></i> Change Password</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="<?php echo base_url(); ?>index.php/home/logoutProcess"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->

</nav>
<!-- /.navbar-static-top -->
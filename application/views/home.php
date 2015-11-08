<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MPTI - Home</title>

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
		<?php
        	$this->view('header');
        ?>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <?php
                    	$this->view('menu');
                    ?>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Home</h1>
                    <?php
                    	$row=$this->session->userdata('user_session');
                    ?>
                    <h2>Welcome <?php echo $row->user_name; ?></h2>
                    <img src="<?php echo base_url(); ?>assets/image/SeraHeader.jpg" style="display: block;margin-left: auto;margin-right: auto;margin-top: 100px" />
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
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
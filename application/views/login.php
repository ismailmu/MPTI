<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MPTI - Login</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/plugins/validate/css/screen.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            	<img src="<?php echo base_url(); ?>assets/image/SeraHeader.jpg" style="margin-top: 7%;margin-left: 7%;" />
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login" name="login" action="<?php echo base_url(); ?>index.php/home/loginProcess" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="NIK" name="txtUserId" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txtPassword" type="password">
                                </div>
                                 <div class="form-group" style="text-align: center">
                                    <a href="<?php echo base_url(); ?>index.php/register">Register User</a>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-primary btn-block" />
                                <p class="session_desc"><?php echo (isset($session_desc))?$session_desc:""; ?></p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
   <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/plugins/validate/jquery.validate.min.js"></script>
		
	<script>
		$("#login").validate({
			rules : {
				txtUserId : "required",
				txtPassword : "required"
			}
		});
	</script>
</body>

</html>

<p style="text-align: center">
	<form name="gsPrint" method="post" action="<?php echo base_url(); ?>/index.php/hwRet/hwRetPdf" />
		<input type="hidden" name="txtCode" value="<?php echo $grid -> row() -> ticket_code; ?>" />
		<input type="submit" value="Export Pdf" />
		<input type="button" id="back" value="Back" />
	</form>
</p>
<!-- Core Scripts - Include with every page -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function() {
		$("#back").click(function() {
			window.location.href='<?php echo base_url(); ?>index.php/hwRet'
		});
	});
</script>
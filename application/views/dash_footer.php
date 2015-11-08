<p style="text-align: center">
	<form name="rptPrint" method="get" action="<?php echo base_url(); ?>index.php/rpt/dashPdf" />
		<input type="hidden" name="cboMonth" value="<?php echo $month; ?>"/>
		<input type="hidden" name="cboYear" value="<?php echo $year; ?>"/>
		<input type="hidden" name="cboStatus" value="<?php echo $status; ?>"/>
		<input type="submit" value="Export Pdf" />
		<input type="button" id="back" value="Back" />
	</form>
</p>
<!-- Core Scripts - Include with every page -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function() {
		$("#back").click(function() {
			window.location.href='<?php echo base_url(); ?>index.php/rpt/dash'
		});
	});
</script>
<p style="text-align: center">
	<form name="rptPrint" method="post" action="<?php echo base_url(); ?>/index.php/rpt/durPdf" />
		<input type="hidden" name="month" value="<?php echo $month; ?>"/>
		<input type="hidden" name="year" value="<?php echo $year; ?>"/>
		<input type="submit" value="Export Pdf" />
		<input type="button" id="back" value="Back" />
	</form>
</p>
<!-- Core Scripts - Include with every page -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<script>
	$(document).ready(function() {
		$("#back").click(function() {
			window.location.href='<?php echo base_url(); ?>index.php/rpt/dur'
		});
	});
</script>
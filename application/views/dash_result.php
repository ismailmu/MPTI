<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MPTI -<?php echo $title; ?></title>
<!-- Page-Level Plugin CSS - Morris -->
<link href="<?php echo base_url(); ?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
<style type="text/css">
	table.tblParent {
		/*border: 1px solid #CCC;*/
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
		border-spacing: 0px;
	}
	.tblParent td {
		padding: 4px;
		margin: 3px;
		/*border: 1px solid #ccc;*/
	}
	.tblParent th {
		background-color: #104E8B;
		color: #FFF;
		font-weight: bold;
		font-size: 12px;
	}
	.tblChild {
		border: 1px solid #000000;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;
		width: 100%;
		border-spacing: 0px;
	}
	.tblChild td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #ccc;
	}
	.tblChild th {
		background-color: #000000;
		color: #FFF;
		font-weight: bold;
		font-size: 12px;
	}
</style>
</head>
<body>
<table width="100%" class="tblParent">
  <tr>
    <th width="2%">&nbsp;</th>
    <th width="30%">&nbsp;</th>
    <th width="2%">&nbsp;</th>
    <th width="22%">&nbsp;</th>
    <th width="2%">&nbsp;</th>
    <th width="40%">&nbsp;</th>
    <th width="2%">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="3" style="width: 30%"><img src="<?php echo base_url(); ?>assets/image/SeraHeader2.jpg" />
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="4" style="text-align: center"><h1>DASHBOARD</h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td colspan="3"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5" style="text-align:center"><h1>TREND TICKET<br/><?php echo $year ?><br/>Status <?php echo $status_name; ?></h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5"><div id="chart1" style="width: 940px"></div></td>
	<td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="5" style="text-align:center"><h1>TREND KERUSAKAN<br/><?php echo date('F', mktime(0, 0, 0, $month, 10)) . ' - ' . $year ?><br/>Status <?php echo $status_name; ?></h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5"><div id="chart2" style="width: 940px"></div></td>
	<td>&nbsp;</td>
  </tr>
</table>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<!-- Page-Level Plugin Scripts - Morris -->
<script src="<?php echo base_url(); ?>assets/js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/morris/morris.js"></script>
<script>
$(document).ready(function() {
	
	var url='<?php echo base_url() . "/index.php/rpt/jsonDash?year=$year&month=$month&status=$status&tipe=1"; ?>';
	//alert(url);
	$.getJSON( url, function(data) {
		//console.log(data);
		Morris.Bar({
       		element: 'chart1',
       		data : data,
       		xkey: 'monthT',
       		ykeys: ['c1'],
       		labels: ['Count'],
       		hideHover: 'auto',
       		resize: true
     	});
	});
	url='<?php echo base_url() . "/index.php/rpt/jsonDash?year=$year&month=$month&status=$status&tipe=2"; ?>';
	$.getJSON( url, function(data) {
		//console.log(data);
		Morris.Bar({
       		element: 'chart2',
       		data : data,
       		xkey: 'type_name',
       		ykeys: ['c1'],
       		labels: ['Count'],
       		hideHover: 'auto',
       		resize: true
     	});
	});
});
</script>
</body>
</html>

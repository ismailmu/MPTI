<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MPTI - <?php echo $title; ?></title>
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
    <td colspan="4" style="text-align: center"><h2>REPORT TICKET DURATION MONTHLY </h2></td>
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
    <td colspan="5"><table class="tblChild">
        <thead>
          <tr>
            <th>No</th>
            <th>Ticket Code</th>
            <th>Ticket Name</th>
            <th>User Created</th>
            <th>User Branch</th>
            <th>Date Opened</th>
            <th>Date Closed</th>
            <th>Status</th>
            <th>Duration</th>
          </tr>
        </thead>
        <tbody>
		  	<?php $i = 1;

			foreach ($grid as $key => $value) {
				echo "<tr>";
				echo "<td class='fCtr'>$i</td>";
				echo "<td>$value->ticket_code</td>";
				echo "<td>$value->ticket_name</td>";
				echo "<td>$value->user_name</td>";
				echo "<td>$value->branch_name</td>";
				$dateOpen=(is_null($value->date_open))?null:date_format(date_create($value->date_open),"d-M-Y  H:i");
				echo "<td>$dateOpen</td>";
				$dateClosed=(is_null($value->date_closed))?null:date_format(date_create($value->date_closed),"d-M-Y  H:i");
				echo "<td>$dateClosed</td>";
				echo "<td>$value->status_name</td>";
				$dur=$value->dur . ' ' . $value->durLabel;
				echo "<td>$dur</td>";
				
				$i++;
			}
			?>
        </tbody>
      </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

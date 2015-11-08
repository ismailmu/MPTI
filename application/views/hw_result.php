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
		border: 1px solid #000000;
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
		<td>&nbsp;</td><td rowspan="3" style="width: 30%"><img src="<?php echo base_url(); ?>assets/image/SeraHeader2.jpg" /><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr><td>&nbsp;</td><td colspan="4" style="text-align: center"><h2>SERAH TERIMA BARANG</h2>
	    </td><td>&nbsp;</td></tr>
	
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td style="text-align: right">&nbsp;</td>
		<td style="text-align: right">&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td colspan="5"><table width="100%" border="0">
        <tr>
          <td width="100">Dari</td>
          <td width="1">:</td>
          <td><?php echo $user_name; ?></td>
          <td colspan="3" style="text-align:right"><span style="text-align:right">Tanggal Serah Terima</span> : <?php echo date("d-M-Y"); ?></td>
        </tr>
        <tr>
          <td>Kepada</td>
          <td>:</td>
          <td><?php echo $grid->row()->name_to; ?></td>
          <td>&nbsp;</td>
          <td width="1">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        
      </table></td>
	  <td>&nbsp;</td>
  </tr>
	
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
	  <td>&nbsp;</td>
	  <td colspan="5">Dengan hormat, mohon diterima barang sebagai berikut</td>
	  <td>&nbsp;</td>
  </tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="5">
			<table class="tblChild">
				<thead>
				<tr>
					<th>NAMA BARANG</th>
					<th>JUMLAH</th>
					<th>NO.ASSETS<br/>S/N</th>
					<th>KETERANGAN /<br/>KELUHAN</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><p><?php echo  $grid->row()->type_name; ?></p>
					    <p>&nbsp;</p></td>
						<td>1<p>&nbsp;</p></td>
						<td><p><?php echo  $grid->row()->sn; ?></p><p>&nbsp;</p></td>
						<td><p><?php echo  $grid->row()->desc_status; ?></p><p>&nbsp;</p></td>
					</tr>
				</tbody>
			</table>		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>Jakarta, <?php echo date("d-M-Y"); ?></td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>yang menyerahkan </td>
		<td>&nbsp;</td>
		<td style="text-align:center">Mengetahui</td>
		<td>&nbsp;</td>
		<td style="text-align:center">Menerima,</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>(&nbsp;<?php echo $user_name; ?>&nbsp;)</td><td>&nbsp;</td><td style="text-align:center">(___________________)</td>
		<td>&nbsp;</td>
		<td style="text-align:center">(&nbsp;<?php echo $grid->row()->name_to; ?>&nbsp;)</td><td>&nbsp;</td>
	</tr>
		<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
</table>
</body>
</html>
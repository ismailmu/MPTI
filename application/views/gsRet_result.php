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
	<tr><td>&nbsp;</td><td colspan="4" style="text-align: center"><h2>SERAH TERIMA  GS<br/>
	  PERALATAN &amp; PERABOTAN KANTOR</h2>
	    </td><td>&nbsp;</td></tr>
	
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td style="text-align: right">&nbsp;</td>
		<td style="text-align: right"><?php echo $grid->row()->ticket_code; ?></td><td>&nbsp;</td>
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
	  <td>&nbsp;</td>
	  <td></td>
	  <td colspan="3"><table width="100%" border="0">
        <tr>
          <td width="100">Nama Karyawan</td>
          <td width="1">:</td>
          <td><?php echo $grid->row()->name_to; ?></td>
        </tr>
        <tr>
          <td>Departement</td>
          <td>:</td>
          <td><?php echo $grid->row()->dept_to; ?></td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td><?php echo $grid->row()->nik_to; ?></td>
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
		<td colspan="5">
			<table class="tblChild">
				<thead>
				<tr>
					<th>JENIS BARANG</th>
					<th>Type / Merk</th>
					<th>NO.ASSETS<br/>S/N</th>
					<th>KETERANGAN /<br/>KELUHAN</th>
				</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $grid -> row() -> hardware_name; ?></td>
						<td><?php echo $grid -> row() -> type_name . ' / ' . $grid -> row() -> merk_name; ?></td>
						<td><?php echo $grid->row()->hardware_code ?></td>
						<td><?php echo $grid->row()->desc_status ?></td>
					</tr>
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
		<td>Pengirim, </td>
		<td>&nbsp;</td><td style="text-align:center">&nbsp;</td>
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
		<td>(&nbsp;<?php echo $user_name; ?>&nbsp;)</td><td>&nbsp;</td><td style="text-align:center">&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align:center">(&nbsp;<?php echo $grid->row()->name_to; ?>&nbsp;)</td><td>&nbsp;</td>
	</tr>
	
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>Barang diperiksa / diperbaiki tgl :</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align:left">Barang diterima dalam keadaan baik</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>oleh : </td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align:left">tanggal : _________________</td><td>&nbsp;</td>
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
		<td>&nbsp;</td><td>(_______________)</td><td>&nbsp;</td><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td style="text-align:center">(________________)</td><td>&nbsp;</td>
	</tr>
	<tr>
		<td colspan="7">* Saat di kembalikan, form harus ditandatangani oleh pemohon dan atasan nya</td>
	</tr>
</table>
</body>
</html>
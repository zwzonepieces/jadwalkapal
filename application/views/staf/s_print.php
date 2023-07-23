<html>
<head>
	<title>Cetak PDF</title>
	<style>
    .table {
        border-collapse:collapse;
        table-layout:fixed;width: 650px;
    }
    .table th {
        padding: 5px;
    }
    .table td {
        word-wrap:fixed;
        width: 28%;
        padding: 5px;
    }
    .table p{
        font-size: 11px;
    }
	</style>
</head>
<body>
    <h4 style="margin-bottom: 5px;" align="center">Rekap Kapal Masuk</h4>
	<?php echo $label ?>
	<table class="table" border="1" cellpadding="6">
		<tr align="center">
            <th>KAPAL</th>
			<th>ASAL</th>			            
			<th>TGL KEBERANGKATAN</th>
			<th>TGL KEDATANGAN</th>
		</tr>
		<?php
        if(empty($keberangkatan)){ // Jika data tidak ada
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
        }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
            foreach($keberangkatan as $lp){ // Looping hasil data transaksi
                ?>
                            <tr>                             
                                <td><?php echo $lp->nm_kapal ?></td>
                                <td align="center">
                                    <span><?php echo strtoupper($lp->nm_pelabuhan) ?></span>
                                    <p><font size="1"><?php echo strtoupper($lp->kode) ?></font></p>                       
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lp->tgl_berangkat) )?></span>
                                    <p><?php echo ($lp->jam_berangkat) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lp->tgl_datang)) ?></span>
                                    <p><?php echo ($lp->jam_datang) ?></p>
                                </td>                          
                           </tr>
                          <?php
            }
            foreach($kedatangan as $lpl){ // Looping hasil data transaksi
                ?>
                            <tr>                             
                                <td><?php echo $lpl->nm_kapal ?></td>
                                <td align="center">
                                    <span><?php echo strtoupper($lpl->nm_pelabuhan) ?></span>
                                    <p><font size="1"><?php echo strtoupper($lpl->kode) ?></font></p>                       
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lpl->tgl_berangkat) )?></span>
                                    <p><?php echo ($lpl->jam_berangkat) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lpl->tgl_datang)) ?></span>
                                    <p><?php echo ($lpl->jam_datang) ?></p>
                                </td>                          
                           </tr>
                          <?php
            }
        }
		?>
	</table>
</body>
</html>

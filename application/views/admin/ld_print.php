<html>
<head>
	<title>Cetak PDF</title>
	<style>
    .table {
        border-collapse:collapse;
        table-layout:fixed;width: 520px;
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
    <h4 style="margin-bottom: 5px;" align="center">LAPORAN DETAIL KAPAL</h4>
	<?php echo $label ?>
	<table class="table" border="1" cellpadding="6">
		<tr align="center">
            <th>KAPAL</th>
			<th>ASAL</th>	
            <th>TUJUAN</th>		            
			<th>TGL KEBERANGKATAN</th>
			<th>TGL KEDATANGAN</th>
            <th>KETERANGAN</th>
            <th>TGL PERUBAHAN</th>
		</tr>
		<?php
        if(empty($keberangkatan)){ 
            echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
        }else{ 
            foreach($keberangkatan as $lp)
                        { ?>
                            <tr>                             
                                <td><?php echo $lp->nm_kapal ?></td>
                                <td align="center">
                                    <?php echo strtoupper($lp->nm_pelabuhan) ?>                      
                                </td>
                                <td align="center">
                                    <?php echo strtoupper($lp->nm_pelabuhan2) ?>                      
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lp->tgl_berangkat) )?></span>
                                    <p><?php echo ($lp->jam_berangkat) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lp->tgl_datang)) ?></span>
                                    <p><?php echo ($lp->jam_datang) ?></p>
                                </td> 
                                <td><?php echo $lp->keterangan ?></td>
                                <td><?php echo $lp->tgl_edit ?></td>                         
                           </tr>
                        <?php
            }
            foreach($kedatangan as $lpl)
                        { ?>
                            <tr>                             
                                <td><?php echo $lpl->nm_kapal ?></td>
                                <td align="center">
                                    <?php echo strtoupper($lpl->nm_pelabuhan) ?>                      
                                </td>
                                <td align="center">
                                    <?php echo strtoupper($lpl->nm_pelabuhan2) ?>                      
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lpl->tgl_berangkat) )?></span>
                                    <p><?php echo ($lpl->jam_berangkat) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lpl->tgl_datang)) ?></span>
                                    <p><?php echo ($lpl->jam_datang) ?></p>
                                </td>
                                <td><?php echo $lpl->keterangan ?></td>
                                <td><?php echo $lpl->tgl_edit ?></td>                          
                           </tr>
                        <?php
            }
        }
		?>
	</table>
</body>
</html>

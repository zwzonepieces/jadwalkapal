<div class="content-wrapper">
    <section class="content-header">   
      <h1 align="center">
        Laporan xixixi
        <small></small>
      </h1>
    </section>
    <section class="content">
     <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body"  >  
            <form method="get" action="<?php echo base_url('laporan') ?>">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="date" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                            <span class="input-group-addon">s/d</span>
                            <input type="date" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
                        <?php
                            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                            echo '<a href="'.base_url('laporan/').'" class="btn btn-default">RESET</a>';?>
                        <a href="<?php echo $url_cetak ?>" class="btn btn-info"><i class="fa fa-print"></i>CETAK PDF</a>                        
                    </div>
                </div>
            </div>                       
    </form>
    <?php echo $label ?><br />
       
                <table class="table table-striped table-bordered table-hover" id="datatableJadwal">
                    <thead>
                        <tr>
						    <th width="150px"><center>NAMA KAPAL</center></th>
            			    <th width="150px"><center>ASAL</center></th>
                            <th width="150px"><center>TUJUAN</center></th>								            				            
            			    <th width="100px"><center>TGL KEBERANGKATAN</center></th>
						    <th width="100px"><center>TGL KEDATANGAN</center></th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                    if(empty($keberangkatan)){ 
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }else{
                        foreach($keberangkatan as $lp){     
                            ?>
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
                                    <p><?php echo date('H:i', strtotime ($lp->jam_berangkat)) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lp->tgl_datang)) ?></span>
                                    <p><?php echo date('H:i', strtotime ($lp->jam_datang) )?></p>
                                </td>                            
                           </tr>
                            <?php 
                        }
                        foreach($kedatangan as $lpl){     
                            ?>
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
                                    <p><?php echo date('H:i', strtotime ($lpl->jam_berangkat)) ?></p>
                                </td>
                                <td align="center">
                                    <span><?php echo date('d F Y', strtotime ($lpl->tgl_datang)) ?></span>
                                    <p><?php echo date('H:i',strtotime($lpl->jam_datang)) ?></p>
                                </td>                            
                           </tr>
                            <?php 
                        }
                        }
                    ?>
                </tbody>
              </table>
            </div>
           </div>
          </div>
        </div>
        
    </section>
  </div>
  

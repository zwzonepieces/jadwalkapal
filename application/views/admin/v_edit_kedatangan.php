<div class="content-wrapper">
    <section class="content-header">   
      <h1 align="center">
        Ubah Jadwal Kedatangan
        <small></small>
      </h1>
</section>
<section class="content">
	<?php foreach ($kedatangan as $jad) : ?>
		<form method="post" action=" <?php echo base_url(). 'jadwal/ubah' ?> "> 
            <div class="row">   
                <div class="col-md-5">  
			        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $jad->id_kedatangan ?>">
                        <label>Nama Kapal</label>
                        <select name="id_kapal" class="form-control select2" data-placeholder="Pilih Nama Kapal" style="width: 100%;">
                            <option></option>
                            <?php foreach($kapal as $data1){ ?>
                            <option <?php if($jad->id_kapal == $data1->id_kapal): echo "selected"; endif; ?> value="<?php echo $data1->id_kapal ?>"><?php echo $data1->nm_kapal ?></option>
                            <?php } ?>
                        </select>
                    </div>
			        <div class="form-group">
                        <label>Pelabuhan Asal</label>
                        <select name="id_pelabuhan" class="form-control" style="width: 100%;">
                            <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                            <option <?php if($jad->id_pelabuhan == $pelabuhan->id_pelabuhan): echo "selected"; endif;?> value="<?php echo $pelabuhan->id_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                            <?php } ?>
                        </select>
			        </div>
			        <div class="form-group">
                        <label>Pelabuhan Tujuan</label>
                        <select name="nm_pelabuhan2" class="form-control" style="width: 100%;">
                            <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                            <option <?php if($jad->nm_pelabuhan2 == $pelabuhan->nm_pelabuhan): echo "selected"; endif;?> value="<?php echo $pelabuhan->nm_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                            <?php } ?>
                        </select>
			        </div>
                </div>
            </div>
			<div class="row">
                <div class="form-group col-md-2">
                <label>Tgl Berangkat</label>
                    <div >
                        <input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tgl_berangkat" value="<?php echo $jad->tgl_berangkat ?>">
                    </div>
                </div>             
                <div class="form-group col-md-2">
                <label>Tgl Datang</label>
                    <div >
                        <input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tgl_datang" value="<?php echo $jad->tgl_datang ?>">
                    </div>
                </div>
            </div>        
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Jam Berangkat</label>
                    <div class="input-group">
                        <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_berangkat" value="<?php echo $jad->jam_berangkat?>">
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label>Jam Datang</label>
                    <div class="input-group">
                        <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_datang" value="<?php echo $jad->jam_datang ?>">
                    </div>
                </div>
            <div class="form-group">
                <div class="col-md-12"> 
                    <label>Keterangan</label>
                    <div>
                        <input required class="form-control required" placeholder="Masukan Keterangan" data-placement="top" data-trigger="manual" type="text" name="keterangan" value="<?php echo $jad->keterangan ?>">
                    </div>
                </div>
            </div> 
            </div>    
            <div class="modal-footer">
                <button type="button" class="btn btn-default"><a href="<?php echo site_url('jadwal') ?>"><i class="fa fa-close"></i> Batal</a></button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
		</form>
        <div>
            <label>Detail Perubahan </label>
            <table style="width: 100%" border="1" >
                <tr>
				    <th width="30px"><center>No.</center> </th>						            				            
            	    <th width="190px"><center>TGL KEBERANGKATAN</center></th>
				    <th width="190px"><center>TGL KEDATANGAN</center></th>
                    <th width="190px" align="center;"> <center>TGL Perubahan</center> </th>
                    <th width="190px" align="center;"> <center>Alasan Perubahan</center> </th>
                </tr>
                <tbody>
                <?php $no=1; ?>
                <?php foreach($detail_datang as $jad2) { ?>
                    <tr align="center">
                        <td><?php echo $no++."."; ?> </td>
                        <td>
                            <span><?php echo date('d F Y', strtotime ($jad2->tgl_berangkat) )?></span>
                            <p><?php echo date ('H:i', strtotime ($jad2->jam_berangkat) )?></p>
                        </td>
					    <td>
                            <span><?php echo date('d F Y', strtotime ($jad2->tgl_datang)) ?></span>
                            <p><?php echo date ('H:i', strtotime($jad2->jam_datang)) ?></p>
                        </td>
                        <td><?php echo date('d F Y H:i', strtotime ($jad2->tgl_edit) )?></td>
                        <td><?php echo ($jad2->keterangan )?> </td>
                    </tr>
                 <?php } ?>
                </tbody>
            </table>  
            </div>
	<?php endforeach ; ?>
</div>
<div class="content-wrapper">
    <section class="content-header">   
      <h1 align="center">
        Data Jadwal Keberangkatan
        <small></small>
      </h1>
    </section>
    <section class="content">
      <?php if ($this->session->flashdata('pesan') == TRUE) { ?>
          <script>
            setTimeout(function() {
              swal({
                      title:"",
                      text: "<?php echo $this->session->flashdata('pesan') ?>",
                      type: "success"
                    });
                  }, 600);
          </script>
        <?php } ?>
        <?php if ($this->session->flashdata('pesanGagal') == TRUE) { ?>
           <script>
            setTimeout(function() {
              swal({
                      title: "<?php echo $this->session->flashdata('pesanGagal') ?>",
                      type: "error"
                    });
                  }, 600);
          </script>
        <?php } ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntryJadwal"><i class="fa fa-plus"></i> Tambah Data</button>								
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
										<th width="10px"><center>No.</center> </th>
										<th width="150px"><center>NAMA KAPAL</center></th>
            				<th width="150px"><center>ASAL</center></th>	
                    <th width="150px"><center>TUJUAN</center></th>							            				            
            				<th width="100px"><center>TGL KEBERANGKATAN</center></th>
										<th width="100px"><center>TGL KEDATANGAN</center></th>
                    <th width="50px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach($keberangkatan as $bk) { ?>
                    <tr>
                      <td align="center"><?php echo $no++."."; ?> </td>
											<td><?php echo $bk->nm_kapal ?></td>
											<td align="center">
                        <?php echo strtoupper($bk->nm_pelabuhan) ?>                                             
                      </td>
                      <td align="center">
                        <?php echo strtoupper($bk->nm_pelabuhan2) ?>                                             
                      </td>
                      <td align="center">
                        <span><?php echo date('d F Y', strtotime ($bk->tgl_berangkat) )?></span>
                        <p><?php echo date ('H:i', strtotime ($bk->jam_berangkat) )?></p>
                      </td>
											<td align="center">
                        <span><?php echo date('d F Y', strtotime ($bk->tgl_datang)) ?></span>
                        <p><?php echo date ('H:i', strtotime($bk->jam_datang)) ?></p>
                      </td>
                      <td align="center">
                      <?php echo anchor('staf/controllersberangkat/edit/' .$bk->id_keberangkatan, '<div class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></div>') ?>
                        <button onclick="validate(this)" value="<?php echo $bk->id_keberangkatan ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                   </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
           </div>
          </div>
        </div>
    </section>
  </div>
  
<!-- modal tambah data jadwal -->
<div class="modal fade" id="ModalEntryJadwal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> Tambah Data Jadwal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('s_berangkat/simpan') ?>" enctype="multipart/form-data">
      <div class="modal-body">    
          <div class="form-group">
            <label>Pilih Kapal</label>
              <select name="id_kapal" class="form-control select2" data-placeholder="Pilih Kapal" style="width: 100%;">
                <option></option>
                <?php foreach($kapal as $data1){ ?>
                  <option value="<?php echo $data1->id_kapal ?>"><?php echo $data1->nm_kapal ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label>Pilih Pelabuhan Asal</label>
              <select name="id_pelabuhan" class="form-control select2" data-placeholder="Pilih Pelabuhan" style="width: 100%;">
              <option></option>
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option value="<?php echo $pelabuhan->id_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label>Pilih Pelabuhan Tujuan</label>
              <select name="nm_pelabuhan2" class="form-control select2" data-placeholder="Pilih Pelabuhan" style="width: 100%;">
              <option></option>
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option value="<?php echo $pelabuhan->nm_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
					<div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Tgl Berangkat</label>
                  <div class="input-group">
                    <input required class="form-control required" placeholder="Input Tanggal Keberangkatan" data-placement="top" data-trigger="manual" type="date" name="tgl_berangkat">
                  </div>
              </div>             
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tgl Datang</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tgl_datang">
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Jam Berangkat</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_berangkat">
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Jam Datang</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_datang">
                </div>
                </div>
            </div>
          </div>        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
			</div>
      </form>
    </div>
  </div>
</div>
<!--/ modal tambah data jadwal -->

<!-- modal ubah data jadwal -->
<?php foreach($keberangkatan as $bk) { ?> <?php foreach($detail_berangkat as $bk2) { ?>
<div class="modal fade" id="ModalUpdateJadwal<?php echo $bk->id_keberangkatan ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> ubah jadwal keberangkatan</h4>
      </div>
      <form method="POST" action="<?php echo site_url('s_berangkat/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">         
          <input type="hidden" name="id" value="<?php echo $bk->id_keberangkatan ?>">
            <div class="form-group">
              <label>Nama Kapal</label>
                <select name="id_kapal" class="form-control select2" data-placeholder="Pilih Nama Kapal" style="width: 100%;">
                  <option></option>
                  <?php foreach($kapal as $data1){ ?>
                  <option <?php if($bk->id_kapal == $data1->id_kapal): echo "selected"; endif; ?> value="<?php echo $data1->id_kapal ?>"><?php echo $data1->nm_kapal ?></option>
                  <?php } ?>
                </select>
            </div>
					<div class="form-group">
            <label>Pelabuhan</label>
              <select name="id_pelabuhan" class="form-control" style="width: 100%;">
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option <?php if($bk->id_pelabuhan == $pelabuhan->id_pelabuhan): echo "selected"; endif;?> value="<?php echo $pelabuhan->id_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label>Pelabuhan Tujuan</label>
              <select name="nm_pelabuhan2" class="form-control" style="width: 100%;">
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option <?php if($bk->nm_pelabuhan2 == $pelabuhan->nm_pelabuhan): echo "selected"; endif;?> value="<?php echo $pelabuhan->nm_pelabuhan ?>"><?php echo strtoupper($pelabuhan->nm_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Tgl Berangkat</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tgl_berangkat" value="<?php echo $bk->tgl_berangkat ?>">
                  </div>
              </div>             
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tgl Datang</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="date" name="tgl_datang" value="<?php echo $bk->tgl_datang ?>">
                  </div>
              </div>
           
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Jam Berangkat</label>
                  <div class="input-group">
                  <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_berangkat" value="<?php echo $bk->jam_berangkat?>">
                  </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Jam Datang</label>
                  <div class="input-group">
                    <input required class="form-control required" data-placement="top" data-trigger="manual" type="time" name="jam_datang" value="<?php echo $bk->jam_datang ?>">
                  </div>
                </div>
              </div>
            </div>
           </div>
            <div class="form-group"><label>Keterangan</label>
              <input required class="form-control required" placeholder="Masukan Keterangan" data-placement="top" data-trigger="manual" type="text" name="keterangan" value="<?php echo $bk2->keterangan ?>">
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>
<!--/ modal ubah data jadwal -->

<script>
function validate(a)
{
    var id= a.value;
    swal({
            title: "",
            text: "Anda Yakin Ingin menghapus ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes !",
            closeOnConfirm: false }, function()
        {
            $(location).attr('href','<?php echo base_url('s_berangkat/hapus/')?>'+id);
        }
    );
}
 </script>

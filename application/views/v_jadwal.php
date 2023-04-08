  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data Jadwal Kapal
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
                  <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntryJadwal"><i class="fa fa-plus"></i> Tambah Data Jadwal</button>
									
                </div>

              </div>
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
										<th width="10px"><center>No.</center> </th>
										<th width="150px"><center>NAMA KAPAL</center></th>
            				<th width="100px"><center>KOTA ASAL</center></th>
										<th width="100px"><center>KOTA TUJUAN</center></th>										            				            
            				<th width="100px"><center>TGL KEBERANGKATAN</center></th>
										<th width="100px"><center>TGL KEDATANGAN</center></th>
                    <th width="50px"><center>STATUS</center></th>
                    <th width="50px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  <?php foreach($jadwal as $jad) { ?>
                    <tr>
                      <td align="center"><?php echo $no++."."; ?> </td>
											<td><?php echo $jad->nm_kapal ?></td>
											<td><?php echo strtoupper($jad->pelabuhan_asal) ?></td>
											<td><?php echo strtoupper($jad->pelabuhan_tujuan) ?></td>
                      <td align="center"><?php echo date ($jad->tgl_berangkat) ?></td>
											<td align="center"><?php echo date ($jad->tgl_datang) ?></td>
                      <td align="center"><?php echo strtoupper ($jad->keterangan) ?></td>
                      <td align="center">
                        <button data-target="#ModalUpdateJadwal<?php echo $jad->id ?>" class="btn btn-sm btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </button>
                        <button onclick="validate(this)" value="<?php echo $jad->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
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
      <form method="POST" action="<?php echo site_url('jadwal/simpan') ?>" enctype="multipart/form-data">
      <div class="modal-body">
          
          <div class="form-group">
            <label>Nama Kapal</label>
              <select name="id_kapal" class="form-control select2" data-placeholder="Pilih Nama Kapal" style="width: 100%;">
                <option></option>
                <?php foreach($kapal as $data1){ ?>
                  <option value="<?php echo $data1->id_kapal ?>"><?php echo $data1->nm_kapal ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label>Kode Pelabuhan</label>
              <select name="id_pelabuhan" class="form-control" style="width: 100%;">
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option value="<?php echo $pelabuhan->id_pelabuhan ?>"><?php echo strtoupper($pelabuhan->id_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
					
					<div class="form-group"><label>Tanggal Berangkat</label>
            <input required class="form-control required" placeholder="Input Tanggal Keberangkatan" data-placement="top" data-trigger="manual" type="datetime-local" name="tgl_berangkat">
          </div>
					<div class="form-group"><label>Tanggal Datang</label>
            <input required class="form-control required" placeholder="Input Tanggal Kedatangan" data-placement="top" data-trigger="manual" type="datetime-local" name="tgl_datang">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <select class="form-control select2"  data-placeholder="Pilih Keterangan" data-placement="top" data-trigger="manual" type="text" name="keterangan" style="width: 50%;">
              <option value="ON TIME">ON TIME</option>
              <option value="DELAY">DELAY</option>
              <option value="BATAL">BATAL</option>
            </select>
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
<?php foreach($jadwal as $jad) { ?>
<div class="modal fade" id="ModalUpdateJadwal<?php echo $jad->id ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar"></i> ubah Jadwal Kapal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('jadwal/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input type="hidden" name="id" value="<?php echo $jad->id ?>">

          <div class="form-group">
            <label>Nama Kapal</label>
              <select name="id_kapal" class="form-control select2" data-placeholder="Pilih Nama Kapal" style="width: 100%;">
                <option></option>
                <?php foreach($kapal as $data1){ ?>
                  <option <?php if($jad->id_kapal == $data1->id_kapal): echo "selected"; endif; ?> value="<?php echo $data1->id_kapal ?>"><?php echo $data1->nm_kapal ?></option>
                <?php } ?>
              </select>
          </div>
					<div class="form-group">
            <label>Kode Pelabuhan</label>
              <select name="id_pelabuhan" class="form-control" style="width: 100%;">
                <?php foreach($getAllpelabuhan as $pelabuhan){ ?>
                  <option <?php if($pelabuhan->id_pelabuhan == $pelabuhan->id_pelabuhan): echo "selected"; endif;?> value="<?php echo $pelabuhan->id_pelabuhan ?>"><?php echo strtoupper($pelabuhan->id_pelabuhan) ?></option>
                <?php } ?>
              </select>
          </div>
					
					<div class="form-group"><label>Tanggal Berangkat</label>
            <input required class="form-control required" placeholder="Input Tanggal Keberangkatan" data-placement="top" data-trigger="manual" type="datetime-local" name="tgl_berangkat" value="<?php echo $jad->tgl_berangkat ?>">
          </div>
					<div class="form-group"><label>Tanggal Datang</label>
            <input required class="form-control required" placeholder="Input Tanggal Kedatangan" data-placement="top" data-trigger="manual" type="datetime-local" name="tgl_datang" value="<?php echo $jad->tgl_datang ?>">
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <select class="form-control select2"  data-placeholder="Pilih Keterangan" data-placement="top" data-trigger="manual" type="text" name="keterangan" style="width: 50%;">
              <option value="ON TIME">ON TIME</option>
              <option value="DELAY">DELAY</option>
              <option value="BATAL">BATAL</option>
            </select>
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
            $(location).attr('href','<?php echo base_url('jadwal/hapus/')?>'+id);
        }
    );
}
 </script>

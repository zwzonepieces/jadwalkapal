  <div class="content-wrapper">
    <section class="content-header">
      <h1 align="center">
        Data Kapal
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
                  }, 550);
          </script>
        <?php } ?>
        <?php if ($this->session->flashdata('pesanGagal') == TRUE) { ?>
           <script>
            setTimeout(function() {
              swal({
                      title: "<?php echo $this->session->flashdata('pesanGagal') ?>",
                      type: "error"
                    });
                  }, 550);
          </script>
      <?php } ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntryKapal"><i class="fa fa-plus"></i>Tambah Data Kapal</button> 
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="50px">No. </th>
                    <th><center>Nama Kapal</center></th>
                    <th><center>Jenis Kapal</center></th>			
                    <th><center>No Registrasi</center></th>								
                    <th width="100px" align="center;"> <center>Action</center> </th>
                  </tr>
                </thead>
                <tbody>
        				<?php $no=1; ?>
        				<?php foreach($getAllKapal as $dok) { ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>. </td>
                    <td align="center"><?php echo $dok->nm_kapal ?></td>
                    <td align="center"><?php echo strtoupper ($dok->jenis_kapal) ?></td>
										<td align="center"><?php echo strtoupper ($dok->no_registrasi) ?></td>
                    <td align="center">
          					  <button data-target="#ModalDetailKapal<?php echo $dok->id_kapal ?>" class="btn btn-sm btn-info btn-circle" data-toggle="modal"><span class="fa fa-folder-open"></span> </button>
                      <button data-target="#ModalUpdateKapal<?php echo $dok->id_kapal ?>" class="btn btn-sm btn-warning btn-circle" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> </button>
                      <button onclick="validate(this)" value="<?php echo $dok->id_kapal ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
					          </td>
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
  
<!-- modal tambah data kapal -->
<div class="modal fade" id="ModalEntryKapal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Tambah Data Kapal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('kapal/simpan') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <input required class="form-control" value="<?php echo $getKode ?>" type="hidden" name="id_kapal">    
          <div class="form-group"><label>Nama Kapal</label>
            <input required class="form-control required" placeholder="Input Nama Kapal" data-placement="top" data-trigger="manual" type="text" name="nm_kapal">
          </div>
					<div class="form-group"><label>Jenis Kapal</label>
            <input required class="form-control required" placeholder="Input Jenis Kapal" data-placement="top" data-trigger="manual" type="text" name="jenis_kapal">
          </div>  
          <div class="form-group"><label>No Registrasi</label>
            <input required class="form-control required" placeholder="Input No Registrasi Kapal" data-placement="top" data-trigger="manual" type="text" name="no_registrasi">
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
<!--/ modal tambah data kapal -->

<!-- modal ubah data kapal -->
<?php foreach($getAllKapal as $dok) { ?>
<div class="modal fade" id="ModalUpdateKapal<?php echo $dok->id_kapal ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Ubah Data Kapal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('kapal/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">
          
          <input required class="form-control" value="<?php echo $dok->id_kapal ?>" type="hidden" name="id_kapal">
                
          <div class="form-group"><label>Nama Kapal</label>
            <input required class="form-control required" placeholder="Input Nama Kapal" data-placement="top" data-trigger="manual" type="text" name="nm_kapal" value="<?php echo $dok->nm_kapal ?>">
          </div>
          <div class="form-group"><label>Jenis Kapal</label>
            <input required class="form-control required" placeholder="Input Jenis Kapal" data-placement="top" data-trigger="manual" type="text" name="jenis_kapal" value="<?php echo $dok->jenis_kapal ?>">
          </div>
          <div class="form-group"><label>No Registrasi</label>
            <input required class="form-control required" placeholder="Input Jenis Kapal" data-placement="top" data-trigger="manual" type="text" name="no_registrasi" value="<?php echo $dok->no_registrasi ?>">
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
<!--/ modal ubah data kapal -->

<!-- modal detail kapal -->
<?php foreach($getAllKapal as $data) { ?>
<div class="modal fade" id="ModalDetailKapal<?php echo $data->id_kapal ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Detail Kapal</h4>
      </div>
      <div class="modal-body">
        <table class="table table-responsive" border="0">
          <tbody>
            <tr>
              <td width="200px">Nama Kapal</td>
              <td>:</td>
              <td><?php echo $data->nm_kapal ?></td>
            </tr>
            <tr>
              <td width="200px">Jenis Kapal</td>
              <td>:</td>
              <td><?php echo ucwords($data->jenis_kapal) ?></td>
            </tr>
            <tr>
              <td width="200px">No Registrasi</td>
              <td>:</td>
              <td><?php echo $data->no_registrasi ?></td>
            </tr>
          </tbody>
        </table> 
      </div> 
    </div>
  </div>
</div>
<?php } ?>
<!--/ modal ubah data kapal -->

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
            $(location).attr('href','<?php echo base_url('kapal/hapus/')?>'+id);
        }
    );
}
 </script>

 
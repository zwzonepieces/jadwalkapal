<div class="content-wrapper">
    <section class="content-header">
      <h1 align="center">
        Data Tujuan Kapal
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
              <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntrytujuan"><i class="fa fa-plus"></i>Tujuan</button> 
            </div>
            <div class="panel-body">	
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr align="center">
                    <th width="30px" >No.</th>
					          <th width="70px">Kode</th>
                    <th><center>Tujuan</th>
					          <th>Kota</th>
                    <th width="150px">Action </th>
                  </tr>		
                </thead>
                <tbody>				
        			  <?php $no=1; ?>
        			  <?php foreach($getAlltujuankapal as $tjn){ ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>.</td>
						        <td align="center"><?php echo strtoupper($tjn->kode)?></td>
                    <td><?php echo strtoupper($tjn->tujuan)?></td>
						        <td><?php echo strtoupper($tjn->kota)?></td>
                    <td align="center">
        				      <button data-target="#ModalUpdatetujuan<?php echo $tjn->id_tujuan ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-circle"><span class="glyphicon glyphicon-edit"></span> </button>
        				      <button onclick="validate(this)" value="<?php echo $tjn->id_tujuan ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
  
<!-- modal tambah data pelabuhan -->
<div class="modal fade" id="ModalEntrytujuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Tujuan</h4>
        </div>
        <form method="POST" action="<?php echo site_url('tujuan/simpan')?>" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group"><label>Kode</label>
                <input required class="form-control required" placeholder="Input kode" data-placement="top" data-trigger="manual" type="text" name="kode">
            </div> 
            <div class="form-group"><label>Tujuan</label>
                <input required class="form-control required" placeholder="Input data asal" data-placement="top" data-trigger="manual" type="text" name="tujuan">
            </div>
		        <div class="form-group"><label>Kota</label>
                <input required class="form-control required" placeholder="Input data kota" data-placement="top" data-trigger="manual" type="text" name="kota">
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
<!--/ modal tambah data pelabuhan -->

<!-- modal update data pelabuhan -->
<?php foreach($getAlltujuankapal as $tjn){ ?>
<div class="modal fade" id="ModalUpdatetujuan<?php echo $tjn->id_tujuan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Update Tujuan</h4>
      </div>
      <form method="POST" action="<?php echo site_url('tujuan/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">      
          <div class="form-group"><label>ID Tujuan</label>
            <input required class="form-control required" data-placement="top" value="<?php echo $tjn->id_tujuan ?>" data-trigger="manual" type="text" name="id_tujuan">
          </div>      
          <div class="form-group"><label>Kode</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $tjn->kode ?>" data-placement="top" data-trigger="manual" type="text" name="kode">
          </div>
          <div class="form-group"><label>Tujuan</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $tjn->tujuan ?>" data-placement="top" data-trigger="manual" type="text" name="tujuan">
          </div>
					<div class="form-group"><label>Kota</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $tjn->kota ?>" data-placement="top" data-trigger="manual" type="text" name="kota">
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
<!--/ modal update data pelabuhan -->


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
            $(location).attr('href','<?php echo base_url('tujuan/hapus/')?>'+id);
        }
    );
}
 </script>

  <div class="content-wrapper">
    <section class="content-header">
      <h1 align="center">
        Data Asal Kapal
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
              <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntryPelabuhan"><i class="fa fa-plus"></i>Asal</button> 
            </div>
            <div class="panel-body">			
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="30px" align="center">No. </th>
										<th width="70px"><center>Kode</center></th>
                    <th><center>Pelabuhan</center></th>
										<th><center>Kota</center></th>
                    <th width="150px"> <center>Action</center> </th>
                  </tr>		
                </thead>
                <tbody>				
        				<?php $no=1; ?>
        				<?php foreach($getAllpelabuhan as $pol){ ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>.</td>
										<td align="center"><?php echo strtoupper($pol->kode)?></td>
                    <td><?php echo strtoupper($pol->nm_pelabuhan)?></td>
										<td><?php echo strtoupper($pol->kota)?></td>
                    <td align="center">
        						  <button data-target="#ModalUpdatePelabuhan<?php echo $pol->id_pelabuhan ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-circle"><span class="glyphicon glyphicon-edit"></span> </button>
        						  <button onclick="validate(this)" value="<?php echo $pol->id_pelabuhan ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="ModalEntryPelabuhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Asal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('pelabuhan/simpan')?>" enctype="multipart/form-data">
        <div class="modal-body">
          <input required value="<?php echo $id_pelabuhan ?>" type="hidden" name="id_pelabuhan"> 
          <div class="form-group"><label>Kode</label>
            <input required class="form-control required" placeholder="Input kode" data-placement="top" data-trigger="manual" type="text" name="kode">
          </div> 
          <div class="form-group"><label>Pelabuhan</label>
            <input required class="form-control required" placeholder="Input data asal" data-placement="top" data-trigger="manual" type="text" name="nm_pelabuhan">
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
<?php foreach($getAllpelabuhan as $pol){ ?>
<div class="modal fade" id="ModalUpdatePelabuhan<?php echo $pol->id_pelabuhan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Update Asal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('pelabuhan/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">         
          <input required class="form-control required" data-placement="top" value="<?php echo $pol->id_pelabuhan ?>" data-trigger="manual" type="hidden" name="id_pelabuhan">   
          <div class="form-group"><label>Kode</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $pol->kode ?>" data-placement="top" data-trigger="manual" type="text" name="kode">
          </div>
          <div class="form-group"><label>Asal</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $pol->nm_pelabuhan ?>" data-placement="top" data-trigger="manual" type="text" name="nm_pelabuhan">
          </div>
					<div class="form-group"><label>Kota</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $pol->kota ?>" data-placement="top" data-trigger="manual" type="text" name="kota">
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
            $(location).attr('href','<?php echo base_url('pelabuhan/hapus/')?>'+id);
        }
    );
}
 </script>

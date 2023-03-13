  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tujuan Kapal 
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
              <button class="btn btn-success" data-toggle="modal" href="#" data-target="#ModalEntryPelabuhan"><i class="fa fa-plus"></i>Tambah Data Tujuan Kapal</button> 
            </div>
            <div class="panel-body">
			
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="30px" align="center">No. </th>
										<th width="70px"><center>ID Tujuan</center></th>
                    <th><center>Pelabuhan Asal</center></th>
										<th><center>Pelabuhan Tujuan</center></th>
                    <th width="150px"> <center>Action</center> </th>
                  </tr>		
                </thead>
                <tbody>				
        				<?php $no=1; ?>
        				<?php foreach($getAllpelabuhan as $pol){ ?>
                  <tr>
                    <td align="center"><?php echo $no++; ?>.</td>
										<td align="center"><?php echo strtoupper($pol->id_pelabuhan)?></td>
                    <td><?php echo strtoupper($pol->pelabuhan_asal)?></td>
										<td><?php echo strtoupper($pol->pelabuhan_tujuan)?></td>
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
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Tambah Data Tujuan Kapal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('pelabuhan/simpan')?>" enctype="multipart/form-data">
        <div class="modal-body">
          <input required value="<?php echo $id_pelabuhan ?>" type="hidden" name="id_pelabuhan">  
          <div class="form-group"><label>Pelabuhan Asal</label>
            <input required class="form-control required" placeholder="Input data tujuan kapal" data-placement="top" data-trigger="manual" type="text" name="pelabuhan_asal">
          </div>
					<div class="form-group"><label>Pelabuhan Tujuan</label>
            <input required class="form-control required" placeholder="Input data tujuan kapal" data-placement="top" data-trigger="manual" type="text" name="pelabuhan_tujuan">
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
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Ubah Data Tujuan Kapal</h4>
      </div>
      <form method="POST" action="<?php echo site_url('pelabuhan/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">      
          <div class="form-group"><label>ID Tujuan</label>
            <input required class="form-control required" data-placement="top" value="<?php echo $pol->id_pelabuhan ?>" data-trigger="manual" type="text" name="id_pelabuhan">
          </div>      
          <div class="form-group"><label>Pelabuhan Asal</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $pol->pelabuhan_asal ?>" data-placement="top" data-trigger="manual" type="text" name="pelabuhan_asal">
          </div>
					<div class="form-group"><label>Pelabuhan Tujuan</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $pol->pelabuhan_tujuan ?>" data-placement="top" data-trigger="manual" type="text" name="pelabuhan_tujuan">
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

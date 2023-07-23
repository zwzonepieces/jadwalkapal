<div class="content-wrapper">
    <section class="content-header">     
      <h1 align="center">
        Data Staf
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
              <button class="btn btn-info" data-toggle="modal" href="#" data-target="#ModalEntrystaf"><i class="fa fa-plus"></i>Tambah Data</button> 
            </div>
            <div class="panel-body">
              <table style="table-layout:fixed" class="table table-striped table-bordered table-hover" id="datatableJadwal">
                <thead>
                  <tr>
                    <th width="30px" align="center">No. </th>
					          <th width="250px"><center>Nama</center></th>
                    <th width="250px"><center>Email</center></th>
                    <th width="150px"><center>Username</center></th>
                    <th><center>Level</center></th>
                    <th width="50px"> <center>Action</center> </th>
                  </tr>		
                </thead>
              <tbody>				
        			  <?php $no=1; ?>
        			    <?php foreach($getAlluser as $user){ ?>
                    <tr>
                      <td align="center"><?php echo $no++; ?>.</td>
						          <td align="center"><?php echo strtoupper($user->nama)?></td>
                      <td><?php echo ($user->email)?></td>
						          <td><?php echo ($user->username)?></td>
                      <td><?php echo ($user->level)?></td>
                      <td align="center">
        					      <button data-target="#ModalUpdatestaf<?php echo $user->id_user ?>" data-toggle="modal" class="btn btn-sm btn-warning btn-circle"><span class="glyphicon glyphicon-edit"></span> </button>
        					      <button onclick="validate(this)" value="<?php echo $user->id_user ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="ModalEntrystaf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i>Tambah Data</h4>
      </div>
      <form method="POST" action="<?php echo site_url('staf/simpan')?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group"><label>Nama</label>
            <input required class="form-control required" placeholder="Input Nama" data-placement="top" data-trigger="manual" type="text" name="nama">
          </div> 
          <div class="form-group"><label>Level</label>
            <select name="level" class="form-control" style="width: 100%;">
              <option value="admin">admin</option>
              <option value="staf">staf</option>
            </select>
          </div>
          <div class="form-group"><label>Email</label>
            <input required class="form-control required" placeholder="Input data asal" data-placement="top" data-trigger="manual" type="text" name="email">
          </div>
				  <div class="form-group"><label>username</label>
            <input required class="form-control required" placeholder="Input data kota" data-placement="top" data-trigger="manual" type="text" name="username">
          </div>
			    <div class="form-group"><label>Password</label>
            <input required class="form-control required" placeholder="Input data kota" data-placement="top" data-trigger="manual" type="text" name="password">
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
<?php foreach($getAlluser as $user){ ?>
<div class="modal fade" id="ModalUpdatestaf<?php echo $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-square"></i> Update Data</h4>
      </div>
      <form method="POST" action="<?php echo site_url('staf/ubah') ?>" enctype="multipart/form-data">
        <div class="modal-body">      
          
            <input required class="form-control required" data-placement="top" value="<?php echo $user->id_user ?>" data-trigger="manual" type="hidden" name="id_user">
               
          <div class="form-group"><label>Nama</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $user->nama ?>" data-placement="top" data-trigger="manual" type="text" name="nama">
          </div>
          <div class="form-group"><label>Level</label>
          <select name="level" class="form-control" style="width: 100%;">
              <option value="admin">admin</option>
              <option value="staf">staf</option>
            </select>
          </div>
		      <div class="form-group"><label>Username</label>
              <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $user->username ?>" data-placement="top" data-trigger="manual" type="text" name="username">
          </div>
          <div class="form-group"><label>Passwrod</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $user->password ?>" data-placement="top" data-trigger="manual" type="text" name="password">
          </div>
          <div class="form-group"><label>Email</label>
            <input required class="form-control required" placeholder="Input data dermaga" value="<?php echo $user->email ?>" data-placement="top" data-trigger="manual" type="text" name="email">
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
            $(location).attr('href','<?php echo base_url('staf/hapus/')?>'+id);
        }
    );
}
 </script>

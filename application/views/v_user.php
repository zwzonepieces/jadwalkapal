  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Data User
        <small></small>
      </h1>
    </section>

    <section class="content">

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
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Form Update User</h3>
            </div>
            <!-- form start -->
            <form class="form-horizontal" id="registerSubmit">
              <div class="box-body">

                <input type="hidden" name="id" id="id_user" value="<?php echo $this->session->id ?>">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" value="<?php echo $this->session->username ?>" placeholder="Username" name="username">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-6">
                    <input name="nm_user" type="text" class="form-control" id="nama" value="<?php echo $this->session->nm_user ?>" placeholder="Nama">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" id="email">Email</label>

                  <div class="col-sm-6">
                    <input type="email" class="form-control" value="<?php echo $this->session->email ?>" name="email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <span style="opacity: 0.5">*kosongkan jika tidak ingin mengubah password</span>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Ulangi Password</label>

                  <div class="col-sm-6">
                    <input type="password" class="form-control" placeholder="Ulangi Password" id="repassword" name="repassword">
                  </div>
                </div>

                <hr>
                <div class="form-group">
                  <div class="col-md-5"></div>
                  <div class="col-sm-3">
                    <button type="button" id="btn_user" class="btn btn-block btn-success">Update</button>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
            </form>
          </div>
          </div>
        </div>
    </section>
  </div>
  

  <link href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper">

<?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Admin!!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')):?>
          <script>
            swal({
              title: 'Oops!!',
              text: "<?php echo $this->session->flashdata('error');?>",
              type: 'error'
            });
          </script>
        <?php endif; ?>


  <section class="content">
          <body class="hold-transition register-page">
                  <div class="register-box">
                    <div class="register-logo">
                      <a href=""><b>Registrasi</b> Admin Baru</a>
                    </div>

                    <div class="register-box-body">
                      <p class="login-box-msg">Masukan Data Admin Baru</p>

                      <form action="<?= base_url('admin/tambah_user')?>" method="post">
                        <div class="form-group has-feedback">
                          <input type="text" name="nama" class="form-control" autofocus="" placeholder="Full name" value="<?= set_value('nama'); ?>">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="text" name="username" class="form-control" placeholder="Username"  value="<?= set_value('username'); ?>">
                          <span class="fa fa-users form-control-feedback"></span>
                          <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="email" name="email"class="form-control" placeholder="Email"  value="<?= set_value('email'); ?>">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" name="password1" class="form-control" placeholder="Password">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" name="password2"class="form-control" placeholder="Retype password">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group">
                              <select name="role" class="form-control">
                                    <option value="">Pilih jabatan</option>
                                    <option value="Sos Kelurahan">Sos Kelurahan</option>
                                    <option value="Dinas Sosial">Dinas Sosial</option>
                              </select>
                         </div>
                        <div class="form-group">
                              <select  name="level" class="form-control">
                                    <option value="">Pilih Role</option>
                                    <option value="2">Sos Kelurahan</option>
                                    <option value="1">Dinas Sosial</option>
                              </select>
                         </div>
                        <div class="row">
                          <div class="col-xs-4">
                            <button type="submit" class="btn btn-info btn-block btn-flat">Register</button>
                          </div>
                          
                        </div>
                      </form>
                    </div>
                    <!-- /.form-box -->
                  </div>
          </body>
  </section>
</div>

<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<div class="content-wrapper">
<section class="content-header">
        <h1>
          Admin
          <small>List Data Admin </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > List Data Admin</a></li>
        </ol>
      </section>
    <section class="content">

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

      <div class="row">
                <div class="col-xs-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">List Data Admin</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th width ='6%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $no= 0; foreach ($list as $g ): $no++;?>
                                  <tr>
                                    <td><?php echo $g->id; ?></td>
                                    <td><?php echo $g->username; ?></td>
                                    <td><?php echo $g->password; ?></td>
                                    <td><?php echo $g->nama ; ?></td>
                                    <td><?php echo $g->email; ?></td>
                                    <td><?php echo $g->role; ?></td>
                                    <td align="center">

                                     <a href="<?php echo site_url('admin/delete/'.$g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>
                                </tr>

                                <?php endforeach;?>
                                </tbody>
                             </table>
                                </div>
                </div>
            </div>
    </div>
         </div>   
         </section>
         </div> 
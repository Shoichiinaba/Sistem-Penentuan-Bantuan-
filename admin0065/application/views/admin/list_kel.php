<div class="content-wrapper">
  <section class="content-header">
        <h1>
          Proses
          <small>Data Sudah Di Klasifikasi </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > Proses Bantuan</a></li>
        </ol>
      </section>
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Permohonan',
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
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Data Pengajuan Dlm Proses</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width ='12%'>N0 KK</th>
                                            <th width ='22%'>Nama</th>
                                            <th width ='20%'>Alamat</th>
                                            <th width ='20%'>Status Bangunan</th>
                                            <th width ='20%'>Jenis Lantai</th>
                                            <th width ='20%'>Jenis Dinding</th>
                                            <th width ='20%'>Kualitas Bangunan</th>
                                            <th width ='20%'>Jenis Atap</th>
                                            <th width ='20%'>Kualitas Atap</th>
                                            <th width ='20%'>Sumber Air</th>
                                            <th width ='20%'>Daya Listrik</th>
                                            <th width ='20%'>Hasil Dapat</th>
                                            <th width ='20%'>Hasil T. Dapat</th>
                                            <th width ='20%'>Prediksi</th>
                                            <th width ='20%'>Tahun</th>
                                            <th width ='20%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no= 0; foreach ($data as $g ): $no++;?>
                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $g->no_kk; ?></td>
                                    <td><?php echo $g->nama; ?></td>
                                    <td><?php echo $g->alamat; ?></td>
                                    <td><?php echo $g->status_bangunan; ?></td>
                                    <td><?php echo $g->jenis_lantai; ?></td>
                                    <td><?php echo $g->jenis_dinding; ?></td>
                                    <td><?php echo $g->kualitas_bang; ?></td>
                                    <td><?php echo $g->jenis_atap; ?></td>
                                    <td><?php echo $g->kualitas_atap; ?></td>
                                    <td><?php echo $g->sumber_air; ?></td>
                                    <td><?php echo $g->daya_listrik; ?></td>
                                    <td><?php echo $g->hasil_dapat; ?></td>
                                    <td><?php echo $g->hasil_tdapat; ?></td>
                                    <td><?php echo $g->hasil_prediksi; ?></td>
                                    <td><?php echo $g->tahun; ?></td>
                                    <td align="center">

                                      <a type="button" href="<?php echo base_url('/laporan/laprec/'.$g->no_kk); ?>" target="_blank" class="btn btn-success btn-xs"  data-placement="top"  title="Cetak"><i class="fa fa-print"></i></a>

                                     <a type="button" data-toggle="modal" data-target="#modal-edit<?=$g->no_kk;?>" class="btn btn-success btn-xs"  data-placement="top"  title="Edit"><i class="fa fa-spinner"></i></a>

                                     <a href="<?php echo site_url('tampil_terproses/hapus/'.$g->no_kk); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-success btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash-o"></i></a>
                                </tr>

                                <?php endforeach;?>
                                </tbody>
                             </table>
                             <div class="row">
                                <div class="col-xs-12">
                                  <div class="box box-success">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Menu</h3>
                                    </div>
                                    <div class="box-body">
                                      <a href="<?php echo base_url('index.php/laporan/lapall/')?>" target="_blank"> 
                                          <button type="submit" class="btn btn-info" target="_blank">
                                              <i  class="glyphicon glyphicon-print"></i>&nbsp; Cetak
                                          </button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                      </div>
                </div>
            </div>
    </div>
         </div>   
</div> 
<!-- Modal edit Permohonan -->
<?php $no=  0; foreach($data as $g  ): $no++;?>
<div id="modal-edit<?=$g->no_kk;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('tampil_terproses/adit_pered'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Form Edit Data</h4>
        </div>
        
        <div class="box-body">
            <div class="modal-body">
                  <div class="form-group">
                  <label class='col-md-4'>NO KK</label>
                  <div class='col-md-8'>
                  <input type="text" value="<?=$g->no_kk;?>" name="no_kk" class="form-control" required="" ></div>
                </div>
          <br>
                <div class="form-group">
                  <label class='col-md-4'>Nama Lengkap</label>
                  <div class='col-md-8'>
                  <input type="text" value="<?=$g->nama;?>" name="nama" class="form-control" required="" ></div>
                </div>
          <br>
                 <div class="form-group">
                  <label class='col-md-4'>Alamat Lengkap</label>
                  <div class='col-md-8'>
                  <input type="text" value="<?=$g->alamat;?>" name="alamat" class="form-control" required="" ></div>
                </div>
                <div class="form-group">
                  <label class='col-md-4'>Status Bangunan</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->status_bangunan;?>" name="status_bangunan" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Jenis Lantai</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->jenis_lantai;?>" name="jenis_lantai" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Jenis Dinding</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->jenis_dinding;?>" name="jenis_dinding" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Kualitas Bangunan</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->kualitas_bang;?>" name="kualitas_bang" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Jenis Atap</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->jenis_atap;?>" name="jenis_atap" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Kualitas Atap</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->kualitas_atap;?>" name="kualitas_atap" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Sumber Air</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->sumber_air;?>" name="sumber_air" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Daya Listrik</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->daya_listrik;?>" name="daya_listrik" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <br>
                <div class="form-group">
                  <label class='col-md-4'>Prediksi</label>
                  <div class='col-md-8'><input type="text" value="<?=$g->hasil_prediksi;?>" name="hasil_prediksi" autocomplete="off" class="form-control"
                     readonly="" ></div>
                </div>
                <!-- /.input group -->
                  <br>
              <br>
              
      </div>
  </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Edit</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</form>
</div>
</div>
</div>
<?php endforeach;?>
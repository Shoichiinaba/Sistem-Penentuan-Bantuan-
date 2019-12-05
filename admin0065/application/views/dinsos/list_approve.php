<div class="content-wrapper">
  <section class="content-header">
        <h1>
          Approve
          <small>Data Akan Di Approve </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > Approve Bantuan</a></li>
        </ol>
  </section>
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Approve Permohonan!!',
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
                            <h3 class="box-title">List Data yang akan Di Approve</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            
                                            <th width ='12%'>N0 KK</th>
                                            <th width ='20%'>Nama</th>
                                            <th width ='20%'>Alamat</th>
                                            <th>Status Bangunan</th>
                                            <th>Jenis Lantai</th>
                                            <th>Jenis Dinding</th>
                                            <th width ='20%'>Kualitas Bangunan</th>
                                            <th>Jenis Atap</th>
                                            <th width ='20%'>Kualitas Atap</th>
                                            <th>Sumber Air</th>
                                            <th width ='20%'>Daya Listrik</th>
                                            <th>Hasil Dapat</th>
                                            <th>Hasil T. Dapat</th>
                                            <th>Tanggal Sosialisasi</th>
                                            <th width ='6%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no= 0; foreach ($approve as $g ): $no++;?>
                                  <tr>
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
                                    <td><?php echo $g->tgl_sosial; ?></td>
                                    <td align="center">

                                     <a type="button" data-toggle="modal" data-target="#modal-acc<?=$g->no_kk;?>" class="btn btn-info btn-xs"  data-placement="top"  title="Approve"><i class="fa fa-buysellads"></i></a>
                                </tr>

                                <?php endforeach;?>
                                </tbody>
                             </table>
                                </div>
                </div>
            </div>
    </div>
         </div>   
</div> 

<!-- Modal Validasi -->

<?php $no=  0; foreach($approve as $g ): $no++;?>
<div class="modal modal-info fade" id="modal-acc<?=$g->no_kk;?>">
          <div class="modal-dialog">
            <form action="<?php echo site_url('approve/validasi'); ?>" method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Form Approve Pengajuan</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label class='col-md-4'>N0 KK</label>
                          <div class='col-md-8'>
                          <input type="text" readonly value="<?=$g->no_kk;?>" name="no_kk" class="form-control" required="" ></div>
                        </div>
                      <br>
                        <div class="form-group">
                          <label class='col-md-4'>Nama Lengkap</label>
                          <div class='col-md-8'><input type="text" readonly value="<?=$g->nama;?>" name="nama" autocomplete="off" class="form-control"
                            required="" ></div>
                        </div>
                      <br>
                        <div class="form-group">
                          <label class="control-label col-md-4">Status</label>
                          <div class="col-md-8">
                          <select name="status_approved" class="form-control">
                                <option value="0">Proses</option>
                                <option value="1">Approve</option>
                          </select>
                          </div>
                        </div>
                      <br>
                        <div class="form-group">
                        <label class='col-md-4'>Tanggal Sosialisasi</label>
                          <div class='col-md-8'> <input type="text" id="tanggal" name="tgl_sosial" autocomplete="off" placeholder="Tanggal Sosialisasi" value="<?=$g->tgl_sosial;?>" class="form-control"
                      required="" >
                        </div>
                        </div>
                      <br>
                      <div class="form-group">
                        <label class='col-md-4'>Tanggal Renovasi</label>
                          <div class='col-md-8'> <input type="text" id="jam" name="tgl_renovasi" autocomplete="off" value="<?=$g->tgl_renovasi;?>" placeholder="Tanggal Renovasi" class="form-control">
                        </div>
                        </div>
                      <br>

                        <div class="form-group">
                          <label class='col-md-4'>Keterangan</label>
                          <div class='col-md-8'><input type="text" name="keterangan" autocomplete="off" class="form-control" value="<?=$g->keterangan;?>"></div>
                        </div>
                        <br>
                        <div class="form-group">
                          <label class='col-md-4'>Status Pengajuan</label>
                          <div class='col-md-8'><input type="text" readonly value="<?=$g->hasil_prediksi;?>" name="nama" autocomplete="off" class="form-control"
                            required="" ></div>
                        </div>
                      <br>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-outline">Approve</button>
                      </div>
                    </div>
            <!-- /.modal-content -->
            </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
<?php endforeach;?>
        <!-- /.modal -->
        <style>
    .datepicker{z-index:1151;}
      </style>
<script>
    $(function(){
        $("#jam").datepicker({
      format:'dd/mm/yyyy'
        });
                });
      </script>
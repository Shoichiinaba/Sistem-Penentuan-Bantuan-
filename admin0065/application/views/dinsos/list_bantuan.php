<div class="content-wrapper">
  <section class="content-header">
        <h1>
          List Bantuan
          <small>Data Bantuan </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > List Bantuan</a></li>
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
                            <h3 class="box-title">List Warga Dapat Bantuan</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            
                                            <th width ='10%'>NO KK</th>
                                            <th width ='16%'>Nama</th>
                                            <th width ='18%'>Alamat</th>
                                            <th width ='13%'>Status Pengajuan</th>
                                            <th width ='14%'>Status Aproved</th>
                                            <th width ='15%'>Tanggal Sosialisasi</th>
                                            <th width ='23%'>Tanggal Renovasi</th>
                                            <th width ='15%'>Keterangan</th>
                                            <th width ='6%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no= 0; foreach ($list as $row ): $no++;?>
                                  <tr>
                                    <td><?php echo $row->no_kk;?> </td>
                                          <td><?php echo $row->nama;?></td>
                                          <td><?php echo $row->alamat ?></td>
                                          <td><?php echo $row->hasil_prediksi ?></td>
                                          <td>
                                            <?php if($row->status_approved==0){
                                                    echo "<span class='label label-success'> Prosses</span>";
                                                    $site=site_url('client/search/'.$row->no_kk);
                                                    //$teks="Nonaktifkan Data";
                                                    $icon="switch";
                                                    $class="danger";
                                            }elseif($row->status_approved==1){
                                                    echo "<span class='label label-info'> Aproved</span>";
                                                    $site=site_url('client/search/'.$row->no_kk);
                                                    //$teks="Aktifkan Data";
                                                    $icon="switch";
                                                    $class="info";
                                            }else{
                                                    echo "<label class='label label-primary> Lainnya</label>";
                                                    $site=site_url('client/search/'.$row->no_kk);
                                                    //$teks="Aktifkan Data";
                                                    $icon="switch";
                                                    $class="default";
                                            }?>
                                          </td>
                                          <td><?php echo $row->tgl_sosial ?></td>
                                          <td><?php echo $row->tgl_renovasi ?></td>
                                          <td><?php echo $row->keterangan ?></td>
                                    <td align="center">

                                    <a type="button" href="<?php echo base_url('/laporan/lapdin/'.$row->no_kk); ?>" target="_blank" class="btn btn-info btn-xs"  data-placement="top"  title="Cetak"><i class="glyphicon glyphicon-print"></i></a>

                                     <a href="<?php echo site_url('dinsos/hapus/'.$row->no_kk); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-info btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash-o"></i></a>
                                </tr>

                                <?php endforeach;?> 
                                </tbody>
                             </table>
                             <div class="row">
                                <div class="col-xs-12">
                                  <div class="box box-default">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Menu</h3>
                                    </div>
                                    <div class="box-body">
                                      <a href="<?php echo base_url('index.php/laporan/lapalldin/')?>" target="_blank">
                                          <button type="submit" class="btn btn-info">
                                              <i class="glyphicon glyphicon-print"></i>&nbsp; Cetak
                                          </button>
                                      </a>

                                       <!-- <a href="<?php echo base_url()?>">
                                          <button type="submit" class="btn btn-info">
                                              <i class="fa fa-file-excel-o"></i>&nbsp; EX to Exel
                                          </button>
                                      </a> -->
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
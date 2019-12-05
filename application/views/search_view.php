<!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>
         <script src="<?php echo base_url('bower_components/js/jquery-3.3.1.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>


<main id="main" class="main-page">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>Hasil Pencarian</h2>
          <p>Tabel Hasil Pencarian Status Bantuan</p>
        </div>
              <!-- conten tabel pencarian -->
                <div class="content-wrapper">
                      <div class="container">
                          <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Daftar Pencarian</h3>
                                  <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                          <thead>
                            <tr>
                              <th width ='10%'>NO KK</th>
                              <th width ='19%'>Nama</th>
                              <th width ='20%'>Alamat</th>
                              <th width ='15%'>Status Pengajuan</th>
                              <th width ='16%'>Status Aproved</th>
                              <th width ='17%'>Tanggal Sosialisasi</th>
                              <th width ='20%'>Tanggal Renovasi</th>
                              <th width ='15%'>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($bantuan as $row):?>
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
                            </tr>
                                       <div class="details">
                                          <h4><i> Detail Pemohon</i></h4>
                                          <div class="social">
                                            <a href="<?php echo base_url(); ?>index.php/client/detail/<?php echo $row->no_kk; ?>" ><i class="fa fa-share-square-o"></i></a>
                                        </div>
                                      </div>
                          <?php endforeach;?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <!-- end conten -->
                    
      </div>
    </section>

  </main>
 
       
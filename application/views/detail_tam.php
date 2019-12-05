<main id="main" class="main-page">

    <!--==========================
      Speaker Details Section
    ============================-->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header">
          <h2>Detail Pemohon</h2>
          <p>Keterangan Lengkap Pemohon Bantuan</p>
        </div>
              <!-- conten tabel pencarian -->
              <?php foreach($bantuan as $m){ ?>
                <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                        <form role="form" action="#" method="post" enctype="multipart/form-data" name="form" class="form" id="form" onsubmit="return validate(this)" onClick="highlight(event)" onKeyUp="highlight(event)">
                            <div class="form-group">
                              <table class="table table-striped table-bordered table-hover" style="width: 100%">
                                  <tr>
                                    <td>NO KK</td>
                                      <td><?php echo $m->no_kk; ?></td>
                                  </tr>
                                    <td>Nama</td>
                                      <td><?php echo $m->nama; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Alamat</td>
                                      <td><?php echo $m->alamat; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status Bangunan</td>
                                      <td><?php echo $m->status_bangunan; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jrnis Lantai</td>
                                      <td><?php echo $m->jenis_lantai; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kualitas Bangunan</td>
                                      <td><?php echo $m->kualitas_bang; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Jenis Atap</td>
                                      <td><?php echo $m->jenis_atap; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Kualitas Atap</td>
                                      <td><?php echo $m->kualitas_atap; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Sumber Air</td>
                                      <td><?php echo $m->sumber_air; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Daya Listrik</td>
                                      <td><?php echo $m->daya_listrik; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Hasil Dapat</td>
                                      <td><?php echo $m->hasil_dapat; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Hasil Tidak Dapat</td>
                                      <td><?php echo $m->hasil_tdapat; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status Permohonan</td>
                                      <td><?php echo $m->hasil_prediksi; ?></td>
                                  </tr>
                              </table>
                            </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
                <?php } ?>
            </div>
                                        <div class="details">
                                          <h4>Cetak Detail</h4>
                                          <div class="social">
                                            <a href="<?php echo base_url('index.php/laporan/laprec/'.$m->no_kk); ?>" target="_blank" ><i class="fa fa-print"></i></a>
                                          </div>
                                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <!-- end conten -->
                  
                    
      </div>

    </section>

  </main>
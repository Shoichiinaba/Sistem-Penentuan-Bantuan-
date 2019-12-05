<div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          HOME
          <small><?php echo $userdata->role; ?> </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>
          
            <section class="content">
                  <!-- Dasboard Kelurahan -->
              <?php if ($userdata->level=='2') { ?>
                    <div class="callout callout-success">
                    <div class="callout callout-success" style="margin-bottom: 0!important;">
                    <center><h4><i class="fa fa-institution"></i> Selamat Datang Di Halaman Admin Sistem Penentuan Bantuan Bedah Rumah Dengan Algoritma Naive Bayes Classifier <i class="fa fa-institution"></i></h4></center>
                    <center><p>.Halaman Admin ini Berfungsi Untuk Menentukan Siapa Saja Yang Mendapatkan Bantuan .</p></center>
                  </div>
                </div>
                  <!-- Dasboard Dinsos -->
              <?php } elseif ($userdata->level=='1' ) { ?>
                    <div class="callout callout-info">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <center><h4><i class="fa fa-institution"></i> Selamat Datang Di Halaman Administrator Dinas Sosial Dan Pekerjaan Umum :  <i class="fa fa-institution"></i></h4></center>
                    <p>Halaman Admin ini Berfungsi Untuk Approved Bantuan Yang Masuk, Kapan Bantuan Akan disalurkan kepada yang sudah di pastikan Dapat.</p>

                    </div>
                  </div>
              <?php } else { ?>

              <?php } ?>
              <!-- Notivikasi dasboard kelurahan -->
              <?php if ($userdata->level=='2') { ?>
      <div class="row">
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-blue">
                    <div class="inner">
                      <h3><?php echo $jml_permohonan; ?></h3> 

                      <p> Data Pengajuan Permohonan</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-home-outline"></i>
                    </div>
                    <a href="<?php echo base_url('tampil_terproses') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
      
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo $jml_dapat; ?></h3> 

                      <p>Daftar Hasil Dapat</p>  
                    </div>
                    <div class="icon">
                      <i class="ion ion-social-reddit"></i>
                    </div>
                    <a href="<?php echo base_url('') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo $tidak_dapat; ?></h3> 

                      <p>Daftar Hasil Tidah Dapat</p>  
                    </div>
                    <div class="icon">
                      <i class="ion ion-sad"></i>
                    </div>
                    <a href="<?php echo base_url('') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
         <!-- Notivikasi dasboard Dinsos -->
      <?php } elseif ($userdata->level=='1' ) { ?>
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="inner">
                     <h3><?php echo $data_masuk; ?></h3>

                      <p>jumlah Pengajuan Masuk</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-exit"></i>
                    </div>
                    <a href="<?php echo base_url('approve') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="inner">
                     <h3><?php echo $approve; ?></h3>

                      <p>Pengajuan sudah di approve</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-social-angular"></i>
                    </div>
                    <a href="<?php echo base_url('dinsos') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                     <h3><?php echo $proses; ?></h3>

                      <p>Pengajuan Masih Proses</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-sync"></i>
                    </div>
                    <a href="<?php echo base_url('approve') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div> 
          </div>    
        <?php } else { ?>
           <?php } ?>
            </section> 
    </div>
 </div>
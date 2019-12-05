
  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><br>Cek Status Permohonan<span> Bantuan</span> Bedah Rumah (RTLH)</h1>
      <p class="mb-4 pb-0"><?= date('d F Y')?>, Silahkan Tekan Tombol Cek Status</p>
      <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a> -->
      <a href="" data-toggle="modal" data-target="#cekstatus-modal"class="about-btn scrollto">Cek Status Bantuan</a>

    </div>
    
  </section>

  <div class="modal modal-danger fade" id="cekstatus-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Cek Setatus Pengajuan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="container wow fadeInUp">
              <div class="modal-body">
              	
                <form id="form_search" action="<?php echo site_url('client/search');?>" method="GET">
                
                  <div class="form-group">
                 <div class="input-group input-group-xs">
                <input type="text" class="form-control" name="no_kk" autofocus='' required='' autocomplete='off' placeholder="Masukan No KK Anda!!">
                <span class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-secondary btn-sm btn-flat">Cari!</button>
                    </span>
              </div>
            </div>
                </form>
              </div>
          </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm pull-left" data-dismiss="modal">Keluar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

  <main id="main">
    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang System</h2>
            <p>Halaman System ini di buat agar pemohon bisa mengetahui status yang di ajukan dan mengecek kapan bantuan RTLH akan di eksekusi.</p>
          </div>
          <div class="col-lg-3">
            <h3>Selanjutnya</h3>
            <p>Setelah pemohon sudah di pastikan mendapatkan bantuan pemohun tinggal menunggu Approve dari DINSOS</p>
          </div>
          <div class="col-lg-3">
            <h3>Kapan?</h3>
            <p>Pemohon dapat melihat kapan bantuan akan di berikan dan di eksekusi<br><?= date('F Y')?></p>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Sponsors Section
    ============================-->
    <section id="supporters" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Sponsors</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/2.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/4.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/5.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/6.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/7.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/8.jpg" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>

    </section>
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Kelurahan Krapyak Semarang Barat.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Alamat</h3>
              <address>Jl. Subali Raya, Krapyak <br>
              Semarang Barat Kota Semarang, Jawa Tengah 50146 <br></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Telephone</h3>
              <p><a href=" ( 024 ) 7617910"> ( 024 ) 7617910</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="kel.krapyak@gmail.com">kel.krapyak@gmail.com</a></p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #contact -->

  </main>
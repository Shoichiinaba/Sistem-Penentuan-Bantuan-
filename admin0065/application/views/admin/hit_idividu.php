
      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Prediksi!!',
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

<div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Hitung Individu
          <small><?php echo $userdata->role; ?> </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > Hitung Individu</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-6">
                <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Prediksi Perhitungan Individu</h3>
                      </div>
                      <form name="form_" action="<?= base_url('hitung_individu/simpan_hitung')?>" method="post">
                      <div class="box-body">
                      <div class="form-group">
                          <label class='col-md-4'>No. KK</label>
                          <div class='col-md-7'>
                          <input type="text" id="NIK" name="no_kk" placeholder="Masukan No. KK" class="form-control" required="" ></div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class='col-md-4'>Nama Lengkap</label>
                          <div class='col-md-7'><input type="text" name="nama" autocomplete="off" placeholder="Nama Penduduk" class="form-control"
                            required="" ></div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class='col-md-4'>Alamat</label>
                          <div class='col-md-7'><input type="text" name="alamat" autocomplete="off" placeholder="Alamat" class="form-control"
                            required="" ></div>
                      </div>
                      <br>
                      <br>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Status Bangunan</label>
                          <div class="col-md-7">
                          <select name="status_bangunan" class="form-control">
                                <option value="">Pilih Status Bangunan</option>
                                <option value="Bebas Sewa">Bebas Sewa</option>
                                <option value="Milik Sendiri">Milik Sendiri</option>
                          </select>
                          </div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Jenis Lantai</label>
                          <div class="col-md-7">
                          <select name="jenis_lantai" class="form-control">
                                <option value="">Pilih Jenis Lantai</option>
                                <option value="Kramik">Kramik</option>
                                <option value="Sementara">Sementara / Plesteran</option>
                                <option value="Ubin">Ubin</option>
                                <option value="Tanah">Tanah</option>
                          </select>
                          </div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Jenis Dinding</label>
                          <div class="col-md-7">
                          <select name="jenis_dinding" class="form-control">
                                <option value="">Pilih Jenis Dinding</option>
                                <option value="Bambu">Bambu</option>
                                <option value="Tembok">Tembok</option>
                          </select>
                          </div>
                      </div>
                      <br>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Kualitas Bangunan</label>
                          <div class="col-sm-offset-2 ">
                          <div class="radioCheck">
                              <input type="radio" value="Bagus" name="kualitas_bang" checked /><span>Bagus</span>
                              <div class="col-sm-4">
                              <input type="radio" value="Kualitas rendah" name="kualitas_bang"/><span>Kualitas rendah</span>
                              </div>
                          </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-4">Kualitas Atap</label>
                          <div class="col-sm-offset-2 ">
                          <div class="radioCheck">
                              <input type="radio" value="Bagus" name="kualitas_atap" checked /><span>Bagus</span>
                              <div class="col-sm-4">
                              <input type="radio" value="Kualitas rendah" name="kualitas_atap"/><span>Kualitas rendah</span>
                              </div>
                          </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-4">Jenis Atap</label>
                          <div class="col-md-7">
                          <select name="jenis_atap" class="form-control">
                              <option value="">Pilih Jenis Atap</option>
                              <option value="Seng">Seng</option>
                              <option value="Asbes">Asbes</option>
                              <option value="Genteng">Genteng</option>
                          </select>
                          </div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Sumber Air</label>
                          <div class="col-md-7">
                          <select name="sumber_air" class="form-control">
                              <option value="">Pilih Sumber Air</option>
                              <option value="Ledeng meteran">Ledeng Meteran</option>
                              <option value="Air isi ulang">Air isi Ulang</option>
                              <option value="Sumur">Sumur</option>
                          </select>
                          </div>
                      </div>
                      <br>
                      <div class="form-group">
                          <label class="control-label col-md-4">Daya Listrik</label>
                          <div class="col-md-7">
                          <select name="daya_listrik" class="form-control">
                              <option value="">Pilih Daya Listik</option>
                              <option value="450">450 W</option>
                              <option value="900">900 W</option>
                              <option value="1300">1300 W</option>
                          </select>
                          </div>
                      </div>
                      <!-- /.box-body -->
                </div>
                    <!-- /.box -->
                    <div class="box-footer">
                          <button style="float:left;" class="btn btn btn-info"  onclick="getReady(event);">Prediksi</button>
                          <div style="clear:both;"></div>
                    </div>
              
            </div>
          </div>

          <div class="col-md-6">
          <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Informasi Hasil Prediksi</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group has-error">
                      <label class="col-sm-4 control-label">Hasil Dapat</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="hasil_dapat" id="dapatPr" readonly="true">
                      </div>
                    </div>
                    <br>
                    <div class="form-group has-error">
                          <label class='col-sm-4'>Hasil Tidak Dapat</label>
                          <div class='col-sm-8'><input type="text" name="hasil_tdapat" id="tidakPr" readonly="true" class="form-control"></div>
                      </div>
                      <br><br>
                    <div class="form-group has-success">
                          <label class='col-sm-4'>Hasil Prediksi</label>
                          <div class='col-sm-8'><input type="text" name="hasil_prediksi" id="hasil" readonly="true" class="form-control"
                            required="" ></div>
                    </div>

                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <td><a href="<?php echo base_url("hitung_individu"); ?>">
                    <button type="button" class="btn btn-danger">Reset</button>
                    </td></a>

                    <button type="submit" class="btn btn-success pull-right">Simpan</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
          </div>
        </div>
      </section>
    </div>
  </div>

<!-- Mesin Penghitung -->
<script>
  function presentasi(dapat,tidak_dapat){
    var persentasi = (dapat + tidak_dapat);
    var dapat_all = (dapat)*100;
    var tidak_dapat_all = (tidak_dapat)*100;
    return {"dapat":dapat_all.toFixed(2),"tidak_dapat":tidak_dapat_all.toFixed(2)};
  }
  function naive_bayes(penguasaanB, jenisL, jenisD, kualitasB, jenisA, kualitasA, sumberA, dayalis)
  {
    var dapat,tidak_dapat;
    var dapat_penguasaanB,tidak_dapat_penguasaanB, 
      dapat_jenisL,tidak_dapat_jenisL, 
      dapat_jenisD,tidak_dapat_jenisD,
      dapat_kualitasB,tidak_dapat_kualitasB, 
      dapat_jenisA,tidak_dapat_jenisA, 
      dapat_kualitasA,tidak_dapat_kualitasA,
      dapat_sumberA,tidak_dapat_sumberA, 
      dapat_dayalis,tidak_dapat_dayalis;
    var dapat_x,tidak_dapat_x;
    var dapat_all,tidak_dapat_all;
    var dapat_prediction,tidak_prediction;
    
      if(penguasaanB == "Milik Sendiri"){
          dapat_penguasaanB = 16/16;
          tidak_dapat_penguasaanB = 22/54;
      }else if(penguasaanB == "Bebas Sewa"){
        dapat_penguasaanB = 0/16;
        tidak_dapat_penguasaanB = 32/54;
      }

      if(jenisL == "Kramik"){
          dapat_jenisL = 0/16;
          tidak_dapat_jenisL = 20/54;
      }else if(jenisL == "Ubin"){
        dapat_jenisL = 4/16;
        tidak_dapat_jenisL = 21/54;
      }else if(jenisL == "Sementara"){
        dapat_jenisL = 11/16;
        tidak_dapat_jenisL = 13/54;
      }else if(jenisL == "Tanah"){
        dapat_jenisL = 1/16;
        tidak_dapat_jenisL = 0/54;
      }

      if(jenisD == "Bambu"){
          dapat_jenisD = 6/16;
          tidak_dapat_jenisD = 1/54;
      }else if(jenisD == "Tembok"){
        dapat_jenisD = 10/16;
        tidak_dapat_jenisD = 53/54;
      }

      if(kualitasB == "Bagus"){
          dapat_kualitasB = 1/16;
          tidak_dapat_kualitasB = 26/54;
      }else if(kualitasB == "Kualitas rendah"){
        dapat_kualitasB = 15/16;
        tidak_dapat_kualitasB = 28/54;
      }

      if(jenisA == "Seng"){
          dapat_jenisA = 5/16;
          tidak_dapat_jenisA = 0/54;
      }else if(jenisA == "Asbes"){
        dapat_jenisA = 5/16;
        tidak_dapat_jenisA = 31/54;
      }else if(jenisA == "Genteng"){
        dapat_jenisA = 6/16;
        tidak_dapat_jenisA = 23/54;
      }

      if(kualitasA == "Bagus"){
          dapat_kualitasA = 1/16;
          tidak_dapat_kualitasA = 22/54;
      }else if(kualitasA == "Kualitas rendah"){
        dapat_kualitasA = 15/16;
        tidak_dapat_kualitasA = 32/54;
      }

      if(sumberA == "Ledeng meteran"){
          dapat_sumberA = 3/16;
          tidak_dapat_sumberA = 30/54;
      }else if(sumberA == "Air isi ulang"){
        dapat_sumberA = 8/16;
        tidak_dapat_sumberA = 18/54;
      }else if(sumberA == "Sumur"){
        dapat_sumberA = 5/16;
        tidak_dapat_sumberA = 6/54;
      }

      if(dayalis == "450"){
          dapat_dayalis = 10/16;
          tidak_dapat_dayalis = 16/54;
      }else if(dayalis == "900"){
        dapat_dayalis = 6/16;
        tidak_dapat_dayalis = 37/54;
      }else if(dayalis == "1300"){
        dapat_dayalis = 0/16;
        tidak_dapat_dayalis = 1/54;
      }
    dapat = 16;
    tidak_dapat = 54;
    dapat_all = dapat/70;
    tidak_dapat_all = tidak_dapat/70;

    dapat_x = dapat_penguasaanB * dapat_jenisL * dapat_jenisD * dapat_kualitasB * dapat_jenisA * dapat_kualitasA * dapat_sumberA * dapat_dayalis;

    tidak_dapat_x = tidak_dapat_penguasaanB * tidak_dapat_jenisL * tidak_dapat_jenisD * tidak_dapat_kualitasB * tidak_dapat_jenisA * tidak_dapat_kualitasA * tidak_dapat_sumberA * tidak_dapat_dayalis;

    dapat_prediction = dapat_x * dapat_all;
    tidak_prediction = tidak_dapat_x * tidak_dapat_all;
    document.querySelectorAll("#hasil")[0].value = (dapat_prediction > tidak_prediction)? "Dapat ":"Tidak Dapat";
    document.form_.elements["dapatPr"].value = dapat_prediction.toFixed(5);
    document.form_.elements["tidakPr"].value = tidak_prediction.toFixed(5);
  }
  function getReady(e){
    e.preventDefault();
    var penguasaanB = document.form_.elements["status_bangunan"].value;
    var jenisL = document.form_.elements["jenis_lantai"].value;
    var jenisD = document.form_.elements["jenis_dinding"].value;
    var kualitasB = document.form_.elements["kualitas_bang"].value;
    var jenisA = document.form_.elements["jenis_atap"].value;
    var kualitasA = document.form_.elements["kualitas_atap"].value;
    var sumberA = document.form_.elements["sumber_air"].value;
    var dayalis = document.form_.elements["daya_listrik"].value;
  
     naive_bayes(penguasaanB, jenisL, jenisD, kualitasB, jenisA, kualitasA, sumberA, dayalis);
  }
</script>

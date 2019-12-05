 <script>
$(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
  

<div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tentukan
          <small>Prediksi Penerima Bantuan </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > Tentukan Bantuan</a></li>
        </ol>
      </section>
            <section class="content">
              <div class="row">
                 <div class="col-xs-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-green-active">
                            <center><h3 class="widget-user-username">Pilih File Excel</h3></center>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo base_url(); ?>assets/img/excel.png" alt="User Avatar">
                          </div>
                          <div class="box-footer">
                            <div class="row">
                              <div class="col-sm-4 border-right">
                                <div class="description-block">
                                  <h5 class="description-header">  </h5>
                                  <br>
                                  <a href="<?php echo base_url("excel/Format Data Uji.xlsx"); ?>" class="badge bg-green-active">
                                  <i class="fa fa-download"></i> Download Format
                                </a>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <form method="post" action="<?php echo base_url("tentukan_bantuan/form"); ?>" enctype="multipart/form-data">
                                <br>
                              <div class="col-sm-4 border-right">
                                <div class="description-block">
                                  <div class="col-xs-3">
                                        <input type="file" name="file">
                                  </div>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-4">
                                <div class="description-block">
                                  <h5 class="description-header">   </h5>
                                  <div class="col-xs-10">
                                    <button class="badge bg-green-active" type="submit"  name="preview" class="glyphicon glyphicon-ruble"> Prediksi </button>
                                  </div>
                                </div>
                                <!-- /.description-block -->
                              </div>
                            </form>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                        <!-- /.widget-user -->
                  </div>
                </div>
                  </section>
</div>
                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                       <div class="box box-info">
                          <div class="box-header with-border">
                          <h3 class="box-title">Tabel Preview</h3> 
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
 
                            <?php
                                if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                                  if(isset($upload_error)){ // Jika proses upload gagal
                                    echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                    die; // stop skrip
                                  }
                                  
                                  // Buat sebuah div untuk alert validasi kosong
                                  echo "<div style='color: red;' id='kosong'>
                                  Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                                  </div>";
                                  // Buat sebuah tag form untuk proses import data ke database
                                  echo "<form id='form-save' method='post' action='' ";
                                  
                                  
                                  echo "<table border='1' cellpadding='8'>
                                  <tr>
                                   <div class='box-body'>
                                    <div class='table-responsive'>
                                    <table class='table table-bordered table-striped' id='example2'>
                                  <th colspan='17'>Tampil Data Prediksi</th>
                                  </tr>
                                  <tr>
                                    <th>NO KK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status Bangunan</th>
                                    <th>Jenis Lantai</th>
                                    <th>Jenis Dinding</th>
                                    <th>Kualitas Bangunan</th>
                                    <th>Kualitas Atap</th>
                                    <th>Jenis Atap</th>
                                    <th>Sumber Air</th>
                                    <th>Daya Listrik</th>
                                    <th style= 'color: red';>Hasil Dapat</th>
                                    <th style= 'color: red';>Hasil T.Dapat</th>
                                    <th style='color: blue;'>Keputusan </th>
                                  </tr>";
                                  
                                  $numrow = 1;
                                  $kosong = 0;
                                  
                                  // Lakukan perulangan dari data yang ada di excel
                                  // $sheet adalah variabel yang dikirim dari controller
                                  foreach($sheet as $row){ 
                                    // Ambil data pada excel sesuai Kolom
                                    $no_kk = $row['A']; 
                                    $nama = $row['B']; 
                                    $alamat = $row['C']; 
                                    $status_bangunan = $row['D']; 
                                    $jenis_lantai = $row['E'];
                                    $jenis_dinding = $row['F'];
                                    $kualitas_bang = $row['G'];
                                    $kualitas_atap = $row['H'];
                                    $jenis_atap = $row['I'];
                                    $sumber_air = $row['J'];
                                    $daya_listrik = $row['K'];

                                    $naive->data_set($status_bangunan,
                                      $jenis_lantai,
                                      $jenis_dinding,
                                      $kualitas_bang,
                                      $kualitas_atap,
                                      $jenis_atap,
                                      $sumber_air,
                                      $daya_listrik);

                                    $perhitungan = $naive->mining();
                                    // $hasil_dapat = $row['L'];
                                    // $hasil_tdapat = $row['M'];
                                    // $hasil_prediksi = $row['N'];

                                    // Cek jika semua data tidak diisi
                                    if(empty($no_kk) && empty($nama) && empty($alamat) && empty($status_bangunan) && empty($jenis_lantai) && empty($jenis_dinding) && empty($kualitas_bang) && empty($kualitas_atap) && empty($jenis_atap) && empty($sumber_air) && empty($daya_listrik))
                                      continue; // Tambah 1 variabel $kosong
                                    
                                  
                                    if($numrow > 1){
                                      // Validasi apakah semua data telah diisi
                                      $no_kk_td = ( ! empty($no_kk))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                      $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                      $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                      $status_bangunan_td = ( ! empty($status_bangunan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                      $jenis_lantai_td = ( ! empty($jenis_lantai))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                      $jenis_dinding_td = ( ! empty($jenis_dinding))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                      $kualitas_bang_td = ( ! empty($kualitas_bang))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                      $kualitas_atap_td = ( ! empty($kualitas_atap))? "" : " style='background: #E07171;'";

                                      $jenis_atap_td = ( ! empty($jenis_atap))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                      $sumber_air_td = ( ! empty($sumber_air))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                      $daya_listrik_td = ( ! empty($daya_listrik))? "" : " style='background: #E07171;'"; // 
                                      
                                      // Jika salah satu data ada yang kosong
                                      if(empty($no_kk) or empty($nama) or empty($alamat) or empty($status_bangunan) or empty($jenis_lantai) or empty($jenis_dinding) or empty($kualitas_bang) or empty($kualitas_atap) or empty($jenis_atap) or empty($sumber_air) or empty($daya_listrik)){
                                        $kosong++; // Tambah 1 variabel $kosong
                                      }
                                      
                                      echo "<tr>";
                                      echo "<td".$no_kk_td.">".$no_kk."<input type='hidden' name='no_kk[]' value='$no_kk'/> </td>";
                                      echo "<td".$nama_td.">".$nama."<input type='hidden' name='nama[]' value='$nama'/></td>";
                                      echo "<td".$alamat_td.">".$alamat."<input type='hidden' name='alamat[]' value='$alamat'/></td>";
                                      echo "<td".$status_bangunan_td.">".$status_bangunan."<input type='hidden' name='status_bangunan[]' value='$status_bangunan'/></td>";
                                      echo "<td".$jenis_lantai_td.">".$jenis_lantai."<input type='hidden' name='jenis_lantai[]' value='$jenis_lantai'/></td>";
                                      echo "<td".$jenis_dinding_td.">".$jenis_dinding."<input type='hidden' name='jenis_dinding[]' value='$jenis_dinding'/></td>";
                                      echo "<td".$kualitas_bang_td.">".$kualitas_bang."<input type='hidden' name='kualitas_bang[]' value='$kualitas_bang'/></td>";
                                      echo "<td".$kualitas_atap_td.">".$kualitas_atap."<input type='hidden' name='kualitas_atap[]' value='$kualitas_atap'/></td>";
                                      echo "<td".$jenis_atap_td.">".$jenis_atap."<input type='hidden' name='jenis_atap[]' value='$jenis_atap'/></td>";
                                      echo "<td".$sumber_air_td.">".$sumber_air."<input type='hidden' name='sumber_air[]' value='$sumber_air'/></td>";
                                      echo "<td".$daya_listrik_td.">".$daya_listrik."<input type='hidden' name='daya_listrik[]' value='$daya_listrik'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Dapat'], 5)."<input type='hidden' name='dapat[]' value='".round($perhitungan['nilai']['Dapat'], 5)."'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Tidak Dapat'], 5)."<input type='hidden' name='Tidak_Dapat[]' value='".round($perhitungan['nilai']['Tidak Dapat'], 5)."'/></td>";
                                      echo "<td style= 'color: blue';>".$perhitungan['Status']."<input type='hidden' name='Status[]' value='".$perhitungan['Status']."'/></td>";
                                      echo "</tr>";
                                    }
                                    
                                    $numrow++; // Tambah 1 setiap kali looping
                                  }
                                  
                                  echo "</table>";
                                  
                                  // Cek apakah variabel kosong lebih dari 0
                                  // Jika lebih dari 0, berarti ada data yang masih kosong
                                  if($kosong > 0){
                                  ?>  
                                    <script>
                                    $(document).ready(function(){
                                      // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                      $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                      
                                      $("#kosong").show(); // Munculkan alert validasi kosong
                                    });
                                    </script>
                                  </div>
                                  </div>
                                  <?php
                                  }else{ // Jika semua data sudah diisi
                                    echo "<hr>";
                                    
                                    // Buat sebuah tombol untuk mengimport data ke database
                                    echo "<button type='submit' class='btn btn-success'>Simpan</button>";
                                    echo " ";
                                    echo "<a href='".base_url("index.php/tentukan_bantuan")."'class='btn btn-danger'>Cancel</a>";
                                    echo " ";
                                    // echo "<button type='button' name='save' id='save' class='btn btn-info'>Simpan</button>";
                                  }
                                  echo "</form>";
                                }
                                ?>     
                                  <div id="insert_item_data"></div>
                        </div>
                          </div>
                            </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>
</div>
<script>
  $(document).ready(function(){
    
    $('.btn-success').click(function(e){
      e.preventDefault();
      $.ajax({
        url:"<?php echo base_url().'tentukan_bantuan/simpan'; ?>",
        data:$('#form-save').serialize(),
        method:'POST',
        success:function(data){
          console.log(data);
          swal("sukses","Data Berhasil Di Simpan", "success");
        },
        error:function(data){
          swal("Oops....", "Data Gagal Disimpa :(", "error");
        }

      }).fail(function(t, j){
      
      });
    });
      
  });

</script>

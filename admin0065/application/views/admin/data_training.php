<div class="content-wrapper">
        <section class="content-header">
        <h1>
          Data Master
          <small>Data Training </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home > Data Training</a></li>
        </ol>
      </section>
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Training!!',
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
                            <h3 class="box-title">Data Training</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width ='20%'>Nama</th>
                                            <th width ='20%'>Alamat</th>
                                            <th>Penguasaan B.</th>
                                            <th>Jenis Lantai T.</th>
                                            <th>Jenis Dinding T.</th>
                                            <th>Kualitas Bangunan</th>
                                            <th>Jenis Atap T.</th>
                                            <th>Kualitas Atap</th>
                                            <th>Sumber Air</th>
                                            <th>Daya Listrik</th>
                                            <th>Status</th>
                                            <th width ='6%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no= 0; foreach ($list as $g ): $no++;?>
                                  <tr>
                                    <td><?php echo $g->id; ?></td>
                                    <td><?php echo $g->nama; ?></td>
                                    <td><?php echo $g->alamat; ?></td>
                                    <td><?php echo $g->status_penguasaan_B; ?></td>
                                    <td><?php echo $g->jenis_lantai_terluas; ?></td>
                                    <td><?php echo $g->jenis_dinding_terluas; ?></td>
                                    <td><?php echo $g->kualitas_bangunan; ?></td>
                                    <td><?php echo $g->jenis_atap_terluas; ?></td>
                                    <td><?php echo $g->kualitas_atap; ?></td>
                                    <td><?php echo $g->sumber_air; ?></td>
                                    <td><?php echo $g->daya_listrik; ?></td>
                                    <td><?php echo $g->setatus; ?></td>
                                    <td align="center">

                                     <a type="button" data-toggle="modal" data-target="#modal-edit<?=$g->id;?>" class="btn btn-success btn-xs"  data-placement="top"  title="Edit"><i class="fa fa-spinner"></i></a>

                                     <a href="<?php echo site_url('Data_training/delete/'.$g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-success btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash-o"></i></a>
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
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah" ><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data </button>
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
<!-- modal tambah Data -->

<div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Data_training/tambah_data'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Isikan Data & Kriteria</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class='col-md-4'>Nama Lengkap</label>
            <div class='col-md-8'><input type="text" name="nama" autocomplete="off" placeholder="Nama Penduduk" class="form-control"
              required="" ></div>
          </div>
          <div class="form-group">
                    <label class='col-md-4'>Alamat</label>
                    <div class='col-md-8'><textarea type="text" name="alamat" autocomplete="off" required placeholder="ALAMAT" class="form-control" required=""></textarea></div>
                  </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-4">Status Bangunan</label>
              <div class="col-md-8">
              <select name="status_penguasaan_B" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="Milik Sendiri">Milik Sendiri</option>
                    <option value="Bebas Sewa">Bebas Sewa</option>
              </select>
              </div>
              </div>
              <br>
            <div class="form-group">
              <label class="control-label col-md-4">Jenis Lantai</label>
              <div class="col-md-8">
              <select name="jenis_lantai_terluas" class="form-control">
                    <option value="">Pilih Jenis Lantai</option>
                    <option value="Kramik">Kramik</option>
                    <option value="Tanah">Tanah</option>
                    <option value="Ubin">Ubin</option>
                    <option value="Sementara/bata merah">Sementara / Plesteran</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Jenis Dinding</label>
              <div class="col-md-8">
              <select name="jenis_dinding_terluas" class="form-control">
                    <option value="">Pilih Jenis Dinding</option>
                    <option value="Bambu">Bambu</option>
                    <option value="Tembok">Tembok</option>
              </select>
              </div>
              </div>
                <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kualitas Bangunan</label>
              <div class="col-md-8">
              <select name="kualitas_bangunan" class="form-control">
                    <option value="">Pilih Kualitas Bangunan</option>
                    <option value="Kualitas Rendah">Kualitas Rendah</option>
                    <option value="Bagus">Bagus</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kualitas Atap</label>
              <div class="col-md-8">
              <select name="kualitas_atap" class="form-control">
                    <option value="">Pilih Kualitas Atap</option>
                    <option value="Kualitas Rendah">Kualitas rendah</option>
                    <option value="Bagus">Bagus</option>
              </select>
              </div>
              </div>
              <br>
                <div class="form-group">
                          <label class="control-label col-md-4">Jenis Atap</label>
                          <div class="col-md-8">
                          <select name="jenis_atap_terluas" class="form-control">
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
                          <div class="col-md-8">
                          <select name="sumber_air" class="form-control">
                              <option value="">Pilih Sumber Air</option>
                              <option value="Ledeng Meteran">Ledeng Meteran</option>
                              <option value="Air Isi Ulang">Air isi Ulang</option>
                              <option value="Sumur">Sumur</option>
                          </select>
                          </div>
                      </div>
          <br>
          <div class="form-group">
                          <label class="control-label col-md-4">Daya Listrik</label>
                          <div class="col-md-8">
                          <select name="daya_listrik" class="form-control">
                              <option value="">Pilih Daya Listik</option>
                              <option value="450 W">450 W</option>
                              <option value="900 W">900 W</option>
                              <option value="1300 W">1300 W</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Status</label>
              <div class="col-md-8">
              <select name="setatus" class="form-control">
                    <option value="">Pilih Status</option>
                    <option value="Dapat">Dapat</option>
                    <option value="Tidak Dapat">Tidak Dapat</option>
                    
              </select>
              </div>
              </div>
      </br><br><br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>    
</div>
</div>
</div>

<!-- modal Edit -->
<?php $no=  0; foreach($list as $g  ): $no++;?>
<div id="modal-edit<?=$g->id;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Data_training/adit_training'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Isikan Data & Kriteria</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class='col-md-4'>ID</label>
            <div class='col-md-8'><input type="text" value="<?=$g->id;?>" name="id" autocomplete="off" class="form-control" readonly=""
              required="" ></div>
          </div>
          <div class="form-group">
            <label class='col-md-4'>Nama Lengkap</label>
            <div class='col-md-8'><input type="text" value="<?=$g->nama;?>" name="nama" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <div class="form-group">
            <label class='col-md-4'>Alamat</label>
            <div class='col-md-8'><input type="text" value="<?=$g->alamat;?>" name="alamat" autocomplete="off"  class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-4">Status Bangunan</label>
              <div class="col-md-8">
              <select name="status_penguasaan_B" class="form-control">
                    <option value="<?=$g->status_penguasaan_B;?>"><?=$g->status_penguasaan_B;?></option>
                    <option value="Milik Sendiri">Milik Sendiri</option>
                    <option value="Bebas Sewa">Bebas Sewa</option>
              </select>
              </div>
              </div>
              <br>
            <div class="form-group">
              <label class="control-label col-md-4">Jenis Lantai</label>
              <div class="col-md-8">
              <select name="jenis_lantai_terluas" class="form-control">
                    <option value="<?=$g->jenis_lantai_terluas;?>"><?=$g->jenis_lantai_terluas;?></option>
                    <option value="Kramik">Kramik</option>
                    <option value="Tanah">Tanah</option>
                    <option value="Ubin">Ubin</option>
                    <option value="Sementara/bata merah">Sementara / Plesteran</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Jenis Dinding</label>
              <div class="col-md-8">
              <select name="jenis_dinding_terluas" class="form-control">
                    <option value="<?=$g->jenis_dinding_terluas;?>"><?=$g->jenis_dinding_terluas;?></option>
                    <option value="Bambu">Bambu</option>
                    <option value="Tembok">Tembok</option>
              </select>
              </div>
              </div>
                <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kualitas Bangunan</label>
              <div class="col-md-8">
              <select name="kualitas_bangunan" class="form-control">
                    <option value="<?=$g->kualitas_bangunan;?>"><?=$g->kualitas_bangunan;?></option>
                    <option value="Kualitas Rendah">Kualitas rendah</option>
                    <option value="Bagus">Bagus</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kualitas Atap</label>
              <div class="col-md-8">
              <select name="kualitas_atap" class="form-control">
                    <option value="<?=$g->kualitas_atap;?>"><?=$g->kualitas_atap;?></option>
                    <option value="Kualitas Rendah">Kualitas rendah</option>
                    <option value="Bagus">Bagus</option>
              </select>
              </div>
              </div>
              <br>
                <div class="form-group">
                          <label class="control-label col-md-4">Jenis Atap</label>
                          <div class="col-md-8">
                          <select name="jenis_atap_terluas" class="form-control">
                              <option value="<?=$g->jenis_atap_terluas;?>"><?=$g->jenis_atap_terluas;?></option>
                              <option value="Seng">Seng</option>
                              <option value="Asbes">Asbes</option>
                              <option value="Genteng">Genteng</option>
                          </select>
                          </div>
                </div>
                <br>
               <div class="form-group">
                          <label class="control-label col-md-4">Sumber Air</label>
                          <div class="col-md-8">
                          <select name="sumber_air" class="form-control">
                              <option value="<?=$g->sumber_air;?>"><?=$g->sumber_air;?></option>
                              <option value="Ledeng Meteran">Ledeng Meteran</option>
                              <option value="Air Isi Ulang">Air isi Ulang</option>
                              <option value="Sumur">Sumur</option>
                          </select>
                          </div>
                      </div>
          <br>
          <div class="form-group">
                          <label class="control-label col-md-4">Daya Listrik</label>
                          <div class="col-md-8">
                          <select name="daya_listrik" class="form-control">
                              <option value="<?=$g->daya_listrik;?>"><?=$g->daya_listrik;?></option>
                              <option value="450 W">450 W</option>
                              <option value="900 W">900 W</option>
                              <option value="1300 W">1300 W</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Status</label>
              <div class="col-md-8">
              <select name="setatus" class="form-control">
                    <option value="<?=$g->setatus;?>"><?=$g->setatus;?></option>
                    <option value="Dapat">Dapat</option>
                    <option value="Tidak Dapat">Tidak Dapat</option>
                    
              </select>
              </div>
              </div> 
      </br><br><br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Ubah</button>
          </div>
        </form>
    </div>
  </div>
</div>    
</div>
</div>
</div>
<?php endforeach;?>
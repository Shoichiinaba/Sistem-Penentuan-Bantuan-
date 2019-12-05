<li class="treeview active">
          <li <?=$this->uri->segment(1) =='Data_training' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('Data_training'); ?>">
            <i class=" fa fa-file-excel-o"></i> <span>Data Training</span>
          </a></li>

          <li <?=$this->uri->segment(1) =='tentukan_bantuan' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('tentukan_bantuan'); ?>">
            <i class=" fa fa-subscript"></i> <span>Tentukan Bantuan</span>
          </a></li>

          <li <?=$this->uri->segment(1) =='hitung_individu' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('hitung_individu'); ?>">
            <i class=" fa fa-slideshare"></i> <span>Hitung Individu</span>
          </a></li>

          <li <?=$this->uri->segment(1) =='tampil_terproses' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('tampil_terproses'); ?>">
            <i class=" fa fa-clipboard"></i> <span>Pengajuan Sudah Diproses</span>
          </a></li>

</li> 

<li class="treeview">

          <a href="#">
            <i class="fa fa-users"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/tambah_user'); ?>"><i class="fa fa-user-plus"></i> Tambah Admin</a></li>

            <li><a href="<?php echo site_url('admin/tampil_admin'); ?>"><i class="fa  fa-list-alt"></i> List Data Admin</a></li>
          </ul>
</li>

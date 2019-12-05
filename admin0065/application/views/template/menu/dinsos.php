<li class="treeview active">
          <li <?=$this->uri->segment(1) == 'approve' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('approve'); ?>">
            <i class=" fa fa-share-square"></i> <span>Approve Bantuan</span>
          </a></li>

          <li <?=$this->uri->segment(1) == 'dinsos' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('dinsos'); ?>">
            <i class=" fa fa-stack-overflow"></i> <span>List Warga Dapat Bantuan</span>
          </a></li>
</li> 
<li class="treeview ">

          <a href="#">
            <i class="fa fa-users"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/tambah_user'); ?>"><i class="fa fa-user-plus"></i> Tambah Admin</a></li>

            <li><a href="<?php echo site_url('admin/tampil_admindin'); ?>"><i class="fa  fa-list-alt"></i> List Data Admin</a></li>
          </ul>
</li>

<li class="treeview active">
          <li <?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
          	<a href="<?php echo site_url('admin'); ?>">
            <i class=" fa fa-database"></i> <span>Dashboard</span>
          </a></li >
</li>
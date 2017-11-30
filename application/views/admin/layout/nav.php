<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">
<li class="text-center">
      <img src="<?php echo base_url()?>assets/admin/assets/img/find_user.png" class="user-image img-responsive"/>

   <!-- Modul User -->
        <li><a href="#"><i class="fa fa-user"></i>Administrator<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
              <li><a href="<?php echo base_url('admin/user') ?> ">Data Admin</a></li>
              <li><a href="<?php echo base_url('admin/user/tambah') ?> ">Tambah Admin</a></li>

</ul>
</li>


      <!-- Modul posting -->
<li><a href="#"><i class="fa fa-newspaper-o"></i> Posting<span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
      <li><a href="<?php echo base_url('admin/posting') ?>"> Data posting</a></li>
      <li><a href="<?php echo base_url('admin/posting/tambah') ?>"> Tambah posting</a></li> 
      <li><a href="<?php echo base_url('admin/kategori_posting') ?>"> Kategori posting</a></li> 

</ul>
</li>

<!-- Modul penawaran -->
<li><a href="#"><i class="fa fa-newspaper-o"></i> Penawaran<span class="fa arrow"></span></a>
  <ul class="nav nav-second-level">
      <li><a href="<?php echo base_url('admin/pesan') ?>"> Data Penawaran</a></li>

</ul>
</li>


     
</ul>

</div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h1><?php echo $title ?></h1>
        </div>
    </div>
     <!-- /. ROW  -->
     <hr />

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
          <div class="panel-body">
                <div class="table-responsive">

<div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <div class="main-bar">
            <h3>
              <i class="fa fa-user"></i>&nbsp; User</h3>
            </div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-12">
                <div class="box">
                  <header>
                    
                   
                    </header>
                             <?php
                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                      }
                    ?>
                <div class="col-lg-6">
                <div class="box">
                  <header>
                    <h5>Nama Lengkap :</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    <?php echo $user->nama ?>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>Email :</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    <?php echo $user->email ?>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h5>No Telepon :</h5>
                    <div class="body">
                    <?php echo $user->no_telp ?>
                    </div>
                  </header>
                  
                
                </div>
                <div class="box">
                  <header>
                    <h5>Hak Akses :</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                    <?php echo $user->akses_level ?>
                    
                  </div>

                </div>
              </div><!-- /.col-lg-4 --> 
              
              <div class="col-lg-4">
                <div class="box">
                  <header>
                    <h5>Photo Profile</h5>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                            <img src="<?php echo base_url('/assets/upload/image/'.$user->gambar) ?>" width="150" height="200">
                  </div>
                </div>
              </div><!-- /.col-lg-4 -->                         
<div class="col-md-8">

 <div>
    <div align="right">
    <p>  <a href="<?php echo base_url('admin/user')?>" class="btn btn-info btn-md"><i class="fa fa-user "></i> Kembali ke list User</a> 
    <a href="<?php echo base_url('admin/user/edit/'.$user->id_user)?>" class="btn btn-success btn-md"><i class="fa fa-edit"></i> Edit Profile</a>
  <a href="<?php echo base_url('admin/user/profile_edit_password/'.$user->id_user)?>" class="btn btn-primary btn-md"><i class="glyphicon glyphicon-cog "></i> Ubah Password</a>


    </p>
    </div>
</div>


                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <!--End Datatables-->
           
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
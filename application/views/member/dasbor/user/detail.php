
<div id="content">
    
            <h3>
<br></br>
<br></br>
<!--    Bordered Table  -->
                  <div class="panel panel-default">

                      <div class="panel-body">
              <i class="fa fa-user"></i>&nbsp; User</h3>
            </div>
            <!--Begin Datatables-->
            <div class="row">
              <div class="col-lg-14">
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

                    <!--    Bordered Table  -->
                  <div class="panel panel-default">

                      <div class="panel-body">
                     <div class="box">
                  <header>
                    <h4>Photo Profile</h4>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                            <img src="<?php echo base_url('/assets/upload/image/'.$user->gambar) ?>" width="250" height="250">
                  </div>
                </div>
                <div class="col-lg-11">
                <div class="box">
                  <header>
                    <h3>Nama Lengkap :</h3>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                 <h4>   <?php echo $user->nama ?></h4>
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h3>Username :</h3>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                 <h4>     <?php echo $user->username ?></h4>  
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h3>Email :</h3>
                    <div class="toolbar">
                    </div>
                  </header>
                  <div class="body">
                 <h4>     <?php echo $user->email ?></h4>  
                  </div>
                </div>
                <div class="box">
                  <header>
                    <h3>No Telepon :</h3>
                    <div class="body">
                   <h4>   <?php echo $user->no_telp ?></h4>  
                    </div>
                  </header>
                  
                
          <br></br>

     
   <div class="col-md-12">
<div class="form-group">
    <a href="<?php echo base_url('member/user/edit/'.$user->id_user)?>" class="btn btn-success btn-md"><i class="fa fa-edit"></i> Edit Profile</a>
  <a href="<?php echo base_url('member/user/profile_edit_password/'.$user->id_user)?>" class="btn btn-success btn-md"><i class="glyphicon glyphicon-cog "></i> Ubah Password</a>

<br>
</br>
<br>
</br>
<br>
</br>

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
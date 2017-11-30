<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url()?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url()?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url()?>assets/admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2>Register</h2>
               <?php
                    echo validation_errors('<div class="alert alert-warning">','</div>'); 

                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                        
                    } ?>
                <h5>( Register Member Baru )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               <?php echo form_open(base_url('register/tambah')) ?>
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Member baru ? Silakan mengisi form pendaftaran </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form"><br/>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control" placeholder="Nama Lengkap" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="username" value="<?php echo set_value('username') ?>" class="form-control" placeholder="Username" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Email" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" value="<?php echo set_value('email') ?>" class="form-control" placeholder="Password" />
                                        </div>
                                     
                                     <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
                                    <hr />
                                    Sudah Register ?  <a href="<?php echo base_url('login')?>" >Login disini</a>
                                    </form>
                            </div>
                           <?php echo form_close() ?>
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url()?>assets/admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url()?>assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url()?>assets/admin/assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url()?>assets/admin/assets/js/custom.js"></script>
   
</body>
</html>

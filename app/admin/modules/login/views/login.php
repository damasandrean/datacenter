<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customer/css/kangenkampung.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
</head>
<style type="text/css">
 .loader {
position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transform: -webkit-translate(-50%, -50%);
    transform: -moz-translate(-50%, -50%);
    transform: -ms-translate(-50%, -50%);
    color:darkred;
}
</style>
<div id="page-load" style="position: fixed; z-index: 999999; opacity: 0.7;  background: white; width: 100%; height: 100%; display: block;top: 0;  ">
    <div class="loader">
      <div>
        <img src="<?php echo base_url(); ?>/assets/loading.gif"></div>
      </div>
 </div>

<body class="body-register">
    <nav>
    <center>
        <div class="logo-register" >
                                <img src="<?php echo base_url(); ?>assets/admin/images/kominfo.webp" class="img-thumbnail" width="200px" height="250px">
        </div>  
        <div>
                                <label class="text-register-image">Selamat Datang Diportal Data Center</label>
                                
        </div>
    </center>
    </nav>
    <div class="content-daftar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-cart-one">
                        <div style="text-align: center;margin-top: 2%">
                            <label style="font-size: 23px;font-weight: bold;">Silahkan Login</label>
                        </div>
                        <div style="padding: 5%">
                                <!-- email -->
                                <div >
                                    <label  style="font-size: 12px;color: grey">Username</label>
                                    <input type="text" name="" class="form-control" id="username">
                                </div>

                                <div >
                                    <label  style="font-size: 12px;color: grey">Password</label>
                                    <input type="password" name="" class="form-control" id="password">
                                </div>

                                <!-- email -->
                                <div>
                                    <div style="margin-top: 2%"></div>
                                    <button class="btn btn-primary" style="width: 100%" onclick="login()">Masuk</button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 hide-mobile">
                    <div class="div-register-image"> 
                        <img src="<?php echo base_url(); ?>assets/admin/images/kominfo.png" class="register-image">
                        <center>
                                <label style="font-weight: bold;color: blue;font-size: 25px">KEMENTRIAN INFORMASI DAN INFORMATIKA REPUBLIK INDONESIA</label>
                                <label style="font-weight: bold;color: blue;font-size: 15px">Menuju Masyarakat Informasi Indonesia</label>
                        </center>
                    </div>
                </div>
            </div>
            <div class="bottom-navigation-mobile" style="margin-top: 5%">
        </div>
    </div>
</body>
<footer class="footer-div">
        
        </div>

</footer>


    <?= $this->load->view('js/js')?>
 <script src="<?php echo base_url(); ?>assets/admin/ajaxFunction.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/vendor/bootstrap.bundle.min.js "></script>
<script src="<?php echo base_url(); ?>assets/admin/js/vendor/perfect-scrollbar.min.js "></script>
<script src="<?php echo base_url(); ?>assets/admin/js/vendor/echarts.min.js "></script>

<script src="<?php echo base_url(); ?>assets/admin/js/es5/echart.options.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/es5/dashboard.v4.script.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/es5/script.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/es5/sidebar.large.script.min.js"></script>
<script src="<?php echo base_url(); ?>assets/customer/js/kangenkampung.js"></script>
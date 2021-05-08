<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=data_app()?></title>

    <link href="<?=base_url()?>assets/vendor/inspinia/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">
       <link href="<?=base_url()?>assets/vendor/sweetalert/css/sweetalert.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Morris -->
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
 <!-- <link rel="stylesheet" href="<?=base_url()?>assets/vendor/datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->

    <link href="<?=base_url()?>assets/vendor/datepicker/css/datepicker3.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/radiocheck/radiocheck.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/vendor/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/vendor/radiocheck/radioonoff.css"/>
    <!-- <link href="<?=base_url()?>assets/vendor/inspinia/css/animate.css" rel="stylesheet"> -->
<script src="<?=base_url()?>assets/vendor/inspinia/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/bootstrap.min.js"></script>
    <style>
  html { height: 100% !important; }
  body { height: 100% !important; padding-bottom: 30px; }
  .footer { position: fixed; left: 0; right: 0; bottom: 0; }
   .table-condensed{
  font-size: 13px;
}
</style>
</head>
<?php
$CI = &get_instance();
lookup();
//panggil sf_helper
$CI->load->model('Users_model');
// $jml_upload_risalah      = $CI->Upload_risalah_model->total_rows();
// Penarikan jumlah data untuk syarat

// $CI->load->model('Kelengkapan_model');
// $jml_kelengkapan = $CI->Kelengkapan_model->total_rows();

?>
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                        <?php if ($this->session->userdata('foto') != '' && file_exists(FCPATH . "assets/foto_users/" . $this->session->userdata('foto'))) { //die('a');?>
                            <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/<?=$this->session->userdata('foto')?>" style="width: 45px;" />
                        <?php } else {?>
                            <img alt="image" class="img-circle" src="<?=base_url()?>assets/foto_users/a4.jpg" style="width: 45px;" />
                        <?php }?>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$CI->Users_model->get_by_id($this->session->userdata('id_user'))->fullname?></strong>
                             </span> <span class="text-muted text-xs block">Tentang <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#"><?=$this->session->userdata('email')?></a></li>
                            <li><a href="#"><?=$this->session->userdata('telp')?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url()?>auth/logout">Keluar</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        ER+
                    </div>
                </li>
                <?php
//MENU DARI TABEL sy_menu
foreach ($this->db->order_by("order_no", "ASC")->get_where('sy_menu', array('parent' => 0))->result() as $kmenu0 => $vmenu0) {?>
                <li class="<?=strtolower(activate_menu($vmenu0->note))?>"><a href="<?=base_url()?><?=$vmenu0->url?>"><i class="fa <?=$vmenu0->icon?>"></i> <span class="nav-label"><?=$vmenu0->label?></span><span class="label label-primary pull-right"></span></a>
                <?php foreach ($this->db->get_where('sy_menu', array('parent' => $vmenu0->id_menu))->result() as $kmenu1 => $vmenu1) {?>
                   <ul class="nav nav-second-level">
                         <li><a href="<?=base_url()?><?=$vmenu1->url?>"><i class="fa <?=$vmenu1->icon?>"></i><?=$vmenu1->label?>
                         <!-- <span class="label label-primary pull-right">12</span> -->
                     </a></li>


                    </ul>
                <?php }?>

                </li>
                <?php }?>

            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Cari apa ..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?=data_app('APP_NAME')?>, <?=data_app('OPD_NAME')?></span>
                </li>

                <li>
                    <a href="<?=base_url() . 'auth/logout'?>">
                        <i class="fa fa-sign-out"></i> Keluar
                    </a>
                </li>
            </ul>

        </nav>
        </div>


        <div class="wrapper wrapper-content">
        <div class="table-responsive" >
        <?php $this->load->view($content);?>
        </div>
        </div>

        </div>
        <div class="footer">
            <div class="pull-right">
                <?=data_app('RIGHT_FOOTER');?>
            </div>
            <div>
                <?=data_app('LEFT_FOOTER');?>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->

    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=base_url()?>assets/vendor/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Sparkline -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/toastr/toastr.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/inspinia/js/plugins/iCheck/icheck.min.js"></script>
    <script src="<?=base_url()?>assets/js/sf.js"></script>

    <script>
        $(document).ready(function() {

            // $(".m-t").iCheck();
        //      $('input').iCheck({
        //     checkboxClass: 'icheckbox_minimal-grey',
        //     radioClass: 'iradio_minimal-grey'
        // });
        // $('input.timepicker').timepicker({ timeFormat: 'h:mm'});
        $('input.datepicker').datepicker({ dateFormat: 'yy/mm/dd'});
        // $('input.datepicker-ym').datepicker({ dateFormat: 'mm/yy'});


        });

    </script>
</body>
</html>

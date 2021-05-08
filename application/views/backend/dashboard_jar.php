<?php
$CI = &get_instance();
lookup(); 

$jml_router    = $CI->db->count_all('router');
$jml_alat    = $CI->db->count_all('alat');
$jml_ap    = $CI->db->count_all('ap');
$jml_ip    = $CI->db->count_all('ip');
$jml_logs    = $CI->db->count_all('logs');
$jml_lokasi    = $CI->db->count_all('lokasi');

// $jml_kegiatan_verified = $CI->db->where('note',1)->from('lokasi')->count_all_results();
// //persen kegiatan
// $kegiatan_persen = intval($jml_kegiatan_verified/$jml_kegiatan);
// $kegiatan_persen = number_format((float)$jml_kegiatan_verified/$jml_kegiatan, 2, '.', '');

?>

<div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-md-3">
            <div class="col-lg-12">
                <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <i class="fa fa-pagelines fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total router yang tersedia </span>
                                <h2 class="font-bold"><?=$jml_roter?> Router</h2>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Total lokasi yang telah terhubung </span>
                            <h2 class="font-bold"><?=$jml_lokasi?> LOkasi</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-pie-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Prosentase Kegiatan Terpenuhi </span>
                            <h2 class="font-bold"><?=$kegiatan_persen?>%</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-files-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Syarat yang telah diverifikasi </span>
                            <h2 class="font-bold"><?=$jml_syarat_verified?> dari <?=$jml_syarat?> Syarat</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-area-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Prosentase Syarat Terpenuhi </span>
                            <h2 class="font-bold"><?=$syarat_persen?>%</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="col-md-9">
            <div class="widget-head-color-box navy-bg p-lg text-center">
                            <div class="m-b-md">
                            <h1 class="font-bold no-margins">
                                <?=data_app("APP_NAME")?>
                            </h1>
                                <h3><?=data_app("OPD_NAME")?></h3>
                            </div>
                            <img src="<?=base_url()?>assets/img/file.png" class="img-circle circle-border m-b-md" alt="profile">
                            <div>
                                <span><?=data_app("APP_DESC")?></span>
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading"><?=data_app("OPD_ADDR")?></h4>
                            <p><?=data_app("VISI_MISI")?></p>
                            <div class="text-right">
                                <a class="btn btn-xs btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-twitter"></i> Twitter</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-instagram"></i> Instagram</a>
                                <a class="btn btn-xs btn-primary"><i class="fa fa-whatsapp"></i> Whatsapp</a>
                            </div>
                        </div>
        </div>
        </div>
        </div>
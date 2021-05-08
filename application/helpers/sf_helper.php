<?php
// function get_data_kategori($for_modul)
// {
//     $ci                   = &get_instance();
//     $data_ref_anggota = $ci->db->join('kategori bb', 'aa.ket=bb.id_kategori', 'right')
//         ->where('bb.for_modul', $for_modul)
//         ->get('kategori aa')->result_array();
//     $ref_kategori = array();
//     foreach ($data_ref_anggota as $v) {
//         $ref_kategori[$v['id_kategori']] = $v['nama_kategori'];
//     }
//     return $ref_kategori;

// }
//--------------untuk bikin dropdown------------/


function is_logged()
{
    $ci = &get_instance();
    if ($ci->session->userdata('logged') != true) {
        redirect('Frontend', 'refresh');
    }
}


function is_allow($acs)
{
    $ci      = &get_instance();
    $lvl  = $_SESSION['level'];
    $isallow = $ci->db->query("SELECT * FROM user_access as aa inner join master_access as bb on aa.kd_access=bb.id WHERE bb.nm_access='$acs' and aa.id_group='$lvl'")->row();
    
    if ($isallow != []) {
        if ($isallow->is_allow == 1) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

function get_data_kategori($for_modul)
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->where('for_modul', $for_modul)
        ->get('kategori')->result_array();
    $ref_kategori = array();
    $ref_kategori = array(""=>">> Pilih");
    foreach ($data_kateg as $v) {
        $ref_kategori[$v['id_kat']] = $v['cat_name'];
    }
    return $ref_kategori;

}
function get_combo($tbl,$id,$nm,$add_opt)
{

    $ci = &get_instance();
    $data = $ci->db->get($tbl)->result_array();
    $res = array();
    $res = $add_opt;
    foreach ($data as $v) {
        $res[$v[$id]] = $v[$nm];
    }
    return $res;

}

function get_by_id_kategori($id)
{

    $ci                   = &get_instance();
    $data_kateg = $ci->db
        ->where('id_kat', $id)
        ->get('kategori')->row();
    $data_kateg->cat_name;
    return $data_kateg->cat_name;

}
// function get_data_dropdown($tbl,$where)
// {

//     $ci                   = &get_instance();
//     $data_tbl = $ci->db
//         ->where('for_modul', $for_modul)
//         ->get($tbl)->result_array();
//     $ref_kategori = array();
//     $ref_kategori = array(""=>">> Pilih");
//     foreach ($data_tbl as $v) {
//         $ref_kategori[$v['id_kat']] = $v['cat_name'];
//     }
//     return $ref_kategori;

// }

function data_app($id = 'APP_NAME')
{
    $ci            = &get_instance();
    $data_instansi = $ci->db->query("SELECT conf_val FROM sy_config WHERE conf_name='$id'")->row();

    if ($data_instansi != []) {
       return $data_instansi->conf_val;
    } else {
        return "";
    }
    
}

function layout($l = 'back')
{
    if ($l == 'front') {
        return "layout_frontend";
    } else {
        return "layout_backend";
    }
}

function cek_session_akses($link, $id)
{
    $ci      = &get_instance();
    $session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    if ($session == '0' and $ci->session->userdata('level') != 'admin') {
        redirect(base_url() . 'administrator/home');
    }
}

function get_data_users()
{
    $ci = &get_instance();
    $ci->db->select('*')
        ->where_in('level', array('2', '3'))
        ->where('isactive', 1);
    $data_users_disposisi = $ci->db->get('users')->result_array();
    $users_disposisi      = array();
    foreach ($data_users_disposisi as $v) {
        $users_disposisi[$v['id_user']] = $v['fullname'];
    }
    return $users_disposisi;
}

function get_numrows($tbl)
{
    $ci = &get_instance();
    $ci->db->select('*');
    $total_row = $ci->db->get($tbl)->num_rows();
    return $total_row;
}

function activate_menu($controller, $by = 'c')
{
    //c=controller, f=method/function
    // Getting CI class instance.
    $CI = get_instance();
    // Getting router class to active.
    if ($by == 'c') {
        $class = $CI->router->fetch_class();
    } elseif ($by == 'f') {
        $class = $CI->router->fetch_method();
    }
    return ($class == $controller) ? 'active' : '';
}

function format_rupiah($number)
{

    return 'Rp ' . number_format($number);
}

function formatBytes($size, $precision = 2)
{
    $base     = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');

    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function lookup()
{?>
<div class="modal" id="lookup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1><i class="fa fa-refresh"></i></h1>
                </div>
            </div>
        </div>
    </div>
<?php }


function nama_hari($day){
$dayList = array(
    'Sun' => 'Minggu',
    'Mon' => 'Senin',
    'Tue' => 'Selasa',
    'Wed' => 'Rabu',
    'Thu' => 'Kamis',
    'Fri' => 'Jumat',
    'Sat' => 'Sabtu'
);

return $dayList[$day];
}

function tanggal_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tahun
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tanggal
 
    echo $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function GenerateCode() {
    $possible ='123456789';
    $operator ='+x-';   
    $admin    = array('Edy S', 'Bima N', 'Zaki C');
    $a = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    $b = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    $opr = substr($operator, mt_rand(0, strlen($operator)-1), 1);
    if($opr=='+'){
        $res = $a + $b;
    }
    else if($opr=='x'){
        $res = $a * $b;
    }
    else{
        $res = $a - $b;
    }
    $code['adm']  = $admin[mt_rand(0, strlen($operator)-1)];
    $code['res']  = $res;
    $code['text'] = $a.' '.$opr.' '.$b.' =';
    return $code ;
}

function backupDB(){

// Try this, You can change format zip to gz if you like :)
$CI = get_instance();
$CI->load->dbutil();

$prefs = array(     
    'format'      => 'zip',             
    'filename'    => 'my_db_backup.sql'
    );


$backup =& $CI->dbutil->backup($prefs); 

$db_name = data_app(). date("Y-m-d-H-i-s") .'.zip';
$save = base_url().'assets/db/'.$db_name;

$CI->load->helper('file');
write_file($save, $backup); 


$CI->load->helper('download');
force_download($db_name, $backup);
}
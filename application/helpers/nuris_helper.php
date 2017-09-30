<?php
function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function cmb_kamar($name,$selected){
    $ci = get_instance();
    $load = $ci->load->model('Pemesanan_model');
    $cmb = "<select name='$name' class='js-example-basic-single form-control'>";
    $data = $ci->Pemesanan_model->get_kamar()->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->id_kamar."'";
        $cmb .= $selected==$d->id_kamar?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->kamar)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}


<?php
function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' id='$name' class='form-control'>";
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
    $cmb = "<select name='$name' id='$name' class='form-control'>";
    $data = $ci->Pemesanan_model->get_kamar()->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->id_kamar."'";
        $cmb .= $selected==$d->id_kamar?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->kamar)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_tamu($name,$selected){
    $ci = get_instance();
    $load = $ci->load->model('Pemesanan_model');
    $cmb = "<select name='$name' id='$name' class='form-control'>";
    $data = $ci->Pemesanan_model->get_tamu();
    foreach ($data as $d){
        $cmb .="<option value='".$d->id_tamu."'";
        $cmb .= $selected==$d->id_tamu?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->tamu)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cmb_promo($name,$selected){
    $ci = get_instance();
    $load = $ci->load->model('Pemesanan_model');
    $cmb = "<select name='$name' id='$name' class='form-control'>";
    $data = $ci->Pemesanan_model->get_promo()->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->id_promo."'";
        $cmb .= $selected==$d->id_promo?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->promo)."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}


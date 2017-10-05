<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{

    public $table = 'pemesanan';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_kamar(){
        $q = $this->db->query("select id_kamar, concat(no_kamar,' - ',nama_kamar) as kamar from kamar where status_kamar = 'available' ");
        return $q; 
    }

    function get_tamu(){
        $q = $this->db->query("select id_tamu, concat(nama_depan_tamu,' ',nama_belakang_tamu) as tamu from tamu order by id_tamu desc");
        return $q->result(); 
    }

    function get_promo(){
        $q = $this->db->query("select id_promo, concat(nama_promo,' -  ',diskon_promo,'%') as promo from promo where curdate() between promo_awal and promo_akhir");
        return $q; 
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pemesanan', $q);
	$this->db->or_like('id_pemesanan', $q);
	$this->db->or_like('waktu_pemesanan', $q);
	$this->db->or_like('uang_muka', $q);
	$this->db->or_like('sisa_bayar', $q);
	$this->db->or_like('total_harga', $q);
	$this->db->or_like('id_channel', $q);
	$this->db->or_like('id_promo', $q);
	$this->db->or_like('id_kamar', $q);
	$this->db->or_like('id_tamu', $q);
	$this->db->or_like('jumlah_dewasa', $q);
	$this->db->or_like('jumlah_anak', $q);
	$this->db->or_like('umur_anak', $q);
	$this->db->or_like('permintaan_spesial', $q);
	$this->db->or_like('batas_waktu_pemesanan', $q);
	$this->db->or_like('id_status_pemesanan', $q);
	$this->db->or_like('id_pegawai', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
	$this->db->or_like('id_pemesanan', $q);
	$this->db->or_like('waktu_pemesanan', $q);
	$this->db->or_like('uang_muka', $q);
	$this->db->or_like('sisa_bayar', $q);
	$this->db->or_like('total_harga', $q);
	$this->db->or_like('id_channel', $q);
	$this->db->or_like('id_promo', $q);
	$this->db->or_like('id_kamar', $q);
	$this->db->or_like('id_tamu', $q);
	$this->db->or_like('jumlah_dewasa', $q);
	$this->db->or_like('jumlah_anak', $q);
	$this->db->or_like('umur_anak', $q);
	$this->db->or_like('permintaan_spesial', $q);
	$this->db->or_like('batas_waktu_pemesanan', $q);
	$this->db->or_like('id_status_pemesanan', $q);
	$this->db->or_like('id_pegawai', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data_p)
    {
        $this->db->insert('pemesanan', $data_p);
    }

    function insert_ci($id_pemesanan, $plan_ci)
    {
        $id_ci = gen_id("ci", "check_in", "id_ci", "4", "4");
        $sql = "insert into check_in (id_ci,id_kw,plan_ci,id_pemesanan) values ('$id_ci','KW-0001','$plan_ci','$id_pemesanan')";
        $this->db->query($sql);
    }

    function insert_co($id_pemesanan, $plan_co)
    {
        $id_co = gen_id("co", "check_out", "id_co", "4", "4");
        $sql = "insert into check_out (id_co,id_kw,plan_co,id_pemesanan) values ('$id_co','KW-0001','$plan_co','$id_pemesanan')";
        $this->db->query($sql);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //--------TAMU-------------

    public $table_tamu = 'tamu';
    public $id_tamu = 'id_tamu';
    public $order_tamu = 'DESC';

    function get_all_tamu()
    {
        $this->db->order_by($this->id_tamu, $this->order_tamu);
        return $this->db->get($this->table_tamu)->result();
    }

    // get data by id
    function get_by_id_tamu($id)
    {
        $this->db->where($this->id_tamu, $id);
        return $this->db->get($this->table_tamu)->row();
    }
    
    // get total rows
    function total_rows_tamu($q = NULL) {
        $this->db->like('id_tamu', $q);
    $this->db->or_like('id_tamu', $q);
    $this->db->or_like('tanda_pengenal', $q);
    $this->db->or_like('nomor_pengenal', $q);
    $this->db->or_like('nama_depan_tamu', $q);
    $this->db->or_like('telepon_tamu', $q);
    $this->db->or_like('kebangsaan', $q);
    $this->db->or_like('nama_belakang_tamu', $q);
    $this->db->from($this->table_tamu);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_tamu($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id_tamu, $this->order_tamu);
        $this->db->like('id_tamu', $q);
    $this->db->or_like('id_tamu', $q);
    $this->db->or_like('tanda_pengenal', $q);
    $this->db->or_like('nomor_pengenal', $q);
    $this->db->or_like('nama_depan_tamu', $q);
    $this->db->or_like('telepon_tamu', $q);
    $this->db->or_like('kebangsaan', $q);
    $this->db->or_like('nama_belakang_tamu', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table_tamu)->result();
    }

    // insert data
    function insert_tamu($data_t)
    {
        $this->db->insert('tamu', $data_t);
    }

    // update data
    function update_tamu($id, $data)
    {
        $this->db->where($this->id_tamu, $id);
        $this->db->update($this->table_tamu, $data);
    }

    // delete data
    function delete_tamu($id)
    {
        $this->db->where($this->id_tamu, $id);
        $this->db->delete($this->table_tamu);
    }

}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-27 08:26:53 */
/* http://harviacode.com */
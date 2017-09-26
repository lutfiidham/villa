<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pemesanan_model extends CI_Model
{

    public $table = 'pemesanan';
    public $id = 'id_pemesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_join()
    {
        $query = "select *, nama_jabatan from pemesanan p join jabatan j on (p.id_jabatan=j.id_jabatan)";
        return $this->db->query($query)->result();

        
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
	$this->db->or_like('id_jabatan', $q);
	$this->db->or_like('nama_pemesanan', $q);
	$this->db->or_like('alamat_pemesanan', $q);
	$this->db->or_like('telp_pemesanan', $q);
	$this->db->or_like('password_pemesanan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pemesanan', $q);
	$this->db->or_like('id_pemesanan', $q);
	$this->db->or_like('id_jabatan', $q);
	$this->db->or_like('nama_pemesanan', $q);
	$this->db->or_like('alamat_pemesanan', $q);
	$this->db->or_like('telp_pemesanan', $q);
	$this->db->or_like('password_pemesanan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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

}

/* End of file pemesanan_model.php */
/* Location: ./application/models/pemesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-23 08:19:01 */
/* http://harviacode.com */
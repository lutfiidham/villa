<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check_out_model extends CI_Model
{

    public $table = 'check_out';
    public $id = 'id_co';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function update_co()
    {
        $data = array(
            'real_co' => $this->input->post('real_co'),
            'charge_co' => $this->input->post('charge_co')
        );
        $idp = $this->input->post('id_pemesanan');
        $where = array(
            'id_pemesanan' => $idp
            );
        $this->db->where($where);
        $this->db->update('check_out', $data);
    }

    function get_booking($id){
        $query = $this->db->query("select id_co, concat(nama_depan_tamu,' ',nama_belakang_tamu) as tamu, concat(jumlah_dewasa,' Dewasa ',jumlah_anak,' Anak') as jumlah_tamu, concat(nama_kamar,' - ',no_kamar) as kamar, plan_co,  if(now() < plan_co, (presentase_lco * total_harga / 100), 0) as charge_co
            from check_out co join pemesanan p on p.id_pemesanan = co.id_pemesanan join tamu t on t.id_tamu = p.id_tamu join kamar k on k.id_kamar = p.id_kamar join ketentuan_waktu kw on kw.id_kw = co.id_kw
            where p.id_pemesanan = '$id' ");
        return $query->result();
    }

    function get_data_inv($id){
        $query = $this->db->query("select nama_inventori, jumlah_detil_inventori, harga_inventori 
            FROM INVENTORI I JOIN detil_inventori DI ON DI.id_inventori = I.ID_INVENTORI JOIN KAMAR K ON K.ID_KAMAR = DI.ID_KAMAR
            WHERE DI.ID_KAMAR = (SELECT id_kamar FROM PEMESANAN P JOIN check_out CO ON P.ID_PEMESANAN = CO.id_PEMESANAN WHERE ID_CO = '$id' ) ");
        return $query->result();
    }

    // get all
    function get_all()
    {
        $query = $this->db->query("select co.id_co, ifnull(cv.id_co, '0') as id_cov, id_pemesanan, id_kw, plan_co, real_co, charge_co from check_out co left join cek_inventori cv on co.id_co = cv.id_co order by 1 desc");
        return $query->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_co', $q);
	$this->db->or_like('id_co', $q);
	$this->db->or_like('id_pemesanan', $q);
	$this->db->or_like('id_kw', $q);
	$this->db->or_like('plan_co', $q);
	$this->db->or_like('real_co', $q);
	$this->db->or_like('charge_co', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_co', $q);
	$this->db->or_like('id_co', $q);
	$this->db->or_like('id_pemesanan', $q);
	$this->db->or_like('id_kw', $q);
	$this->db->or_like('plan_co', $q);
	$this->db->or_like('real_co', $q);
	$this->db->or_like('charge_co', $q);
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

/* End of file Check_out_model.php */
/* Location: ./application/models/Check_out_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 05:25:22 */
/* http://harviacode.com */
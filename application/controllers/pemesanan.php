<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pemesanan = $this->Pemesanan_model->get_all();

        $data = array(
            'pemesanan_data' => $pemesanan
        );

        $this->template->load('template','pemesanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesanan' => $row->id_pemesanan,
		'waktu_pemesanan' => $row->waktu_pemesanan,
		'uang_muka' => $row->uang_muka,
		'sisa_bayar' => $row->sisa_bayar,
		'total_harga' => $row->total_harga,
		'id_channel' => $row->id_channel,
		'id_promo' => $row->id_promo,
		'id_kamar' => $row->id_kamar,
		'id_tamu' => $row->id_tamu,
		'jumlah_dewasa' => $row->jumlah_dewasa,
		'jumlah_anak' => $row->jumlah_anak,
		'umur_anak' => $row->umur_anak,
		'permintaan_spesial' => $row->permintaan_spesial,
		'batas_waktu_pemesanan' => $row->batas_waktu_pemesanan,
		'id_status_pemesanan' => $row->id_status_pemesanan,
		'id_pegawai' => $row->id_pegawai,
	    );
            $this->template->load('template','pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemesanan/create_action'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	    'waktu_pemesanan' => set_value('waktu_pemesanan'),
	    'uang_muka' => set_value('uang_muka'),
	    'sisa_bayar' => set_value('sisa_bayar'),
	    'total_harga' => set_value('total_harga'),
	    'id_channel' => set_value('id_channel'),
	    'id_promo' => set_value('id_promo'),
	    'id_kamar' => set_value('id_kamar'),
	    'id_tamu' => set_value('id_tamu'),
	    'jumlah_dewasa' => set_value('jumlah_dewasa'),
	    'jumlah_anak' => set_value('jumlah_anak'),
	    'umur_anak' => set_value('umur_anak'),
	    'permintaan_spesial' => set_value('permintaan_spesial'),
	    'batas_waktu_pemesanan' => set_value('batas_waktu_pemesanan'),
	    'id_status_pemesanan' => set_value('id_status_pemesanan'),
	    'id_pegawai' => set_value('id_pegawai'),
	);
        $this->template->load('template','pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'waktu_pemesanan' => $this->input->post('waktu_pemesanan',TRUE),
		'uang_muka' => $this->input->post('uang_muka',TRUE),
		'sisa_bayar' => $this->input->post('sisa_bayar',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'id_channel' => $this->input->post('id_channel',TRUE),
		'id_promo' => $this->input->post('id_promo',TRUE),
		'id_kamar' => $this->input->post('id_kamar',TRUE),
		'id_tamu' => $this->input->post('id_tamu',TRUE),
		'jumlah_dewasa' => $this->input->post('jumlah_dewasa',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'umur_anak' => $this->input->post('umur_anak',TRUE),
		'permintaan_spesial' => $this->input->post('permintaan_spesial',TRUE),
		'batas_waktu_pemesanan' => $this->input->post('batas_waktu_pemesanan',TRUE),
		'id_status_pemesanan' => $this->input->post('id_status_pemesanan',TRUE),
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
	    );

            $this->Pemesanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemesanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemesanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemesanan/update_action'),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
		'waktu_pemesanan' => set_value('waktu_pemesanan', $row->waktu_pemesanan),
		'uang_muka' => set_value('uang_muka', $row->uang_muka),
		'sisa_bayar' => set_value('sisa_bayar', $row->sisa_bayar),
		'total_harga' => set_value('total_harga', $row->total_harga),
		'id_channel' => set_value('id_channel', $row->id_channel),
		'id_promo' => set_value('id_promo', $row->id_promo),
		'id_kamar' => set_value('id_kamar', $row->id_kamar),
		'id_tamu' => set_value('id_tamu', $row->id_tamu),
		'jumlah_dewasa' => set_value('jumlah_dewasa', $row->jumlah_dewasa),
		'jumlah_anak' => set_value('jumlah_anak', $row->jumlah_anak),
		'umur_anak' => set_value('umur_anak', $row->umur_anak),
		'permintaan_spesial' => set_value('permintaan_spesial', $row->permintaan_spesial),
		'batas_waktu_pemesanan' => set_value('batas_waktu_pemesanan', $row->batas_waktu_pemesanan),
		'id_status_pemesanan' => set_value('id_status_pemesanan', $row->id_status_pemesanan),
		'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
	    );
            $this->template->load('template','pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesanan', TRUE));
        } else {
            $data = array(
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'waktu_pemesanan' => $this->input->post('waktu_pemesanan',TRUE),
		'uang_muka' => $this->input->post('uang_muka',TRUE),
		'sisa_bayar' => $this->input->post('sisa_bayar',TRUE),
		'total_harga' => $this->input->post('total_harga',TRUE),
		'id_channel' => $this->input->post('id_channel',TRUE),
		'id_promo' => $this->input->post('id_promo',TRUE),
		'id_kamar' => $this->input->post('id_kamar',TRUE),
		'id_tamu' => $this->input->post('id_tamu',TRUE),
		'jumlah_dewasa' => $this->input->post('jumlah_dewasa',TRUE),
		'jumlah_anak' => $this->input->post('jumlah_anak',TRUE),
		'umur_anak' => $this->input->post('umur_anak',TRUE),
		'permintaan_spesial' => $this->input->post('permintaan_spesial',TRUE),
		'batas_waktu_pemesanan' => $this->input->post('batas_waktu_pemesanan',TRUE),
		'id_status_pemesanan' => $this->input->post('id_status_pemesanan',TRUE),
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
	    );

            $this->Pemesanan_model->update($this->input->post('id_pemesanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemesanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemesanan_model->get_by_id($id);

        if ($row) {
            $this->Pemesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
	$this->form_validation->set_rules('waktu_pemesanan', 'waktu pemesanan', 'trim|required');
	$this->form_validation->set_rules('uang_muka', 'uang muka', 'trim|required');
	$this->form_validation->set_rules('sisa_bayar', 'sisa bayar', 'trim|required');
	$this->form_validation->set_rules('total_harga', 'total harga', 'trim|required');
	$this->form_validation->set_rules('id_channel', 'id channel', 'trim|required');
	$this->form_validation->set_rules('id_promo', 'id promo', 'trim|required');
	$this->form_validation->set_rules('id_kamar', 'id kamar', 'trim|required');
	$this->form_validation->set_rules('id_tamu', 'id tamu', 'trim|required');
	$this->form_validation->set_rules('jumlah_dewasa', 'jumlah dewasa', 'trim|required');
	$this->form_validation->set_rules('jumlah_anak', 'jumlah anak', 'trim|required');
	$this->form_validation->set_rules('umur_anak', 'umur anak', 'trim|required');
	$this->form_validation->set_rules('permintaan_spesial', 'permintaan spesial', 'trim|required');
	$this->form_validation->set_rules('batas_waktu_pemesanan', 'batas waktu pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_status_pemesanan', 'id status pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_pegawai', 'id pegawai', 'trim|required');

	$this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-27 08:26:53 */
/* http://harviacode.com */
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

    public function get_harga($idk){
        $val = $this->Pemesanan_model->get_harga($idk);
        foreach ($val as $value) {
            $data = array();
            $data[] = $value->harga_kamar;
        }
        echo json_encode($data);
    }

    public function read_cb_tamu(){
        $cb_tamu = $this->Pemesanan_model->get_tamu();
        foreach ($cb_tamu as $value) {
            $cbtamu[$value->id_tamu] = $value->tamu;
        }
        print form_dropdown('tamu_id',$cbtamu);
    }

    public function read($id) 
    {
        $row = $this->Pemesanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesanan' => $row->id_pemesanan,
		'total_harga' => $row->total_harga,
		'kamar' => $row->kamar,
		'tamu' => $row->tamu,
		'jumlah' => $row->jumlah,
		'permintaan_spesial' => $row->permintaan_spesial,
		'id_status_pemesanan' => $row->id_status_pemesanan,
	    );
            $this->template->load('template','pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function create($id) 
    {   
        if($id == 'p') {
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
            'dump' => set_value($this->input->get('tambah_pemesanan'))
        );
        } else {
            echo "nothing";
        }
        $this->template->load('template','pemesanan_form', $data);
    }
    
    public function create_action() 
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create();
        // } else {
            $lama = $this->input->post('lama_menginap');
            $array  = explode('-',$lama);

            $data_p = array(
        		'id_pemesanan' => $this->input->post('id_pemesanan'),
        		'waktu_pemesanan' => date('Y-m-d H:i:s',strtotime($this->input->post('waktu_pemesanan'))),
        		'uang_muka' => $this->input->post('uang_muka'),
        		'sisa_bayar' => $this->input->post('sisa_bayar'),
        		'total_harga' => $this->input->post('total_harga'),
        		'id_channel' => $this->input->post('id_channel'),
        		'id_promo' => $this->input->post('id_promo'),
        		'id_kamar' => $this->input->post('id_kamar'),
        		'id_tamu' => $this->input->post('tamu_id'),
        		'jumlah_dewasa' => $this->input->post('jumlah_dewasa'),
        		'jumlah_anak' => $this->input->post('jumlah_anak'),
        		'permintaan_spesial' => $this->input->post('permintaan_spesial'),
        		'batas_waktu_pemesanan' => date('Y-m-d H:i:s',strtotime("+1 day", strtotime($this->input->post('waktu_pemesanan')) )),
        		'id_status_pemesanan' => 'ST-0001',
        		'id_pegawai' => 'PE-0001',
    	    );
            $this->Pemesanan_model->insert($data_p);

            //insert check_in
            $id_pemesanan = $this->input->post('id_pemesanan');
            $plan_ci = date('Y-m-d H:i:s',strtotime($array[0].' 14:00:00'));
            $this->Pemesanan_model->insert_ci($id_pemesanan, $plan_ci); 

            //insert check_out
            $id_pemesanan = $this->input->post('id_pemesanan');
            $plan_co = date('Y-m-d H:i:s',strtotime($array[1].' 12:00:00'));
            $this->Pemesanan_model->insert_co($id_pemesanan, $plan_co); 
            
            //date('dd-mm-YYYY H:i:s',strtotime($this->input->post('waktu_pemesanan') . "+1 days"));
            //var_dump($this->input->post('daterange'));

            // $this->session->set_flashdata('message', 'Create Record Success');
            // redirect(site_url('pemesanan'));
        //}
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
	$this->form_validation->set_rules('id_tamu', 'id tamu', 'trim|required');
	$this->form_validation->set_rules('tanda_pengenal', 'tanda pengenal', 'trim|required');
	$this->form_validation->set_rules('nomor_pengenal', 'nomor pengenal', 'trim|required');
	$this->form_validation->set_rules('nama_depan_tamu', 'nama depan tamu', 'trim|required');
	$this->form_validation->set_rules('telepon_tamu', 'telepon tamu', 'trim|required');
	$this->form_validation->set_rules('kebangsaan', 'kebangsaan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang_tamu', 'nama belakang tamu', 'trim|required');

	$this->form_validation->set_rules('id_tamu', 'id_tamu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

	$this->form_validation->set_rules('id_pemesanan', 'id_pemesanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    //------------TAMU----------------

    public function read_tamu($id) 
    {
        $row = $this->Pemesanan_model->get_by_id_tamu($id);
        if ($row) {
            $data = array(
		'id_tamu' => $row->id_tamu,
		'tanda_pengenal' => $row->tanda_pengenal,
		'nomor_pengenal' => $row->nomor_pengenal,
		'nama_depan_tamu' => $row->nama_depan_tamu,
		'telepon_tamu' => $row->telepon_tamu,
		'kebangsaan' => $row->kebangsaan,
		'nama_belakang_tamu' => $row->nama_belakang_tamu,
	    );
            $this->template->load('template','pemesanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemesanan'));
        }
    }

    public function create_tamu() 
    {
        $data = array(
            'button' => 'Save',
            'action' => site_url('Pemesanan/create_action_tamu'),
	    'id_tamu' => set_value('id_tamu'),
	    'tanda_pengenal' => set_value('tanda_pengenal'),
	    'nomor_pengenal' => set_value('nomor_pengenal'),
	    'nama_depan_tamu' => set_value('nama_depan_tamu'),
	    'telepon_tamu' => set_value('telepon_tamu'),
	    'kebangsaan' => set_value('kebangsaan'),
	    'nama_belakang_tamu' => set_value('nama_belakang_tamu'),
	);
        $this->template->load('template','pemesanan_form', $data);
    }
    
    public function create_action_tamu() 
    {
        // $this->_rules();

        // if ($this->form_validation->run() == FALSE) {
        //     $this->create_tamu();
        // } else {
            $data_t = array(
		'id_tamu' => $this->input->post('id_tamu'),
		'tanda_pengenal' => $this->input->post('tanda_pengenal'),
		'nomor_pengenal' => $this->input->post('nomor_pengenal'),
		'nama_depan_tamu' => $this->input->post('nama_depan_tamu'),
        'nama_belakang_tamu' => $this->input->post('nama_belakang_tamu'),
		'telepon_tamu' => $this->input->post('telepon_tamu'),
		'kebangsaan' => $this->input->post('kebangsaan')
	    );
            $this->Pemesanan_model->insert_tamu($data_t);
            //$this->session->set_flashdata('message', 'Create Record Success');
        //}
    }
    
    public function update_tamu($id) 
    {
        $row = $this->Pemesanan_model->get_by_id_tamu($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Pemesanan/update_action_tamu'),
		'id_tamu' => set_value('id_tamu', $row->id_tamu),
		'tanda_pengenal' => set_value('tanda_pengenal', $row->tanda_pengenal),
		'nomor_pengenal' => set_value('nomor_pengenal', $row->nomor_pengenal),
		'nama_depan_tamu' => set_value('nama_depan_tamu', $row->nama_depan_tamu),
		'telepon_tamu' => set_value('telepon_tamu', $row->telepon_tamu),
		'kebangsaan' => set_value('kebangsaan', $row->kebangsaan),
		'nama_belakang_tamu' => set_value('nama_belakang_tamu', $row->nama_belakang_tamu),
	    );
            $this->template->load('template','pemesanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan'));
        }
    }
    
    public function update_action_tamu() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tamu', TRUE));
        } else {
            $data = array(
		'id_tamu' => $this->input->post('id_tamu',TRUE),
		'tanda_pengenal' => $this->input->post('tanda_pengenal',TRUE),
		'nomor_pengenal' => $this->input->post('nomor_pengenal',TRUE),
		'nama_depan_tamu' => $this->input->post('nama_depan_tamu',TRUE),
		'telepon_tamu' => $this->input->post('telepon_tamu',TRUE),
		'kebangsaan' => $this->input->post('kebangsaan',TRUE),
		'nama_belakang_tamu' => $this->input->post('nama_belakang_tamu',TRUE),
	    );

            $this->Pemesanan_model->update($this->input->post('id_tamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Pemesanan'));
        }
    }
    
    public function delete_tamu($id) 
    {
        $row = $this->Pemesanan_model->get_by_id_tamu($id);

        if ($row) {
            $this->Pemesanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemesanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemesanan'));
        }
    }

}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-27 08:26:53 */
/* http://harviacode.com */
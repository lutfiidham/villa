<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tamu = $this->Tamu_model->get_all();

        $data = array(
            'tamu_data' => $tamu
        );

        $this->template->load('template','tamu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tamu_model->get_by_id($id);
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
            $this->template->load('template','tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tamu/create_action'),
	    'id_tamu' => set_value('id_tamu'),
	    'tanda_pengenal' => set_value('tanda_pengenal'),
	    'nomor_pengenal' => set_value('nomor_pengenal'),
	    'nama_depan_tamu' => set_value('nama_depan_tamu'),
	    'telepon_tamu' => set_value('telepon_tamu'),
	    'kebangsaan' => set_value('kebangsaan'),
	    'nama_belakang_tamu' => set_value('nama_belakang_tamu'),
	);
        $this->template->load('template','tamu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
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

            $this->Tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tamu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tamu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tamu/update_action'),
		'id_tamu' => set_value('id_tamu', $row->id_tamu),
		'tanda_pengenal' => set_value('tanda_pengenal', $row->tanda_pengenal),
		'nomor_pengenal' => set_value('nomor_pengenal', $row->nomor_pengenal),
		'nama_depan_tamu' => set_value('nama_depan_tamu', $row->nama_depan_tamu),
		'telepon_tamu' => set_value('telepon_tamu', $row->telepon_tamu),
		'kebangsaan' => set_value('kebangsaan', $row->kebangsaan),
		'nama_belakang_tamu' => set_value('nama_belakang_tamu', $row->nama_belakang_tamu),
	    );
            $this->template->load('template','tamu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }
    
    public function update_action() 
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

            $this->Tamu_model->update($this->input->post('id_tamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tamu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tamu_model->get_by_id($id);

        if ($row) {
            $this->Tamu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tamu', 'id tamu', 'trim|required');
	$this->form_validation->set_rules('tanda_pengenal', 'tanda pengenal', 'trim|required');
	$this->form_validation->set_rules('nomor_pengenal', 'nomor pengenal', 'trim|required');
	$this->form_validation->set_rules('nama_depan_tamu', 'nama depan tamu', 'trim|required');
	$this->form_validation->set_rules('telepon_tamu', 'telepon tamu', 'trim|required');
	$this->form_validation->set_rules('kebangsaan', 'kebangsaan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang_tamu', 'nama belakang tamu', 'trim|required');

	$this->form_validation->set_rules('id_tamu', 'id_tamu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tamu.php */
/* Location: ./application/controllers/Tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-01 08:58:18 */
/* http://harviacode.com */
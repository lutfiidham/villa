<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $layanan = $this->Layanan_model->get_all();

        $data = array(
            'layanan_data' => $layanan
        );

        $this->template->load('template','layanan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_layanan' => $row->id_layanan,
		'nama_layanan' => $row->nama_layanan,
		'biaya_layanan' => $row->biaya_layanan,
	    );
            $this->template->load('template','layanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('layanan/create_action'),
	    'id_layanan' => set_value('id_layanan'),
	    'nama_layanan' => set_value('nama_layanan'),
	    'biaya_layanan' => set_value('biaya_layanan'),
	);
        $this->template->load('template','layanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_layanan' => $this->input->post('id_layanan',TRUE),
		'nama_layanan' => $this->input->post('nama_layanan',TRUE),
		'biaya_layanan' => $this->input->post('biaya_layanan',TRUE),
	    );

            $this->Layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('layanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('layanan/update_action'),
		'id_layanan' => set_value('id_layanan', $row->id_layanan),
		'nama_layanan' => set_value('nama_layanan', $row->nama_layanan),
		'biaya_layanan' => set_value('biaya_layanan', $row->biaya_layanan),
	    );
            $this->template->load('template','layanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_layanan', TRUE));
        } else {
            $data = array(
		'id_layanan' => $this->input->post('id_layanan',TRUE),
		'nama_layanan' => $this->input->post('nama_layanan',TRUE),
		'biaya_layanan' => $this->input->post('biaya_layanan',TRUE),
	    );

            $this->Layanan_model->update($this->input->post('id_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('layanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);

        if ($row) {
            $this->Layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('layanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_layanan', 'id layanan', 'trim|required');
	$this->form_validation->set_rules('nama_layanan', 'nama layanan', 'trim|required');
	$this->form_validation->set_rules('biaya_layanan', 'biaya layanan', 'trim|required');

	$this->form_validation->set_rules('id_layanan', 'id_layanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-23 14:47:52 */
/* http://harviacode.com */
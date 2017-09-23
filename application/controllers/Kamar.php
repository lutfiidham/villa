<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kamar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $kamar = $this->Kamar_model->get_all();

        $data = array(
            'kamar_data' => $kamar
        );

        $this->template->load('template','kamar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kamar' => $row->id_kamar,
		'nama_kamar' => $row->nama_kamar,
		'no_kamar' => $row->no_kamar,
		'kapasitas' => $row->kapasitas,
		'status_kamar' => $row->status_kamar,
		'harga_kamar' => $row->harga_kamar,
	    );
            $this->template->load('template','kamar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kamar/create_action'),
	    'id_kamar' => set_value('id_kamar'),
	    'nama_kamar' => set_value('nama_kamar'),
	    'no_kamar' => set_value('no_kamar'),
	    'kapasitas' => set_value('kapasitas'),
	    'status_kamar' => set_value('free'),
        // 0: free, 1: booked, 2: full, 3: deactivate
	    'harga_kamar' => set_value('harga_kamar'),
	);
        $this->template->load('template','kamar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kamar' => $this->input->post('id_kamar',TRUE),
		'nama_kamar' => $this->input->post('nama_kamar',TRUE),
		'no_kamar' => $this->input->post('no_kamar',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'status_kamar' => $this->input->post('status_kamar',TRUE),
		'harga_kamar' => $this->input->post('harga_kamar',TRUE),
	    );

            $this->Kamar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kamar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kamar/update_action'),
		'id_kamar' => set_value('id_kamar', $row->id_kamar),
		'nama_kamar' => set_value('nama_kamar', $row->nama_kamar),
		'no_kamar' => set_value('no_kamar', $row->no_kamar),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
		'status_kamar' => set_value('status_kamar', $row->status_kamar),
		'harga_kamar' => set_value('harga_kamar', $row->harga_kamar),
	    );
            $this->template->load('template','kamar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kamar', TRUE));
        } else {
            $data = array(
		'id_kamar' => $this->input->post('id_kamar',TRUE),
		'nama_kamar' => $this->input->post('nama_kamar',TRUE),
		'no_kamar' => $this->input->post('no_kamar',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
		'status_kamar' => $this->input->post('status_kamar',TRUE),
		'harga_kamar' => $this->input->post('harga_kamar',TRUE),
	    );

            $this->Kamar_model->update($this->input->post('id_kamar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kamar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);

        if ($row) {
            $this->Kamar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kamar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kamar', 'id kamar', 'trim|required');
	$this->form_validation->set_rules('nama_kamar', 'nama kamar', 'trim|required');
	$this->form_validation->set_rules('no_kamar', 'no kamar', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');
	$this->form_validation->set_rules('status_kamar', 'status kamar', 'trim|required');
	$this->form_validation->set_rules('harga_kamar', 'harga kamar', 'trim|required');

	$this->form_validation->set_rules('id_kamar', 'id_kamar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kamar.php */
/* Location: ./application/controllers/Kamar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-23 12:47:42 */
/* http://harviacode.com */
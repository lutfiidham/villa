<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pegawai = $this->Pegawai_model->get_all_join();

        $data = array(
            'pegawai_data' => $pegawai
        );

        $this->template->load('template','pegawai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pegawai' => $row->id_pegawai,
		'id_jabatan' => $row->id_jabatan,
		'nama_pegawai' => $row->nama_pegawai,
		'alamat_pegawai' => $row->alamat_pegawai,
		'telp_pegawai' => $row->telp_pegawai,
		'password_pegawai' => $row->password_pegawai,
	    );
            $this->template->load('template','pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pegawai/create_action'),
	    'id_pegawai' => set_value('id_pegawai'),
	    'id_jabatan' => set_value('id_jabatan'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	    'alamat_pegawai' => set_value('alamat_pegawai'),
	    'telp_pegawai' => set_value('telp_pegawai'),
	    'password_pegawai' => set_value('password_pegawai'),
	);
        $this->template->load('template','pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'alamat_pegawai' => $this->input->post('alamat_pegawai',TRUE),
		'telp_pegawai' => $this->input->post('telp_pegawai',TRUE),
		'password_pegawai' => $this->input->post('password_pegawai',TRUE),
	    );

            $this->Pegawai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pegawai/update_action'),
		'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
		'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
		'alamat_pegawai' => set_value('alamat_pegawai', $row->alamat_pegawai),
		'telp_pegawai' => set_value('telp_pegawai', $row->telp_pegawai),
		'password_pegawai' => set_value('password_pegawai', $row->password_pegawai),
	    );
            $this->template->load('template','pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pegawai', TRUE));
        } else {
            $data = array(
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'alamat_pegawai' => $this->input->post('alamat_pegawai',TRUE),
		'telp_pegawai' => $this->input->post('telp_pegawai',TRUE),
		'password_pegawai' => $this->input->post('password_pegawai',TRUE),
	    );

            $this->Pegawai_model->update($this->input->post('id_pegawai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $this->Pegawai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pegawai', 'id pegawai', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('alamat_pegawai', 'alamat pegawai', 'trim|required');
	$this->form_validation->set_rules('telp_pegawai', 'telp pegawai', 'trim|required');
	$this->form_validation->set_rules('password_pegawai', 'password pegawai', 'trim|required');

	$this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-23 08:19:01 */
/* http://harviacode.com */
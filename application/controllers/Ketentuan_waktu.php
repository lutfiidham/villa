<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ketentuan_waktu extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ketentuan_waktu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $ketentuan_waktu = $this->Ketentuan_waktu_model->get_all();

        $data = array(
            'ketentuan_waktu_data' => $ketentuan_waktu
        );

        $this->template->load('template','ketentuan_waktu_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ketentuan_waktu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kw' => $row->id_kw,
		'toleransi_ci' => $row->toleransi_ci,
		'toleransi_co' => $row->toleransi_co,
		'presentase_eci' => $row->presentase_eci,
		'presentase_lco' => $row->presentase_lco,
	    );
            $this->template->load('template','ketentuan_waktu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ketentuan_waktu'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ketentuan_waktu/create_action'),
	    'id_kw' => set_value('id_kw'),
	    'toleransi_ci' => set_value('toleransi_ci'),
	    'toleransi_co' => set_value('toleransi_co'),
	    'presentase_eci' => set_value('presentase_eci'),
	    'presentase_lco' => set_value('presentase_lco'),
	);
        $this->template->load('template','ketentuan_waktu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kw' => $this->input->post('id_kw',TRUE),
		'toleransi_ci' => $this->input->post('toleransi_ci',TRUE),
		'toleransi_co' => $this->input->post('toleransi_co',TRUE),
		'presentase_eci' => $this->input->post('presentase_eci',TRUE),
		'presentase_lco' => $this->input->post('presentase_lco',TRUE),
	    );

            $this->Ketentuan_waktu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ketentuan_waktu'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ketentuan_waktu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ketentuan_waktu/update_action'),
		'id_kw' => set_value('id_kw', $row->id_kw),
		'toleransi_ci' => set_value('toleransi_ci', $row->toleransi_ci),
		'toleransi_co' => set_value('toleransi_co', $row->toleransi_co),
		'presentase_eci' => set_value('presentase_eci', $row->presentase_eci),
		'presentase_lco' => set_value('presentase_lco', $row->presentase_lco),
	    );
            $this->template->load('template','ketentuan_waktu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ketentuan_waktu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kw', TRUE));
        } else {
            $data = array(
		'id_kw' => $this->input->post('id_kw',TRUE),
		'toleransi_ci' => $this->input->post('toleransi_ci',TRUE),
		'toleransi_co' => $this->input->post('toleransi_co',TRUE),
		'presentase_eci' => $this->input->post('presentase_eci',TRUE),
		'presentase_lco' => $this->input->post('presentase_lco',TRUE),
	    );

            $this->Ketentuan_waktu_model->update($this->input->post('id_kw', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ketentuan_waktu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ketentuan_waktu_model->get_by_id($id);

        if ($row) {
            $this->Ketentuan_waktu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ketentuan_waktu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ketentuan_waktu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kw', 'id kw', 'trim|required');
	$this->form_validation->set_rules('toleransi_ci', 'toleransi ci', 'trim|required');
	$this->form_validation->set_rules('toleransi_co', 'toleransi co', 'trim|required');
	$this->form_validation->set_rules('presentase_eci', 'presentase eci', 'trim|required');
	$this->form_validation->set_rules('presentase_lco', 'presentase lco', 'trim|required');

	$this->form_validation->set_rules('id_kw', 'id_kw', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ketentuan_waktu.php */
/* Location: ./application/controllers/Ketentuan_waktu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-23 14:49:27 */
/* http://harviacode.com */
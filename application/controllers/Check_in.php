<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check_in extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Check_in_model');
        $this->load->library('form_validation');
    }

    public function search_booking($id){
        $val = $this->Check_in_model->get_booking($id); 
        echo json_encode($val);
    }

    public function update_ci(){
        $this->Check_in_model->update_ci();
    }

    public function index()
    {
        $check_in = $this->Check_in_model->get_all();

        $data = array(
            'check_in_data' => $check_in
        );

        $this->template->load('template','check_in_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Check_in_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ci' => $row->id_ci,
		'id_kw' => $row->id_kw,
		'plan_ci' => $row->plan_ci,
		'real_ci' => $row->real_ci,
		'charge_ci' => $row->charge_ci,
		'id_pemesanan' => $row->id_pemesanan,
	    );
            $this->template->load('template','check_in_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_in'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('check_in/create_action'),
	    'id_ci' => set_value('id_ci'),
	    'id_kw' => set_value('id_kw'),
	    'plan_ci' => set_value('plan_ci'),
	    'real_ci' => set_value('real_ci'),
	    'charge_ci' => set_value('charge_ci'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	);
        $this->template->load('template','check_in_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ci' => $this->input->post('id_ci',TRUE),
		'id_kw' => $this->input->post('id_kw',TRUE),
		'plan_ci' => $this->input->post('plan_ci',TRUE),
		'real_ci' => $this->input->post('real_ci',TRUE),
		'charge_ci' => $this->input->post('charge_ci',TRUE),
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
	    );

            $this->Check_in_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('check_in'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Check_in_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('check_in/update_action'),
		'id_ci' => set_value('id_ci', $row->id_ci),
		'id_kw' => set_value('id_kw', $row->id_kw),
		'plan_ci' => set_value('plan_ci', $row->plan_ci),
		'real_ci' => set_value('real_ci', $row->real_ci),
		'charge_ci' => set_value('charge_ci', $row->charge_ci),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
	    );
            $this->template->load('template','check_in_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_in'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ci', TRUE));
        } else {
            $data = array(
		'id_ci' => $this->input->post('id_ci',TRUE),
		'id_kw' => $this->input->post('id_kw',TRUE),
		'plan_ci' => $this->input->post('plan_ci',TRUE),
		'real_ci' => $this->input->post('real_ci',TRUE),
		'charge_ci' => $this->input->post('charge_ci',TRUE),
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
	    );

            $this->Check_in_model->update($this->input->post('id_ci', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('check_in'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Check_in_model->get_by_id($id);

        if ($row) {
            $this->Check_in_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('check_in'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_in'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_ci', 'id ci', 'trim|required');
	$this->form_validation->set_rules('id_kw', 'id kw', 'trim|required');
	$this->form_validation->set_rules('plan_ci', 'plan ci', 'trim|required');
	$this->form_validation->set_rules('real_ci', 'real ci', 'trim|required');
	$this->form_validation->set_rules('charge_ci', 'charge ci', 'trim|required');
	$this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');

	$this->form_validation->set_rules('id_ci', 'id_ci', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Check_in.php */
/* Location: ./application/controllers/Check_in.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-01 04:11:28 */
/* http://harviacode.com */
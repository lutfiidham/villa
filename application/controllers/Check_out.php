<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check_out extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Check_out_model');
        $this->load->library('form_validation');
    }

    public function search_booking($id){
        $val = $this->Check_out_model->get_booking($id); 
        echo json_encode($val);
    }

    public function update_co(){
        $this->Check_out_model->update_co();
    }

    public function index()
    {
        $check_out = $this->Check_out_model->get_all();

        $data = array(
            'check_out_data' => $check_out
        );

        $this->template->load('template','check_out_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Check_out_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_co' => $row->id_co,
		'id_pemesanan' => $row->id_pemesanan,
		'id_kw' => $row->id_kw,
		'plan_co' => $row->plan_co,
		'real_co' => $row->real_co,
		'charge_co' => $row->charge_co,
	    );
            $this->template->load('template','check_out_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_out'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('check_out/create_action'),
	    'id_co' => set_value('id_co'),
	    'id_pemesanan' => set_value('id_pemesanan'),
	    'id_kw' => set_value('id_kw'),
	    'plan_co' => set_value('plan_co'),
	    'real_co' => set_value('real_co'),
	    'charge_co' => set_value('charge_co')
	);
        $this->template->load('template','check_out_form', $data);
    }

    public function create_cek_inv($id) 
    {   
        $row = $this->Check_out_model->get_data_inv($id);
            // $data = array(
            //     'button' => 'Save',
            //     'action' => site_url('check_out/create_action_cek_inv'),
            //     'id_cek_inventori' => set_value('id_cek_inventori'),
            //     'id_co' => set_value('id_co'),
            //     'kamar' => set_value('kamar'),
            //     'charge_co' => set_value('charge_co'),
            // );
            $data = array(
                'detil_inv_data' => $row
            );
            $this->template->load('template','cek_inventori_form',$data);
    }    
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_co' => $this->input->post('id_co',TRUE),
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_kw' => $this->input->post('id_kw',TRUE),
		'plan_co' => $this->input->post('plan_co',TRUE),
		'real_co' => $this->input->post('real_co',TRUE),
		'charge_co' => $this->input->post('charge_co',TRUE),
	    );

            $this->Check_out_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('check_out'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Check_out_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('check_out/update_action'),
		'id_co' => set_value('id_co', $row->id_co),
		'id_pemesanan' => set_value('id_pemesanan', $row->id_pemesanan),
		'id_kw' => set_value('id_kw', $row->id_kw),
		'plan_co' => set_value('plan_co', $row->plan_co),
		'real_co' => set_value('real_co', $row->real_co),
		'charge_co' => set_value('charge_co', $row->charge_co),
	    );
            $this->template->load('template','check_out_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_out'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_co', TRUE));
        } else {
            $data = array(
		'id_co' => $this->input->post('id_co',TRUE),
		'id_pemesanan' => $this->input->post('id_pemesanan',TRUE),
		'id_kw' => $this->input->post('id_kw',TRUE),
		'plan_co' => $this->input->post('plan_co',TRUE),
		'real_co' => $this->input->post('real_co',TRUE),
		'charge_co' => $this->input->post('charge_co',TRUE),
	    );

            $this->Check_out_model->update($this->input->post('id_co', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('check_out'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Check_out_model->get_by_id($id);

        if ($row) {
            $this->Check_out_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('check_out'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('check_out'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_co', 'id co', 'trim|required');
	$this->form_validation->set_rules('id_pemesanan', 'id pemesanan', 'trim|required');
	$this->form_validation->set_rules('id_kw', 'id kw', 'trim|required');
	$this->form_validation->set_rules('plan_co', 'plan co', 'trim|required');
	$this->form_validation->set_rules('real_co', 'real co', 'trim|required');
	$this->form_validation->set_rules('charge_co', 'charge co', 'trim|required');

	$this->form_validation->set_rules('id_co', 'id_co', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Check_out.php */
/* Location: ./application/controllers/Check_out.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-10 05:25:22 */
/* http://harviacode.com */
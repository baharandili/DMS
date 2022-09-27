
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sitelocation extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sitelocation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sitelocation/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sitelocation/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sitelocation/index.html';
            $config['first_url'] = base_url() . 'sitelocation/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->sitelocation_model->total_rows($q);
        $sitelocation = $this->sitelocation_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sitelocation_data' => $sitelocation,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'sitelocation/sitelocation_list',
            'judul' => 'Site Location',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->sitelocation_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_sitelocation' => $row->id_sitelocation,
        'kode_sitelocation' => $row->kode_sitelocation,
        'sitelocation' => $row->sitelocation,
        );
            $this->load->view('sitelocation/sitelocation_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sitelocation'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sitelocation/create_action'),
        'id_sitelocation' => set_value('id_sitelocation'),
        'kode_sitelocation' => set_value('kode_sitelocation'),
        'sitelocation' => set_value('sitelocation'),
        'konten' => 'sitelocation/sitelocation_form',
            'judul' => 'Site Location ',
    );
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'kode_sitelocation' => $this->input->post('kode_sitelocation',TRUE),
        'sitelocation' => $this->input->post('sitelocation',TRUE),
        );

            $this->sitelocation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sitelocation'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->sitelocation_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sitelocation/update_action'),
        'id_sitelocation' => set_value('id_sitelocation', $row->id_sitelocation),
        'kode_sitelocation' => set_value('kode_sitelocation', $row->kode_sitelocation),
        'sitelocation' => set_value('sitelocation', $row->sitelocation),
        'konten' => 'sitelocation/sitelocation_form',
            'judul' => 'Site Location',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sitelocation'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sitelocation', TRUE));
        } else {
            $data = array(
        'kode_sitelocation' => $this->input->post('kode_sitelocation',TRUE),
        'sitelocation' => $this->input->post('sitelocation',TRUE),
        );

            $this->sitelocation_model->update($this->input->post('id_sitelocation', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sitelocation'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->sitelocation_model->get_by_id($id);

        if ($row) {
            $this->sitelocation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sitelocation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sitelocation'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_sitelocation', 'kode sitelocation', 'trim|required');
    $this->form_validation->set_rules('sitelocation', 'nama sitelocation', 'trim|required');

    $this->form_validation->set_rules('id_sitelocation', 'id_sitelocation', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

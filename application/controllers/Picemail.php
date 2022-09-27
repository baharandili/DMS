
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class picemail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('picemail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'picemail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'picemail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'picemail/index.html';
            $config['first_url'] = base_url() . 'picemail/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->picemail_model->total_rows($q);
        $picemail = $this->picemail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'picemail_data' => $picemail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'picemail/picemail_list',
            'judul' => 'Pic Email',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->picemail_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_picemail' => $row->id_picemail,
        'kode_picemail' => $row->kode_picemail,
        'picemail' => $row->picemail,
        );
            $this->load->view('picemail/picemail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('picemail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('picemail/create_action'),
        'id_picemail' => set_value('id_picemail'),
        'kode_picemail' => set_value('kode_picemail'),
        'picemail' => set_value('picemail'),
        'konten' => 'picemail/picemail_form',
            'judul' => 'Pic Email ',
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
        'kode_picemail' => $this->input->post('kode_picemail',TRUE),
        'picemail' => $this->input->post('picemail',TRUE),
        );

            $this->picemail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('picemail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->picemail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('picemail/update_action'),
        'id_picemail' => set_value('id_picemail', $row->id_picemail),
        'kode_picemail' => set_value('kode_picemail', $row->kode_picemail),
        'picemail' => set_value('picemail', $row->picemail),
        'konten' => 'picemail/picemail_form',
            'judul' => 'Pic Email',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('picemail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_picemail', TRUE));
        } else {
            $data = array(
        'kode_picemail' => $this->input->post('kode_picemail',TRUE),
        'picemail' => $this->input->post('picemail',TRUE),
        );

            $this->picemail_model->update($this->input->post('id_picemail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('picemail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->picemail_model->get_by_id($id);

        if ($row) {
            $this->picemail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('picemail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('picemail'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_picemail', 'kode picemail', 'trim|required');
    $this->form_validation->set_rules('picemail', 'nama picemail', 'trim|required');

    $this->form_validation->set_rules('id_picemail', 'id_picemail', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

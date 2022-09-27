
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class section extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('section_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'section/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'section/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'section/index.html';
            $config['first_url'] = base_url() . 'section/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->section_model->total_rows($q);
        $section = $this->section_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'section_data' => $section,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'section/section_list',
            'judul' => 'Section',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->section_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_section' => $row->id_section,
        'kode_section' => $row->kode_section,
        'section' => $row->section,
        );
            $this->load->view('section/section_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('section'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('section/create_action'),
        'id_section' => set_value('id_section'),
        'kode_section' => set_value('kode_section'),
        'section' => set_value('section'),
        'konten' => 'section/section_form',
            'judul' => 'Section ',
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
        'kode_section' => $this->input->post('kode_section',TRUE),
        'section' => $this->input->post('section',TRUE),
        );

            $this->section_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('section'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->section_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('section/update_action'),
        'id_section' => set_value('id_section', $row->id_section),
        'kode_section' => set_value('kode_section', $row->kode_section),
        'section' => set_value('section', $row->section),
        'konten' => 'section/section_form',
            'judul' => 'Section',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('section'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_section', TRUE));
        } else {
            $data = array(
        'kode_section' => $this->input->post('kode_section',TRUE),
        'section' => $this->input->post('section',TRUE),
        );

            $this->section_model->update($this->input->post('id_section', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('section'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->section_model->get_by_id($id);

        if ($row) {
            $this->section_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('section'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('section'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_section', 'kode section', 'trim|required');
    $this->form_validation->set_rules('section', 'nama section', 'trim|required');

    $this->form_validation->set_rules('id_section', 'id_section', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}


<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('department_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'department/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'department/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'department/index.html';
            $config['first_url'] = base_url() . 'department/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->department_model->total_rows($q);
        $department = $this->department_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'department_data' => $department,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'department/department_list',
            'judul' => 'Department',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->department_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_department' => $row->id_department,
        'kode_department' => $row->kode_department,
        'department' => $row->department,
        );
            $this->load->view('department/department_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('department/create_action'),
        'id_department' => set_value('id_department'),
        'kode_department' => set_value('kode_department'),
        'department' => set_value('department'),
        'konten' => 'department/department_form',
            'judul' => 'Department ',
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
        'kode_department' => $this->input->post('kode_department',TRUE),
        'department' => $this->input->post('department',TRUE),
        );

            $this->department_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('department'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->department_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('department/update_action'),
        'id_department' => set_value('id_department', $row->id_department),
        'kode_department' => set_value('kode_department', $row->kode_department),
        'department' => set_value('department', $row->department),
        'konten' => 'department/department_form',
            'judul' => 'Department',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_department', TRUE));
        } else {
            $data = array(
        'kode_department' => $this->input->post('kode_department',TRUE),
        'department' => $this->input->post('department',TRUE),
        );

            $this->department_model->update($this->input->post('id_department', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('department'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->department_model->get_by_id($id);

        if ($row) {
            $this->department_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_department', 'kode department', 'trim|required');
    $this->form_validation->set_rules('department', 'nama department', 'trim|required');

    $this->form_validation->set_rules('id_department', 'id_department', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

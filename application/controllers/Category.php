
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'category/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'category/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'category/index.html';
            $config['first_url'] = base_url() . 'category/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->category_model->total_rows($q);
        $category = $this->category_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'category_data' => $category,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'category/category_list',
            'judul' => 'Category',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->category_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_category' => $row->id_category,
        'kode_category' => $row->kode_category,
        'category' => $row->category,
        );
            $this->load->view('category/category_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('category/create_action'),
        'id_category' => set_value('id_category'),
        'kode_category' => set_value('kode_category'),
        'category' => set_value('category'),
        'konten' => 'category/category_form',
            'judul' => 'Category ',
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
        'kode_category' => $this->input->post('kode_category',TRUE),
        'category' => $this->input->post('category',TRUE),
        );

            $this->category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('category'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->category_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('category/update_action'),
        'id_category' => set_value('id_category', $row->id_category),
        'kode_category' => set_value('kode_category', $row->kode_category),
        'category' => set_value('category', $row->category),
        'konten' => 'category/category_form',
            'judul' => 'Category',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_category', TRUE));
        } else {
            $data = array(
        'kode_category' => $this->input->post('kode_category',TRUE),
        'category' => $this->input->post('category',TRUE),
        );

            $this->category_model->update($this->input->post('id_category', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('category'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->category_model->get_by_id($id);

        if ($row) {
            $this->category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('category'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_category', 'kode category', 'trim|required');
    $this->form_validation->set_rules('category', 'nama category', 'trim|required');

    $this->form_validation->set_rules('id_category', 'id_category', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

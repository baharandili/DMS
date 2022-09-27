
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class branch extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('branch_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'branch/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'branch/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'branch/index.html';
            $config['first_url'] = base_url() . 'branch/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->branch_model->total_rows($q);
        $branch = $this->branch_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'branch_data' => $branch,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'branch/branch_list',
            'judul' => ' Branch',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->branch_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_branch' => $row->id_branch,
        'kode_branch' => $row->kode_branch,
		'branch' => $row->branch,
	    );
            $this->load->view('branch/branch_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('branch/create_action'),
	    'id_branch' => set_value('id_branch'),
        'kode_branch' => set_value('kode_branch'),
	    'branch' => set_value('branch'),
        'konten' => 'branch/branch_form',
            'judul' => ' Branch ',
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
        'kode_branch' => $this->input->post('kode_branch',TRUE),
		'branch' => $this->input->post('branch',TRUE),
	    );

            $this->branch_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('branch'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->branch_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('branch/update_action'),
		'id_branch' => set_value('id_branch', $row->id_branch),
        'kode_branch' => set_value('kode_branch', $row->kode_branch),
		'branch' => set_value('branch', $row->branch),
        'konten' => 'branch/branch_form',
            'judul' => ' Branch',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_branch', TRUE));
        } else {
            $data = array(
		'kode_branch' => $this->input->post('kode_branch',TRUE),
        'branch' => $this->input->post('branch',TRUE),
	    );

            $this->branch_model->update($this->input->post('id_branch', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('branch'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->branch_model->get_by_id($id);

        if ($row) {
            $this->branch_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('branch'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_branch', 'kode branch', 'trim|required');
	$this->form_validation->set_rules('branch', 'nama branch', 'trim|required');

	$this->form_validation->set_rules('id_branch', 'id_branch', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

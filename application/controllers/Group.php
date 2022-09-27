
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class group extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('group_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'group/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'group/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'group/index.html';
            $config['first_url'] = base_url() . 'group/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->group_model->total_rows($q);
        $group = $this->group_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'group_data' => $group,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'group/group_list',
            'judul' => 'Group',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->group_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_group' => $row->id_group,
        'kode_group' => $row->kode_group,
        'grp' => $row->grp,
        );
            $this->load->view('group/group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('group/create_action'),
        'id_group' => set_value('id_group'),
        'kode_group' => set_value('kode_group'),
        'grp' => set_value('grp'),
        'konten' => 'group/group_form',
            'judul' => 'Group ',
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
        'kode_group' => $this->input->post('kode_group',TRUE),
        'grp' => $this->input->post('grp',TRUE),
        );

            $this->group_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('group'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->group_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('group/update_action'),
        'id_group' => set_value('id_group', $row->id_group),
        'kode_group' => set_value('kode_group', $row->kode_group),
        'grp' => set_value('grp', $row->grp),
        'konten' => 'group/group_form',
            'judul' => 'Group',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_group', TRUE));
        } else {
            $data = array(
        'kode_group' => $this->input->post('kode_group',TRUE),
        'grp' => $this->input->post('grp',TRUE),
        );

            $this->group_model->update($this->input->post('id_group', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('group'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->group_model->get_by_id($id);

        if ($row) {
            $this->group_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('group'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('group'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_group', 'kode group', 'trim|required');
    $this->form_validation->set_rules('grp', 'nama group', 'trim|required');

    $this->form_validation->set_rules('id_group', 'id_group', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

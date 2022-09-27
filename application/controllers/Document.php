
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class document extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('document_model');
        $this->load->model('No_urut');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'document/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'document/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'document/index.html';
            $config['first_url'] = base_url() . 'document/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->document_model->total_rows($q);
        $document = $this->document_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'document_data' => $document,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'konten' => 'document/document_list',
            'judul' => 'Data Dokumen ',
        );
        $this->load->view('v_index', $data);
    }

  

    public function read($id) 
    {
        $row = $this->document_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_document' => $row->id_document,
        'kode_dokumen' => $row->kode_dokumen,
        'branch' => $row->branch,
        'department' => $row->department,
        'section' => $row->section,
        'category' => $row->category,
        'grp' => $row->grp,
        'sitelocation' => $row->sitelocation,
        'picemail' => $row->picemail,
        'tanggal' => $row->tanggal,
        'deskripsi' => $row->deskripsi,
        );
            $this->load->view('document/document_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('document'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('document/create_action'),
        'id_document' => set_value('id_document'),
        'kode_dokumen' => $this->No_urut->buat_kode_dokumen(),
        'branch' => set_value('branch'),
        'department' => set_value('department'),
        'section' => set_value('section'),
        'category' => set_value('category'),
        'grp' => set_value('grp'),
        'sitelocation' => set_value('sitelocation'),
        'picemail' => set_value('picemail'),
        'tanggal' => set_value('tanggal'),
        'deskripsi' => set_value('deskripsi'),
        'konten' => 'document/document_form',
            'judul' => 'Data Dokumen ',
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
        'kode_dokumen' => $this->input->post('kode_dokumen',TRUE),
        'branch' => $this->input->post('branch',TRUE),
        'department' => $this->input->post('department',TRUE),
        'section' => $this->input->post('section',TRUE),
        'category' => $this->input->post('category',TRUE),
        'grp' => $this->input->post('grp',TRUE),
        'sitelocation' => $this->input->post('sitelocation',TRUE),
        'picemail' => $this->input->post('picemail',TRUE),
        'tanggal' => $this->input->post('tanggal',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
        );

            $this->document_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('document'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->document_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('document/update_action'),
        'id_document' => set_value('id_document', $row->id_document),
        'kode_dokumen' => set_value('kode_dokumen', $row->kode_dokumen),
        'branch' => set_value('branch', $row->branch),
        'department' => set_value('department', $row->department),
        'section' => set_value('section', $row->section),
        'category' => set_value('category', $row->category),
        'grp' => set_value('grp', $row->grp),
        'sitelocation' => set_value('sitelocation', $row->sitelocation),
        'picemail' => set_value('picemail', $row->picemail),
        'tanggal' => set_value('tanggal', $row->tanggal),
        'deskripsi' => set_value('deskripsi', $row->deskripsi),
        'konten' => 'document/document_form',
            'judul' => 'Data Dokumen ',
        );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('document'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_document', TRUE));
        } else {
            $data = array(
        'kode_dokumen' => $this->input->post('kode_dokumen',TRUE),
        'branch' => $this->input->post('branch',TRUE),
        'department' => $this->input->post('department',TRUE),
        'section' => $this->input->post('section',TRUE),
        'category' => $this->input->post('category',TRUE),
        'grp' => $this->input->post('grp',TRUE),
        'sitelocation' => $this->input->post('sitelocation',TRUE),
        'picemail' => $this->input->post('picemail',TRUE),
        'tanggal' => $this->input->post('tanggal',TRUE),
        'deskripsi' => $this->input->post('deskripsi',TRUE),
        );

            $this->document_model->update($this->input->post('id_document', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('document'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->document_model->get_by_id($id);

        if ($row) {
            $this->document_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('document'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('document'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('kode_dokumen', 'kode_dokumen', 'trim|required');
    $this->form_validation->set_rules('branch', 'branch', 'trim|required');
    $this->form_validation->set_rules('department', 'department', 'trim|required');
    $this->form_validation->set_rules('section', 'section', 'trim|required');
    $this->form_validation->set_rules('category', 'category', 'trim|required');
    $this->form_validation->set_rules('grp', 'grp', 'trim|required');
    $this->form_validation->set_rules('sitelocation', 'sitelocation', 'trim|required');
    $this->form_validation->set_rules('picemail', 'picemail', 'trim|required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');

    $this->form_validation->set_rules('id_document', 'id_document', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file document.php */
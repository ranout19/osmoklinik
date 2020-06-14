<?php 
class Poliklinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        checkAdmin();
        $this->load->model('poliklinik_m');
    }
    public function index()
    {
        $data['poliklinik'] = $this->poliklinik_m->getpoliklinik();
        $this->template->load('template', 'poliklinik/dataPoliklinik', $data);
    }
    public function tambah()
    {
        $jumlah = $this->poliklinik_m->getPoliklinik()->num_rows();
        $angka = $jumlah + 1;
        if (strlen($angka) == 1) {
            $kode = 'POLI0'.$angka;
        }else{
            $kode = 'POLI'.$angka;
        }
        $poliklinik = new stdClass();
        $poliklinik->kode_poliklinik = $kode;
        $poliklinik->nama_poliklinik = null;
        $data = [
            'page' => 'tambah',
            'row' => $poliklinik
        ];
        $this->template->load('template', 'poliklinik/formPoliklinik', $data);
    }
    public function edit($id)
    {
        $query = $this->poliklinik_m->getPoliklinik($id);
        if ($query->num_rows() > 0) {
            $poliklinik = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $poliklinik
            ];
            $this->template->load('template', 'poliklinik/formpoliklinik', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('poliklinik');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {

            $this->poliklinik_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('poliklinik');

        } else if (isset($post['edit'])) {
            
            $this->poliklinik_m->edit($post['id_poliklinik']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('poliklinik');
        }

        
    }
    public function hapus($id)
    {
        $this->poliklinik_m->hapus($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('poliklinik');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('poliklinik');
    }
}
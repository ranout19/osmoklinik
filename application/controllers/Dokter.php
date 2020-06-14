<?php 
class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        checkAdmin();
        $this->load->model(['dokter_m', 'poliklinik_m', 'user_m']);
    }
    public function index()
    {
        $data['dokter'] = $this->dokter_m->getDokter();
        $this->template->load('template', 'dokter/dataDokter', $data);
    }
    public function tambah()
    {
        $jumlah = $this->dokter_m->getDokter()->num_rows();
        $angka = $jumlah + 1;
        if (strlen($angka) == 1) {
            $kode = 'DOK0'.$angka;
        }else{
            $kode = 'DOK'.$angka;
        }
        $dokter = new stdClass();
        $dokter->kode_dokter = $kode;
        $dokter->nama_dokter = null;
        $dokter->spesialis_dokter = null;
        $dokter->alamat_dokter = null;
        $dokter->kode_poliklinik = null;
        $dokter->telepon_dokter = null;
        $dokter->tarif_dokter = null;
        $poliklinik = $this->poliklinik_m->getPoliklinik();
        $data = [
            'page' => 'tambah',
            'poliklinik' => $poliklinik,
            'row' => $dokter
        ];
        $this->template->load('template', 'dokter/formDokter', $data);
    }
    public function edit($kode)
    {
        $query = $this->dokter_m->getDokter($kode);
        if ($query->num_rows() > 0) {
            $dokter = $query->row();
            $poliklinik = $this->poliklinik_m->getPoliklinik();
            $data = [
                'page' => 'edit',
                'poliklinik' => $poliklinik,
                'row'=> $dokter
            ];
            $this->template->load('template', 'dokter/formDokter', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tkodeak ditemukan');
            redirect('dokter');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {
            $this->user_m->addDokter($post);
            $this->dokter_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('dokter');

        } else if (isset($post['edit'])) {
            
            $this->dokter_m->edit($post['kode_dokter']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('dokter');
        }

        
    }
    public function hapus($kode)
    {
        $this->dokter_m->hapus($kode);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('dokter');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('dokter');
    }
}
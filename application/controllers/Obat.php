<?php 
class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model('obat_m');
    }
    public function index()
    {
        checkApotek();
        $data['obat'] = $this->obat_m->getobat();
        $this->template->load('template', 'obat/dataObat', $data);
    }
    public function tambah()
    {
        $jumlah = $this->obat_m->getObat()->num_rows();
        $angka = $jumlah + 1;
        if (strlen($angka) == 1) {
            $kode = 'OBT0'.$angka;
        }else{
            $kode = 'OBT'.$angka;
        }
        $obat = new stdClass();
        $obat->kode_obat = $kode;
        $obat->nama_obat = null;
        $obat->jenis_obat = null;
        $obat->gender_obat = null;
        $obat->kategori_obat = null;
        $obat->harga_obat = null;
        $data = [
            'page' => 'tambah',
            'row' => $obat
        ];
        $this->template->load('template', 'obat/formObat', $data);
    }
    public function edit($kode)
    {
        $query = $this->obat_m->getObat($kode);
        if ($query->num_rows() > 0) {
            $obat = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $obat
            ];
            $this->template->load('template', 'obat/formObat', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('obat');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {

            $this->obat_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('obat');

        } else if (isset($post['edit'])) {
            
            $this->obat_m->edit($post['kode_obat']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('obat');
        }

        
    }
    public function hapus($kode)
    {
        $this->obat_m->hapus($kode);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('obat');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('obat');
    }
}
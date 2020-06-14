<?php 
class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['pasien_m','resep_m', 'pendaftaran_m', 'obat_m']);
    }
    public function index()
    {
        if ($this->utility->user_login()->level == 'dokter') {
            checkDokter();
            $kode_dokter = $this->utility->user_login()->kode_dokter;
            $data['pasien'] = $this->pendaftaran_m->getPendaftaranPoli($kode_dokter);
            $this->template->load('template', 'pendaftaran/dokter', $data);
        }else if ($this->utility->user_login()->level == 'admin'){
            checkReceipt();
            $data['pasien'] = $this->pasien_m->getpasien();
            $this->template->load('template', 'pasien/admin', $data);
        }else{
            checkReceipt();
            $data['pasien'] = $this->pasien_m->getpasien();
            $this->template->load('template', 'pasien/receipt', $data);
        }
    }
    public function diagnosa($nomorpen)
    {
        checkDokter();
        $nomor = rand(0, 1000000000);
        $pasien = $this->pendaftaran_m->getPendaftaran($nomorpen)->row();
        $obat = $this->obat_m->getobat();
        $data = [
            'pasien' => $pasien,
            'obat' => $obat,
            'nomor' => $nomor
        ];
        $this->template->load('template', 'resep/diagnosa', $data);
    }
    public function tambah()
    {
        checkReceipt();
        $jumlah = $this->pasien_m->getPasien()->num_rows();
        $angka = $jumlah + 1;
        if (strlen($angka) == 1) {
            $kode = 'PSN000'.$angka;
        }else if(strlen($angka) == 2){
            $kode = 'PSN00'.$angka;
        }else if(strlen($angka) == 3){
            $kode = 'PSN0'.$angka;
        }else if(strlen($angka) == 4){
            $kode = 'PSN'.$angka;
        }
        $pasien = new stdClass();
        $pasien->kode_pasien = $kode;
        $pasien->nama_pasien = null;
        $pasien->alamat_pasien = null;
        $pasien->gender_pasien = null;
        $pasien->umur_pasien = null;
        $pasien->telepon_pasien = null;
        $data = [
            'page' => 'tambah',
            'row' => $pasien
        ];
        $this->template->load('template', 'pasien/formPasien', $data);
    }
    public function edit($kode)
    {
        checkReceipt();
        $query = $this->pasien_m->getpasien($kode);
        if ($query->num_rows() > 0) {
            $pasien = $query->row();
            $data = [
                'page' => 'edit',
                'row'=> $pasien
            ];
            $this->template->load('template', 'pasien/formPasien', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('pasien');
        }
    }
    public function process()
    {
        checkReceipt();
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {

            $this->pasien_m->tambah($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('pasien');

        } else if (isset($post['edit'])) {
            
            $this->pasien_m->edit($post['kode_pasien']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('pasien');
        }

        
    }
    public function hapus($kode)
    {
        checkReceipt();
        $this->pasien_m->hapus($kode);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('pasien');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('pasien');
    }
}
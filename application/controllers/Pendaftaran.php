<?php 
class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['pasien_m', 'dokter_m', 'poliklinik_m', 'pendaftaran_m']);
    }
    public function index()
    {
        checkReceipt();
        $data['pendaftaran'] = $this->pendaftaran_m->getPendaftaran();
        if ($this->utility->user_login()->level == 'admin') {
            $this->template->load('template', 'pendaftaran/admin', $data);
        }else{
            $this->template->load('template', 'pendaftaran/dataPendaftaran', $data);
        }
    }
    public function poliklinik()
    {
        checkDokter();
        $kode_dokter = $this->utility->user_login()->kode_dokter;
        $data['pasien'] = $this->pendaftaran_m->getPendaftaranPoli($kode_dokter);
        $this->template->load('template', 'pendaftaran/pendaftaranPoli', $data);
    }
    public function tambah($kode)
    {
        $data['nomor'] = rand(0, 1000000000);
        $data['pasien'] = $this->pasien_m->getPasien($kode)->row();
        $data['dokter'] = $this->dokter_m->getDokter();
        $data['poliklinik'] = $this->poliklinik_m->getPoliklinik();
        $this->template->load('template', 'pendaftaran/formPendaftaran', $data);
    }
    public function process()
    {
    	$post = $this->input->post(null,true);
        if (isset($post['tambah'])) {
            $this->pendaftaran_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Pasien terdaftar');
            }
            redirect('pembayaran/tambah/'.$post['nomor_pendaftaran']);
        }
    }
    public function hapus($nomor)
    {
        $this->pendaftaran_m->hapus($nomor);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('pendaftaran');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('pendaftaran');
    }
    public function printdaftar($id)
    {
        $data['row'] = $this->item_m->getItem($id)->row();
        $html = $this->load->view('pendaftaran/report', $data, true);
        $this->utility->print($html, $data['row']->name, 'A4', 'landscape');
    }

}
<?php 
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['pembayaran_m', 'pasien_m', 'pendaftaran_m', 'resep_m']);
    }
    public function index()
    {
        if ($this->utility->user_login()->level == 'admin') {
            checkReceipt();
            $data['pembayaran'] = $this->pembayaran_m->getPembayaran();
            $this->template->load('template', 'pembayaran/admin', $data);
        }else if ($this->utility->user_login()->level == 'apotek') {
            $data['resep'] = $this->resep_m->getResep();
            $this->template->load('template', 'resep/dataPembayaran', $data);
        }else{
            checkReceipt();
            $data['pembayaran'] = $this->pembayaran_m->getPembayaran();
            $this->template->load('template', 'pembayaran/dataPembayaran', $data);
        }
    }
    public function resep()
    {
        $data['resep'] = $this->resep_m->getResep();
        $this->template->load('template', 'resep/admin', $data);
    }
    public function tambah($nomor)
    {
        $data['nomor'] = rand(0, 1000000000);
        $data['row'] = $this->pendaftaran_m->getPendaftaran($nomor)->row();
        $this->template->load('template', 'pembayaran/formPembayaran', $data);
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {
            $this->pembayaran_m->tambah($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
            }
            redirect('pembayaran');

        }
    }
    public function hapus($nomor)
    {
        $this->pembayaran_m->hapus($nomor);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('pembayaran');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('pembayaran');
    }
}
<?php 
class Resep extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['resep_m', 'poliklinik_m', 'pasien_m', 'dokter_m']);
    }
    public function index()
    {
        if ($this->utility->user_login()->level == 'dokter') {
            checkDokter();
            $kode_dokter = $this->utility->user_login()->kode_dokter;
            $diagnosa = $this->resep_m->getResepDokter($kode_dokter);
            $data = [
                'diagnosa' => $diagnosa
            ];
            $this->template->load('template', 'resep/dataResep', $data);
        }else{
            checkApotek();
            $diagnosa = $this->resep_m->getResep();
            $data = [
                'diagnosa' => $diagnosa
            ];
            $this->template->load('template', 'resep/dataApotek', $data);
        }
    }

    public function pembayaran($nomor)
    {
        $resep = $this->resep_m->getResep($nomor)->row();
        $data = [
            'resep' => $resep
        ];
        $this->template->load('template', 'resep/formResep', $data);
    }
    public function edit($id)
    {
        $query = $this->resep_m->getresep($id);
        if ($query->num_rows() > 0) {
            $resep = $query->row();
            $pasien = $this->pasien_m->getPasien();
	        $dokter = $this->dokter_m->getDokter();
	        $poliklinik = $this->poliklinik_m->getPoliklinik();
	        $data = [
	            'page' => 'edit',
	            'pasien' => $pasien,
	            'dokter' => $dokter,
	            'poliklinik' => $poliklinik,
	            'row' => $resep
	        ];
            $this->template->load('template', 'resep/formResep', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('resep');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        if (isset($post['edit'])) {
            
            $this->resep_m->edit($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
            redirect('pembayaran');
        }

        
    }
    public function hapus($id)
    {
        $this->resep_m->hapus($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('cantdelete', 'Data sudah digunakan tabel lain');
            redirect('resep');
        }
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('resep');
    }
}
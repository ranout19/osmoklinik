<?php 
class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        checkDokter();
        $this->load->model(['resep_m', 'pendaftaran_m', 'obat_m']);
    }
    public function index()
    {
        $kode_dokter = $this->utility->user_login()->kode_dokter;
        $diagnosa = $this->resep_m->getDiagnosaDokter($kode_dokter);
        $data = [
            'diagnosa' => $diagnosa
        ];
        $this->template->load('template', 'resep/dataDiagnosa', $data);
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
        $nomorp = $post['nomor_pendaftaran'];
        if (isset($post['tambah'])) {
            if ($post['resep'] != null) {
                $nomor = $post['nomor_resep'];
                for ($i=0; $i < count($post['kode_obat']); $i++) { 
                    $obat[$i] = $post['kode_obat'][$i];
                    $jumlah[$i] = $post['jumlah'][$i];
                    $dosis[$i] = $post['dosis'][$i];
                    $harga[$i] = $post['jumlah'][$i] * $post['harga_obat'][$i];
                    $this->db->query("INSERT INTO detail (nomor_resep, kode_obat, jumlahObt, hargaObt, dosis, subtotal) VALUES ('$nomor', '$obat[$i]', '$jumlah[$i]', '$harga[$i]', '$dosis[$i]', NULL)");
                    $this->db->query("UPDATE obat SET jumlah_obat = jumlah_obat - '$jumlah[$i]' WHERE kode_obat = '$obat[$i]'");
                }
                
                $query = $this->db->query("SELECT SUM(hargaObt) as hargaObt FROM detail WHERE nomor_resep = '$nomor'")->row();
                $this->db->query("UPDATE pendaftaran SET status = 1 WHERE nomor_pendaftaran = '$nomorp'");
                $subtotal = $query->hargaObt;
                for ($i=0; $i < count($post['kode_obat']); $i++) { 
                    $this->db->query("UPDATE detail SET subtotal = '$subtotal' WHERE nomor_resep = '$nomor'");
                }
                $this->resep_m->tambah($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'disimpan');
                }
                redirect('diagnosa');
            }else {
                $this->db->query("UPDATE pendaftaran SET status = 1 WHERE nomor_pendaftaran = '$nomorp'");
                $post['nomor_resep'] = 0;
                $this->resep_m->tambah($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'disimpan');
                }
                redirect('diagnosa');
            }
        } else if (isset($post['edit'])) {
            
            $this->resep_m->edit($post['id_resep']);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'diubah');
            }
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
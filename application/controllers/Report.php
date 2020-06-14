<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        notLogin();
		$this->load->model(['dokter_m', 'pasien_m', 'poliklinik_m','user_m','pendaftaran_m','pembayaran_m','obat_m']);
    }
	public function pendaftaran()
	{
		checkReceipt();
		$data['detail'] = '';
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['cari'])) {
			$awal = $post['awalin'];
			$akhir = $post['akhirin'];
			$data['pendaftaran'] = $this->db->query("SELECT * FROM pendaftaran INNER JOIN pasien ON pendaftaran.kode_pasien = pasien.kode_pasien INNER JOIN dokter ON pendaftaran.kode_dokter  = dokter.kode_dokter INNER JOIN poliklinik ON pendaftaran.kode_poliklinik = poliklinik.kode_poliklinik WHERE tanggal_pendaftaran BETWEEN '$awal' AND '$akhir'");
			if ($awal == $akhir) {
				$data['detail'] = tanggal($awal);
			}else{
				$data['detail'] = tanggal($awal).' - '.tanggal($akhir); 

			}
			$cek = $data['pendaftaran']->num_rows();
			if ($cek == 0) {
				$this->session->set_flashdata('warning', 'Data tidak ditemukan');
            	redirect('report/pendaftaran');
			}
		}else{
			$data['pendaftaran'] = $this->pendaftaran_m->getPendaftaran();
		}
		$this->template->load('template', 'pendaftaran/report', $data);
	}
	public function pembayaran()
	{
		checkReceipt();
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['cari'])) {
			$awal = $post['awalin'];
			$akhir = $post['akhirin'];
			$data['pembayaran'] = $this->db->query("SELECT * FROM pembayaran INNER JOIN pasien ON pembayaran.kode_pasien = pasien.kode_pasien WHERE tanggal_pembayaran BETWEEN '$awal' AND '$akhir'");
			$cek = $data['pembayaran']->num_rows();
			if ($cek == 0) {
				$this->session->set_flashdata('warning', 'Data tidak ditemukan');
            	redirect('report/pembayaran');
			}
		}else{
			$data['pembayaran'] = $this->pendaftaran_m->getPendaftaran();
		}
		$this->template->load('template', 'pembayaran/report', $data);
	}
}

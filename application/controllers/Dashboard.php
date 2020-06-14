<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		notLogin();
		$this->load->model(['dokter_m', 'pasien_m', 'poliklinik_m','user_m','pendaftaran_m','pembayaran_m','obat_m','resep_m']);
	}

	public function index()
	{
		$dokter = $this->dokter_m->getDokter()->num_rows();
		$pasien = $this->pasien_m->getPasien()->num_rows();
		$poliklinik = $this->poliklinik_m->getPoliklinik()->num_rows();
		$pendaftaran = $this->pendaftaran_m->getpendaftaran()->num_rows();
		$pembayaran = $this->pembayaran_m->getpembayaran()->result();
		$kode_dokter = $this->utility->user_login()->kode_dokter;
        $diagnosa = $this->resep_m->getDiagnosaDokter($kode_dokter)->num_rows();
        $resepDokter = $this->resep_m->getResepDokter($kode_dokter)->num_rows();
        $pasienDokter = $this->pendaftaran_m->getPendaftaranPoli($kode_dokter)->num_rows();
		$total = 0;
		foreach ($pembayaran as $result) {
			$total += $result->jumlah_pembayaran;
		}
		$query = $this->db->query("SELECT SUM(totalHarga) as semua FROM resep")->row();
		$semua = $query->semua;
		$user = $this->user_m->getUser()->num_rows();
		$obat = $this->obat_m->getobat()->num_rows();
		$resep = $this->resep_m->getResep()->num_rows();
		$data = [
			'dokter' => $dokter,
			'pasien' => $pasien,
			'poliklinik' => $poliklinik,
			'pendaftaran' => $pendaftaran,
			'obat' => $obat,
			'total' => $total,
			'resep' => $resep,
			'diagnosa' => $diagnosa,
			'semua' => $semua,
			'pasienDokter' => $pasienDokter,
			'resepDokter' => $resepDokter,
			'user' => $user
		];
		$this->template->load('template', 'dashboard', $data);
	}
}

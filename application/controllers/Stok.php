<?php 
class Stok extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        notLogin();
        checkApotek();
        $this->load->model(['obat_m', 'stok_m']);
    }
	public function masuk($aksi = null, $id = null, $kodeObat = null)
	{
		if ($aksi == null) {
			$data['row'] = $this->stok_m->getStok('masuk');
			$this->template->load('template', 'stok/masuk/data', $data);
		}elseif ($aksi == 'tambah') {
			$obat = $this->obat_m->getObat();
			$data = [
				'obat' => $obat
			];
			$this->template->load('template', 'stok/masuk/tambah', $data);
		}elseif ($aksi == 'hapus') {
			$qty = $this->stok_m->getStok('masuk', $id)->row()->qty;
			$data = [
				'qty' => $qty,
				'kode_obat' => $kodeObat
			];
			$this->stok_m->obat($data, 'keluar');
			$this->stok_m->hapus($id);
			if ($this->db->affected_rows() > 0) {
	            $this->session->set_flashdata('success', 'dihapus');
	            redirect('stok/masuk');
	        }
		}
	}
	public function keluar($aksi = null, $id = null, $kodeObat = null)
	{
			
		if ($aksi == null) {
			$data['row'] = $this->stok_m->getStok('keluar');
			$this->template->load('template', 'stok/keluar/data', $data);
		}elseif ($aksi == 'tambah') {
			$obat = $this->obat_m->getObat();
			$data = [
				'obat' => $obat
			];
			$this->template->load('template', 'stok/keluar/tambah', $data);
		}elseif ($aksi == 'hapus') {
			$qty = $this->stok_m->getStok(null, $id)->row()->qty;
			$data = [
				'qty' => $qty,
				'kode_obat' => $kodeObat
			];
			$this->stok_m->obat($data, 'masuk');
			$this->stok_m->hapus($id);
			if ($this->db->affected_rows() > 0) {
	            $this->session->set_flashdata('success', 'dihapus');
	            redirect('stok/keluar');
	        }
		}
	}
	public function proses()
	{
		$post = $this->input->post(null, true);
		if (isset($post['masuk'])) {
			$this->stok_m->tambah($post, 'masuk');
			$this->stok_m->obat($post, 'masuk');
			if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('stok/masuk');
            }
		}else if (isset($post['keluar'])) {
			$this->stok_m->tambah($post, 'keluar');
			$this->stok_m->obat($post, 'keluar');
			if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'ditambahkan');
                redirect('stok/keluar');
            }
		}
	}
}
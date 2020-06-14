<?php 

class Pembayaran_m extends CI_Model
{
    public function getPembayaran($nomor = null)
    {
        $this->db->from('pembayaran');
        $this->db->join('pasien', 'pasien.kode_pasien = pembayaran.kode_pasien');
        if ($nomor != null) {
        	$this->db->where('nomor_pembayaran', $nomor);
        }
        $this->db->order_by('created', 'desc');
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'nomor_pembayaran' => $post['nomor_pembayaran'],
            'kode_pasien' => $post['kode_pasien'],
            'tanggal_pembayaran' => $post['tanggal_pembayaran'],
            'jumlah_pembayaran' => $post['biaya_pendaftaran'],
            'bayar' => $post['bayar_pendaftaran'],
            'kembali' => $post['kembali']
        ];
        $this->db->insert('pembayaran', $data);
    }
    public function hapus($nomor)
    {
        $this->db->where('nomor_pembayaran', $nomor);
        $this->db->delete('pembayaran');
    }
}
<?php 

class Dokter_m extends CI_Model
{
    public function getdokter($kode = null)
    {
        $this->db->from('dokter');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = dokter.kode_poliklinik');
        if ($kode != null) {
        	$this->db->where('kode_dokter', $kode);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'kode_dokter' => $post['kode_dokter'],
            'nama_dokter' => $post['nama_dokter'],
            'spesialis_dokter' => $post['spesialis_dokter'],
            'alamat_dokter' => $post['alamat_dokter'],
            'telepon_dokter' => $post['telepon_dokter'],
            'kode_poliklinik' => $post['kode_poliklinik'],
            'tarif_dokter' => $post['tarif_dokter']
        ];
        $this->db->insert('dokter', $data);
    }
    public function edit($kode)
    {
        $post = $this->input->post(null,true);
        $data = [
            'kode_dokter' => $post['kode_dokter'],
            'nama_dokter' => $post['nama_dokter'],
            'spesialis_dokter' => $post['spesialis_dokter'],
            'alamat_dokter' => $post['alamat_dokter'],
            'telepon_dokter' => $post['telepon_dokter'],
            'kode_poliklinik' => $post['kode_poliklinik'],
            'tarif_dokter' => $post['tarif_dokter']
        ];
        $this->db->where('kode_dokter', $kode);
        $this->db->update('dokter', $data);
    }
    public function hapus($kode)
    {
        $this->db->where('kode_dokter', $kode);
        $this->db->delete('dokter');
    }
}
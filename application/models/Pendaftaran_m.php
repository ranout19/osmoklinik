<?php 

class Pendaftaran_m extends CI_Model
{
    public function getPendaftaran($nomor = null)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.kode_dokter = pendaftaran.kode_dokter');
        $this->db->join('pasien', 'pasien.kode_pasien = pendaftaran.kode_pasien');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = pendaftaran.kode_poliklinik');
        if ($nomor != null) {
        	$this->db->where('nomor_pendaftaran', $nomor);
        }
        $this->db->order_by('created', 'desc');
        return $this->db->get();
    }
    public function getPendaftaranPoli($kode_dokter)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.kode_dokter = pendaftaran.kode_dokter');
        $this->db->join('pasien', 'pasien.kode_pasien = pendaftaran.kode_pasien');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = pendaftaran.kode_poliklinik');        
        $this->db->where('pendaftaran.kode_dokter', $kode_dokter);
        return $this->db->get();
    }
    public function getPendaftaranPasien($nomor)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.kode_dokter = pendaftaran.kode_dokter');
        $this->db->join('pasien', 'pasien.kode_pasien = pendaftaran.kode_pasien');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = pendaftaran.kode_poliklinik');        
        $this->db->where('pendaftaran.nomor_pendaftaran', $nomor);
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'nomor_pendaftaran' => $post['nomor_pendaftaran'],
            'tanggal_pendaftaran' => $post['tanggal_pendaftaran'],
            'kode_pasien' => $post['kode_pasien'],
            'kode_dokter' => $post['kode_dokter'],
            'kode_poliklinik' => $post['kode_poliklinik'],
            'biaya_pendaftaran' => $post['biaya_pendaftaran'],
            'keluhan' => $post['keluhan'],
            'status' => 0
        ];
        $this->db->insert('pendaftaran', $data);
    }
    public function hapus($nomor)
    {
        $this->db->where('nomor_pendaftaran', $nomor);
        $this->db->delete('pendaftaran');
    }
}
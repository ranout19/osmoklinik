<?php 

class Resep_m extends CI_Model
{
    public function getResep($nomor = null)
    {
        $this->db->from('resep');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = resep.kode_poliklinik');
        $this->db->join('pasien', 'pasien.kode_pasien = resep.kode_pasien');
        $this->db->join('dokter', 'dokter.kode_dokter = resep.kode_dokter');
        if ($nomor != null) {
        	$this->db->where('nomor_resep', $nomor);
        }
        $this->db->where('nomor_resep !=', 0);
        $this->db->order_by('status', 'asc');
        return $this->db->get();
    }
    public function getResepDokter($kode_dokter)
    {
        $this->db->from('resep');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = resep.kode_poliklinik');
        $this->db->join('pasien', 'pasien.kode_pasien = resep.kode_pasien');
        $this->db->join('dokter', 'dokter.kode_dokter = resep.kode_dokter');
        $this->db->where('resep.kode_dokter', $kode_dokter);
        $this->db->where('nomor_resep !=', 0);
        return $this->db->get();
    }
    public function getDiagnosaDokter($kode_dokter)
    {
        $this->db->from('resep');
        $this->db->join('poliklinik', 'poliklinik.kode_poliklinik = resep.kode_poliklinik');
        $this->db->join('pasien', 'pasien.kode_pasien = resep.kode_pasien');
        $this->db->join('dokter', 'dokter.kode_dokter = resep.kode_dokter');
        $this->db->where('resep.kode_dokter', $kode_dokter);
        return $this->db->get();
    }
    public function hitungSubtotal()
    {
        $this->db->select_sum('hargaObat');
        $this->db->from('detail');
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'nomor_resep' => $post['nomor_resep'],
            'tanggal_resep' => $post['tanggal_resep'],
            'kode_pasien' => $post['kode_pasien'],
            'kode_dokter' => $post['kode_dokter'],
            'kode_poliklinik' => $post['kode_poliklinik'],
            'diagnosa' => $post['diagnosa']
        ];
        $this->db->insert('resep', $data);
    }
    public function edit($post)
    {
        $data = [
            'totalHarga' => $post['totalHarga'],
            'bayar' => $post['bayar'],
            'kembali' => $post['kembali'],
            'status' => 1
        ];
        $this->db->where('nomor_resep', $post['nomor_resep']);
        $this->db->update('resep', $data);
    }
    public function hapus($nomor)
    {
        $this->db->where('nomor_resep', $nomor);
        $this->db->delete('resep');
    }
}
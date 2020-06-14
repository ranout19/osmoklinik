<?php 

class Pasien_m extends CI_Model
{
    public function getpasien($kode = null)
    {
        $this->db->from('pasien');
        if ($kode != null) {
        	$this->db->where('kode_pasien', $kode);
        }
        $this->db->order_by('kode_pasien', 'asc');
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'kode_pasien' => $post['kode_pasien'],
            'nama_pasien' => $post['nama_pasien'],
            'alamat_pasien' => $post['alamat_pasien'],
            'gender_pasien' => $post['gender_pasien'],
            'umur_pasien' => $post['umur_pasien'],
            'telepon_pasien' => $post['telepon_pasien']
        ];
        $this->db->insert('pasien', $data);
    }
    public function edit($kode)
    {
        $post = $this->input->post(null,true);
        $data = [
            'kode_pasien' => $post['kode_pasien'],
            'nama_pasien' => $post['nama_pasien'],
            'alamat_pasien' => $post['alamat_pasien'],
            'gender_pasien' => $post['gender_pasien'],
            'umur_pasien' => $post['umur_pasien'],
            'telepon_pasien' => $post['telepon_pasien']
        ];
        $this->db->where('kode_pasien', $kode);
        $this->db->update('pasien', $data);
    }
    public function hapus($kode)
    {
        $this->db->where('kode_pasien', $kode);
        $this->db->delete('pasien');
    }
    public function getPendaftaranDokter()
    {
        $kode_dokter = $this->utility->user_login()->kode_dokter;
        $this->db->query("SELECT * FROM pendaftaran 
            INNER JOIN pasien ON pendaftaran.kode_pasien = pasien.kode_pasien 
            INNER JOIN dokter ON pendaftaran.kode_dokter = dokter.kode_dokter 
            INNER JOIN poliklinik ON pendaftaran.kode_poliklinik = poliklinik.kode_poliklinik
            WHERE kode_dokter = '$kode_dokter'");
    }
}
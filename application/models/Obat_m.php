<?php 

class Obat_m extends CI_Model
{
    public function getObat($kode = null)
    {
        $this->db->from('obat');
        if ($kode != null) {
        	$this->db->where('kode_obat', $kode);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'kode_obat' => $post['kode_obat'],
            'nama_obat' => $post['nama_obat'],
            'jenis_obat' => $post['jenis_obat'],
            'kategori_obat' => $post['kategori_obat'],
            'harga_obat' => $post['harga_obat'],
            'jumlah_obat' => 0
        ];
        $this->db->insert('obat', $data);
    }
    public function edit($kode)
    {
        $post = $this->input->post(null,true);
        $data = [
            'kode_obat' => $post['kode_obat'],
            'nama_obat' => $post['nama_obat'],
            'jenis_obat' => $post['jenis_obat'],
            'kategori_obat' => $post['kategori_obat'],
            'harga_obat' => $post['harga_obat'],
            'jumlah_obat' => $post['jumlah_obat']
        ];
        $this->db->where('kode_obat', $kode);
        $this->db->update('obat', $data);
    }
    public function hapus($kode)
    {
        $this->db->where('kode_obat', $kode);
        $this->db->delete('obat');
    }
}
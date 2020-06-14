<?php 

class Poliklinik_m extends CI_Model
{
    public function getPoliklinik($id = null)
    {
        $this->db->from('poliklinik');
        if ($id != null) {
        	$this->db->where('id_poliklinik', $id);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'kode_poliklinik' => $post['kode_poliklinik'],
            'nama_poliklinik' => $post['nama_poliklinik']
        ];
        $this->db->insert('poliklinik', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'kode_poliklinik' => $post['kode_poliklinik'],
            'nama_poliklinik' => $post['nama_poliklinik']
        ];
        $this->db->where('id_poliklinik', $id);
        $this->db->update('poliklinik', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_poliklinik', $id);
        $this->db->delete('poliklinik');
    }
}
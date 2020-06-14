<?php 

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        return $this->db->get();
    }
    public function getUser($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
        	$this->db->where('id_user', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'nama' => $post['namalengkap'],
            'telepon' => $post['telepon'],
            'username' => $post['username'],
            'password' => $post['password'],
            'level' => $post['level']
        ];
        $this->db->insert('user', $data);
    }
    public function addDokter($post)
    {
        $data = [
            'kode_dokter' => $post['kode_dokter'],
            'nama' => $post['nama_dokter'],
            'telepon' => $post['telepon_dokter'],
            'username' => $post['username'],
            'password' => $post['password'],
            'level' => 'dokter'
        ];
        $this->db->insert('user', $data);
    }
    public function edit($post)
    {
        $data = [
            'nama' => $post['namalengkap'],
            'telepon' => $post['telepon'],
            'username' => $post['username'],
            'password' => $post['password'],
            'level' => $post['level']
        ];
        $this->db->where('id_user', $post['id']);
        $this->db->update('user', $data);
    }
    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
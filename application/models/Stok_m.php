<?php 

class Stok_m extends CI_Model
{
	public function getStok($tipe, $id = null)
    {
        $this->db->select('*');
        $this->db->from('stok');
        $this->db->join('obat', 'obat.kode_obat = stok.kode_obat');
        $this->db->join('user', 'user.id_user = stok.user_id');
    	if ($tipe == 'masuk') {
    		$this->db->where('tipe', 'masuk');		
    	}else {
    		$this->db->where('tipe', 'keluar');
    	}
        if ($id != null) {
        	$this->db->where('id', $id);
        }
        return $this->db->get();
    }
	public function tambah($post, $tipe)
	{
		$params = [
			'kode_obat' => $post['kode_obat'],
			'tanggal' => date('y-m-d'),
			'tipe' => $tipe == 'masuk' ? 'masuk' : 'keluar',
			'qty' => $post['qty'],
			'keterangan' => $post['keterangan'],
			'user_id' => $this->session->userdata('id_user')
		];
		$this->db->insert('stok', $params);
	}
	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('stok');
	}
	public function obat($data, $tipe)
	{
		$qty = $data['qty'];
		$kode_obat = $data['kode_obat'];
		if ($tipe == 'masuk') {
			$this->db->query("UPDATE obat SET jumlah_obat = jumlah_obat + '$qty' WHERE kode_obat = '$kode_obat' ");
		}elseif ($tipe == 'keluar') {
			$this->db->query("UPDATE obat SET jumlah_obat = jumlah_obat - '$qty' WHERE kode_obat = '$kode_obat' ");
		}
	}
}
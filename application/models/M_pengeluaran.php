<?php

class M_pengeluaran extends CI_Model {
	protected $_table = 'pengeluaran';

	public function lihat(){
		$this->db->from($this->_table.' as p');
		$this->db->join('detail_keluar as dk','p.no_keluar=dk.no_keluar');
		$query=$this->db->get();
		return $query->result();
	} 

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_no_keluar($no_keluar){
		return $this->db->get_where($this->_table, ['no_keluar' => $no_keluar])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($no_keluar){
		return $this->db->delete($this->_table, ['no_keluar' => $no_keluar]);
	}

	public function kurang($name_barang, $qty){
		$query 		= $this->db->select('*');
		$query 		= $this->db->where(['nama_barang' => $name_barang]);
		$query 		= $this->db->get('detail_terima');
		$data_masuk = $query->row() ;

		$sisa 		= $data_masuk->jumlah - $qty;
	

		$data = array(
			'jumlah' => $sisa
		);

		$query_update = $this->db->set($data);
		$query_update = $this->db->where(['nama_barang' => $name_barang]);
		$query_update = $this->db->update('detail_terima');
	}
}
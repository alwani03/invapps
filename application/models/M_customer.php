<?php

class M_customer extends CI_Model{
	protected $_table = 'customer';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function total_quantity(){
		
		$this->db->select_sum('jumlah');
		$this->db->from('detail_keluar');
		$query 				 = $this->db->get();
		$count_detail_keluar = $query->result()[0]->jumlah;

		$this->db->select_sum('jumlah');
		$this->db->from('detail_terima');
		$query_2 			 = $this->db->get();
		$count_detail_terima = $query_2->result()[0]->jumlah;

		$total = $count_detail_keluar + $count_detail_terima;
	
		return $total;
	}

	public function lihat_cst(){
		$query = $this->db->select('nama');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_id($kode){
		$query = $this->db->get_where($this->_table, ['kode' => $kode]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $kode){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode' => $kode]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode){
		return $this->db->delete($this->_table, ['kode' => $kode]);
	}
}
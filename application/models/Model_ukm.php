<?php

class Model_ukm extends CI_Model{

	public function daftarecom($data)
	{
		$this->db->insert('tbl_daftar_ukm',$data);
	}
	public function tambahMaster($data)
	{
		$this->db->insert('tbl_master_ukm',$data);
	}
	public function tambahBerkas($data)
	{
		$this->db->insert('tbl_berkas',$data);
	}
	public function EditDaftar($daftar,$id_daftar)
	{
		$this->db->where('id_daftar',$id_daftar);
		$this->db->update('tbl_daftar_ukm',$daftar);
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mapp extends CI_Model {
	function test()
	{
		echo "HAI AMSI RESTU PRATAMA";
	}

	function get_data($table)
	{

		$q=$this->db->get($table);
		return $q->result();


	}
	function get_data_all_query($query)
	{

		$q=$this->db->query($query);
		return $q->result();

	}
	function get_data_all($table,$where=array())
	{

		$q=$this->db->get_where($table,$where);
		return $q->result();

	}
	function get_data_by($table,$where=array())
	{

		$q=$this->db->get_where($table,$where);
		return $q->row();

	}
	function get_data_by_query($query)
	{

		$q=$this->db->query($query);
		return $q->row();

	}
	function Add($table,$data)
	{
		$q = $this->db->insert($table, $data);
		return $q;
	}
	function Update($table, $data, $where)
	{
		$q=$this->db->update($table, $data,$where);
		return $q;
	}
}

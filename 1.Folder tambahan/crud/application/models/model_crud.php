<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_crud extends CI_Model {

	public function getUser($table_name)
	{
		$get_user = $this->db->get($table_name);
		return $get_user->result_array();
	}

	public function addData($table_name, $data){
		$add = $this->db->insert($table_name, $data);
		return $add;
	}

	public function editData($table_name,$data,$id){
		$this->db->where('id_produk', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function deleteData($table_name, $id){
		$this->db->where('id_produk',$id);
		$delete = $this->db->delete($table_name);
		return $delete;
	}

	public function dataEdit($table_name, $id){
		$this->db->where('id_produk',$id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$this->data['hasil'] = $this->model_crud->getUser('produk');
		$this->load->view('welcome_message', $this->data);
	}
	public function form_input(){
		$this->load->view('form-input');
	}
	public function insert(){
		$nama = $_POST['name'];
		$frslvl = $_POST['lvl'];
		$nmtk = $_POST['toko'];
		$kategori = $_POST['Kategori'];
		$desc = $_POST['desk'];
		$gambar = $_POST['img'];
		$data = array('nama_produk' => $nama, 'fresh_lvl' => $frslvl, 'nama_toko' => $nmtk, 'kategori' => $kategori, 'deskripsi' => $desc, 'gambar' => $gambar);
		$add = $this->model_crud->addData('produk',$data);
		if($add > 0){
			echo redirect('welcome/index');
		}
		else {
			echo 'Update Failed';
		}
	}

	public function delete($id){
		$del = $this->model_crud->deleteData('produk',$id);
		if($del > 0){
			echo redirect('welcome/index');
		}
		else {
			echo 'Update Failed';
		}
	}

	public function form_edit($id){
		$this->data['dataEdit'] = $this->model_crud->dataEdit('produk',$id);
		$this->load->view('form-edit',$this->data);
	}

	public function update($id){
		$name = $_POST['name'];
		$frslvl = $_POST['lvl'];
		$nmtk = $_POST['toko'];
		$kategori = $_POST['kategori'];
		$desc = $_POST['desk'];
		$gambar = $_POST['img'];
		$data = array('nama_produk' => $name, 'fresh_lvl' => $frslvl, 'nama_toko' => $nmtk, 'kategori' => $kategori, 'deskripsi' => $desc, 'gambar' => $gambar);
		$edit = $this->model_crud->editData('produk',$data,$id);
		if($edit > 0){
			echo redirect('welcome/index');
		} else {
			echo 'Update Failed';
		}
	}
}

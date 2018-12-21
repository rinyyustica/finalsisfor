<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$data['query'] = $this->model_customer->tampil_data();
		$this->load->view('admin/customer', $data);
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}

	//

	
	function __construct(){
		parent:: __construct();
		$this->load->model('model_customer');
	}
	public function tampil()
	{
		$data['query'] = $this->model_customer->tampil_data();
		$this->load->view('admin/customer', $data);
	}
	
	public function simpan()
	{
		$data = array('nama' => $this->input->post('nama'), 'email' => $this->input->post('email'), 
		'no_telp' => $this->input->post('no_telp'), 'instagram' => $this->input->post('instagram'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'), 'pekerjaan' => $this->input->post('pekerjaan'),
		'instansi' => $this->input->post('instansi'));
		$proses = $this->model_customer->input_data($data);
	if (!$proses) {
		header('location:'.base_url('index.php/admin/customer').$this->index());
	} else {
		echo "Data Gagal Disimpan";
		echo "<br>";
		echo "<a href='".base_url('index.php/admin/customer')."'>Kembali ke form</a>";
		}
	
	}
	
	public function edit()
	{
		$id_customer = $this->uri->segment(3);
		$data['query'] = $this->model_customer->edit_data($id_customer);
		$this->load->view('admin/customerEdit', $data);
	}
	
	public function update()
	{
		$id_customer = $this->input->post('id_customer');
		$data = array('nama' => $this->input->post('nama'), 'email' => $this->input->post('email'), 
		'no_telp' => $this->input->post('no_telp'), 'instagram' => $this->input->post('instagram'),
		'tanggal_lahir' => $this->input->post('tanggal_lahir'), 'pekerjaan' => $this->input->post('pekerjaan'),
		'instansi' => $this->input->post('instansi'));
		$proses = $this->model_customer->update_data($id_customer, $data);
	if (!$proses) {
		header('location:'.base_url('index.php/admin/customer').$this->index());
	} else {
		echo "Data Gagal Disimpan";
		echo "<br>";
		echo "<a href='".base_url('index.php/admin/customer')."'>Kembali ke form</a>";
		}
	}
	
	public function hapus()
	{
		$id_customer = $this->uri->segment(3);
		$proses = $this->model_customer->hapus_data($id_customer);
	if (!$proses) {
		redirect(base_url('index.php/admin/customer'));
	} else {
		echo "Data Gagal dihapus";
		echo "<br>";
		echo "<a href='".base_url('index.php/admin/customer')."'>Tampil data</a>";
		}
	}
	
}

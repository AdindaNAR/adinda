<?php
	//panggil file
	include '../Database.php';
	include '../model/Pegawai_model.php';
class Pegawai{
	public $model;
	function __construct(){
		$db = new Database();
		$conn = $db->DBConnect();
		$this->model = new Pegawai_model($conn);
		//menghilangkan pesan error
	}

	function index(){	//function index = pertama kali diakses

		$hasil = $this->model->tampil_data();

		return $hasil;
	}
}

?>
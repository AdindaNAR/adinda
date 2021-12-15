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
	function index(){
		session_start();
		if (!empty($_SESSION)) {//session = untuk menyimpan data temporary
			$pegawai = $this->model->tampil_data();
			return $pegawai;
		}else{
			header("Location:index.php");
		}
	}

	function getData($id){
		$pegawai = $this->model->getData($id);
		return $pegawai;
	}

	function getJenisData(){
		$posisiPegawai = $this->model->getJenisData();
		echo json_encode($posisiPegawai);
	}

	function hapusPegawai(){
		if (isset($_POST['delete'])) {
			$id = $_POST['id'];

			$result = $this->model->hapusData($id);
			if($result){
				header("Location:content.php?pesan=success&frm=del");
			}else{
				header("Location:content.php?pesan=gagal&frm=del");
			}
		}
	}

	function simpanPegawai(){
		if(isset($_POST['simpan'])){
  		$kd_pegawai = $_POST['kdPegawai'];
      	$nama_pegawai = $_POST['namaPegawai'];//name/id kolom
  		$posisi_pegawai = $_POST['posisiPegawai'];
  		$alamat_pegawai = $_POST['alamatPegawai'];
  		$no_telp = $_POST['noTelp'];

  		$data[] = array(
  			'kd_pegawai' => $kd_pegawai,
  			'nama_pegawai' => $nama_pegawai,
  			'posisi_pegawai' => $posisi_pegawai,
  			'alamat_pegawai' => $alamat_pegawai,
  			'no_telp' => $no_telp
  		);
  		$result = $this->model->simpanData($data);
  			if($result){
  				header("Location:content.php?pesan=success&frm=add");
  			}else{
  				header("Location:content.php?pesan=gagal&frm=add");
  			}
		}
	}
function simpanPosisiPegawai(){
  		$posisi_pegawai = $_POST['posisiPegawai'];
  		$data[] = array(
  			'posisi_pegawai' => $posisi_pegawai,
  		);
  		$result = $this->model->simpanPosisiData($data);
  			if($result){
  				echo'200';
  			}else{
  				echo'300';
  			}
		}

	function updatePegawai($id){
		if(isset($_POST['update'])){
  		$kd_pegawai = $_POST['kdPegawai'];
      	$nama_pegawai = $_POST['namaPegawai'];//name/id kolom
  		$posisi_pegawai = $_POST['posisiPegawai'];
  		$alamat_pegawai = $_POST['alamatPegawai'];
  		$no_telp = $_POST['noTelp'];

  		$data = array(
  			'kd_pegawai' => $kd_pegawai,
  			'nama_pegawai' => $nama_pegawai,
  			'posisi_pegawai' => $posisi_pegawai,
  			'alamat_pegawai' => $alamat_pegawai,
  			'no_telp' => $no_telp
  		);
  		$result = $this->model->updateData($data,$id);
  			if($result){
  				header("Location:content.php?pesan=success&frm=edit");
  			}else{
  				header("Location:content.php?pesan=gagal&frm=edit");
  			}
  		}
	}
	function logout(){
		if (isset($_POST['logout'])) {
			session_start();
			session_destroy();
			header("Location:index.php?pesan=success&frm=logout");	
		}
	}

}

?>
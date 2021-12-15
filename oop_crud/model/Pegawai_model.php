<?php

class Pegawai_model{

	protected $db;
	function __construct($db){ //fungsi function construct = autoload
		$this->db = $db;
	}

	function tampil_data()
	{
		$row = $this->db->prepare("SELECT * FROM tbl_pegawai");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function getData($id)
	{
		$row =$this->db->prepare("SELECT * FROM tbl_pegawai where id = $id");
		$row->execute();
		return $hasil = $row->fetch();
	}

	function getJenisData()
	{
		$row = $this->db->prepare("SELECT * FROM tbl_posisi_pegawai");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function simpanData($data)
	{
		//buat array untuk isi values insert sumber kode
		$rowsSQL = array();
		//buat bind param Prepared Statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom / values
		foreach($data as $arrayIndex => $row){
			$params = array();
		foreach($row as $columnName => $columnValue){
			$param = ":" . $columnName . $arrayIndex;
			$params[] = $param;
			$toBind[$param] = $columnValue; 
		}
		$rowsSQL[] = "(" . implode(", ", $params) . ")";
	}
		$sql = "INSERT INTO tbl_pegawai (". implode(", ", $columnNames).") VALUES " . implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind Our Values
		foreach ($toBind as $param => $val) {
			$row -> bindValue($param, $val);
		}
		//execute our statement(i.e. insert the data)
		return $row->execute();
	}
	function simpanPosisiData($data)
	{
		//buat array untuk isi values insert sumber kode
		$rowsSQL = array();
		//buat bind param Prepared Statement
		$toBind = array();
		//list nama kolom
		$columnNames = array_keys($data[0]);
		//looping untuk mengambil isi dari kolom / values
		foreach($data as $arrayIndex => $row){
			$params = array();
		foreach($row as $columnName => $columnValue){
			$param = ":" . $columnName . $arrayIndex;
			$params[] = $param;
			$toBind[$param] = $columnValue; 
		}
		$rowsSQL[] = "(" . implode(", ", $params) . ")";
	}
	$sql = "INSERT INTO tbl_posisi_pegawai (". implode(", ", $columnNames).") VALUES " . implode(", ", $rowsSQL);
		$row = $this->db->prepare($sql);
		//Bind Our Values
		foreach ($toBind as $param => $val) {
			$row -> bindValue($param, $val);
		}
		//execute our statement(i.e. insert the data)
		return $row->execute();
	}

		function updateData($data,$id)
		{
			$setPart = array();
			foreach ($data as $key => $value)
			{
				$setPart[] = $key. "=:" .$key;
			}
			$sql = "UPDATE tbl_pegawai SET ".implode(', ', $setPart)." WHERE id = :id";
			$row = $this->db->prepare($sql);
			//Bind our values
			$row->bindValue(':id',$id);//where
			foreach ($data as $param => $val) 
			{
				$row ->bindValue($param, $val);
			}
			return $row->execute();
		}
		
		function hapusData($id)
		{
			$sql = "DELETE FROM tbl_pegawai WHERE id = ?";
			$row = $this->db->prepare($sql);
			return $row -> execute(array($id));
		}
	
}



?>
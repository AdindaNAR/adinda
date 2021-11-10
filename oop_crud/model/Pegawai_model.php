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
}



?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_training extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

	function get_training(){

	  return $this->db->get('data_training')->result();
	  }

	function get_proses(){

	  return $this->db->get('hasil_testing')->result();
	  }

	 public function simpan($nama,$alamat,$status_penguasaan_B,$jenis_lantai_terluas,$jenis_dinding_terluas,$kualitas_bangunan,$jenis_atap_terluas,$kualitas_atap,$sumber_air,$daya_listrik,$setatus)

	{
        $hasil=$this->db->query("INSERT INTO data_training(nama,alamat,status_penguasaan_B,jenis_lantai_terluas,jenis_dinding_terluas,kualitas_bangunan,jenis_atap_terluas,kualitas_atap,sumber_air,daya_listrik,setatus) VALUES ('$nama','$alamat','$status_penguasaan_B','$jenis_lantai_terluas','$jenis_dinding_terluas','$kualitas_bangunan','$jenis_atap_terluas','$kualitas_atap','$sumber_air','$daya_listrik','$setatus')");
        return $hasil;
    }

    function delete($params =''){
        $sql = "DELETE  FROM data_training WHERE id = ? ";
        return $this->db->query($sql, $params);	
        }

	function edit($id,$troop_) 
    {
        
        $this->db->where('id', $id);
        $this->db->update('data_training', $troop_);
    }	
	  
	

}
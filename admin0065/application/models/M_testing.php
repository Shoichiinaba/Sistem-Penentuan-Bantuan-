<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_testing extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }


	public function simpan($no_kk,$nama,$alamat,$status_bangunan,$jenis_lantai,$jenis_dinding,$kualitas_bang,$jenis_atap,$kualitas_atap,$sumber_air,$daya_listrik,$hasil_dapat,$has_tdapat,$hasil_prediksi,$tahun)
	{
        $hasil=$this->db->query("INSERT INTO hasil_testing(no_kk,nama,alamat,status_bangunan,jenis_lantai,jenis_dinding,kualitas_bang,jenis_atap,kualitas_atap,sumber_air,daya_listrik,hasil_dapat,hasil_tdapat,hasil_prediksi,tahun) VALUES ('$no_kk','$nama','$alamat','$status_bangunan','$jenis_lantai','$jenis_dinding','$kualitas_bang','$jenis_atap','$kualitas_atap','$sumber_air','$daya_listrik','$hasil_dapat','$has_tdapat','$hasil_prediksi','$tahun')");
        return $hasil;
    }
    function delete($params =''){
        $sql = "DELETE  FROM hasil_testing WHERE no_kk = ? ";
        return $this->db->query($sql, $params);	
        }

    function ubah($no_kk,$troop_) 
    {
        
        $this->db->where('no_kk', $no_kk);
        $this->db->update('hasil_testing', $troop_);
    }

    public function get_cetak($no_kk){
      $this->db->select('hasil_testing.*');
      $this->db->where('no_kk',$no_kk);
      $sql = $this->db->get('hasil_testing');
        return ($sql->num_rows() < 1)?'NO_DATA_QUERY':$sql->result_array();
  }

  function cetak(){
         
        $query = $this->db->get('hasil_testing');
        return $query->result();
    }

}
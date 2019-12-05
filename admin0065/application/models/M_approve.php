<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_approve extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

	function get_approve($hasil_prediksi = 'Dapat',$tgl_renovasi = '')
	{
		$this->db->select('hasil_testing.*');
		$this->db->where('hasil_prediksi', $hasil_prediksi);
		$this->db->where('tgl_renovasi', $tgl_renovasi);
		$query = $this->db->get('hasil_testing');
		return $query->result();

	  // return $this->db->get('hasil_testing')->result();
	}
	  function validat($no_kk,$troop_) 
    {
        
        $this->db->where('no_kk', $no_kk);
        $this->db->update('hasil_testing', $troop_);
    }

    function get_list($status_approved = '1')
	{
		$this->db->select('hasil_testing.*');
		$this->db->where('status_approved', $status_approved);
		$query = $this->db->get('hasil_testing');
		return $query->result();

	  // return $this->db->get('hasil_testing')->result();
	}

	function delete($params ='')
	{
        $sql = "DELETE  FROM hasil_testing WHERE no_kk = ? ";
        return $this->db->query($sql, $params);	
    }

    function cetak($hasil_prediksi = 'Dapat', $status_approved = '1')
	{
		$this->db->select('hasil_testing.*');
		$this->db->where('hasil_prediksi', $hasil_prediksi);
		$this->db->where('status_approved', $status_approved);
		$query = $this->db->get('hasil_testing');
		return $query->result();

	}

}
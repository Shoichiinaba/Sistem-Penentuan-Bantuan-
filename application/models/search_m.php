<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    class search_m extends CI_Model {
    	
	function __construct()
	{
		parent::__construct();
	}
	function index() 
		{
			
		}
	
    function search_status($no_kk)
    {
		$this->db->like('no_kk', $no_kk , 'both');
		$this->db->order_by('no_kk', 'DESC');
		$this->db->limit(1);
		return $this->db->get('hasil_testing')->result();
	}

	function get_detail($where,$table)
	{
		return $this->db->get_where($table,$where);
		
	 }
	 public function get_cetak($no_kk){
      $this->db->select('hasil_testing.*');
      $this->db->where('no_kk',$no_kk);
      $sql = $this->db->get('hasil_testing');
        return ($sql->num_rows() < 1)?'NO_DATA_QUERY':$sql->result_array();
  }

    
			
}


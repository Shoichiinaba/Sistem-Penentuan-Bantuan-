<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	function get_admin_kel($role ='Sos Kelurahan'){
        $this->db->select('admin.*');
		$this->db->where('role', $role);
		$query = $this->db->get('admin');
		return $query->result();
    }

    function get_admin_din($role ='Dinas Sosial'){
        $this->db->select('admin.*');
		$this->db->where('role', $role);
		$query = $this->db->get('admin');
		return $query->result();
    }

    // Update Profil
    public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	// Dasboard notivikasi kelurahan
	public function get_permohonan()
	{

       $data = $this->db->get('hasil_testing');

       return $data->num_rows();
  	}
  	function get_dapat($hasil_prediksi = 'Dapat')
  	{

        $data = $this->db->query("SELECT * FROM hasil_testing WHERE hasil_prediksi = '$hasil_prediksi'");
        return $data->num_rows();
    }
    function get_tdapat($hasil_prediksi = 'Tidak Dapat')
    {

        $data = $this->db->query("SELECT * FROM hasil_testing WHERE hasil_prediksi = '$hasil_prediksi'");
        return $data->num_rows();
    }
    // Dasboard notivikasi dinsos
	function approve($status_approved = '1')
  	{

        $data = $this->db->query("SELECT * FROM hasil_testing WHERE status_approved = '$status_approved'");
        return $data->num_rows();
    }
  	
    function proses($hasil_prediksi = 'Dapat',$status_approved = '0')
	{
		$this->db->select('hasil_testing.*');
		$this->db->where('hasil_prediksi', $hasil_prediksi);
		$this->db->where('status_approved', $status_approved);
		$query = $this->db->get('hasil_testing');
		return $query->num_rows();
	}




    function masuk($hasil_prediksi = 'Dapat')
    {

        $data = $this->db->query("SELECT * FROM hasil_testing WHERE hasil_prediksi = '$hasil_prediksi'");
        return $data->num_rows();
    }

    function hapus($params =''){
        $sql = "DELETE  FROM admin WHERE id = ? ";
        return $this->db->query($sql, $params); 
        }

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
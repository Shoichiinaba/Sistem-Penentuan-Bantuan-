<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_simpan extends CI_controller {
	function __construct()
    {
        parent::__construct();
        $this->load->model('M_bantuan');
    }
    function index(){
    	$no_kk = $_POST['no_kk'];
    	$nama = $_POST['nama'];
    	$alamat = $_POST['alamat'];
    	$status_bangunan = $_POST['status_bangunan'];
    	$jenis_lantai = $_POST['jenis_lantai'];
    	$jenis_dinding = $_POST['jenis_dinding'];
    	$kualitas_bang = $_POST['kualitas_bang'];
    	$kualitas_atap = $_POST['kualitas_atap'];
    	$jenis_atap = $_POST['jenis_atap'];
    	$sumber_air = $_POST['sumber_air'];
    	$daya_listrik = $_POST['daya_listrik'];
    	$dapat = $_POST['dapat'];
    	$tidak_dapat = $_POST['Tidak_Dapat'];
    	$status = $_POST['Status'];

    	$data = array();
    	for($i = 0; $i<count($no_kk); $i++){
    		array_push($data, array(
    			'no_kk'=>$no_kk[$i],
    			'nama'=>$nama[$i],
    			'alamat'=>$alamat[$i],
    			'status_bangunan'=>$status_bangunan[$i],
    			'jenis_lantai'=>$jenis_lantai[$i],
    			'jenis_dinding'=>$jenis_dinding[$i],
    			'kualitas_bang'=>$kualitas_bang[$i],
    			'kualitas_atap'=>$kualitas_atap[$i],
    			'jenis_atap'=>$jenis_atap[$i],
    			'sumber_air'=>$sumber_air[$i],
    			'daya_listrik'=>$daya_listrik[$i],
    			'hasil_dapat'=>$dapat[$i],
    			'hasil_tdapat'=>$tidak_dapat[$i],
    			'hasil_prediksi'=>$status[$i]
    		));
    	}
    	$this->M_bantuan->insert_multiple($data);

    }
}
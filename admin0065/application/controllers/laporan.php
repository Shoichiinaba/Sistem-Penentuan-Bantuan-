<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {
		function __construct() {
		parent::__construct();
		$this->load->model('M_testing');
        $this->load->model('M_approve');
		}
		function index()
	{
    
	}		

    function laprec($no_kk)
    {
     

        $data = $this->M_testing->get_cetak($no_kk);
        
        if($data != 'NO_DATA_QUERY'){
            $no_kk = $data[0]['no_kk'];
            $nama = $data[0]['nama'];
            $alamat = $data[0]['alamat'];
            $status_bangunan = $data[0]['status_bangunan'];
            $jenis_lantai = $data[0]['jenis_lantai'];
            $jenis_dinding = $data[0]['jenis_dinding'];
            $kualitas_bang = $data[0]['kualitas_bang'];
            $jenis_atap = $data[0]['jenis_atap'];
            $kualitas_atap = $data[0]['kualitas_atap'];
            $sumber_air = $data[0]['sumber_air'];
            $daya_listrik = $data[0]['daya_listrik'];
            $hasil_dapat = $data[0]['hasil_dapat'];
            $hasil_tdapat = $data[0]['hasil_tdapat'];
            $hasil_prediksi = $data[0]['hasil_prediksi'];
            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(106,12,'Alamat: Jl. Subali Raya',0,0,'C');
        $pdf->Cell(15,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(50,12,'Code Pos: 50146',0,0,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(6);

        // konten lampiran
        $pdf->SetFont('Arial','',12);
        $pdf->Ln();
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Data Pengajuan Sudah Di Proses Kelurahan', 0, 0, 'C'); 
        $pdf->Cell(85, 4,'', 0, 0, 'C');
        $pdf->Ln(4);


        //konten isi:
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(35, 4, 'Nama Penerima Bantuan :', 0, 0, 'L');
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'No KK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$no_kk, 0, 0, 'L');
        $pdf->Ln(5); 
        $pdf->Cell(35, 4, 'Nama Lengkap', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4, 'Kriteria Rumah :', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(91,246,127);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('Status Bangunan','Jenis Lantai','Jenis Dinding','Kualitas Bang.','Kualitas Atap','Jenis Atap','Sumber Air','Daya Listrik');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(30,22,24,28,28,20,26,20);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        
            $pdf->Cell($w[0],6,$status_bangunan,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$jenis_lantai,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$jenis_dinding,'LR',0,'C',$fill);
            $pdf->Cell($w[3],6,$kualitas_bang,'LR',0,'C',$fill);
            $pdf->Cell($w[4],6,$jenis_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[5],6,$kualitas_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[6],6,$sumber_air,'LR',0,'C',$fill);
            $pdf->Cell($w[5],6,$daya_listrik,'LR',0,'C',$fill);
        

        $pdf->Ln();
        $fill = !$fill;
        $pdf->Cell(array_sum($w),0,'','T');
        // Tabel Hasil Penilaian
        $pdf->Ln(8);
        $pdf->Cell(35, 4, 'Hasil Penilaian :', 0, 0, 'L');
        $pdf->Ln(10);
        // Data
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(18,210,251);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('Penilaian Dapat','Penilaian Tidak Dapat','Hasil Penentuan');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(40,40,40);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        
            $pdf->Cell($w[0],6,$hasil_dapat,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$hasil_tdapat,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$hasil_prediksi,'LR',0,'C',$fill);
        
        $pdf->Ln();
        $fill = !$fill;
        $pdf->Cell(array_sum($w),0,'','T'); 

        // Pengesahan
        $pdf->Ln(20);
        $pdf->Ln(10);
        $pdf->Cell(176, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(173, 4, 'Mengetahui,', 0, 0, 'R');
        $pdf->Ln(6);
       
        $pdf->Cell(176, 4, 'Lurah Krapyak', 0, 0, 'R');
        $pdf->Ln(18);
        $pdf->Image(base_url(). "assets/img/stm.png",155,172,'C');
        $pdf->Cell(183, 4,'TITIK SUHARNI, SH, MS.i', 0, 0, 'R');
        $pdf->setlinewidth(0.3);
       
        $pdf->Line(199,198,150,198);
        $pdf->Ln(5);
    
        $pdf->Cell(146, 4, 'NIP', 0, 0, 'R');
        $pdf->Cell(183, 4,': 19690225 199703 2 004', 0, 0, 'L');

        $pdf->Ln(25);
        $pdf->Image(base_url(). "assets/img/par.png",160,170,'C');
        $pdf->Output();
        
        }
    }

    function lapall()
    {
     if ($this->session->userdata('Auth') == false){


        // $data = $this->M_testing->cetak();
        
        $this->load->library('pdf');
        $pdf = new FPDF('L','mm','legal');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(106,12,'Alamat: Jl. Subali Raya',0,0,'C');
        $pdf->Cell(90,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(100,12,'Code Pos: 50146',0,0,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(6);

        // konten lampiran
        $pdf->SetFont('Arial','B',12);
        $pdf->Ln();
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Laporan Data Pengajuan Sudah Di Proses Kelurahan', 0, 0, 'C'); 
        $pdf->Cell(85, 4,'', 0, 0, 'C');
        $pdf->Ln(4);
        // Tabel Konten
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',9);
        $pdf->SetFillColor(91,246,127);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('No KK','Nama','Alamat','Status Bangunan','Jenis Lantai','Jenis Dinding','Kualitas Bang.','Kualitas Atap','Jenis Atap','Sumber Air','Daya Listrik','Dapat','Tidak dapat','Status');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(28,33,28,30,20,24,26,26,20,26,20,20,20,20);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFont('Arial','',8);
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        foreach ($this->M_testing->cetak() as $row):
            $pdf->Cell($w[0],6,$row->no_kk,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$row->nama,'LR',0,'L',$fill);
            $pdf->Cell($w[0],6,$row->alamat,'LR',0,'L',$fill);
            $pdf->Cell($w[3],6,$row->status_bangunan,'LR',0,'C',$fill);
            $pdf->Cell($w[10],6,$row->jenis_lantai,'LR',0,'C',$fill); 
            $pdf->Cell($w[5],6,$row->jenis_dinding,'LR',0,'C',$fill);
            $pdf->Cell($w[6],6,$row->kualitas_bang,'LR',0,'C',$fill);
            $pdf->Cell($w[6],6,$row->jenis_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[13],6,$row->kualitas_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[6],6,$row->sumber_air,'LR',0,'C',$fill);
            $pdf->Cell($w[10],6,$row->daya_listrik,'LR',0,'C',$fill);
            $pdf->Cell($w[13],6,$row->hasil_dapat,'LR',0,'C',$fill);
            $pdf->Cell($w[10],6,$row->hasil_tdapat,'LR',0,'C',$fill);
            $pdf->Cell($w[10],6,$row->hasil_prediksi,'LR',0,'C',$fill);
        

        $pdf->Ln();
        $fill = !$fill;
        endforeach;
    $pdf->Cell(array_sum($w),0,'','T');

        $pdf->Output();
        
        
    }
}
// Cetak laporan milik kelurahan
function lapdin($no_kk)
    {
     

        $data = $this->M_testing->get_cetak($no_kk);
        
        if($data != 'NO_DATA_QUERY'){
            $no_kk = $data[0]['no_kk'];
            $nama = $data[0]['nama'];
            $alamat = $data[0]['alamat'];
            $status_bangunan = $data[0]['status_bangunan'];
            $jenis_lantai = $data[0]['jenis_lantai'];
            $jenis_dinding = $data[0]['jenis_dinding'];
            $kualitas_bang = $data[0]['kualitas_bang'];
            $kualitas_atap = $data[0]['kualitas_atap'];
            $jenis_atap = $data[0]['jenis_atap'];
            $kualitas_atap = $data[0]['kualitas_atap'];
            $sumber_air = $data[0]['sumber_air'];
            $daya_listrik = $data[0]['daya_listrik'];
            $hasil_dapat = $data[0]['hasil_dapat'];
            $hasil_tdapat = $data[0]['hasil_tdapat'];
            $hasil_prediksi = $data[0]['hasil_prediksi'];
            $status_approved = $data[0]['status_approved'];
            $tgl_sosial = $data[0]['tgl_sosial'];
            $tgl_renovasi = $data[0]['tgl_renovasi'];
            $keterangan = $data[0]['keterangan'];
            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(106,12,'Alamat: Jl. Subali Raya',0,0,'C');
        $pdf->Cell(15,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(50,12,'Code Pos: 50146',0,0,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(6);

        // konten lampiran
        $pdf->SetFont('Arial','',12);
        $pdf->Ln();
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Data Pengajuan Sudah Di Approve Dinas Sosial ', 0, 0, 'C'); 
        $pdf->Cell(85, 4,'', 0, 0, 'C');
        $pdf->Ln(4);


        //konten isi:
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(35, 4, 'Nama Penerima Bantuan :', 0, 0, 'L');
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'No KK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$no_kk, 0, 0, 'L');
        $pdf->Ln(5); 
        $pdf->Cell(35, 4, 'Nama Lengkap', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4, 'Kriteria Rumah :', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(18,210,251);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('Status Bangunan','Jenis Lantai','Jenis Dinding','Kualitas Bang.','Kualitas Atap','Jenis Atap','Sumber Air','Daya Listrik');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(30,22,24,28,28,20,26,20);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        
            $pdf->Cell($w[0],6,$status_bangunan,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$jenis_lantai,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$jenis_dinding,'LR',0,'C',$fill);
            $pdf->Cell($w[3],6,$kualitas_bang,'LR',0,'C',$fill);
            $pdf->Cell($w[4],6,$jenis_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[5],6,$kualitas_atap,'LR',0,'C',$fill);
            $pdf->Cell($w[6],6,$sumber_air,'LR',0,'C',$fill);
            $pdf->Cell($w[5],6,$daya_listrik,'LR',0,'C',$fill);
        

        $pdf->Ln();
        $fill = !$fill;
        $pdf->Cell(array_sum($w),0,'','T');
        // Tabel Hasil Penilaian
        $pdf->Ln(8);
        $pdf->Cell(35, 4, 'Hasil Penilaian :', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Image(base_url(). "assets/img/Dinas-Sosial-Manado-Salurkan-Rastra-Tiga-Kecamatan.png",25,78,'C');
        // Data
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(31,255,163);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('Penilaian Dapat','Penilaian Tidak Dapat','Hasil Penentuan');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(40,40,40);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFillColor(170,78,235);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        
            $pdf->Cell($w[0],6,$hasil_dapat,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$hasil_tdapat,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$hasil_prediksi,'LR',0,'C',$fill);
        
        $pdf->Ln();
        $fill = !$fill;
        $pdf->Cell(array_sum($w),0,'','T'); 
        // Tabel Hasil Approve Dinsos
        $pdf->Ln(8);
        $pdf->Cell(35, 4, 'Approve DINSOS :', 0, 0, 'L');
        $pdf->Ln(10);
        // Data
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(170,78,235);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('Status Approve','Tanggal Sosialisasi','Tanggal Renovasi','Keterangan');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(35,35,35,93);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        
            $pdf->Cell($w[0],6,$status_approved,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$tgl_sosial,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$tgl_renovasi,'LR',0,'C',$fill);
            $pdf->Cell($w[3],6,$keterangan,'LR',0,'C',$fill);
        
        $pdf->Ln();
        $fill = !$fill;
        $pdf->Cell(array_sum($w),0,'','T'); 
        // keterangan
        $pdf->Ln(8);
        $pdf->Cell(35, 4, 'Keterangan :', 0, 0, 'L');
        $pdf->Ln(10);
        // Data
        $pdf->Cell(35, 4, 'Proses            :', 0, 0, 'L');
        $pdf->Cell(35, 4, '0', 0, 0, 'L');
        $pdf->Ln(5); 
        $pdf->Cell(35, 4, 'Approve          :', 0, 0, 'L');
        $pdf->Cell(35, 4,  '1', 0, 0, 'L');
        $pdf->Ln(5);


        // Pengesahan
        $pdf->Ln(18);
        $pdf->Cell(176, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        

        $pdf->Output();
        
        }
    }

    // Cetak laporan milik dinsos
    function lapalldin()
    {
     if ($this->session->userdata('Auth') == false){


        // $data = $this->M_testing->cetak();
        
        $this->load->library('pdf');
        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(106,12,'Alamat: Jl. Subali Raya',0,0,'C');
        $pdf->Cell(40,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(77,12,'Code Pos: 50146',0,0,'R');
        // $pdf->Image(base_url(). "assets/img/Dinas-Sosial-Manado-Salurkan-Rastra-Tiga-Kecamatan.png",18,2,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(6);

        // konten lampiran
        $pdf->SetFont('Arial','',12);
        $pdf->Ln();
        $pdf->Ln(5);
        $pdf->Cell(0, 0, 'Laporan Data Penerima Bantuan Bedah Rumah (RLTH)', 0, 0, 'C'); 
        $pdf->Cell(85, 4,'', 0, 0, 'C');
        $pdf->Ln(4);
        $pdf->Image(base_url(). "assets/img/Dinas-Sosial-Manado-Salurkan-Rastra-Tiga-Kecamatan.png",70,65,'C');
        // Tabel Konten
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',9);
        $pdf->SetFillColor(72,177,243);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(8,8,8);
        $header = array('No KK','Nama','Alamat','Dapat','Tidak dapat','Status','Approve DINSOS','Sosialisasi','Tgl. Renovasi');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
       $w = array(28,47,47,20,20,30,28,28,28);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = true;
        $pdf->SetFont('Arial','',8);
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        foreach ($this->M_approve->cetak() as $row):
            $pdf->Cell($w[0],6,$row->no_kk,'LR',0,'C',$fill);
            $pdf->Cell($w[1],6,$row->nama,'LR',0,'C',$fill);
            $pdf->Cell($w[2],6,$row->alamat,'LR',0,'C',$fill);
            
            $pdf->Cell($w[4],6,$row->hasil_dapat,'LR',0,'C',$fill);
            $pdf->Cell($w[4],6,$row->hasil_tdapat,'LR',0,'C',$fill);
            $pdf->Cell($w[5],6,$row->hasil_prediksi,'LR',0,'C',$fill);

            $pdf->Cell($w[0],6,$row->status_approved,'LR',0,'C',$fill);
            $pdf->Cell($w[0],6,$row->tgl_sosial,'LR',0,'C',$fill);
            $pdf->Cell($w[0],6,$row->tgl_renovasi,'LR',0,'C',$fill);
        

        $pdf->Ln();
        $fill = !$fill;
        endforeach;
    $pdf->Cell(array_sum($w),0,'','T');

        $pdf->Output();
        
        
    }
}


}


<?php
class Naive_Bayes{
		public $data_kategori;
		public $data;
		private $class_ket; # Untuk mengidentifikasi nama class
		private $class_data; # Untuk menghitung semua kategori pada probabilitas class
		private $data_set; # Untuk mengidentifikasi dataset

		private $probabilitasX = array(); # Digunakan untuk menyimpan data probabilitas pada setiap atrubut
		private $probabilitasXtotal = array(); # Digunakan untuk menyimpan data hasil perkalian pada setiap atribut
		private $hasil = array(); # Digunakan untuk menyimpan hasil perhitungan akhir probabilitas

		function set_class($ket){
			$this->class_ket = $ket; 
		}

		private function semua_probabilitas_class($class, $ket){
			$data = $this->data_kategori[$class]; // mengeluarkan nilai array
			$hitung = array_count_values($data);
			return $hitung[$ket] / count($this->data_kategori[$class]);
		}

		function __call($name, $value){
			if($name == 'data_set'){
				$this->data_set = $value;

				$prob = array_unique($this->data_kategori[$this->class_ket]);
				$prob_class = array();
					foreach ($prob as $value) {
						$prob_class[$value] = $this->semua_probabilitas_class($this->class_ket, $value); // Menghitung probabilitas semua atribut class
						$this->probabilitasX[$value] = array(); 
						$this->probabilitasXtotal[$value] = 0; 
					}
				$this->class_data = $prob_class;
				
			}
		}

		public function mining(){
			$kategori = array_keys($this->data_kategori);
			for($i=0; $i<count($this->data_set); $i++){
				// urutkan berdasarkan dataset
				$Vdataset = $this->data_set[$i]; // mengambil satu dataset sesuai urutan
				foreach ($this->class_data as $key => $value) {
					$this->hitung_probabilitas($kategori[$i], $Vdataset, $key);
				}
			}
			
			# ketentuan akhir merupakan tahap final perhitungan naive bayes
			$this->conversiprobabilitas();
			return $this->finalProbabilitas();

		}

		function hitung_probabilitas($kategori, $dataset, $classValue){
			$dataKategori = $this->data_kategori[$kategori];
			$classKategori = $this->data_kategori[$this->class_ket];
			$jumlah = 0;
			if(count($dataKategori) == count($classKategori)){
				for($i=0; ($i<count($dataKategori) || $i<count($classKategori)); $i++){
					
					if( ($dataKategori[$i] == $dataset) and ($classKategori[$i] == $classValue) ){
						$jumlah++;
					}
				}
			}
			$hitung = array_count_values($this->data_kategori[$this->class_ket]);

			array_push($this->probabilitasX[$classValue], ( $jumlah/$hitung[$classValue] ));
		}

		private function conversiprobabilitas(){
			foreach ($this->probabilitasX as $key => $value) {
				if(is_array($value)){
					$u=1;
					for($i=0; $i<count($value); $i++){
						$u = $u*$value[$i];
					}
					$this->probabilitasXtotal[$key] = $u;
				}
			}
			
		}

		private function finalProbabilitas(){
			$Hasil = array();
			foreach ($this->class_data as $key => $value) {
				$Hasil[$key] = $this->probabilitasXtotal[$key] * $this->class_data[$key];
			}
			$this->hasil = $Hasil;
			return $this->sortData();
		}

		private	function sortData(){
					$ket = array_keys($this->hasil);
					$data = array_values($this->hasil);
				
				for($i=count($data)-1; $i>0; $i--){
					
					for($u=$i-1; $u>=0; $u--){
						if($data[$i] > $data[$u]){
							$sekarang = $data[$i];
							$ini = $data[$u];
							$data[$i] = $ini;
							$data[$u] = $sekarang;
							######################
							$Ksekarang = $ket[$i];
							$Kini = $ket[$u];
							$ket[$i] = $Kini;
							$ket[$u] = $Ksekarang;
						}
					}
					
				}
				$akhir = array("Status"=>$ket[0]);
				$akhir["nilai"] = array();
				for($v=0; $v<count($ket); $v++){
					$akhir["nilai"][$ket[$v]] = $data[$v];
				}
				return $akhir;
		}
		
		
	}
?>
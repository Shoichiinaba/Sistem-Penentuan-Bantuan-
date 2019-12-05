<?php

class M_array extends CI_Model {
    
    function data(){
        $sql = $this->db->get("pembeli");
        return $sql->result_array();
    }
        private $data = array();
        private $data_kategori = array();

        public function __construct(){
            global $con;
            $this->database = $con;
        }

        function __call($nama, $parameter){
            if($nama == "parameter"){
                if(count($parameter) > 0){
                    foreach ($parameter as $var) {
                        $this->data_kategori[$var] = array();
                    }
                }
            }
        }

        private function ambil_data(){
            $result=$this->db->get("data_training");
            foreach($result->result_array() as $row){

                array_push($this->data, $row);

                    foreach($row as $key => $key_value) {

                        if( array_key_exists($key, $this->data_kategori) ){
                            array_push($this->data_kategori[$key], $key_value);

                        }
                    }
            }

        }

        public function Get(){
            $this->ambil_data();
        }

        public function tampil_data(){
            return $this->data;
        }
        
        public function tampil_data_kategori(){
            return $this->data_kategori;
        }
}

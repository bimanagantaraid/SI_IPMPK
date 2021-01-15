<?php

    class Kasorganisasi_m extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->library('datatables'); 
        }
        function get_data(){
            $this->load->library('datatables'); 
            $this->datatables->from('kas_organisasi');
            return $this->datatables->generate();
        }
    }

?>
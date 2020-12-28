<?php

class Dashboard_m extends CI_Model{
    function getdatauser($query=null){
        return $this->db->from('user_anggota')->or_like('Nama', $query)->get()->result();
    }

    function getuser($Id=null){
        if($Id==null){
            return $this->db->get('user_anggota')->result();
        }else{
            return $this->db->where('Id_anggota', $Id)->get('user_anggota')->row();
        }
    }

    function getTotalSetor()
    {
        $query = $this->db->query("select sum(Total_setor) as Total from kas_kurban where Status='Proses Iuran' or Status='Proses Pembelian'");
        return $query->result_array();
    }

    
}
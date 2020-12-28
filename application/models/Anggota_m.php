<?php

class Anggota_m extends CI_Model{
    var $column_order = array('Id_anggota', 'Nama', 'Status', 'No_HP', 'Alamat_rumah'); 
    var $order = array('Id_anggota' => 'asc'); 
    
    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('user_anggota');
        if (@$_POST['search']['value']) { 
            $this->db->group_start();
            $this->db->or_like('Nama', $_POST['search']['value']);
            $this->db->or_like('Status', $_POST['search']['value']);
            $this->db->group_end();
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('user_anggota');
        return $this->db->count_all_results();
    }

    function tambah($data){
        return $this->db->insert('user_anggota', $data);
    }
    
    function hapus($Id){
        return $this->db->delete('user_anggota', $Id);
    }

    function edit($data, $where){
        return $this->db->update('user_anggota', $data, $where);
    }

    function getbyid($Id){
        return $this->db->where('Id_anggota', $Id)->from('user_anggota')->get()->row();
    }

    function getall(){
        return $this->db->get('user_anggota');
    }

    function getkasorganisasi($Id_anggota){
        return $this->db->where('Id_anggota', $Id_anggota)->get('kas_organisasi')->result_array();
    }

    function getkaskurban($Id_anggota){
        $this->db->select('*');
        $this->db->from('kas_kurban');
        $this->db->where('Id_anggota', $Id_anggota);
        return $this->db->get()->result();
    }

    function getrekapkaskurban($Id_kaskurban){
        return $this->db->where('Id_kaskurban',$Id_kaskurban)->get('iuran_kurban')->result_array();
    }

    function getjumlahkaskurban($Id_anggota){
        $this->db->select('SUM(Total_setor) as Setor');
        $this->db->where('Id_anggota', $Id_anggota);
        return $this->db->get('kas_kurban')->result_array();
    }

    function getjumlahkasorganisasibyid($Id_anggota){
        $this->db->select('SUM(Jumlah_setor) as Setor');
        $this->db->where('Id_anggota', $Id_anggota);
        return $this->db->get('kas_organisasi')->result_array();
    }
}
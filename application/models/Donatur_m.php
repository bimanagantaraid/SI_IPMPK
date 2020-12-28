<?php

class Donatur_m extends CI_Model{
    var $column_order = array('Id_donatur', 'Nama', 'No_HP', 'Alamat_rumah'); 
    var $order = array('Id_donatur' => 'asc'); 
    
    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('user_donatur');
        if (@$_POST['search']['value']) { 
            $this->db->group_start();
            $this->db->or_like('Nama', $_POST['search']['value']);
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
        $this->db->from('user_donatur');
        return $this->db->count_all_results();
    }

    function tambah($data){
        return $this->db->insert('user_donatur', $data);
    }
    
    function hapus($Id){
        return $this->db->delete('user_donatur', $Id);
    }

    function edit($data, $where){
        return $this->db->update('user_donatur', $data, $where);
    }

    function getbyid($Id){
        return $this->db->where('Id_donatur', $Id)->from('user_donatur')->get()->row();
    }

    function getkaskurban($Id_donatur){
        $this->db->select('*');
        $this->db->from('kas_kurban');
        $this->db->where('Id_donatur', $Id_donatur);
        return $this->db->get()->result();
    }

    function getrekapkaskurban($Id_kaskurban){
        return $this->db->where('Id_kaskurban',$Id_kaskurban)->get('iuran_kurban')->result_array();
    }

    function getjumlahkaskurban($Id_donatur){
        $this->db->select('SUM(Total_setor) as Setor');
        $this->db->where('Id_donatur', $Id_donatur);
        return $this->db->get('kas_kurban')->result_array();
    }
}
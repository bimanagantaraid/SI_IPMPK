<?php

class Rekapqurban_m extends CI_Model{
    // start datatables
    var $column_order = array(null,'Tanggal_setor', 'Jumlah_setor');
    var $order = array('Id_iuran ' => 'ASC');

    private function _get_datatables_query($Id_kaskurban)
    {
        $this->db->select('*')->where('Id_kaskurban', $Id_kaskurban)->from('Iuran_kurban');
        if (@$_POST['search']['value']) {
            $this->db->group_start();
            $this->db->or_like('Tanggal_setor', $_POST['search']['value']);
            $this->db->or_like('Jumlah_setor', $_POST['search']['value']);
            $this->db->group_end();
        }

        // Date filter
        if (@$_POST['searchByFromdate']['value'] && @$_POST['searchByTodate']['value']) {
            $this->db->group_start();
            $this->db->where('Iuran_kurban.Tanggal_setor >=', $_POST['searchByFromdate']);
            $this->db->where('Iuran_kurban.Tanggal_setor <=', $_POST['searchByTodate']);
            $this->db->group_end();
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($IdUser)
    {
        $this->_get_datatables_query($IdUser);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered($IdUser)
    {
        $this->_get_datatables_query($IdUser);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all($Id)
    {
        $this->db->where('Id_kaskurban', $Id);
        $this->db->from('Iuran_kurban');
        return $this->db->count_all_results();
    }

    function tambah($data){
        return $this->db->insert('iuran_kurban', $data);
    }

    function edit($data, $where){
        return $this->db->update('iuran_kurban', $data, $where);
    }

    function hapus($where){
        return $this->db->delete('iuran_kurban', $where);
    }

    function getTotal($where)
    {
        $query = "select sum(Jumlah_setor) as Total_setor from iuran_kurban where Id_kaskurban=" . $where;
        return $this->db->query($query)->result_array();
    }

    function getedit($Id_iuran){
        return $this->db->where('Id_iuran', $Id_iuran)->get('iuran_kurban')->row();
    }

    function getdetailuser($Id_kaskurban){
        $this->db->select('kas_kurban.*, user_donatur.Nama as Nama_donatur, user_anggota.Nama as Nama_anggota');
        $this->db->from('kas_kurban');
        $this->db->join('user_donatur', 'kas_kurban.Id_donatur=user_donatur.Id_donatur', 'left');
        $this->db->join('user_anggota', 'kas_kurban.Id_anggota=user_anggota.Id_anggota', 'left');
        $this->db->where('kas_kurban.Id_kaskurban', $Id_kaskurban);
        return $this->db->get()->row();
    }

}
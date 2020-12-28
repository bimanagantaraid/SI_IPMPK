<?php

class Kasqurban_m extends CI_Model
{
    // start datatables
    var $column_order = array('kas_kurban.Id_kaskurban', null, 'kas_kurban.Status', 'kas_kurban.Tanggal_mulai', 'kas_kurban.Tanggal_akhir', null);
    var $order = array('kas_kurban.Id_kaskurban' => 'ASC');

    private function _get_datatables_query()
    {
        $this->db->select('kas_kurban.* , user_donatur.Nama as Nama_donatur, user_anggota.Nama as Nama_anggota');
        $this->db->from('kas_kurban');
        $this->db->join('user_donatur', 'kas_kurban.Id_donatur=user_donatur.Id_donatur', 'left');
        $this->db->join('user_anggota', 'kas_kurban.Id_anggota=user_anggota.Id_anggota', 'left');
        if (@$_POST['search']['value']) {
            $this->db->group_start();
            $this->db->or_like('user_anggota.Nama', $_POST['search']['value']);
            $this->db->group_end();
        }

        // Date filter
        if (@$_POST['searchByFromdate']['value'] && @$_POST['searchByTodate']['value']) {
            $this->db->group_start();
            $this->db->where('kas_kurban.Tanggal_mulai >=', $_POST['searchByFromdate']);
            $this->db->where('kas_kurban.Tanggal_mulai <=', $_POST['searchByTodate']);
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
        $this->db->from('kas_organisasi');
        return $this->db->count_all_results();
    }

    function tambahdata($data)
    {
        return $this->db->insert('kas_kurban', $data);
    }

    function iurankurban($data){
        return $this->db->insert('iuran_kurban', $data);
    }

    function edit($data, $where){
        return $this->db->update('kas_kurban', $data, $where);
    }

    function hapus($where){
        $sql = "DELETE FROM kas_kurban WHERE Id_kaskurban=".$where;
        return $this->db->query($sql);
    }

    function getkasbyid($Id_kaskurban){
        return $this->db->where('Id_kaskurban', $Id_kaskurban)->from('kas_kurban')->get()->row();
    }

    function getTotal($where)
    {
        $query = "select sum(Jumlah_setor) as Total_setor from iuran_kurban where Id_kaskurban=" . $where;
        return $this->db->query($query)->result_array();
    }

    function getTotalSetor()
    {
        $query = $this->db->query("select sum(Total_setor) as Total from kas_kurban where Status='Proses Iuran' or Status='Proses Pembelian'");
        return $query->result();
    }

    function getUser($where, $search)
    {
        if ($where == 'donatur') {
            $this->db->select('*');
            $this->db->from('user_donatur');
            $this->db->or_like('Nama', $search);
            return $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->or_like('Nama', $search);
            $this->db->from('user_anggota');
            return $this->db->get()->result();
        }
    }
}

<?php

class Kasorganisasi_m extends CI_Model
{
    // start datatables
    var $column_order = array('kas_organisasi.id_KasOrganisasi', 'user_anggota.Nama', 'kas_organisasi.Tanggal_setor', 'kas_organisasi.Tanggal_setor', 'kas_organisasi.Jumlah_setor', 'kas_organisasi.Jenis', 'kas_organisasi.Keterangan', 'kas_organisasi.Diskripsi', null);
    var $order = array('kas_organisasi.id_KasOrganisasi' => 'ASC');

    private function _get_datatables_query()
    {
        $this->db->select('kas_organisasi.*, user_anggota.Id_anggota, user_anggota.Nama');
        $this->db->from('kas_organisasi');
        $this->db->join('user_anggota', 'kas_organisasi.Id_anggota=user_anggota.Id_anggota');
        if (@$_POST['search']['value']) {
            $this->db->group_start();
            $this->db->or_like('user_anggota.Nama', $_POST['search']['value']);
            $this->db->or_like('kas_organisasi.Jenis', $_POST['search']['value']);
            $this->db->or_like('kas_organisasi.Tanggal_setor', $_POST['search']['value']);
            $this->db->or_like('kas_organisasi.Jumlah_setor', $_POST['search']['value']);
            $this->db->group_end();
        }
        
        // Date filter
        if (@$_POST['searchByFromdate']['value'] && @$_POST['searchByTodate']['value']) {
            $this->db->group_start();
            $this->db->where('kas_organisasi.Tanggal_setor >=', $_POST['searchByFromdate']);
            $this->db->where('kas_organisasi.Tanggal_setor <=', $_POST['searchByTodate']);
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

    function getdatakas($Id = null)
    {
        $this->db->select('user_anggota.Nama, kas_organisasi.*');
        $this->db->from('user_anggota');
        $this->db->join('kas_organisasi', 'user_anggota.Id_anggota=kas_organisasi.Id_anggota');
        $this->db->where('kas_organisasi.id_KasOrganisasi', $Id);
        return $this->db->get()->row();
    }

    function getjumlahkas()
    {
        $sql = "SELECT(SUM(CASE WHEN Jenis='pemasukan' THEN Jumlah_setor ELSE 0 end)-SUM(CASE WHEN Jenis='pengeluaran' THEN Jumlah_setor ELSE 0 end)) as Hasil from kas_organisasi";
        return $this->db->query($sql)->result_array();
    }

    function getpemasukankas()
    {
        $sql = "SELECT SUM(Jumlah_setor) as pemasukan FROM kas_organisasi WHERE Jenis='pemasukan'";
        return $this->db->query($sql)->result_array();
    }
    function getpengeluarankas()
    {
        $sql = "SELECT SUM(Jumlah_setor) as pengeluaran FROM kas_organisasi WHERE Jenis='pengeluaran'";
        return $this->db->query($sql)->result_array();
    }

    function tambah($data)
    {
        return $this->db->insert('kas_organisasi', $data);
    }

    function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    function deleted($where)
    {
        $sql = "DELETE FROM kas_organisasi WHERE kas_organisasi.id_KasOrganisasi=" . $where;
        return $this->db->query($sql);
    }
}

<?php

class Artikel_m extends CI_Model
{
    var $column_order = array('post_id', 'post_judul', null, 'post_tanggal', null);
    var $order = array('post_id' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('blog');
        if (@$_POST['search']['value']) {
            $this->db->group_start();
            $this->db->or_like('post_judul', $_POST['search']['value']);
            $this->db->or_like('post_tanggal', $_POST['search']['value']);
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
        $this->db->from('blog');
        return $this->db->count_all_results();
    }


    function tambah($data)
    {
        return $this->db->insert('blog', $data);
    }
    function edit($data, $where)
    {
        return $this->db->update('blog', $data, $where);
    }
    function hapus($where)
    {
    }

    function getbyid($post_id){
        return $this->db->where('post_id', $post_id)->get('blog')->row();
    }
}

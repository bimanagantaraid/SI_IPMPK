<?php

class Baca extends CI_Controller{
    function id($post_id){
        $data['title'] = $this->db->select('post_judul')->from('blog')->get()->row();
		$data['artikel'] = $this->db->where('post_id', $post_id)->get('blog')->row();
		$this->blog_template->load('blog_template/template', 'pengelola/blog/baca', $data);
    }
}
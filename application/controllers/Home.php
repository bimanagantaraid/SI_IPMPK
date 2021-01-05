<?php

class Home extends CI_Controller{
    public function index(){
        $this->load->view('index.php');
    }

    function json_artikel()
	{
		$list = $this->artikel_m->get_datatables();
		$data = array();
		$no = @$_POST['start'];
		foreach ($list as $item) {
			$row = array();
			$no++;
			$row[] = $no;
			$row[] = $item->post_judul;
			$row[] = $item->post_tanggal;
			$row[] = "<img src='" . base_url('upload/' . $item->post_img) . "' class='img-thumnail' style='width:80px'>";
			$row[] = "<a class='btn btn-sm btn-success m-1' href='" . base_url('home/baca/' . $item->post_id) . "'><i class='fas fa-eye'></i>";
			$data[] = $row;
		}
		$output = array(
			"draw" => @$_POST['draw'],
			"recordsTotal" => $this->artikel_m->count_all(),
			"recordsFiltered" => $this->artikel_m->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
    }
    
    function artikel(){
        $data['title'] = "News & Event";
        $this->template_custom->load('home_template/template', 'artikel', $data);
    }

    function baca($post_id){
        /* $data['title'] = $this->db->select('post_judul')->from('blog')->get()->row(); */
        $data['artikel'] = $this->db->where('post_id', $post_id)->get('blog')->row();
        $data['title'] = "news and event";
		$this->template_custom->load('home_template/template', 'baca',$data);
	}
	
	function profile(){
		$this->load->view('profil.php');
	}

	function contact(){
		$this->load->view('contact-us.php');
	}
}
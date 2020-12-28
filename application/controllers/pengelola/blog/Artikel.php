<?php

class Artikel extends CI_Controller
{
	var $usersession;
	function __construct()
	{
		parent::__construct();
		$this->load->model("login_m");
		$this->usersession = (array)$this->session->userdata('user_logged');
		if ($this->login_m->isNotLogin()) {
			redirect('login/loginanggota');
		}
	}

	function dashboard()
	{
		$user = $this->usersession;
		$data['title'] = "Pengelolaan Pengumuman dan Blog";
		$data['profile'] = $this->dashboard_m->getuser($user["Id_anggota"]);
		$this->template_custom->load('admin_template/template', 'pengelola/blog/dashboard', $data);
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
			$row[] = "<a class='btn btn-sm btn-success m-1' href='" . base_url('baca/id/' . $item->post_id) . "'><i class='fas fa-eye'></i></a><a class='btn btn-sm btn-info m-1' href='" . base_url('pengelola/blog/artikel/edit/' . $item->post_id) . "'><i class='fas fa-edit'></i></a><a class='btn btn-sm btn-danger m-1' href='" . base_url('pengelola/blog/artikel/hapus/' . $item->post_id) . "'><i class='fas fa-trash-alt'></i></a>";
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

	function postingartikel()
	{
		$data['title'] = "Tambah Pengumuman dan Blog";
		$user = $this->usersession;
		$data['profile'] = $this->dashboard_m->getuser($user["Id_anggota"]);
		$this->template_custom->load('admin_template/template', 'pengelola/blog/tambah', $data);
	}

	function simpanartikel()
	{
		$data = array(
			"post_id"  	=> "",
			"post_judul"	=> $_POST['post_judul'],
			"post_img"		=> $this->proses(),
			"post_isi"		=> $_POST['content'],
			"post_tanggal"	=> $_POST['post_tanggal']
		);
		$this->artikel_m->tambah($data);
		$insert_id = $this->db->insert_id();
		echo json_encode($insert_id);
	}

	function edit($post_id)
	{
		$data['title'] = "Edit Pengumuman dan Blog";
		$data['artikel'] = $this->artikel_m->getbyid($post_id);
		$user = $this->usersession;
		$data['profile'] = $this->dashboard_m->getuser($user["Id_anggota"]);
		$this->template_custom->load('admin_template/template', 'pengelola/blog/edit', $data);
	}

	function updateartikel()
	{
		$where = array(
			"post_id"	=> $_POST['post_id']
		);

		$data = array(
			"post_judul"	=> $_POST['post_judul'],
			"post_img"		=> $this->proses(),
			"post_isi"		=> $_POST['content'],
			"post_tanggal"	=> $_POST['post_tanggal']
		);

		$result = $this->artikel_m->edit($data, $where);
		echo json_encode($result);
	}

	function proses()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('post_img')) {
			return $_POST['post_imgval'];
		} else {
			$data['nama_berkas'] = $this->upload->data("file_name");
			$image = $_POST['post_imgval'];
			if ($data['nama_berkas']) {
				return $data['nama_berkas'];
				unlink(FCPATH . "upload/" . $image);
			} else {
				return $image;
			}
		}
	}

	function hapus($post_id)
	{
		$where = array(
			"post_id" => $post_id
		);

		$this->db->delete('blog', $where);
		redirect(base_url('pengelola/blog/artikel/dashboard'));
	}

	function baca($post_id)
	{
		$data['title'] = $this->db->select('post_judul')->from('blog')->get()->row();
		$data['artikel'] = $this->db->where('post_id', $post_id)->get('blog')->row();
		$this->blog_template->load('blog_template/template', 'pengelola/blog/baca', $data);
	}
}

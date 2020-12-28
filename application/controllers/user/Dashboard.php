<?php

class Dashboard extends CI_Controller
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

    function index()
    {
        $user = $this->usersession;
        $data['title'] = "Dashboard User";
        $data['anggota'] = $this->anggota_m->getbyid($user["Id_anggota"]);
        $jmlkas = $this->anggota_m->getjumlahkaskurban($user["Id_anggota"]);
        $jmlkasorganisasi = $this->anggota_m->getjumlahkasorganisasibyid($user["Id_anggota"]);
        $data['kaskurban'] = $this->rupiah((int)$jmlkas[0]["Setor"]);
        $data['kasorganisasi'] = $this->rupiah((int)$jmlkasorganisasi[0]["Setor"]);
        $this->template_custom->load('user_template/template', 'user/index', $data);
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function getkasorganisasi()
    {
        $user = $this->usersession;
        $data = $this->anggota_m->getkasorganisasi($user["Id_anggota"]);
        echo json_encode($data);
    }

    function getkaskurban()
    {
        $user = $this->usersession;
        $data = $this->anggota_m->getkaskurban($user["Id_anggota"]);
        echo json_encode($data);
    }

    function getrekapkaskurban($Id_kaskurban)
    {
        $data = $this->anggota_m->getrekapkaskurban($Id_kaskurban);
        echo json_encode($data);
    }

    function kasorganisasi()
    {
        $user = $this->usersession;
        $data['title'] = "Kas Organisasi";
        $data['anggota'] = $this->anggota_m->getbyid($user["Id_anggota"]);
        $this->template_custom->load('user_template/template', 'user/kasorganisasi', $data);
    }

    function kaskurban()
    {
        $user = $this->usersession;
        $data['title'] = "Kas kurban";
        $data['anggota'] = $this->anggota_m->getbyid($user["Id_anggota"]);
        $this->template_custom->load('user_template/template', 'user/kaskurban', $data);
    }

    function rekapkurban()
    {
        $user = $this->usersession;
        $data['title'] = "Iuran Kas Kurban";
        $data['anggota'] = $this->anggota_m->getbyid($user["Id_anggota"]);
        $this->template_custom->load('user_template/template', 'user/rekapkaskurban', $data);
    }

    function profile()
    {
        $user = $this->usersession;
        $data['title'] = "Profile";
        $data['anggota'] = $this->anggota_m->getbyid($user["Id_anggota"]);
        $this->template_custom->load('user_template/template', 'user/profile', $data);
    }

    function getprofile()
    {
        $user = $this->usersession;
        $data = $this->anggota_m->getbyid($user["Id_anggota"]);
        echo json_encode($data);
    }

    function profileupdate()
    {
        $where = array(
            'Id_anggota'    => $_POST['Id_anggota']
        );

        $rolevalue = "";
        if ($_POST['Jabatan'] == "Ketua" || $_POST['Jabatan'] == "Wakil Ketua") {
            $rolevalue = "1";
        } else if ($_POST['Jabatan'] == "Bendahara" || $_POST['Jabatan'] == "Sekertaris") {
            $rolevalue = "2";
        } else {
            $rolevalue = "3";
        }
        

        $data = array(
            'Role'          => $rolevalue,
            'Username'      => $_POST['Username'],
            'Password'      => $_POST['Password'],
            'Nama'          => $_POST['Nama'],
            'ttl'           => $_POST['ttl'],
            'Jenis_kelamin' => $_POST['Jenis_kelamin'],
            'Agama'         => $_POST['Agama'],
            'Status'        => $_POST['Status'],
            'Alamat_rumah'  => $_POST['Alamat_rumah'],
            'Alamat_kost'   => $_POST['Alamat_kost'],
            'No_HP'         => $_POST['No_HP'],
            'Hobi'          => $_POST['Hobi'],
            'Medsos'        => $_POST['facebook'].",".$_POST['twitter'].",".$_POST['instagram'],
            'Jabatan'       => $_POST['Jabatan'],
            'User_img'      => $this->prosesupload()
        );

        $result = $this->anggota_m->edit($data, $where);
        redirect('user/dashboard/');
    }

    function prosesupload()
    {
        $config['upload_path']          = './upload/user_img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']            = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('User_img')) {
            return $_POST['User_imgDefault'];
        } else {
            return $this->upload->data("file_name");
        }
    }
}

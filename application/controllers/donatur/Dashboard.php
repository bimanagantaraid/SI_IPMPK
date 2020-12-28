<?php

class Dashboard extends CI_Controller
{
    var $usersession;
    var $id_donatur;
	function __construct()
	{
		parent::__construct();
		$this->load->model("login_m");
        $this->usersession = (array)$this->session->userdata('userdonatur_loged');
        $user_donatur = $this->usersession;
        $this->id_donatur = $user_donatur['Id_donatur'];
		if ($this->login_m->isNotLoginDonatur()) {
			redirect('login/logindonatur');
		}
	}

    function index()
    {
        $data['title'] = "Dashboard Donatur";
        $data['donatur'] = $this->donatur_m->getbyid($this->id_donatur);
        $jmlkas = $this->donatur_m->getjumlahkaskurban($this->id_donatur);
        $data['kaskurban'] = $this->rupiah((int)$jmlkas[0]["Setor"]);
        $this->template_custom->load('donatur_template/template', 'donatur/index', $data);
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function getkaskurban()
    {
        $data = $this->donatur_m->getkaskurban($this->id_donatur);
        echo json_encode($data);
    }

    function getrekapkaskurban($Id_kaskurban)
    {
        $data = $this->donatur_m->getrekapkaskurban($Id_kaskurban);
        echo json_encode($data);
    }

    function kaskurban()
    {
        $data['title'] = "Kas kurban";
        $data['donatur'] = $this->donatur_m->getbyid($this->id_donatur);
        $this->template_custom->load('donatur_template/template', 'donatur/kaskurban', $data);
    }

    function rekapkurban()
    {
        $data['title'] = "Iuran Kas Kurban";
        $data['donatur'] = $this->donatur_m->getbyid($this->id_donatur);
        $this->template_custom->load('donatur_template/template', 'donatur/rekapkaskurban', $data);
    }

    function profile()
    {
        $data['title'] = "Profile";
        $data['donatur'] = $this->donatur_m->getbyid($this->id_donatur);
        $this->template_custom->load('donatur_template/template', 'donatur/profile', $data);
    }

    function getprofile()
    {
        $data = $this->donatur_m->getbyid($this->id_donatur);
        echo json_encode($data);
    }

    function profileupdate()
    {
        $where = array(
            'Id_donatur'    => $_POST['Id_donatur']
        );
        
        $data = array(
            'Role'          => 4,
            'Username'      => $_POST['Username'],
            'Password'      => $_POST['Password'],
            'Nama'          => $_POST['Nama'],
            'Jenis_kelamin' => $_POST['Jenis_kelamin'],
            'Agama'         => $_POST['Agama'],
            'Alamat_rumah'  => $_POST['Alamat_rumah'],
            'No_HP'         => $_POST['No_HP']
        );

        $result = $this->donatur_m->edit($data, $where);
        redirect('donatur/dashboard/');
    }
}

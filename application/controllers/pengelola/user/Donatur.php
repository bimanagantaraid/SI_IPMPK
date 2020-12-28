<?php

class Donatur extends CI_Controller
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
        $data['title'] = "Management Data Anggota";
        $data['profile'] = $this->dashboard_m->getuser($user['Id_anggota']);
        $this->template_custom->load('admin_template/template', 'pengelola/usermanagement_v/donatur', $data);
    }

    function json_anggota()
    {
        $list = $this->donatur_m->get_datatables();
        $data = array();

        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $item->Nama;
            $row[] = $item->No_HP;
            $row[] = $item->Alamat_rumah;
            $row[] = "<button type='button' class='btn btn-sm btn-primary update m-1' data-toggle='modal' onClick='edit(this)' Id='" . $item->Id_donatur . "'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-sm btn-primary info m-1' onClick='info(this)' Id='" . $item->Id_donatur . "'><i class='fas fa-info-circle'></i></button><button type='button' class='btn btn-sm btn-danger m-1' onClick='hapus(this)' id='" . $item->Id_donatur . "'><i class='fas fa-trash-alt'></i></button>";
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->donatur_m->count_all(),
            "recordsFiltered" => $this->donatur_m->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function json_getdetail($Id)
    {
        $data = $this->donatur_m->getbyid($Id);
        echo json_encode($data);
    }

    function tambah()
    {
        $data = array(
            'Id_donatur'    => '',
            'Role'          => '4',
            'Username'      => $_POST['Username'],
            'Password'      => $_POST['Password'],
            'Nama'          => $_POST['Nama'],
            'Jenis_kelamin' => $_POST['Jenis_kelamin'],
            'Agama'         => $_POST['Agama'],
            'Alamat_rumah'  => $_POST['Alamat_rumah'],
            'No_HP'         => $_POST['No_HP'],
        );

        $this->donatur_m->tambah($data);
        echo json_encode($data);
    }
    function edit()
    {
        $where = array(
            'Id_donatur'            => $_POST['Id_donatur']
        );

        $data = array(
            'Role'          => $_POST['Role'],
            'Username'      => $_POST['Username'],
            'Password'      => $_POST['Password'],
            'Nama'          => $_POST['Nama'],
            'Jenis_kelamin' => $_POST['Jenis_kelamin'],
            'Agama'         => $_POST['Agama'],
            'Alamat_rumah'  => $_POST['Alamat_rumah'],
            'No_HP'         => $_POST['No_HP']
        );

        $result = $this->donatur_m->edit($data, $where);
        echo json_encode($result);
    }

    function hapus($Id)
    {
        $where = array(
            'Id_donatur' => $Id
        );
        $data = $this->donatur_m->hapus($where);
        echo json_encode($data);
    }
}

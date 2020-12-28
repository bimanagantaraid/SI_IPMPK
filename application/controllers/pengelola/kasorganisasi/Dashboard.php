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
        $data['title'] = "Management Kas Organisasi";
        $data['profile'] = $this->dashboard_m->getuser($user["Id_anggota"]);
        $this->template_custom->load('admin_template/template', 'pengelola/kasorganisasi/kasorganisasi', $data);
    }

    function getrekapkas(){
        $data['sum'] = $this->kasorganisasi_m->getjumlahkas();
        $data['in'] = $this->kasorganisasi_m->getpemasukankas();
        $data['out'] = $this->kasorganisasi_m->getpengeluarankas();
        $data['hasiljumlah'] = $this->rupiah($data['sum'][0]['Hasil']);
        $data['hasilpemasukan'] = $this->rupiah($data['in'][0]['pemasukan']);
        $data['hasilpengeluaran'] = $this->rupiah($data['out'][0]['pengeluaran']);
        echo json_encode($data);
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function json_kasorganisasi()
    {
        $list = $this->kasorganisasi_m->get_datatables();
        $data = array();
        $datapengeluaran=0;
        $datapemasukan=0;
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $item->Nama;
            if ($item->Jenis == "pemasukan") {
                $row[] = "<button class='btn btn-sm btn-primary'>Pemasukan</button>";
                $datapemasukan+=$item->Jumlah_setor;
            } else {
                $datapengeluaran+=$item->Jumlah_setor;
                $row[] = "<button class='btn btn-sm btn-warning'>Pengeluaran</button>";
            }
            $row[] = $item->Tanggal_setor;
            $row[] = $this->rupiah($item->Jumlah_setor);
            $row[] = "<button type='button' class='btn btn-sm btn-primary m-1' onClick='edit(this)' id_KasOrganisasi='" . $item->id_KasOrganisasi . "'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-sm btn-danger m-1' onClick='hapus(this)' Id_KasOrganisasi='" . $item->id_KasOrganisasi . "'><i class='fas fa-trash-alt'></i></button>";
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->kasorganisasi_m->count_all(),
            "recordsFiltered" => $this->kasorganisasi_m->count_filtered(),
            "totalkas"  => $this->rupiah($datapemasukan-$datapengeluaran),
            "totalkaspengeluaran"  => $this->rupiah($datapengeluaran),
            "totalkaspemasukan"  => $this->rupiah($datapemasukan),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function getbyid($id_KasOrganisasi)
    {
        $data = $this->kasorganisasi_m->getdatakas($id_KasOrganisasi);
        echo json_encode($data);
    }

    function tambah()
    {
        $rules = [
            [
                'field'     => 'Id_anggota',
                'label'     => 'Nama',
                'rules'     => 'required'
            ],
            [
                'field'     => 'Jumlah_setor',
                'label'     => 'Jumlah setor',
                'rules'     => 'required'
            ],
            [
                'field'     => 'Tanggal_setor',
                'label'     => 'Tanggal setor',
                'rules'     => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert" style="height:100%; padding-top:2px; padding-right:3px; padding-bottom:2px; padding-right:2px">
        {field} tidak boleh kosong</div>');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'Id_anggota'         => form_error('Id_anggota'),
                'Jumlah_setor'      => form_error('Jumlah_setor'),
                'Tanggal_setor'     => form_error('Tanggal_setor'),
            );
            echo json_encode($data);
        } else {
            $data = array(
                'id_KasOrganisasi'  => '',
                'Id_anggota'        => $_POST['Id_anggota'],
                'Tanggal_setor'     => $_POST['Tanggal_setor'],
                'Jumlah_setor'      => $_POST['Jumlah_setor'],
                'Jenis'             => $_POST['Jenis'],
                'Keterangan'        => $_POST['Keterangan'],
                'Diskripsi'         => $_POST['Diskripsi']
            );
            $keterangan = $this->kasorganisasi_m->tambah($data);
            echo json_encode('sukses');
        }
    }

    function tarik()
    {
        $this->form_validation->set_rules('Id_anggotaTarik', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('Jumlah_setorTarik', 'Jumlah Setor', 'required');
        $this->form_validation->set_rules('Tanggal_setorTarik', 'Tanggal Setor', 'required');
        $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert" style="height:100%; padding-top:2px; padding-right:3px; padding-bottom:2px; padding-right:2px">
        {field} tidak boleh kosong</div>');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'Id_anggota'         => form_error('Id_anggotaTarik'),
                'Jumlah_setor'      => form_error('Jumlah_setorTarik'),
                'Tanggal_setor'     => form_error('Tanggal_setorTarik'),
            );
            echo json_encode($data);
        } else {
            $data = array(
                'id_KasOrganisasi'  => '',
                'Id_anggota'        => $_POST['Id_anggotaTarik'],
                'Tanggal_setor'     => $_POST['Tanggal_setorTarik'],
                'Jumlah_setor'      => $_POST['Jumlah_setorTarik'],
                'Jenis'             => $_POST['Jenis'],
                'Keterangan'        => $_POST['Keterangan'],
                'Diskripsi'         => $_POST['Diskripsi']
            );
            $keterangan = $this->kasorganisasi_m->tambah($data);
            echo json_encode('sukses');
        }
    }

    function edit()
    {
        /* set validation */
        $this->form_validation->set_rules('Jumlah_setorEdit', 'Jumlah Setor', 'required');
        $this->form_validation->set_rules('Tanggal_setorEdit', 'Tanggal Setor', 'required');
        $this->form_validation->set_message('required', '<div class="alert alert-danger" role="alert" style="height:100%; padding-top:2px; padding-right:3px; padding-bottom:2px; padding-right:2px">
        {field} tidak boleh kosong</div>');
        /* end set validation */

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'Jumlah_setor'      => form_error('Jumlah_setorEdit'),
                'Tanggal_setor'     => form_error('Tanggal_setorEdit')
            );
            $result = array(
                'keterangan'        => 'fail',
                'data'              => $data
            );
            echo json_encode($result);
        } else {
            $where = array(
                'id_KasOrganisasi'  => $_POST['Id_KasOrganisasi']
            );

            $data = array(
                'Id_anggota'                => $_POST['Id_anggota'],
                'Tanggal_setor'     => $_POST['Tanggal_setorEdit'],
                'Jumlah_setor'      => $_POST['Jumlah_setorEdit'],
                'Jenis'             => $_POST['Jenis'],
                'Keterangan'        => $_POST['Keterangan'],
                'Diskripsi'         => $_POST['Diskripsi']
            );

            $result = array(
                'id_KasOrganisasi'  => $where,
                'data'      => $data,
                'keterangan' => 'sukses'
            );
            $this->kasorganisasi_m->update('kas_organisasi', $data, $where);
            echo json_encode($result);
        }
    }

    function hapus()
    {
        $data = $this->kasorganisasi_m->deleted($_POST['Id_KasOrganisasi']);
        if ($data) {
            echo json_encode('sukses');
        } else {
            echo json_encode('error');
        }
    }
}

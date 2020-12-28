<?php

require('./exportexcel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Anggota extends CI_Controller
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
        $data['profile'] = $this->dashboard_m->getuser($user["Id_anggota"]);
        $this->template_custom->load('admin_template/template', 'pengelola/usermanagement_v/anggota', $data);
    }

    function json_anggota()
    {
        $list = $this->anggota_m->get_datatables();
        $data = array();

        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $item->Nama;
            $row[] = $item->Status;
            $row[] = $item->No_HP;
            $row[] = $item->Alamat_rumah;
            $row[] = "<button type='button' class='btn btn-sm btn-primary update m-1' data-toggle='modal' onClick='edit(this)' Id='" . $item->Id_anggota . "'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-sm btn-primary info m-1' onClick='info(this)' Id='" . $item->Id_anggota . "'><i class='fas fa-info-circle'></i></button><button type='button' class='btn btn-sm btn-danger m-1' onClick='hapus(this)' id='" . $item->Id_anggota . "'><i class='fas fa-trash-alt'></i></button>";
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->anggota_m->count_all(),
            "recordsFiltered" => $this->anggota_m->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function json_getdetail($Id)
    {
        $data = $this->anggota_m->getbyid($Id);
        echo json_encode($data);
    }

    function tambah()
    {
        $rules = [
            [
                'field'     => 'Nama',
                'label'     => 'Nama',
                'rules'     => 'required'
            ],
            [
                'field'     => 'Username',
                'label'     => 'Username',
                'rules'     => 'required'
            ],
            [
                'field'     => 'Password',
                'label'     => 'Password',
                'rules'     => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'Nama'                  => form_error('Nama'),
                'Username'              => form_error('Username'),
                'Password'              => form_error('Password'),
            );
            echo json_encode($data);
        } else {
            $rolevalue = "";
            if ($_POST['Jabatan'] == "Ketua" || $_POST['Jabatan'] == "Wakil Ketua") {
                $rolevalue = "1";
            } else if ($_POST['Jabatan'] == "Bendahara" || $_POST['Jabatan'] == "Sekertaris") {
                $rolevalue = "2";
            } else {
                $rolevalue = "3";
            }
            $User_img = "";
            if ($_POST['Jenis_kelamin'] == "Laki Laki") {
                $User_img = "avatar_male.png";
            } else {
                $User_img = "avatara_female.png";
            }
            $data = array(
                'Id_anggota'    => '',
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
                'Medsos'        => $_POST['Medsos'],
                'Hobi'          => $_POST['Hobi'],
                'Jabatan'       => $_POST['Jabatan'],
                'User_img'      => $User_img
            );
            $result = $this->anggota_m->tambah($data);
            echo json_encode('sukses');
        }
    }

    function edit()
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
        $User_img = "";
        if ($_POST['Jenis_kelamin'] == "Laki Laki") {
            $User_img = "avatar_male.png";
        } else {
            $User_img = "avatara_female.png";
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
            'Medsos'        => $_POST['Medsos'],
            'Jabatan'       => $_POST['Jabatan'],
            'User_img'      => $User_img
        );

        $result = $this->anggota_m->edit($data, $where);
        echo json_encode($result);
    }

    function hapus($Id)
    {
        $where = array(
            'Id_anggota'    => $Id
        );
        $data = $this->anggota_m->hapus($where);
        echo json_encode($data);
    }

    public function export()
    {
        $semua_pengguna = $this->anggota_m->getAll()->result();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Tempat Tanggal Lahir')
            ->setCellValue('D1', 'Agama')
            ->setCellValue('E1', 'Jenis Kelamin')
            ->setCellValue('F1', 'Status')
            ->setCellValue('G1', 'Alamat rumah')
            ->setCellValue('H1', 'Alamat kost')
            ->setCellValue('I1', 'Hobi')
            ->setCellValue('J1', 'No Telepone')
            ->setCellValue('K1', 'Media Sosial')
            ->setCellValue('L1', 'Jabatan');

        $kolom = 2;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->Nama)
                ->setCellValue('C' . $kolom, $pengguna->ttl)
                ->setCellValue('D' . $kolom, $pengguna->Agama)
                ->setCellValue('E' . $kolom, $pengguna->Jenis_kelamin)
                ->setCellValue('F' . $kolom, $pengguna->Status)
                ->setCellValue('G' . $kolom, $pengguna->Alamat_rumah)
                ->setCellValue('H' . $kolom, $pengguna->Alamat_kost)
                ->setCellValue('I' . $kolom, $pengguna->Hobi)
                ->setCellValue('J' . $kolom, $pengguna->No_HP)
                ->setCellValue('K' . $kolom, $pengguna->Medsos)
                ->setCellValue('L' . $kolom, $pengguna->Jabatan);

            $kolom++;
            $nomor++;
        }

        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data anggota IPMPK.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

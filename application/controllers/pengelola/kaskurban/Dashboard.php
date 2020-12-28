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
        $data['title'] = "Management Kas Qurban";
        $user = $this->usersession;
        $data['profile'] = $this->dashboard_m->getuser($user['Id_anggota']);
        $this->template_custom->load('admin_template/template', 'pengelola/kaskurban/kaskurban', $data);
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function getTotalById($Id_kaskurban)
    {
        $data = $this->kasqurban_m->getTotal($Id_kaskurban);
        return $data[0]['Total_setor'];
    }

    function getTotalSetor()
    {
        $result = $this->kasqurban_m->getTotalSetor();
        $data = [
            'keterangan'    => 'sukses',
            'totalkas'          => $this->rupiah($result[0]->Total)
        ];
        echo json_encode($data);
    }

    function json_kaskurban()
    {
        $list = $this->kasqurban_m->get_datatables();
        $data = array();
        $kaskurbantotal=0;
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $no++;
            $row[] = $no;
            if ($item->Nama_anggota !== NULL) {
                $row[] = $item->Nama_anggota;
            } else {
                $row[] = $item->Nama_donatur;
            }
            if ($item->Status == "Selesai") {
                $row[] = "<button class='btn btn-sm btn-success'>Selesai</button>";
                $kaskurbantotal-=$this->getTotalById($item->Id_kaskurban);
            } else if ($item->Status == "Proses Pembelian") {
                $row[] = "<button class='btn btn-sm btn-warning'>Proses Pembelian</button>";
                $kaskurbantotal+=$this->getTotalById($item->Id_kaskurban);
            } else {
                $kaskurbantotal+=$this->getTotalById($item->Id_kaskurban);
                $row[] = "<button class='btn btn-sm btn-info'>Proses Iuran</button>";
            }
            $row[] = $item->Tanggal_mulai;
            $row[] = $item->Tanggal_akhir;
            $row[] = $this->rupiah($this->getTotalById($item->Id_kaskurban));
            $row[] = "<a href='" . base_url('pengelola/kaskurban/rekapkurban/rekap/') . $item->Id_kaskurban . "'><button type='button' class='btn btn-sm btn-primary m-1'>Data Iuran</button></a><button type='button' class='btn btn-sm btn-info m-1'  onClick='edit(this)' Id_kaskurban='".$item->Id_kaskurban."'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-sm btn-danger m-1' onClick='hapus(this)' Id_kaskurban='".$item->Id_kaskurban."'><i class='fas fa-trash-alt'></i></button>";

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->kasqurban_m->count_all(),
            "recordsFiltered" => $this->kasqurban_m->count_filtered(),
            "totalkaskurban" => $this->rupiah($kaskurbantotal),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function getkasbyid($Id_kaskurban){
        $data = $this->kasqurban_m->getkasbyid($Id_kaskurban);
        echo json_encode($data);
    }

    function getUserJson($where)
    {
        $search = $_POST['query'];
        $data = $this->kasqurban_m->getUser($where, $search);
        echo json_encode($data);
    }

    function tambah()
    {
        if ($_POST['Id_donatur'] == 'NULL') {
            $data = array(
                "Id_KasKurban"      => "",
                "Id_anggota"        => $_POST['Id_anggota'],
                "Id_donatur"        => NULL,
                "Status"            => $_POST['Status'],
                "Tanggal_mulai"     => $_POST['Tanggal_mulai'],
                "Tanggal_akhir"     => $_POST['Tanggal_akhir'],
                "Total_setor"      => $_POST['Total_setor']
            );
            /* tambah data kas kurban */
            $this->kasqurban_m->tambahdata($data);
            /* get id data kas kurban */
            $insert_id = $this->db->insert_id();

            /* data iuran kas */
            $dataiuran = array(
                "Id_iuran"          => "",
                "Id_kaskurban"      => $insert_id,
                "Tanggal_setor"     => $_POST['Tanggal_mulai'],
                "Jumlah_setor"      => $_POST['Total_setor']
            );
            /* tambah data iuran kas kurban */
            $this->kasqurban_m->iurankurban($dataiuran);

            /* data hasil tambah kas kurban */
            $result = array(
                'keterangan'    => 'sukses',
                'data'          => $data,
                'Id_kaskurban'  => $insert_id
            );
            echo json_encode($result);
        } else if ($_POST['Id_anggota'] == 'NULL') {
            $data = array(
                "Id_KasKurban"      => "",
                "Id_anggota"        => NULL,
                "Id_donatur"        => $_POST['Id_donatur'],
                "Status"            => $_POST['Status'],
                "Tanggal_mulai"     => $_POST['Tanggal_mulai'],
                "Tanggal_akhir"     => $_POST['Tanggal_akhir'],
                "Total_setor"      => $_POST['Total_setor']
            );
            /* tambah data kas kurban */
            $this->kasqurban_m->tambahdata($data);
            /* get id data kas kurban */
            $insert_id = $this->db->insert_id();

            /* data iuran kas */
            $dataiuran = array(
                "Id_iuran"          => "",
                "Id_kaskurban"      => $insert_id,
                "Tanggal_setor"     => $_POST['Tanggal_mulai'],
                "Jumlah_setor"      => $_POST['Total_setor']
            );
            /* tambah data iuran kas kurban */
            $this->kasqurban_m->iurankurban($dataiuran);

            /* data hasil tambah kas kurban */
            $result = array(
                'keterangan'    => 'sukses',
                'data'          => $data,
                'Id_kaskurban'  => $insert_id
            );
            echo json_encode($result);
        }
    }

    function edit(){
        $where = array(
            "Id_kaskurban"  => $_POST['Id_kaskurban']
        );
        $Id_anggota=NULL;
        $Id_donatur=NULL;
        if($_POST['Id_anggota']=="NULL"){
            $Id_anggota = NULL;
            $Id_donatur = $_POST['Id_donatur'];
        }else{
            $Id_anggota = $_POST['Id_anggota'];
            $Id_donatur = NULL;
        }
        $data = array(
            "Id_anggota"    => $Id_anggota,
            "Id_donatur"    => $Id_donatur,
            "Status"        => $_POST['Status'],
            "Tanggal_mulai" => $_POST['Tanggal_mulai'],
            "Tanggal_akhir" => $_POST['Tanggal_akhir'],
            "Total_setor"   => $_POST['Total_setor'],
        );

        $eksekusi = $this->kasqurban_m->edit($data, $where);
        echo json_encode($eksekusi);
    }

    function hapus($Id_kaskurban){
        $result = $this->kasqurban_m->hapus($Id_kaskurban);
        $data = array(
            'data'  => $result,
            'keterangan'    => 'Sukses'
        );
        echo json_encode($data);
    }
}

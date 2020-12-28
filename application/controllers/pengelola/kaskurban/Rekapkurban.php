<?php


class Rekapkurban extends CI_Controller
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

    function rekap($Id)
    {
        $data['title'] = 'Rekap Data Kas Kurban User';
        $data['total_setor'] = $this->rupiah($this->getTotalById($Id));
        $user = $this->usersession;
        $data['profile'] = $this->dashboard_m->getuser($user['Id_anggota']);
        $this->template_custom->load('admin_template/template', 'pengelola/kaskurban/rekapkurbanuser', $data);
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function getdetailuser($Id_kaskurban){
        $result = $this->rekapqurban_m->getdetailuser($Id_kaskurban);
        $data = array(
            "Nama_donatur"          => $result->Nama_donatur,
            "Nama_anggota"          => $result->Nama_anggota,
            "Total_setor"   => $this->rupiah($result->Total_setor)
        );
        echo json_encode($data);
    }


    function json_kaskurbanbyid($Id)
    {
        $list = $this->rekapqurban_m->get_datatables($Id);
        $data = array();
        $datatotalkas=0;
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $item->Tanggal_setor;
            $row[] = $this->rupiah($item->Jumlah_setor);
            $datatotalkas+=$item->Jumlah_setor;
            $row[] = "<button type='button' class='btn btn-sm btn-primary' id_iuran='" . $item->Id_iuran . "' onClick='edit(this)'><i class='fas fa-edit'></i></button><button type='button' class='ml-1 btn btn-sm btn-danger' id_iuran='" . $item->Id_iuran . "' Jumlah_setor='" . $item->Jumlah_setor . "' onClick='hapus(this)'><i class='fas fa-trash-alt'></i></button>";
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->rekapqurban_m->count_all($Id),
            "recordsFiltered" => $this->rekapqurban_m->count_filtered($Id),
            "totalkas" => $this->rupiah($datatotalkas),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function getTotalById($Id_kaskurban)
    {
        $data = $this->kasqurban_m->getTotal($Id_kaskurban);
        return $data[0]['Total_setor'];
    }

    function tambah(){
        $data = array(
            "Id_iuran"      => "",
            "Id_kaskurban"  => $_POST['Id_kaskurban'],
            "Tanggal_setor" => $_POST['Tanggal_setor'],
            "Jumlah_setor"  => $_POST['Jumlah_setor'],
        );
        $Id_kaskurban = $_POST['Id_kaskurban'];
        $Jumlah_setor = $_POST['Jumlah_setor'];
        $this->db->query("UPDATE kas_kurban SET Total_setor = Total_setor+".$Jumlah_setor." WHERE Id_kaskurban=".$Id_kaskurban);

        $eksekusi = $this->rekapqurban_m->tambah($data);
        $result = array(
            'Keterangan'    => $eksekusi,
            'Data'          => $data
        );
        echo json_encode($result);
    }

    function edit(){
        $where = array(
            "Id_iuran"      => $_POST['Id_iuran']
        );

        $data = array(
            "Id_kaskurban"  => $_POST['Id_kaskurban'],
            "Tanggal_setor" => $_POST['Tanggal_setor'],
            "Jumlah_setor"  => $_POST['Jumlah_setor']
        );

        // hitung total setor untuk input ke table kas kurban
        $Id_kaskurban = $_POST['Id_kaskurban'];
        $total_setor = $this->getTotalById($_POST['Id_kaskurban']);
        $jumlah_setorawal = $_POST['Jumlah_setorAwal'];
        $Jumlah_setorinput = $_POST['Jumlah_setor'];
        $TempTotal = ($total_setor - $jumlah_setorawal)+$Jumlah_setorinput;
        $this->db->query("UPDATE kas_kurban SET Total_setor = ".$TempTotal." WHERE Id_kaskurban=".$Id_kaskurban);

        //update data iuran
        $update = $this->rekapqurban_m->edit($data, $where);
        
        $result = array(
            "data"          => $data,
            "Keterangan"    => $update,
        );

        echo json_encode($result);
    }

    function getedit($Id_iuran){
        $data = $this->rekapqurban_m->getedit($Id_iuran);
        echo json_encode($data);
    }

    function hapus(){
        $where = array(
            "Id_iuran"  => $_POST['Id_iuran']
        );

        $Jumlah_setor = $_POST['Jumlah_setor'];
        $Id_kaskurban = $_POST['Id_kaskurban'];
        //update total kas byy id
        $this->db->query("UPDATE kas_kurban SET Total_setor = Total_setor -".$Jumlah_setor." WHERE Id_kaskurban=".$Id_kaskurban);
        //hapus data iuran
        $data = $this->rekapqurban_m->hapus($where);
        echo json_encode($data);
    }
}

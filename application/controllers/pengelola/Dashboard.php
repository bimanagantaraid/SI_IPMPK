<?php 

    class Dashboard extends CI_Controller{
        
        var $usersession;
        function __construct()
        {
            parent::__construct();
            $this->load->model("login_m");
            $this->usersession = (array)$this->session->userdata('user_logged');
            if($this->login_m->isNotLogin()){
                redirect('login/loginanggota');
            }
        }

        function index(){
            $user = $this->usersession;
            $data['title'] = "Dashboard Admin";
            $data['sum'] = $this->kasorganisasi_m->getjumlahkas();
            $data['in'] = $this->kasorganisasi_m->getpemasukankas();
            $data['out'] = $this->kasorganisasi_m->getpengeluarankas();
            $data['hasiljumlah'] = $this->rupiah($data['sum'][0]['Hasil']);
            $data['hasilpemasukan'] = $this->rupiah($data['in'][0]['pemasukan']);
            $data['hasilpengeluaran'] = $this->rupiah($data['out'][0]['pengeluaran']);
            $data['profile'] = $this->dashboard_m->getuser($user['Id_anggota']);
            $kaskurban = $this->dashboard_m->getTotalSetor();
            $data['kaskurban'] =$this->rupiah((int)$kaskurban[0]["Total"]);
            $user = $this->db->query("select Id_anggota from user_anggota")->num_rows();
            $donatur = $this->db->query("select Id_donatur from user_donatur")->num_rows();
            $data['jumlahuser'] = $user+$donatur;
            $this->template_custom->load('admin_template/template', '/pengelola/dashboard', $data);
        }

        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }

        function getuserjson(){
            echo json_encode($this->dashboard_m->getdatauser( $_POST['query']));
        }

        function getTotalUser(){
            
        }

    }

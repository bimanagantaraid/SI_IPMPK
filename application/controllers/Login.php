<?php

class Login extends CI_Controller
{
    function loginanggota()
    {
        $data = $this->uri->segment(3);
        if (!$data) {
            $this->load->view('login/loginanggota');
        } else {
            if ($data == "false") {
                echo "<script type='text/javascript'>alert('username dan password salah')</script>";
                $this->load->view('login/loginanggota');
            }
        }
    }

    function ceklogin()
    {
        $user = $this->login_m->doLogin();
        if ($user != "false") {
            if ($user->Role == "1" || $user->Role == "2") {
                $this->session->set_userdata(['user_logged' => $user]);
                $data['user'] = (array)$this->session->userdata('user_logged');
                return $this->load->view('login/loginpengelola', $data);
            } else {
                $this->session->set_userdata(['user_logged' => $user]);
                redirect('user/dashboard');
            }
        } else {
            $in = "false";
            redirect(base_url() . "login/loginanggota/" . $in);
        }
    }

    function logindonatur()
    {
        $data = $this->uri->segment(3);
        if (!$data) {
            $this->load->view('login/logindonatur');
        } else {
            if ($data == "false") {
                echo "<script type='text/javascript'>alert('username dan password salah')</script>";
                $this->load->view('login/logindonatur');
            }
        }
    }

    function ceklogindonatur()
    {
        $user = $this->login_m->doLoginDonatur();
        if ($user != "false") {
            $this->session->set_userdata(['userdonatur_loged' => $user]);
            redirect('donatur/dashboard');
        }else {
            $in = "false";
            redirect(base_url() . "login/logindonatur/" . $in);
        }
    }
}

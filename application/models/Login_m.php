<?php

class Login_m extends CI_Model
{
    public function doLogin()
    {
        $post = $this->input->post();
        $username = $this->input->post('Username');
        $password = $this->input->post('Password');
        // cari user berdasarkan email dan username
        $this->db->where('Username', $username);
        $this->db->or_where('Password', $password);
        $user = $this->db->query('select * from user_anggota where Username="'.$username.'" and Password="'.$password.'";')->row();
        if($user){
            return $user;
        }else{
            return "false";
        }
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }
    
    public function doLoginDonatur(){
        $post = $this->input->post();
        $username = $this->input->post('Username');
        $password = $this->input->post('Password');
        // cari user berdasarkan email dan username
        $this->db->where('Username', $username);
        $this->db->or_where('Password', $password);
        $user = $this->db->query('select * from user_donatur where Username="'.$username.'" and Password="'.$password.'";')->row();
        if($user){
            return $user;
        }else{
            return "false";
        }
    }

    public function isNotLoginDonatur(){
        return $this->session->userdata('userdonatur_loged') === null;
    }


}

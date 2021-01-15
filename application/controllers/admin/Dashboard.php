<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller{
        function index(){
            $data['title'] = "DASHBOARD ADMIN";
            $this->template_admin->load('template_admin/dashboard', 'admin/dashboard', $data);
        }

        function jsonkasorganisasi(){
            echo $this->kasorganisasi_m->get_data();
        }
    }

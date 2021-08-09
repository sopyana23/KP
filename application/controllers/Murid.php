<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'murid';
        $data['title'] = 'Beranda Murid';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('murid/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'murid';
        $data['title'] = 'Profil Murid';

        $this->load->view('templates/user_header',$data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('murid/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function isi_kegiatan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'murid';
        $data['title'] = 'Isi Kegiatan Murid';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('murid/isi_kegiatan', $data);
        $this->load->view('templates/user_footer');
    }

    
    
}
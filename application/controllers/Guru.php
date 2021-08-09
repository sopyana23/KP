<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{

    public function index()
    {
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'guru';
        $data['title'] = 'Beranda Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'guru';
        $data['title'] = 'Profil Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function list_murid()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'guru';
        $data['title'] = 'Profil Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/list_murid', $data);
        $this->load->view('templates/user_footer');
    }

    public function kegiatan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role_id'] = 'guru';
        $data['title'] = 'Kegiatan';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/kegiatan', $data);
        $this->load->view('templates/user_footer');
    }
}

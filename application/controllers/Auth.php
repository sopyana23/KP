<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Identitas_model');
    }

    public function index()
    {
        $data['title'] = 'User Login';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email harus valid, Contoh: @gmail.com, @yahoo.com, dll.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } elseif ($user['role_id'] == 2) {
                    redirect('guru');
                } else {
                    redirect('murid');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang digunakan belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['title'] = 'User Registration';

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim', [
            'required' => 'NIS tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email ini sudah penah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password harus lebih dari 4 karakter!',
            'matches' => 'Password dan Konfirmasi Password tidak sama!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[4]|matches[password]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $nis = $this->db->get_where('siswa', ['nis' => $this->input->post('nis')])->row_array();
            $this->db->where('nis', $this->input->post('nis', true));
            $query = $this->db->get('siswa')->result();
            foreach ($query as $row) {
                $id = $row->id;
            }
            $akun = $this->Identitas_model->cekAkunMurid($id);
            foreach ($akun as $a) {
                $password = $a->password;
            }
            if ($password) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIS sudah digunakan</div>');
                redirect('auth');
            } else {
                if ($nis) {
                    $data = [
                        'email' => $this->input->post('email', true),
                        'image' => 'default.jpg',
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'role_id' => 3
                    ];
                    $this->db->where('id', $id);
                    $this->db->update('user', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat!, Akun anda telah dibuat, Silahkan Login!</div>');
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIS belum terdaftar</div>');
                    redirect('auth');
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah Logout!</div>');
        $this->session->unset_userdata('message');
        redirect('auth');
    }
}

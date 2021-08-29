<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kegiatan_model');
        $this->load->library('form_validation');
        $this->load->model('Identitas_model');
    }

    public function index()
    {

        $user = $this->Identitas_model->userGuru();
        foreach ($user as $row) {
            $nama = $row->nama;
            $image = $row->image;
        }
        $data['user'] = $nama;
        $data['image'] = $image;
        $data['role_id'] = 'guru';
        $data['title'] = 'Beranda Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/user_footer');
    }

    public function profile()
    {
        $user = $this->Identitas_model->userGuru();
        foreach ($user as $row) {
            $nama = $row->nama;
            $image = $row->image;
            $identitas = $row->nip;
            $kelas = $row->kelas;
            $email = $row->email;
        }
        $data['user'] = $nama;
        $data['image'] = $image;
        $data['identitas'] = $identitas;
        $data['kelas'] = $kelas;
        $data['email'] = $email;
        $data['role_id'] = 'guru';
        $data['title'] = 'Profil Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function list_murid()
    {
        $user = $this->Identitas_model->userGuru();
        foreach ($user as $row) {
            $nama = $row->nama;
            $image = $row->image;
        }
        $data['user'] = $nama;
        $data['image'] = $image;
        $data['role_id'] = 'guru';
        $data['title'] = 'Profil Guru';

        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('guru/list_murid', $data);
        $this->load->view('templates/user_footer');
    }

    public function kegiatan()
    {
        $user = $this->Identitas_model->userGuru();
        foreach ($user as $row) {
            $nama = $row->nama;
            $image = $row->image;
        }
        $data['user'] = $nama;
        $data['image'] = $image;
        $data['role_id'] = 'guru';
        $data['title'] = 'Kegiatan';
        $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();
        if ($this->input->post('keyword')) {
            $data['kegiatan'] = $this->Kegiatan_model->cariDataKegiatan();
        }

        $this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required',[
            'required' => 'Field Nama Kegiatan Harus Diisi'
        ]);
        $this->form_validation->set_rules('ket', 'Keterangan', 'required',[
            'required' => 'Field Keterangan Harus Diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('guru/kegiatan', $data);
            $this->load->view('templates/user_footer');
        } else {
            $this->Kegiatan_model->tambahDataKegiatan();
            $this->session->set_flashdata('message', 'Ditambahkan.');
            redirect('guru/kegiatan');
        }
    }

    public function hapusKegiatan($id)
    {
        $this->Kegiatan_model->hapusDataKegiatan($id);
        $this->session->set_flashdata('message', 'Dihapus.');
        redirect('guru/kegiatan');
    }

    public function ubahKegiatan($id)
    {
        $user = $this->Identitas_model->userGuru();
        foreach ($user as $row) {
            $nama = $row->nama;
            $image = $row->image;
        }
        $data['user'] = $nama;
        $data['image'] = $image;
        $data['role_id'] = 'guru';
        $data['title'] = 'Kegiatan';
        $data['Ukegiatan'] = $this->Kegiatan_model->getKegiatanById($id);
        $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();

        $this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required', [
            'required' => 'Field Nama Kegiatan Harus Diisi'
        ]);
        $this->form_validation->set_rules('ket', 'Keterangan', 'required', [
            'required' => 'Field Keterangan Harus Diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('guru/kegiatan', $data);
            $this->load->view('templates/user_footer');
        } else {
            $this->Kegiatan_model->ubahDataKegiatan();
            $this->session->set_flashdata('message', 'Diperbaharui.');
            redirect('guru/kegiatan');
        }
    }
}

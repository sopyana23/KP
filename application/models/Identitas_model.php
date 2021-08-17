<?php

class Identitas_model extends CI_model
{
    public function user(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('siswa', 'user.identitas= siswa.nis');
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->get()->result();
        
    }

    public function userGuru()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('guru', 'user.identitas= guru.nip');
        $this->db->where('email', $this->session->userdata('email'));
        return $this->db->get()->result();
    }
}
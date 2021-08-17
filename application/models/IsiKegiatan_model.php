<?php

class IsiKegiatan_model extends CI_model
{
    // public function getAllKegiatan()
    // {
    //     return $this->db->get('kegiatan')->result_array();
    // }

    public function tambahDataKegiatan()
    {
        $data = array(
            'id' => null,
            'tgl' => $this->input->post('tgl', true),
            'nis' => $this->input->post('nis', true),
            'nama_kegiatan' => $this->input->post('nama', true),
            'tindakan' => $this->input->post('tindakan', true)
        );
        $this->db->insert('kegiatan', $data);
    }

    public function cekDataKegiatan()
    {
        $tgl = $this->input->post('tgl');
        $nis = $this->input->post('nis');
        $this->db->select('*');
        $this->db->from('isi_kegiatan');
        $this->db->join('kegiatan', 'isi_kegiatan.id_kegiatan = kegiatan.id');
        $this->db->where('tgl',$tgl);
        $this->db->where('nis',$nis);
        return $this->db->get()->result();

    }
    
    public function cekTgl($identitas){
        $this->db->select('*');
        $this->db->from('isi_kegiatan');
        $this->db->where('nis', $identitas);
        return $this->db->get()->result();
    }
}

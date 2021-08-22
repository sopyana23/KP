<?php

class Absen_model extends CI_model
{
    public function getTanggal()
    {
        $jumHari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i = 1; $i <= $jumHari; $i++) :
            if (strlen($i) == 1) {
                $i = '0' . $i;
            }
            $date = $i . '-' . date('m-Y');
            $hari = date('l', strtotime($date));
            if($hari == 'Sunday' || $hari == 'Saturday'){
                $btn = 'danger';
            }else{
                $btn = 'primary';
            }
            
            echo '<th><a href="' . base_url('murid/isi_kegiatan/' . $date) . '"><button class="btn btn-sm btn-'.$btn.'">' . $i . '</button></a></th>';
        endfor;
    }

    public function getData($kegiatan,$identitas)
    {
        $i = 1;
        $jumHari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        echo '<tbody>';
        foreach ($kegiatan as $row) :
            echo '<tr>
                    <td><pre>' . $row['nama_kegiatan'] . '</pre></td>';
            for ($j = 1; $j <= $jumHari; $j++) :
                if (strlen($j) == 1) {
                    $j = '0' . $j;
                }
                echo '<td>' . $this->IsiKegiatan_model->isi($row['id'], $identitas, $j . '-' . date('m-Y')) . '</td>';
            endfor;
            echo '</tr>';
        endforeach;
        echo '</tbody>';
    }
}

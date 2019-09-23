<?php
class peminjamandata extends CI_Model
{
    public function getKeterlambatan($time)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $now = strtotime($date);
        $then = strtotime($time);
        $diff = $now - $then;
        $terlambat = floor($diff / (60 * 60 * 24));
        if ($terlambat >=7) {
            return $terlambat-7;
        } else {
            return 0;
        }

    }
    public function getDenda($hari) {
        $denda = $hari * 1000;
        if ($denda>=100000) {
            return 100000;
        } else {
            return $denda;
        }
    }

    public function getData($nim, $kodeinventaris)
    {
        $this->db->where('nim', $nim);
        $this->db->where('kode_inventaris_buku', $kodeinventaris);
        $result = $this->db->get('data_peminjaman', 1);
        return $result;
    }


    public function updateTable($data)
    {
        $this->db->where('kode_inventaris_buku',$data['kode_inventaris_buku']);
        $this->db->update('data_peminjaman',$data);
     }
}

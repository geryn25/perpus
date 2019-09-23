<?php
class Peminjaman extends CI_Controller
{
    public function index() {
        date_default_timezone_set('Australia/Melbourne');
        $this->load->view('inputdata');
    }
    public function getpeminjaman()
    {
        $nim = $this->input->post('nim', true);
        $kodeinventaris = $this->input->post('kode_inventaris_buku', true);
        $validate = $this->peminjamandata->getData($nim, $kodeinventaris);
        if ($validate->num_rows() == 1) {
            $temp = $validate->row_array();
            $data = [
                'nim' => $temp["nim"],
                'kode_inventaris_buku' => $temp["kode_inventaris_buku"],
                'judul_buku' => $temp["judul_buku"],
                'tanggal_pinjam' => $temp["tanggal_pinjam"],
                'tanggal_kembali' => $temp["tanggal_kembali"],
                'tanggal_seharusnya_kembali' => $temp["tanggal_seharusnya_kembali"],
                'keterlambatan' => $temp['keterlambatan'],
                'jumlah_denda' => $temp["jumlah_denda"],
                

            ];
            return $data;
        } else {
            $this->session->set_flashdata('error', 'data tidak tersedia');
            redirect('Peminjaman');
        }
    }
    public function getHasil() {
        date_default_timezone_set('Asia/Jakarta');
        $data = $this->getpeminjaman();
        if ($data['tanggal_kembali'] == NULL) {
            $data['keterlambatan']=$this->peminjamandata->getKeterlambatan($data['tanggal_pinjam']);
            $data['tanggal_kembali']= date('Y-m-d');
            $data['jumlah_denda']= $this->peminjamandata->getDenda($data['keterlambatan']);
            $this->peminjamandata->updateTable($data);
        }
        $this->db->where('nim',$data['nim']);
        $result=$this->db->get('data_mahasiswa',1);
        $nama=$result->row_array();
        $data1 = [
            'nama'=>$nama['nama'],
            'nim' => $data["nim"],
            'kode_inventaris_buku' => $data["kode_inventaris_buku"],
            'judul_buku' => $data["judul_buku"],
            'tanggal_pinjam' => $data["tanggal_pinjam"],
            'tanggal_kembali' => $data["tanggal_kembali"],
            'tanggal_seharusnya_kembali' => $data["tanggal_seharusnya_kembali"],
            'keterlambatan' => $data['keterlambatan'],
            'jumlah_denda' => $data["jumlah_denda"],
            

        ];
        $this->session->set_userdata($data1);
        $this->session->set_flashdata('success','data didapatkan');
        redirect('hasil');
    }
}

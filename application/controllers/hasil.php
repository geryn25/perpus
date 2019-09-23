<?php
class Hasil extends CI_Controller {
    public function index() {
        $this->load->view('status');
    }
    public function getHasil($data) {
        $this->load->view('status');
        
    }
}


?>
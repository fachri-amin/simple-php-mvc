<?php

class About extends Controller{

    public function index($nama='Fachri', $profesi='Mahasiswa'){ // menangkap parameter yang ada di url
        $data['nama'] = $nama;
        $data['profesi'] = $profesi;
        $data['judul_halaman'] = 'About me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }

    public function page(){
        $data['judul_halaman'] =  'About | Page';
        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer', $data);
    }
}

?>
<?php

class Home extends Controller{ 
    
    public function index(){
        $data['judul_halaman'] = 'Home';
        
        $this->view('templates/header', $data);
        $this->view('home/index');
        $this->view('templates/footer', $data);
    }
}


?>
<?php

class Mahasiswa extends Controller{

    public function index(){
        $data['judul_halaman'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getMahasiswa();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    public function tambah(){
        if($this->model('Mahasiswa_model')->tambahMahasiswa($_POST)>0){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('Mahasiswa_model')->hapusMahasiswa($id)>0){
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
    }

    public function getMahasiswa(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['mahasiswa_id']));
    }

    public function ubah(){
        if($this->model('Mahasiswa_model')->ubahMahasiswa($_POST)>0){
            Flasher::setFlash('Berhasil', 'diubah', 'success');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
        else{
            Flasher::setFlash('Gagal', 'diubah', 'danger');
            header('Location:'. BASE_URL . 'mahasiswa');
            exit;
        }
    }

    public function cari(){
        $data['judul_halaman'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->cariMahasiswa($_POST);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }
}

?>
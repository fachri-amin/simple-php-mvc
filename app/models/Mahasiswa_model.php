<?php

class Mahasiswa_model{

    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getMahasiswa(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();    
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '.$this->table .' WHERE mahasiswa_id = :mahasiswa_id');
        $this->db->bind('mahasiswa_id', $id);
        return $this->db->resultSingle();    
    }

    public function tambahMahasiswa($data){
        $query = "INSERT INTO mahasiswa (nama_mahasiswa, nim, email, jurusan) VALUES (:nama_mahasiswa, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE mahasiswa_id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahMahasiswa($data){
        $query = "UPDATE mahasiswa SET nama_mahasiswa=:nama_mahasiswa, nim=:nim, email=:email, jurusan=:jurusan WHERE mahasiswa_id=:mahasiswa_id";

        $this->db->query($query);
        $this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMahasiswa($data){
        $cari = $data['cari'];
        $this->db->query('SELECT * FROM '.$this->table.' WHERE nama_mahasiswa LIKE :cari');

        $this->db->bind('cari', "%$cari%");
        return $this->db->resultSet();    
    }
}

?>
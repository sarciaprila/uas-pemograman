<?php

class JasaModel {

    private $table = "jasa";
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllJasa() {
        $this->db->query("SELECT jasa.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.nama_kategori = jasa.kategori_nama");
        return $this->db->resultSet();
    }

    public function tambahJasa($data) {
        $this->db->query("INSERT INTO jasa (nama_jasa, kategori_nama, nama_deskripsi) 
        VALUES (:nama_jasa, :kategori_nama, :nama_deskripsi)");
        $this->db->bind(':nama_jasa', $data['nama_jasa']);
        $this->db->bind(':kategori_nama', $data['kategori_nama']);
        $this->db->bind(':nama_deskripsi', $data['nama_deskripsi']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getJasaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    

    public function updateJasa($data) {
        $this->db->query("UPDATE jasa SET nama_jasa=:nama_jasa, `kategori_nama`=:kategori_nama, nama_deskripsi=:nama_deskripsi WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_jasa', $data['nama_jasa']);
        $this->db->bind('kategori_nama', $data['kategori_nama']);
        $this->db->bind('nama_deskripsi', $data['nama_deskripsi']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function cariJasa() {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_jasa LIKE :key 
                          OR kategori_nama LIKE :key 
                          OR nama_deskripsi LIKE :key");
        $this->db->bind(':key', "%$key%", PDO::PARAM_STR);
        return $this->db->resultSet();
    }
    

    public function deleteJasa($id){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    
    



}



?>

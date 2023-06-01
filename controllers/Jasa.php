<?php
class jasa extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Daftar Jasa';
        $data['jasa']=$this->model('JasaModel')->getAllJasa();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jasa/index', $data);
        $this->view('templates/footer');
    }




    public function tambahJasa(){
        $data['title'] = 'Tambah Data Jasa';
        $data['kategori']=$this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jasa/create', $data);
        $this->view('templates/footer');
    }
    public function simpanJasa(){
        if( $this->model('JasaModel')->tambahJasa($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/jasa');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/jasa');
            exit;
        }
    }  



    
    public function editJasa($id){
        $data['title'] = 'Detail Kependudukan';
        $data['kategori']=$this->model('KategoriModel')->getAllKategori();
        $data['jasa'] = $this->model('JasaModel')->getJasaById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jasa/edit', $data);
        $this->view('templates/footer');
    }
    public function updateJasa(){
        if( $this->model('JasaModel')->updateJasa($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/jasa');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/jasa');
            exit;
        }
    }  


    

    public function cariJasa(){
        $data['title'] = 'Data Daftar Jasa';
        $data['jasa'] = $this->model('JasaModel')->cariJasa();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('jasa/index', $data);
        $this->view('templates/footer');
    }
    public function hapusJasa($id){
        if( $this->model('JasaModel')->deleteJasa($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/jasa');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/jasa');
            exit;
        }
    }  



}

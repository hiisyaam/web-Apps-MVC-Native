<?php 

if (!isset($_SESSION['username'])) {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}


include('m_programKerja.php');

class c_programKerja {
    public $model;
    
    public function __construct() {
        $this->model = new m_programKerja();
    }
    
    public function route() {
        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'index';
        
        // Batasi akses berdasarkan role
        if ($_SESSION['role'] == 'menteri' && !in_array($aksi, ['index'])) {
            header('Location: index.php?error=Akses ditolak');
            exit();
        }

        switch ($aksi) {
            case 'index':
                $this->index();
                break;
            case 'tambah':
                $this->tambah();
                break;
            case 'proses_tambah':
                $this->prosesTambah();
                break;
            case 'tambah_user':
                $this->tambahUser();
                break;
            case 'proses_tambah_user':
                $this->prosesTambahUser();
                break;
            case 'edit':
                $this->edit();
                break;
            case 'proses_edit':
                $this->prosesEdit();
                break;
            case 'edit_pengguna':
                $this->editPengguna();
                break;
            case 'proses_edit_user':
                $this->proses_Edit_user();
                break;
            case 'hapus':
                $this->hapus();
                break;
            case 'hapus_user':
                $this->hapusPengguna();
                break;
        }
    }
    
    public function index() {
        $proker = $this->model->getSemuaProgramKerja();
        if ($_SESSION['role'] == "menteri") {
            include 'v_programKerjaMentri.php';
        } else if ($_SESSION['role'] == "kadep") {
            $pengguna = $this->model->getSemuaPengguna();
            include 'v_programKerja.php';
        }
    }
    
    public function tambah() {
        include 'v_tambah_programKerja.php';
    }

    
    public function prosesTambah() {
        $nomorProgram = $_POST['nomorProgram'];
        $namaProgram = $_POST['namaProgram'];
        $suratKeterangan = $_POST['suratKeterangan'];
        
        $this->model->setProgramKerja($nomorProgram, $namaProgram, $suratKeterangan);
        header('Location: dashboard.php');
    }

    public function tambahUser(){
        include 'v_tambah_pengguna.php';
    }

    public function prosesTambahUser(){
        $pengguna = $_POST['pengguna'];
        $pw = $_POST['pw'];
        $role = $_POST['role'];

        $this->model->setPengguna($pengguna, $pw, $role);
        header('Location: dashboard.php');
    }

    
    public function edit() {
        $nomorProgram = $_GET['id'];
        $proker = $this->model->getProgramKerjaById($nomorProgram);
        include 'v_edit_programKerja.php';
    }

    
    public function prosesEdit() {
        $nomorProgram = $_POST['nomorProgram'];
        $namaProgram = $_POST['namaProgram'];
        $suratKeterangan = $_POST['suratKeterangan'];
        
        $this->model->updateProgramKerja($nomorProgram, $namaProgram, $suratKeterangan);
        header('Location: dashboard.php');
    }

    public function editPengguna(){
        $id = $_GET['id'];
        $data = $this->model->getPenggunaById($id);
        include 'v_edit_user.php';
    }

    public function proses_Edit_user(){
        $pengguna = $_POST['pengguna'];
        $pw = $_POST['pw'];
        $role = $_POST['role'];
        $id = $_POST['id'];

        $this->model->editUser($pengguna, $pw, $role, $id);
        header('Location: dashboard.php');
    }
    
    public function hapus() {
        if ($_SESSION['role'] == 'kadep') {
            $nomorProgram = $_GET['id'];
            $this->model->hapusProgramKerja($nomorProgram);
            header('Location: dashboard.php');
        }
    }

    public function hapusPengguna() {
        if ($_SESSION['role'] == 'kadep') {
            $idPengguna = $_GET['id'];
            $this->model->hapusPengguna($idPengguna);
            header('Location: dashboard.php');
        }
    }
}

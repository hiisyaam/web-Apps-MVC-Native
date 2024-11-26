<?php

if (!isset($_SESSION['username'])) {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}   
class m_programKerja {
    
    
    public function setProgramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
        include 'db.php';
        $stmt = $conn->prepare("INSERT INTO proker (nomorProgram, namaProgram, suratKeterangan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nomorProgram, $namaProgram, $suratKeterangan);
        $stmt->execute();
        $stmt->close();
    }

    public function setPengguna($a,$b,$c){
        include 'db.php';
        $stmt = $conn->prepare("INSERT INTO users (pengguna, pw, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $a, $b, $c);
        $stmt->execute();
        $stmt->close();
    }

    
    public function getSemuaProgramKerja() {
        include 'db.php';
        $rs = $conn->query("SELECT * FROM proker");
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows; 
    }
    public function getSemuaPengguna() {
        include 'db.php';
        $rs = $conn->query("SELECT * FROM users");
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows; 
    }
    
    public function getProgramKerjaById($nomorProgram) {
        include 'db.php';
        $stmt = $conn->prepare("SELECT * FROM proker WHERE nomorProgram = ?");
        $stmt->bind_param("s", $nomorProgram);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getPenggunaById($id){
        include 'db.php';
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    
    public function updateProgramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
        include 'db.php';
        $stmt = $conn->prepare("UPDATE proker SET namaProgram = ?, suratKeterangan = ? WHERE nomorProgram = ?");
        $stmt->bind_param("sss", $namaProgram, $suratKeterangan, $nomorProgram);
        $stmt->execute();
        $stmt->close();
    }

    public function editUser($a,$b,$c,$d){
        include 'db.php';
        $stmt = $conn->prepare("UPDATE users SET pengguna = ? , pw = ? , role = ?  WHERE id = ?");
        $stmt->bind_param("sssi", $a, $b, $c, $d);
        $stmt->execute();
        $stmt->close();
    }


    
    public function hapusProgramKerja($nomorProgram) {
        include 'db.php';
        $stmt = $conn->prepare("DELETE FROM proker WHERE nomorProgram = ?");
        $stmt->bind_param("s", $nomorProgram);
        $stmt->execute();
        $stmt->close();
    }
    public function hapusPengguna($idPengguna) {
        include 'db.php';
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("s", $idPengguna);
        $stmt->execute();
        $stmt->close();
    }
}
<?php

if (!isset($_SESSION['username']) && $_SESSION['role'] == "menteri") {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>

<html>
    <head>
        <title>Tambah Program Kerja</title>
    </head>
    <body>
        <h2>Tambah Program Kerja Baru</h2>
        <form action="dashboard.php?aksi=proses_tambah" method="post">
            <label>Nomor Program:</label><br>
            <input type="text" name="nomorProgram" required><br>
            <label>Nama Program:</label><br>
            <input type="text" name="namaProgram" required><br>
            <label>Surat Keterangan:</label><br>
            <textarea name="suratKeterangan" required></textarea><br>
            <input type="submit" value="Tambah">
        </form>
        <a href="index.php">Kembali</a>
    </body>
</html>

<?php
if (!isset($_SESSION['username']) && $_SESSION['role'] == "menteri") {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>
<html>
    <head>
        <title>Edit Program Kerja</title>
    </head>
    <body>
        <h2>Edit Program Kerja</h2>
        <form action="dashboard.php?aksi=proses_edit" method="post">
            <label>Nomor Program:</label><br>
            <input type="text" name="nomorProgram" value="<?php echo $proker['nomorProgram']; ?>" readonly><br>
            <label>Nama Program:</label><br>
            <input type="text" name="namaProgram" value="<?php echo $proker['namaProgram']; ?>" required><br>
            <label>Surat Keterangan:</label><br>
            <textarea name="suratKeterangan" required><?php echo $proker['suratKeterangan']; ?></textarea><br>
            <input type="submit" value="Update">
        </form>
        <a href="dashboard.php">Kembali</a>
    </body>
</html>
<?php
if (!isset($_SESSION['username']) && $_SESSION['role'] == "menteri") {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>

<html>
    <head>
        <title>Daftar Program Kerja BEM</title>
    </head>
    <body>
        <h2>Daftar Program Kerja BEM</h2>
        <a href="dashboard.php?aksi=tambah">Tambah Program Kerja</a>
        <table border="3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program Kerja</th>
                    <th>Surat Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($proker as $row) {
                    echo "<tr>";
                    echo "<td>".$row['nomorProgram']."</td>";
                    echo "<td>".$row['namaProgram']."</td>"; 
                    echo "<td>".$row['suratKeterangan']."</td>";
                    echo "<td>";
                    echo "<a href='dashboard.php?aksi=edit&id=".$row['nomorProgram']."'>Edit</a> | ";
                    echo "<a href='dashboard.php?aksi=hapus&id=".$row['nomorProgram']."' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <h2>Daftar Pengguna Apps</h2>
        <a href="dashboard.php?aksi=tambah_user">Tambah Pengguna Apps</a>
        <table border="3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($pengguna as $row) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['pengguna']."</td>"; 
                    echo "<td>".$row['pw']."</td>";
                    echo "<td>".$row['role']."</td>";
                    echo "<td>";
                    echo "<a href='dashboard.php?aksi=edit_pengguna&id=".$row['id']."'>Edit</a> | ";
                    echo "<a href='dashboard.php?aksi=hapus_user&id=".$row['id']."' onclick='return confirm(\"Hapus Pengguna?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>

<html>
    <head>
        <title>Daftar Program Kerja BEM</title>
    </head>
    <body>
        <h2>Daftar Program Kerja BEM</h2>
        <table border="3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Program Kerja</th>
                    <th>Surat Keterangan</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($proker as $row) {
                    echo "<tr>";
                    echo "<td>".$row['nomorProgram']."</td>";
                    echo "<td>".$row['namaProgram']."</td>"; 
                    echo "<td>".$row['suratKeterangan']."</td>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
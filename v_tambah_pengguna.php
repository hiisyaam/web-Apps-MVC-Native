<?php

if (!isset($_SESSION['username']) && $_SESSION['role'] == "menteri") {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>

<html>
    <head>
        <title>Tambah Pengguna</title>
    </head>
    <body>
        <h2>Tambah Data User</h2>
        <form action="dashboard.php?aksi=proses_tambah_user" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="pengguna" name="pengguna" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="pw" name="pw" required><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="kadep">Kadep</option>
                <option value="menteri">Menteri</option>
            </select><br><br>

            <input type="submit" value="Tambah">
        </form>

        <a href="dashboard.php">Kembali</a>
    </body>
</html>
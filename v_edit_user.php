
<?php
if (!isset($_SESSION['username']) && $_SESSION['role'] == "menteri") {
    header('Location: index.php?error=Harap login terlebih dahulu');
    exit();
}; ?>
<html>
    <head>
        <title>Edit User Brokk</title>
    </head>
    <body>
        <h2>Edit Data User</h2>
        <form action="dashboard.php?aksi=proses_edit_user" method="post">
            <label>ID</label><br>
            <input type="text" name="id" value="<?php echo $data['id']; ?>" readonly><br>
            <label>username</label><br>
            <input type="text" name="pengguna" value="<?php echo $data['pengguna']; ?>" required><br>
            <label>Password:</label><br>
            <input type="text" name="pw" value="<?php echo $data['pw']; ?>" required><br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="" disabled selected><?php echo $data['role']; ?></option>
                <option value="kadep">Kadep</option>
                <option value="menteri">Menteri</option>
            </select><br><br>
            <input type="submit" value="Update">
        </form>
        <a href="dashboard.php">Kembali</a>
    </body>
</html>
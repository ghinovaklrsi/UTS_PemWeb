<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletambahS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Data Staff</title>
</head>
<body>
    <div class="wrapper">
	<div class="container main" style="max-width: 600px; width: 100%; padding: 20px;">
            <form method="POST" action="tampil_staff.php">
                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
            </form>
            <h3 class="text-center my-4">Update Data Staff</h3>

            <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM staff WHERE id_staff='$id'");
            while($d = mysqli_fetch_array($data)){
            ?>
            <form method="post" action="update_staff.php">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="hidden" name="id_staff" value="<?php echo $d['id_staff']; ?>">
                    <input class="form-control form-control-sm" type="text" name="nama" value="<?php echo $d['nama']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input class="form-control form-control-sm" type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input class="form-control form-control-sm" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">No. Telepon</label>
                    <input class="form-control form-control-sm" type="text" name="no_telp" value="<?php echo $d['no_telp']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control form-control-sm" type="email" name="email" value="<?php echo $d['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-control form-control-sm" name="gender">
                        <option value="P" <?php if ($d['gender'] == 'P') echo 'selected'; ?>>Pria</option>
                        <option value="W" <?php if ($d['gender'] == 'W') echo 'selected'; ?>>Wanita</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input class="form-control form-control-sm" type="text" name="jabatan" value="<?php echo $d['jabatan']; ?>">
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </form>
            <?php 
            }
            ?>
        </div>
    </div>
</body>
</html>

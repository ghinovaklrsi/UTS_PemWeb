<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletambahS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Data Absensi</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main" style="max-width: 600px; width: 100%; padding: 20px;">
            <form method="POST" action="tampil_absensi.php">
                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
            </form>
            <h3 class="text-center my-4">Update Data Absensi</h3>

            <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absensi='$id'");
            while($d = mysqli_fetch_array($data)){
            ?>
            <form method="post" action="update_absensi.php">
                <div class="mb-3">
                    <label for="id_staff" class="form-label">ID Staff</label>
                    <input type="hidden" name="id_absensi" value="<?php echo $d['id_absensi']; ?>">
                    <input class="form-control form-control-sm" type="text" name="id_staff" value="<?php echo $d['id_staff']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input class="form-control form-control-sm" type="text" name="bulan" value="<?php echo $d['bulan']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input class="form-control form-control-sm" type="text" name="tahun" value="<?php echo $d['tahun']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="hadir" class="form-label">Total Hadir</label>
                    <input class="form-control form-control-sm" type="number" name="hadir" value="<?php echo $d['hadir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tdk_hadir" class="form-label">Total Alpha</label>
                    <input class="form-control form-control-sm" type="number" name="tdk_hadir" value="<?php echo $d['tdk_hadir']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="sakit" class="form-label">Total Sakit</label>
                    <input class="form-control form-control-sm" type="number" name="sakit" value="<?php echo $d['sakit']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="izin" class="form-label">Total Izin</label>
                    <input class="form-control form-control-sm" type="number" name="izin" value="<?php echo $d['izin']; ?>" required>
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

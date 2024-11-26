<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletambahS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Data Absensi</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main" style="max-width: 600px; width: 100%; padding: 20px;">
            <form method="POST" action="tampil_absensi.php">
                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
            </form>
            <h3 class="text-center my-4">Tambah Data Absensi</h3>
            <form method="post" action="input_absensi.php">
                <div class="mb-3">
                    <label for="id_staff" class="form-label">ID Staff</label>
                    <input class="form-control form-control-sm" type="text" name="id_staff" required>
                </div>
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input class="form-control form-control-sm" type="text" name="bulan" required>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input class="form-control form-control-sm" type="text" name="tahun" required>
                </div>
                <div class="mb-3">
                    <label for="hadir" class="form-label">Total Hadir</label>
                    <input class="form-control form-control-sm" type="number" name="hadir" required>
                </div>
                <div class="mb-3">
                    <label for="tdk_hadir" class="form-label">Total Alpha</label>
                    <input class="form-control form-control-sm" type="number" name="tdk_hadir" required>
                </div>
                <div class="mb-3">
                    <label for="sakit" class="form-label">Total Sakit</label>
                    <input class="form-control form-control-sm" type="number" name="sakit" required>
                </div>
                <div class="mb-3">
                    <label for="izin" class="form-label">Total Izin</label>
                    <input class="form-control form-control-sm" type="number" name="izin" required>
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>

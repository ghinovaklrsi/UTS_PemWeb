<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletambahG.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Data Gaji</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main" style="max-width: 600px; width: 100%; padding: 20px;">
            <form method="POST" action="tampil_gaji.php">
                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
            </form>
            <h3 class="text-center my-4">Tambah Data Gaji</h3>
            <form method="post" action="input_gaji.php">
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
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input class="form-control form-control-sm" type="number" step="0.01" name="gaji_pokok" required>
                </div>
                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input class="form-control form-control-sm" type="number" step="0.01" name="tunjangan" required>
                </div>
                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input class="form-control form-control-sm" type="number" step="0.01" name="potongan" required>
                </div>
                <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>

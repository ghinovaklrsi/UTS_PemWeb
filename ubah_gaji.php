<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styletambahS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Data Gaji</title>
	<script>
		// Fungsi untuk menghitung total gaji
		function calculateTotal() {
			var gajiPokok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
			var tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
			var potongan = parseFloat(document.getElementById('potongan').value) || 0;
			var totalGaji = gajiPokok + tunjangan - potongan;
			document.getElementById('total_gaji').value = totalGaji.toFixed(2);
		}
	</script>
</head>
<body>

	<div class="wrapper">
        <div class="container main" style="max-width: 600px; width: 100%; padding: 20px;">
            <form method="POST" action="tampil_gaji.php">
                <button type="submit" class="btn btn-outline-secondary">Kembali</button>
            </form>
			<h3 class="text-center my-4">Update Data Gaji</h3>

			<?php
			include 'koneksi.php';
			$id = $_GET['id'];
			$data = mysqli_query($koneksi,"SELECT * FROM gaji WHERE id_gaji='$id'");
			while($d = mysqli_fetch_array($data)){
			?>
			<form method="post" action="update_gaji.php">
				<div class="mb-3">
                    <label for="id_staff" class="form-label">ID Staff</label>
                    <input type="hidden" name="id_gaji" value="<?php echo $d['id_gaji']; ?>">
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
					<label for="gaji_pokok" class="form-label">Gaji Pokok</label>
					<input class="form-control form-control-sm" type="text" id="gaji_pokok" name="gaji_pokok" value="<?php echo $d['gaji_pokok']; ?>" oninput="calculateTotal()" required>
				</div>
                <div class="mb-3">
					<label for="tunjangan" class="form-label">Tunjangan</label>
					<input class="form-control form-control-sm"type="text" id="tunjangan" name="tunjangan" value="<?php echo $d['tunjangan']; ?>" oninput="calculateTotal()" required>
				</div>
                <div class="mb-3">
					<label for="potongan" class="form-label">Potongan</label>
					<input class="form-control form-control-sm" type="text" id="potongan" name="potongan" value="<?php echo $d['potongan']; ?>" oninput="calculateTotal()" required>
				</div>
                <div class="mb-3">
				<label for="total_gaji" class="form-label">Total Gaji</label>
					<input class="form-control form-control-sm" type="text" id="total_gaji" name="total_gaji" value="<?php echo $d['total_gaji']; ?>" readonly>
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

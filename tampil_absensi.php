<?php 
session_start(); // Mulai session
include 'koneksi.php';

// Cek jika ada pesan di session
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info mt-3">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}

// Cek jika ada aksi penghapusan yang dikonfirmasi
if (isset($_GET['action']) && $_GET['action'] == 'confirm_delete') {
    echo '<div class="alert alert-secondary">
            Apakah Anda yakin ingin menghapus data absensi ini?
            <form method="POST" action="hapus_absensi.php">
                <button type="submit" name="confirm" class="btn btn-danger btn-sm">Ya, Hapus</button>
                <a href="tampil_absensi.php" class="btn btn-secondary btn-sm">Batal</a>
            </form>
          </div>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styletampilS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Data Absensi</title>
</head>
<body>
	<main class="table" id="absensi_table">
    	<section class="table__header">
    	<a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>

		<div class="header-center">
            <h1 style="text-align:center;">Data Absensi</h1>
			<form method="GET" action="">
            	<div class="input-group">
                	<input type="search" name="search" placeholder="Cari Absensi Staff..." aria-label="Search Staff" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" class="form-control">
                	<button type="submit" class="btn btn-light">
                    	<i class="bi bi-search"></i>
                	</button>
            	</div>
			</form>
		</div>
		<form method="POST" action="tambah_absensi.php">
            <button type="submit" class="btn btn-secondary">Tambah Absensi</button>
        </form>
	</section>
	<section class="table__body">
            <table>
                <thead>
                    <tr>
						<th>No</th>
						<th>ID Staff</th>
						<th>Bulan</th>
						<th>Tahun</th>
						<th>Total Hadir</th>
						<th>Total Alpha</th>
						<th>Total Sakit</th>
						<th>Total Izin</th>
						<th>Aksi</th>
					</tr>
				</thead>
            <tbody>
			<?php 
                $no = 1;
                $search_query = '';
				if (isset($_GET['search'])) {
    				$search_query = mysqli_real_escape_string($koneksi, $_GET['search']);
				}

				// Query untuk mengambil data absensi, dengan filter pencarian jika ada
				$query = "SELECT * FROM absensi" . (
					$search_query ? " WHERE id_staff LIKE '%$search_query%'" : "");
				$data = mysqli_query($koneksi, $query);

				// Tampilkan data
				while ($d = mysqli_fetch_array($data)) {
			?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['id_staff']; ?></td>
                        <td><?php echo $d['bulan']; ?></td>
                        <td><?php echo $d['tahun']; ?></td>
                        <td><?php echo $d['hadir']; ?></td>
                        <td><?php echo $d['tdk_hadir']; ?></td>
                        <td><?php echo $d['sakit']; ?></td>
                        <td><?php echo $d['izin']; ?></td>
                        <td>
                            <a role="button" class="btn btn-info" 
                            href="ubah_absensi.php?id=<?php echo $d['id_absensi']; ?>">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a role="button" class="btn btn-danger" 
                            href="hapus_absensi.php?id=<?php echo $d['id_absensi']; ?>">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
				</tbody>
			</table>
		</section>
	</main>
</body>
</html>

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
            Apakah Anda yakin ingin menghapus data staff ini?
            <form method="POST" action="hapus_staff.php">
                <button type="submit" name="confirm" class="btn btn-danger btn-sm">Ya, Hapus</button>
                <a href="tampil_staff.php" class="btn btn-secondary btn-sm">Batal</a>
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
    <title>Data Staff</title>
</head>

<body>
    <main class="table" id="staff_table">
    <section class="table__header">
    <!-- Tombol Kembali ke Dashboard tetap berada di bagian kiri atas -->
    <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    
    <!-- Pusatkan judul dan kolom pencarian di tengah -->
    <div class="header-center">
        <h1 style="text-align:center;">Data Staff</h1>
        <form method="GET" action="">
            <div class="input-group">
                <input type="search" name="search" placeholder="Cari Staff..." aria-label="Search Staff" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" class="form-control">
                <button type="submit" class="btn btn-light">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Tombol Tambah Staff tetap di bagian kanan -->
    <form method="POST" action="tambah_staff.php">
        <button type="submit" class="btn btn-secondary">Tambah Staff</button>
    </form>
</section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>ID Staff</th>
                        <th>Nama Lengkap</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Initialize the search variable
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Prepare the SQL query with the search condition
                    $query = "SELECT * FROM staff";
                    if (!empty($search)) {
                        $query .= " WHERE nama LIKE '%" . mysqli_real_escape_string($koneksi, $search) . "%'";
                    }
                    $data = mysqli_query($koneksi, $query);

                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $d['id_staff']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['tgl_lahir']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['no_telp']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['gender']; ?></td>
                        <td><?php echo $d['jabatan']; ?></td>
                        <td>
                            <a role="button" class="btn btn-info"  
                            href="ubah_staff.php?id=<?php echo $d['id_staff']; ?>">
                            <i class="bi bi-pencil-fill"></i>
                            </a>
                            <a role="button" class="btn btn-danger" 
                            href="hapus_staff.php?action=delete&id=<?php echo $d['id_staff']; ?>">
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

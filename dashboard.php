<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <link rel="stylesheet" href="styledashboard.css">
</head>
<body>
    <nav class="nav">
        <div class="logo">
            <h1>Dashboard Admin.</h1>
        </div>
        <button class="menu-toggle"><i class="fa fa-bars"></i></button>
        <ul class="nav-main-menu">
        <li class="dropdown">
                <a href="#" class="nav-link"><span>Staff</span> <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-content">
                    <li><a href="tampil_staff.php">Kelola Staff</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link"><span>Gaji</span> <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-content">
                    <li><a href="tampil_gaji.php">Kelola Gaji</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link"><span>Absensi</span> <i class="fa fa-chevron-down"></i></a>
                <ul class="dropdown-content">
                    <li><a href="tampil_absensi.php">Kelola Absensi</a></li>
                </ul>
            </li>
        </ul>
        <button class="btn"><a href="logout.php"><span>Logout</span> <i class="fa fa-right-to-bracket"></i></a></button>
    </nav>
    <main>
        <?php
        session_start();
        if (!isset($_SESSION['id_user'])) {
            header('Location: login.php'); // Redirect ke halaman login jika belum login
            exit();
        }
        ?>

        <h1>Selamat Datang di Sistem Gaji Garmen</h1>

    </main>
</body>
</html>

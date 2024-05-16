<!DOCTYPE html>
<html lang="en">

<head>
    <title>Concert Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="../global.css">

    <style>
        /* Add additional CSS for the concert theme */
        body {
            background-image: url('konser.jpg'); /* Add the path to your background image */
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }

        .dashboard-content {
            text-align: center;
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn-primary,
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-cetak {
            background-color: #7FFFD4;
            border-color: #dc3545;
        }

        .btn-primary:hover,
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>

<body>

    <?php
    session_start(); // Start the session

    // Check if the user is not logged in, redirect to the login page
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }

    // Fetch user data from the database (Modify this according to your database schema)
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "023pwd"; // Change this to your actual database name

    $conn = mysqli_connect($server, $user, $pass, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
    }

    $conn->close();
    ?>

    <div class="container mt-4">
        <div class="dashboard-content">
            <h2>SELAMAT DATANG DI KONSERKU.ID</h2>

            <!-- Display user account information -->
            <p>Welcome, <?php echo $user_data['username']; ?>!</p>

            <div class="btn-group">
                <a href="beli_tiket.php" class="btn btn-primary">Beli Tiket</a>
                <a href="cetak.php" class="btn btn-primary">Cetak Tiket</a>
                <a href="lihat_artis.php" class="btn btn-primary">Lihat Artis</a>
                <a href="cari.php" class="btn btn-primary">Cari Tiket</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <div class="lihat-tiket-content">
        <h2>Tiket</h2>

        <?php
        // Your database connection code
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "023pwd"; // Change this to your actual database name

        $conn = mysqli_connect($server, $user, $pass, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch ticket details from the database (Modify this according to your database schema)
        $sql = "SELECT * FROM tikett";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>NIK</th><th>Jumlah Tiket</th><th>Konser</th><th>Kategori</th><th>Aksi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['alamat']}</td>";
                echo "<td>{$row['nik']}</td>";
                echo "<td>{$row['jumlah']}</td>";
                echo "<td>{$row['konser']}</td>";
                echo "<td>{$row['kategori']}</td>";
                echo "<td>";
                echo "<a href='edit_tiket.php?id={$row['id']}' class='btn btn-warning'> Edit </a>";
                echo "<a href='hapus_tiket.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Apakah yakin ingin menghapus tiket ini?\")'> Hapus </a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada tiket yang ditemukan.</p>";
        }

        $conn->close();
        ?>
    </div>
</div>
    </div>

</body>

</html>

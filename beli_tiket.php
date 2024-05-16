<!DOCTYPE html>
<html>

<head>
    <title>Beli Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/beli_tiket.css">
    <link rel="stylesheet" type="text/css" href="../global.css">

</head>

<body>

    <?php
    // Include your database connection file if not already included
    // include_once('db_connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nik = $_POST['nik'];
        $jumlah = $_POST['jumlah'];
        $konser = $_POST['konser'];
        $kategori = $_POST['kategori'];

        // Your database connection code
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "023pwd"; // Change this to your actual database name

        $conn = mysqli_connect($server, $user, $pass, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert ticket purchase data into the database
        $sql = "INSERT INTO tikett (nama, alamat, nik, jumlah, konser, kategori) VALUES ('$nama', '$alamat', '$nik', $jumlah, '$konser', '$kategori')";

        echo "<div class='container mt-4'>";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>";
            echo "Pembelian tiket berhasil!";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>";
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "</div>";
        }

        // Add button to go back to the dashboard
        echo "<form action='dashboard.php' method='get'>";
        echo "<button type='submit' class='btn btn-primary'>Kembali ke Dashboard</button>";
        echo "</form>";

        echo "</div>";

        $conn->close();
    }
    ?>

    <div class="container mt-4">
        <div class="beli-tiket-content">
            <h2>Beli Tiket</h2>

            <form action="beli_tiket.php" method="post">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" name="alamat" required>
                </div>

                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="number" class="form-control" name="nik" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Tiket:</label>
                    <input type="number" class="form-control" name="jumlah" required>
                </div>

                <div class="form-group">
                    <label for="konser">Nama Konser:</label>
                    <select class="form-control" name="konser" required>
                        <option value="coldplay">Coldplay</option>
                        <option value="taylor">Taylor Swift</option>
                        <option value="bruno">Bruno Mars</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori Tiket:</label>
                    <select class="form-control" name="kategori" required>
                        <option value="vip">VIP</option>
                        <option value="reguler">Reguler</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Beli Tiket</button>
            </form>
        </div>
    </div>

</body>

</html>

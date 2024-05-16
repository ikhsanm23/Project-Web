<!DOCTYPE html>
<html>

<head>
    <title>Cari Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/cari_tiket.css">
    <link rel="stylesheet" type="text/css" href="../global.css">
</head>

<body>

    <?php
    // Include your database connection file if not already included
    // include_once('db_connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get search input
        $search_query = $_POST['search_query'];

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

        // Perform search query
        $sql = "SELECT * FROM tikett WHERE nama LIKE '%$search_query%' OR konser LIKE '%$search_query%' OR kategori LIKE '%$search_query%'";
        $result = $conn->query($sql);

        // Display search results
        echo "<div class='container mt-4'>";
        echo "<h2>Hasil Pencarian</h2>";

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nama</th>";
            echo "<th>Alamat</th>";
            echo "<th>NIK</th>";
            echo "<th>Jumlah Tiket</th>";
            echo "<th>Konser</th>";
            echo "<th>Kategori Tiket</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "<td>" . $row['konser'] . "</td>";
                echo "<td>" . $row['kategori'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Tidak ada hasil yang ditemukan.</p>";
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
        <div class="cari-tiket-content">
            <h2>Cari Tiket</h2>

            <form action="cari.php" method="post">
                <div class="form-group">
                    <label for="search_query">Cari berdasarkan Nama, Konser, atau Kategori Tiket:</label>
                    <input type="text" class="form-control" name="search_query" required>
                </div>

                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>

</body>

</html>

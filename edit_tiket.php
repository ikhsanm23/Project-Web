<?php
// Include your database connection file
include_once('koneksi.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nik = $_POST['nik'];
    $jumlah = $_POST['jumlah'];
    $konser = $_POST['konser'];
    $kategori = $_POST['kategori'];

    // Your database update code
    $sql = "UPDATE tikett SET 
            nama='$nama', 
            alamat='$alamat', 
            nik='$nik', 
            jumlah=$jumlah, 
            konser='$konser', 
            kategori='$kategori' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Tiket updated successfully!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "Error updating ticket: " . $conn->error;
    }
}

// Fetch ticket details based on the ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tikett WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $nik = $row['nik'];
        $jumlah = $row['jumlah'];
        $konser = $row['konser'];
        $kategori = $row['kategori'];
    } else {
        echo "Ticket not found";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Tiket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Tiket</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" class="form-control" name="nik" value="<?php echo $nik; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah Tiket:</label>
                <input type="text" class="form-control" name="jumlah" value="<?php echo $jumlah; ?>" required>
            </div>
            <div class="form-group">
                <label for="konser">Nama Konser:</label>
                <select class="form-control" name="konser" value="<?php echo $konser; ?>"required>
                        <option value="coldplay">Coldplay</option>
                        <option value="taylor">Taylor Swift</option>
                        <option value="bruno">Bruno Mars</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Tiket:</label>
                <select class="form-control" name="kategori" value="<?php echo $kategori ?>"required>
                        <option value="vip">VIP</option>
                        <option value="reguler">Reguler</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Tiket</button>
        </form>
    </div>
</body>

</html>

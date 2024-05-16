<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_captcha = $_POST['captcha_code']; // Captcha entered by the user

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

    // Check if the CAPTCHA code is correct
    if ($user_captcha == $_SESSION["captcha_code"]) {
        // CAPTCHA is correct, proceed with login credentials check
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $login = mysqli_query($conn, $sql);
        $ketemu = mysqli_num_rows($login);

        if ($ketemu > 0) {
            $r = mysqli_fetch_array($login);
            $_SESSION['username'] = $r['username'];
            $_SESSION['level'] = $r['level'];

            echo "USER BERHASIL LOGIN<br>";
            echo "Username =", $_SESSION['username'], "<br>";
            echo "Level =", $_SESSION['level'], "<br><br>";

            // Redirect to dashboard if login is successful
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<center>Login gagal! Username & password tidak benar<br>";
            echo "<a href='login.php'><b>ULANGI LAGI</b></a></center>";
        }
    } else {
        // CAPTCHA is incorrect
        echo "<center>Login gagal! Captcha tidak sesuai<br>";
        echo "<a href='login.php'><b>ULANGI LAGI</b></a></center>";
    }

    $conn->close();
}
?>

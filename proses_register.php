<?php
// Start the session (if not started already)
session_start();

// Establish database connection
$server = "localhost";
$user = "root";
$pass = "";
$database = "023pwd";
$conn = mysqli_connect($server, $user, $pass, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation
    $isValid = true;
    $validationMessage = "";

    if (empty($username)) {
        $isValid = false;
        $validationMessage .= "Username cannot be empty. ";
    }

    if (empty($password)) {
        $isValid = false;
        $validationMessage .= "Password cannot be empty. ";
    } elseif (strlen($password) < 8) {
        $isValid = false;
        $validationMessage .= "Password Min 8 Karakter. ";
    }

    if (!$isValid) {
        echo "<script>alert('$validationMessage');</script>";
        echo "<script>
            setTimeout(function() {
                window.location.href = 'register.php';
            }, 3000);
        </script>";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the username already exists
        $check_query = "SELECT username FROM user WHERE username = '$username'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            echo "<script>alert('Username Sudah Ada');</script>";
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'register.php';
                }, 3000);
            </script>";
        } else {
            // Insert user data into the database
            $sql = "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registrasi Berhasil, anda akan diarahkan dalam 3 detik');</script>";
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 3000);
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>

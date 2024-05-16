<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="../global.css">

    <style>
        /* Additional CSS to customize the form */
        .container {
            margin-top: 100px;
        }

        .title-reg {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-reg {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-reg label {
            font-weight: bold;
        }

        .form-reg input[type="text"],
        .form-reg input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-reg input[type="submit"],
        .form-reg .log-button {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .form-reg input[type="submit"] {
            background-color: #007bff;
        }

        .form-reg .log-button {
            background-color: #28a745;
        }

        .form-reg input[type="submit"]:hover,
        .form-reg .log-button:hover {
            opacity: 0.9;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-reg">
            <h2>FORM REGISTRASI</h2>
        </div>

        <div class="form-reg">
            <form action="proses_register.php" method="post" onsubmit="return validateForm()">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                    <div id="username-error" class="error-message"></div><br>

                    <label for="password">Password :</label>
                    <input type="password" name="password" required>
                    <div id="password-error" class="error-message"></div><br>

                    <input type="submit" value="Register">
                    <div class="login-link">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.forms[0].elements['username'].value;
            var password = document.forms[0].elements['password'].value;
            var isValid = true;

            // Reset error messages
            document.getElementById('username-error').innerHTML = '';
            document.getElementById('password-error').innerHTML = '';

            if (username.trim() === "") {
                document.getElementById('username-error').innerHTML = 'Username cannot be empty';
                isValid = false;
            }

            if (password.trim() === "") {
                document.getElementById('password-error').innerHTML = 'Password cannot be empty';
                isValid = false;
            } else if (password.length < 8) {
                document.getElementById('password-error').innerHTML = 'Password Min 8 Karakter';
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>

</html>

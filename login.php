<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="../global.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin-top: 100px;
        }

        .title-reg {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-reg {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-reg label {
            font-weight: bold;
        }

        .form-reg input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-reg button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }

        .log-button {
            margin-top: 10px;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title-reg">
            <h2>FORM LOGIN</h2>
        </div>

        <div class="form-reg">
            <form action="proses_login.php" method="post" onsubmit="return validateForm()">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>

                <tr>
                    <td>Captcha<br>
                        <img src='captcha.php' />
                    </td>
                    <td> : <input name='captcha_code' type='text'></td>
                </tr>

                    <input type="submit" value="Login" class="btn btn-primary">

                    <div class="register-link">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var username = document.forms[0].elements['username'].value;
            var password = document.forms[0].elements['password'].value;

            if (username.trim() === "" || password.trim() === "") {
                alert("Username and password cannot be empty");
                return false;
            }

            // You can add more advanced validation logic here if needed

            return true;
        }
    </script>
</body>

</html>

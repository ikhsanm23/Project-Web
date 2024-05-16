<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artis Page</title>
    <link rel="stylesheet" href="stylesart.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 800px;
            margin: 20px auto;
        }

        .artist {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 15px;
            text-align: center;
        }

        .artist img {
            max-width: 100%;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .dashboard-link {
            text-align: center;
            margin-top: 20px;
        }

        .dashboard-link a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-link a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <?php include 'data_artis.php'; ?>

    <div class="container">
        <?php foreach ($artists as $artist): ?>
            <div class="artist">
                <img src="<?php echo $artist['image']; ?>" alt="<?php echo $artist['name']; ?>">
                <h2><?php echo $artist['name']; ?></h2>
                <p><?php echo $artist['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="dashboard-link">
        <a href="dashboard.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>

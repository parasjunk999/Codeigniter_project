<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        img {
            display: block;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php $userDataArray = get_object_vars($userData); ?>

    <nav>
        <ul>
            <li><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?= base_url('profile'); ?>">Profile</a></li>
            <li><a href="<?= base_url('pixabaysearch'); ?>">Pixabay Search</a></li>
        </ul>
    </nav>

    <h1>Welcome, <?= $userDataArray['name']; ?></h1>

    <img src="<?= base_url('uploads/' . $userDataArray['image']); ?>" height="250px" width="250px" alt="Image">
</body>

</html>

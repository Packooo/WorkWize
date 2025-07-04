<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota Kelompok</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            display: flex;
            justify-content: space-around;
            padding: 50px;
            flex-wrap: wrap;
        }
        .profile {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            width: 300px;
            margin: 20px;
            transition: transform 0.3s;
        }

        .profile img {
            width: 100%;
            height: auto;
            border-bottom: 5px solid #4CAF50;
        }

        /* zoom gambar */
        .profile:hover  {
            transform: scale(1.1);   
        }
        .profile .description {
            padding: 20px;
        }
        .profile .description h2 {
            margin: 0;
            font-size: 24px;
            color: #4CAF50;
        }
        .profile .description p {
            margin: 10px 0;
            font-size: 16px;
            color: #666666;
        }
        .profile .description p:nth-child(2) {
            font-weight: bold;
            color: #333;
        }
        .title {
        text-align: center;
        margin: 20px 0 0;
        font-size: 36px;
        color: #4CAF50;
        }
    </style>
</head>
<body>

<?php
$profiles = [
    [
        "name" => "Wijayanto Agung Wibowo",
        "image" => "Image/Anggota/wijay.png",
        "descriptions" => [
            "22.11.4552",
            "@wijayanto.aw"

        ]
    ]
];
?>
<?php include_once("navbar.php")?>

<div class="title">Profil Saya</div>

<div class="container">
    <?php foreach ($profiles as $profile): ?>
        <div class="profile">
            <img src="<?php echo $profile['image']; ?>" alt="<?php echo $profile['name']; ?>">
            <div class="description">
                <h2><?php echo $profile['name']; ?></h2>
                <?php foreach ($profile['descriptions'] as $description): ?>
                    <p><?php echo $description; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>

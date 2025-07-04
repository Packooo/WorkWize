<?php 
include("../conn.php"); 
session_start(); 

if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit();
}

$userid = $_SESSION['id'];

if (isset($_GET['apply'])) {
    $job = $_GET['jobId'];
    $sql = "SELECT * FROM apply_job WHERE userid = '$userid' AND jobid = '$job'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("You already applied .. ");window.location.href="user.php";</script>';
        exit();
    }
}

if (isset($_POST['submit'])) {
    $jobid = $_POST['jobid'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $resume = $_FILES['resume']['name'];
    $cover_letter = $_POST['cover_letter'];

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["resume"]["name"]);

    // Ensure the uploads directory exists and is writable
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO apply_job (userid, jobid, full_name, email, phone, resume, cover_letter) VALUES ('$userid', '$jobid', '$full_name', '$email', '$phone', '$resume', '$cover_letter')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Job applied successfully");window.location.href="user.php";</script>';
        } else {
            echo '<script>alert("Application failed: '.mysqli_error($conn).'");window.location.href="find_freelancers.php";</script>';
        }
    } else {
        echo '<script>alert("Resume upload failed");window.location.href="user.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Formulir Lamaran Pekerjaan</title>
    <style>
        body {
            font-family: Times New Roman, serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            padding: 12px;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        #full_name, #email, #phone, #resume, #cover_letter {
            border-radius: 15px;
        }
        .submit {
            text-align: center;
        }
        #backlink {
            font-size: 24px;
            margin: 0;
        }
        #job {
            text-align: center;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <a id="backlink" href="user.php"><i class="glyphicon glyphicon-menu-left"></i></a>
        <h2 id="job">Formulir Lamaran Pekerjaan</h2>
        <form action="job_application_form.php" method="POST" enctype="multipart/form-data">
            <label for="full_name">Nama Lengkap :</label>
            <input type="text" id="full_name" name="full_name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Nomor telefon :</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="resume">Upload CV (PDF atau Word) :</label>
            <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" required>
            <label for="cover_letter">Cover Letter:</label>
            <textarea id="cover_letter" name="cover_letter" rows="4" required></textarea>
            <input type="hidden" name="jobid" value="<?php echo $_GET['jobId']; ?>">
            <div class="submit"><button type="submit" name="submit">Submit Lamaran!</button></div>
        </form>
    </div>
</body>
</html>

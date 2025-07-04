<?php include("conn.php") ?>
<?php if(session_start()) {
    session_destroy();
} ?>
<?php
if (isset($_POST["submit"])) {
    require_once "conn.php"; // Include your database connection file

    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $qusation = $_POST["qusation"];
    $answer = $_POST["answer"];

    if (empty($fName) || empty($lName) || empty($email) || empty($password) || empty($cpassword) || empty($answer)) {
        echo '<script> alert("Enter all required data.")</script>';
    } else {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo '<script> alert("The email already exists.")</script>';
        } else {
            if ($password == $cpassword) {
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                // Don't hash the answer if it's case-sensitive or requires specific formatting
                // $hashanswer = password_hash($answer, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO users (fName, lName, email, password, question, answer) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $fName, $lName, $email, $hashpassword, $qusation, $answer);
                if ($stmt->execute()) {
                    echo '<script> alert("Registered successfully"); window.location.href="login.php"; </script>';
                } else {
                    echo '<script> alert("Registration failed. Please try again later.")</script>';
                }
                $stmt->close();
            } else {
                echo '<script> alert("Passwords do not match.")</script>';
            }
        }
    }
    $conn->close();
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/signup.css">
    <title>Sign Up</title>
</head>

<body>

    <form action="signup.php" method="post">
        <div class="form">
            <a href="index.php"> <img src="./Image/logo/logo1.png" alt="logo" class="logo"></a>
            <a href="index.php"><img src="./Image/logo/X.png" alt="x"
                    style="float: inline-end; width: 20px; height: 20px;"></a>

            <br><br><br>
            <h2>Sign up to find work you love </h2>
            <br>
            <input type="text" id="firstName" name="fName" placeholder=" Nama Depan" required>

            <input type="text" id="lastName" name="lName" placeholder="Nama Belakang" required>
            <br>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            <br>
            <input type="password" id="password" name="password" pattern=".{8,}" title="Password must be at least 8 characters" required placeholder="Masukkan Password (Minimal 10 karakter)">
            <br>
            <input type="password" id="confirmpassword" name="cpassword" placeholder="Konfirmasi password" required>
            <br>
            <select name="qusation">
                <option value="What is your favourite color">Apa Warna Favorit</option>
                <option value="What is your favourite color">Berapa Umur Anda</option>
            </select>
            <input type="text" name="answer" placeholder="Masukkan Jawaban" required>
            <label>Jika Anda lupa kata sandi, Anda perlu <span style="font-style:italic; color:red;">Mengingat</span>
                Jawaban Ini <br> 
                Untuk memulihkan akun anda</label>

            <center>
                <br>
                <button type="submit" id="S1" name="submit">Sign Up</button>
            </center>

            <h5 style="color: red;"> -- Sudah Mempunyai account workwise ? <a href="./login.php"
                    style="border: 0; ">Login</a>

        </div>
    </form>
   
</body>

</html>
<?php $conn->close(); ?>

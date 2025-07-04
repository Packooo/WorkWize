<?php include("conn.php") ?>
<?php
session_start();

if (isset($_POST["submit"])) {
    require_once "conn.php"; // Include your database connection file

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            if (password_verify($password, $row["password"])) {
                $_SESSION['id'] = $row['userid'];
                $_SESSION['fName'] = $row['fName'];
                $_SESSION['lName'] = $row['lName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['role'] = $row['role'];

                if ($row["role"] == 'user') {
                    header('location: user/home.php');
                } else {
                    header('location: admin/admin_home.php');
                }
                exit();
            } else {
                echo '<script> alert("Incorrect password"); window.location.href="login.php";</script>';
                exit();
            }
        } else {
            echo '<script> alert("User not found"); window.location.href="login.php";</script>';
            exit();
        }
    } else {
        echo '<script> alert("Unable to fetch user data"); window.location.href="login.php";</script>';
        exit();
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./CSS/login.css">

</head>

<body>
    <div class="login-container">
        <a href="index.php"> <img src="./Image/logo/logo1.png" alt="logo" class="logo"></a>
        <a href="index.php"><img src="./Image/logo/X.png" alt="x" style="float: inline-end; width: 20px; height: 20px;"></a>
        <br><br>
        <h2>Login to WorkWise</h2><br>
        <form class="loginform" action="login.php" method="post">
            <div class="form-group">
                <label for="username" style="text-align: left;">Email</label>
                <input type="email" id="username" name="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="password" style="text-align: left;">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <h5 id="fp"><a href="froget_password.php">Lupa Password ?</a>
            </h5>
            <div class="form-group" id="loginbtn">
                <button type="submit" name="submit">Login</button>

            </div>

        </form>
        <h5 style="color: red;"> -- Belum mempunyai account WorkWise?<a href="signup.php" style="border: 0; font-size: small; text-decoration: underline;">Sign Up</a>
        </h5>
    </div>

</body>

</html>
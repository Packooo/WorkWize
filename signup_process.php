<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once "conn.php";

if (isset($_POST["submit"])) {
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $favourite_field = $_POST["favourite_field"];

    $errors = [];

    if (empty($fName)) {
        $errors['fName'] = "First name is required.";
    }
    if (empty($lName)) {
        $errors['lName'] = "Last name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    }
    if (empty($cpassword)) {
        $errors['cpassword'] = "Confirm password is required.";
    }
    if ($password !== $cpassword) {
        $errors['cpassword'] = "Passwords do not match.";
    }
    if (empty($question)) {
        $errors['question'] = "Security question is required.";
    }
    if (empty($answer)) {
        $errors['answer'] = "Answer is required.";
    }
    if (empty($favourite_field)) {
        $errors['favourite_field'] = "Favourite field is required.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $errors['email'] = "The email already exists.";
        } else {
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            $hashanswer = password_hash($answer, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (fName, lName, email, password, question, answer, favourite_field) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $fName, $lName, $email, $hashpassword, $question, $hashanswer, $favourite_field);

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Registered successfully. Please login.";
                header("Location: login.php");
                exit();
            } else {
                $errors['general'] = "Registration failed. Please try again later.";
            }
            $stmt->close();
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: signup.php");
        exit();
    }

    $conn->close();
} else {
    header("Location: signup.php");
    exit();
}
?>
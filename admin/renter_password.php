<?php
include("../conn.php");

if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prevent deleting the main admin (e.g., user with id 1)
    if ($id == 1) {
        echo '<script>
                alert("This user cannot be deleted.");
                window.location.href = "user_list.php";
              </script>';
        exit();
    }

    $delete_sql = "DELETE FROM users WHERE userid = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);
    mysqli_stmt_bind_param($delete_stmt, "i", $id);

    if (mysqli_stmt_execute($delete_stmt)) {
        header("Location: user_list.php");
        exit();
    } else {
        echo '<script>
                alert("Error deleting user.");
                window.location.href = "user_list.php";
              </script>';
    }
    mysqli_stmt_close($delete_stmt);
} else {
    // Redirect if accessed directly without proper parameters
    header("Location: user_list.php");
    exit();
}

mysqli_close($conn);
?>
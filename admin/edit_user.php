<?php
include("../conn.php");

// Handle POST request (form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    
    // Validate user_id
    if (!isset($_POST['user_id']) || !is_numeric($_POST['user_id'])) {
        die("Invalid User ID.");
    }
    $user_id = $_POST['user_id'];
    
    // Get other form data
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Use prepared statements to prevent SQL injection
    $update_sql = "UPDATE users SET fName=?, lName=?, email=?, role=? WHERE userid=?";
    $stmt = mysqli_prepare($conn, $update_sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $fName, $lName, $email, $role, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: user_list.php?status=success");
            exit();
        } else {
            die("Error updating record: " . mysqli_stmt_error($stmt));
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing statement: " . mysqli_error($conn));
    }
} 
// Handle GET request (initial page load)
elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE userid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user_data = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if (!$user_data) {
            header("Location: user_list.php?error=notfound");
            exit();
        }
    } else {
        die("Error preparing statement: " . mysqli_error($conn));
    }
} 
// If no valid GET or POST, redirect
else {
    header("Location: user_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href=".././CSS/user_list.css">
</head>
<?php include_once 'admin_navbar.php'; ?>
<body>
    <h2>Edit User</h2>
    <form action="edit_user.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_data['userid']); ?>">
        
        <label for="fName">First Name:</label>
        <input type="text" id="fName" name="fName" value="<?php echo htmlspecialchars($user_data['fName']); ?>" required>

        <label for="lName">Last Name:</label>
        <input type="text" id="lName" name="lName" value="<?php echo htmlspecialchars($user_data['lName']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="user" <?php if($user_data['role'] == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if($user_data['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select>

        <button type="submit" name="update_user">Update User</button>
    </form>
</body>
</html>
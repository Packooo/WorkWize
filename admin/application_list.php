<?php 
include("../conn.php"); 
session_start(); 

if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit();
}

$sql = "SELECT a.id, a.full_name, a.email, a.phone, a.resume, a.cover_letter, a.applied_at, j.title 
        FROM apply_job a
        JOIN jobtable j ON a.jobid = j.jobId
        WHERE a.userid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

// Debugging: Check for errors in the SQL query execution
if (!$result) {
    die("Query error: " . $conn->error);
}

// Debugging: Check if any rows are returned
if ($result->num_rows == 0) {
    echo "No applications found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lamaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .main_div {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4caf50;
            color: #fff;
        }
        tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #4caf50;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-size: 16px;
            text-align: center;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include_once 'admin_navbar.php'; ?>
    <div class="main_div">
        <h1>Daftar Lamaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelamar</th>
                    <th>Email</th>
                    <th>Nomor Telefon</th>
                    <th>Judul Pekerjaan</th>
                    <th>Resume</th>
                    <th>Cover Letter</th>
                    <th>Waktu Melamar</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr onclick="window.location.href='application_detail.php?id=<?php echo $row['id']; ?>'">
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><a href="../uploads/<?php echo htmlspecialchars($row['resume']); ?>" class="btn" download>Download</a></td>
                    <td><?php echo htmlspecialchars($row['cover_letter']); ?></td>
                    <td><?php echo htmlspecialchars($row['applied_at']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

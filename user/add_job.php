
<?php session_start(); ?>
<?php 
if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit();
} ?>
<?php include("../conn.php"); ?>

<?php if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'Add Job') {
        $userid = $_SESSION['id'];
        $title = $_POST['job_title'];
        $job_type = $_POST['job_type'];
        $company = $_POST['company'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        $exitDay = $_POST['exit_day'];
        $responsibilities = $_POST['responsibilities'];
        $requirement = $_POST['requirements'];
        $payment = $_POST['payment'];
        $ctg=$_POST['ctg'];
        
        $sql = "INSERT INTO unapproved_job (userid, category, title, job_type, company, location, price, exit_day, responsibilities, requirement, payment) VALUES ('$userid', '$ctg', '$title', '$job_type', '$company', '$location', '$price', '$exitDay', '$responsibilities', '$requirement', '$payment')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script> alert("Job added successfully");window.location.href="home.php"; </script>';


        } else {
            echo '<script> alert("Job not added. Error: ' . mysqli_error($conn) . '");window.location.href="home.php";</script>';
        }
    } else {
        header('location:home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href=".././CSS/add_job.css">
    <!-- <link rel="stylesheet" href=".././CSS/payment.css"> -->
    <title> Add Job</title>
    <style>

    </style>
</head>

<body>
    <form action="add_job.php" method="post">
        <div id="addjob_form" class="form hidden">
            <a href="javascript:history.back()" id="remove"><i class="fa fa-remove"></i></a>
            <a></a>
            <h1>Tambahkan Pekerjaan</h1>

            <label for="job_Category">Kategori Pekerjaan:</label>
            <select name="ctg" id="job_Category" required>
                <option value="Graphics">Graphics & Design</option>
                <option value="Programming">Programming & Tech</option>
                <option value="Digital">Digital Marketing</option>
                <option value="Video">Video & Animation</option>
                <option value="Writing">Writing & Translation</option>
                <option value="Music">Music & Audio</option>
                <option value="Business">Business</option>
                <option value="AI">AI Services</option>
                <option value="New">New*</option>
            </select>

            <label for="job_title">Pekerjaan:</label>
            <input type="text" name="job_title" required><br>

            <label for="company">Perusahaan:</label>
            <input type="text" name="company" required><br>

            <label for="location">Lokasi:</label>
            <input type="text" name="location" required><br>


            <label for="price">Tawaran Gajih:</label>
            <input type="number" name="price" required><br>

            <label for="job_type" >Jenis pekerjaan:</label>
            <select name="job_type" id="job_type" required>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
            </select>
            <br><br>
            <label for="responsibilities">Responsibilities:</label>
            <textarea name="responsibilities" rows="4" required></textarea><br>

            <label for="requirements">Requirements:</label>
            <textarea name="requirements" rows="4" required></textarea><br>

            <input type="hidden" name="exit_day" id="exit_day">

            <br>
            <a href="javascript:history.back()"><input id="cancel" type="button" value="Back"></a>
            <input id="add" type="button" onclick="showElement('payment_form', 'addjob_form')" value="Next">
        </div>

        <div id="payment_form" class="form hidden">
            <a href="javascript:history.back()" id="remove"><i class="fa fa-remove"></i></a>
            <h1>Rincian Pembayaran</h1>
            <select name="payment" style="font-weight: 700;">
                <option value="20000">Rp. 20000 - Perminggu Penayangan  </option>
                <option value="35000">Rp. 35000 - Dua Minggu Penayangan  </option>
                <option value="50000">Rp. 50000 - Per Bulan Penayangan </option>

            </select>

            <label for="card-number">Nomor Kartu:</label>
            <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" required pattern=".{19}">

            <label for="expiry-date">Expiry Date:</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required pattern=".{5}">

            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv" placeholder="123" required  min="1" max="999">

            <label for="card-holder">Cardholder Name:</label>
            <input type="text" id="card-holder" name="card-holder" placeholder="John Doe" required>
            <br>
            <br>
            <input id="cancel" type="button" value="Back" onclick="showElement('addjob_form','payment_form')">
            <input id="add" type="submit" name="submit" value="Add Job">
        </div>
    </form>

    <script>
        // Show add job form default
        document.getElementById('addjob_form').style.display = 'block';

        function showElement(showFormId, hideFormId) {
            const showForm = document.getElementById(showFormId);
            const hideForm = document.getElementById(hideFormId);

            showForm.style.display = 'block';
            hideForm.style.display = 'none';

            if (showFormId === 'payment_form') {
                const paymentDays = document.querySelector('[name=payment]').value;
                const exitDate = new Date();
                exitDate.setDate(exitDate.getDate() + parseInt(paymentDays));
                const year = exitDate.getFullYear();
                const month = String(exitDate.getMonth() + 1).padStart(2, '0');
                const day = String(exitDate.getDate()).padStart(2, '0');
                document.getElementById('exit_day').value = `${year}-${month}-${day}`;
            }
        }
    </script>




</body>

</html>
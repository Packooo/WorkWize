<?php
session_start();
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
unset($_SESSION['errors']);
unset($_SESSION['form_data']);
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

    <form action="signup_process.php" method="post">
        <div class="form">
            <a href="index.php"> <img src="./Image/logo/logo1.png" alt="logo" class="logo"></a>
            <a href="index.php"><img src="./Image/logo/X.png" alt="x"
                    style="float: inline-end; width: 20px; height: 20px;"></a>

            <br><br><br>
            <h2>Sign up to find work you love </h2>
            <?php if (isset($errors['general'])): ?>
                <p class="error"><?php echo $errors['general']; ?></p>
            <?php endif; ?>
            <br>
            <input type="text" id="firstName" name="fName" placeholder=" Nama Depan" value="<?php echo htmlspecialchars($form_data['fName'] ?? ''); ?>" required>
            <?php if (isset($errors['fName'])): ?>
                <p class="error"><?php echo $errors['fName']; ?></p>
            <?php endif; ?>

            <input type="text" id="lastName" name="lName" placeholder="Nama Belakang" value="<?php echo htmlspecialchars($form_data['lName'] ?? ''); ?>" required>
            <?php if (isset($errors['lName'])): ?>
                <p class="error"><?php echo $errors['lName']; ?></p>
            <?php endif; ?>
            <br>
            <input type="email" id="email" name="email" placeholder="Masukkan Email" value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>" required>
            <?php if (isset($errors['email'])): ?>
                <p class="error"><?php echo $errors['email']; ?></p>
            <?php endif; ?>
            <br>
            <input type="password" id="password" name="password" pattern=".{8,}" title="Password must be at least 8 characters" required placeholder="Masukkan Password (Minimal 8 karakter)">
            <?php if (isset($errors['password'])): ?>
                <p class="error"><?php echo $errors['password']; ?></p>
            <?php endif; ?>
            <br>
            <input type="password" id="confirmpassword" name="cpassword" placeholder="Konfirmasi password" required>
            <?php if (isset($errors['cpassword'])): ?>
                <p class="error"><?php echo $errors['cpassword']; ?></p>
            <?php endif; ?>
            <br>
<select name="favourite_field" required>
                <option value="" disabled selected>Select your favourite field</option>
                <option value="Web Development" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'Web Development') ? 'selected' : ''; ?>>Web Development</option>
                <option value="Mobile Development" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'Mobile Development') ? 'selected' : ''; ?>>Mobile Development</option>
                <option value="Data Science" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'Data Science') ? 'selected' : ''; ?>>Data Science</option>
                <option value="Artificial Intelligence" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'Artificial Intelligence') ? 'selected' : ''; ?>>Artificial Intelligence</option>
                <option value="Cyber Security" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'Cyber Security') ? 'selected' : ''; ?>>Cyber Security</option>
                <option value="UI/UX Design" <?php echo (isset($form_data['favourite_field']) && $form_data['favourite_field'] == 'UI/UX Design') ? 'selected' : ''; ?>>UI/UX Design</option>
            </select>
            <?php if (isset($errors['favourite_field'])): ?>
                <p class="error"><?php echo $errors['favourite_field']; ?></p>
            <?php endif; ?>
            <br>
            <select name="question" required>
                <option value="" disabled selected>Select a security question</option>
                <option value="What is your favourite color?" <?php echo (isset($form_data['question']) && $form_data['question'] == 'What is your favourite color?') ? 'selected' : ''; ?>>Apa Warna Favorit</option>
                <option value="What is your age?" <?php echo (isset($form_data['question']) && $form_data['question'] == 'What is your age?') ? 'selected' : ''; ?>>Berapa Umur Anda</option>
            </select>
            <?php if (isset($errors['question'])): ?>
                <p class="error"><?php echo $errors['question']; ?></p>
            <?php endif; ?>
            <input type="text" name="answer" placeholder="Masukkan Jawaban" value="<?php echo htmlspecialchars($form_data['answer'] ?? ''); ?>" required>
            <?php if (isset($errors['answer'])): ?>
                <p class="error"><?php echo $errors['answer']; ?></p>
            <?php endif; ?>
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

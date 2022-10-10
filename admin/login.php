<!-- Koneksi database -->
<?php 
    session_start();
    include '../config/config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/login.css">
</head>

<body>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <div class="login">
        <div class="login_container" style="height: 550px;">
            <div class="login_img">
                <img src="assets/admin.jpg" alt="user login">
            </div>

            <div class="login_forms">
                <form action="" class="login_register"  method="POST">
                    <h1 class="login_title">Sign In</h1>

                    <div class="login_box">
                        <i class='bx bx-user login_icon'></i>
                        <input type="text" placeholder="Username" class="login_input" name="USERNAME">
                    </div>

                    <div class="login_box">
                        <i class='bx bx-lock login_icon'></i>
                        <input type="text" placeholder="Password" class="login_input" name="PASSWORD">
                    </div>
          
                    <!-- <a href="#" class="login_button">Sign In</a> -->
                    
                    <input type="submit" class="login_button" value="Sign In" name="proseslog">

                    <?php
                    if(isset($_POST['proseslog'])){
                        $sql = mysqli_query($mysqli, "SELECT * FROM admin WHERE USERNAME = '$_POST[USERNAME]' AND PASSWORD = '$_POST[PASSWORD]'");

                        $cek = mysqli_num_rows($sql);
                        if ($cek > 0) {
                            $_SESSION['PASSWORD'] = $_POST['PASSWORD'];
                            echo "<meta http-equiv=refresh content=0;URL='dashboard.php'>";
                        }else{
                            echo "<p>Username atau Password Salah!</p>";
                            echo "<meta http-equiv=refresh content=2;URL='login.php'>";
                        }
                    }
                    ?>
                
                </form>
            </div>
        </div>
    </div>
</body>
</html>
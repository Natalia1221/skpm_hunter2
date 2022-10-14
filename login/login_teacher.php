<!-- Koneksi database -->
<?php 
 session_start();
include '../config/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/login_teacher.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>LOGIN TEACHER</title>
</head>
<body>
    <main class="login">
        <article class="login_container" style="height: 550px;">
            <section class="login_img">
                <img src="assets/img/teacher.jpg" alt="user login"/>
            </section> 

            <section class="login_forms">
                <form class="login_register" method="POST"> 
                   <h1 class="login_title">Sign In</h1>

                   <section class="login_box">
                    <i class='bx bx-user login_icon'></i>
                    <input type="text" placeholder="Username"  name="USERNAME" class="login_input">
                   </section> 

                   <section class="login_box">
                    <i class='bx bx-lock login_icon'></i>
                    <input type="text" placeholder="Password" name="PASSWORD" class="login_input">
                   </section>

                   <center>
                       <input type="submit" class="login_button" value="Sign In" name="proseslog">
                   </center>
                    
                    <!-- proses login -->
                    <?php
                    if(isset($_POST['proseslog'])){
                        $sql = mysqli_query($mysqli, "select * from guru where USERNAME_GURU= '$_POST[USERNAME]' and PASSWORD_GURU = '$_POST[PASSWORD]'");

                        $cek = mysqli_num_rows($sql);
                        if ($cek > 0) {
                            $_SESSION['PASSWORD_GURU'] = $_POST['PASSWORD'];
                            echo "<meta http-equiv=refresh content=0;URL='../teacher/dashboard.php'>";
                        }else{
                            echo "<p>Username atau Password Salah!</p>";
                            echo "<meta http-equiv=refresh content=2;URL='login_teacher.php'>";
                        }
                    }
                    ?>
                </form>
            </section>
        </article>  
    </main>
</body>
</html>
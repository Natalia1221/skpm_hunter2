<html>
<head>
    <title>Tambah Guru</title>
</head>
 
<body>
    <a href="index.php">Kembali ke Dashboard</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id Guru</td>
                <td><input type="text" name="ID_GURU"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="USERNAME_GURU"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="text" name="PASSWORD_GURU"></td>
            </tr>
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="NAMA_GURU"></td>
            </tr>
            <tr> 
                <td>Jenis Kelamin</td>
                <td><input type="text" name="JK_GURU"></td>
            </tr>
            <tr> 
                <td>No. Hp</td>
                <td><input type="text" name="HP_GURU"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $ID_GURU = $_POST['ID_GURU'];
        $USERNAME_GURU = $_POST['USERNAME_GURU'];
        $PASSWORD_GURU = $_POST['PASSWORD_GURU'];
        $NAMA_GURU = $_POST['NAMA_GURU'];
        $JK_GURU = $_POST['JK_GURU'];
        $HP_GURU = $_POST['HP_GURU'];
        // include database connection file
        include_once("../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO guru(ID_GURU,USERNAME_GURU, PASSWORD_GURU, NAMA_GURU, JK_GURU, HP_GURU) VALUES('$ID_GURU','$USERNAME_GURU', '$PASSWORD_GURU', '$NAMA_GURU', '$JK_GURU', '$HP_GURU')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>
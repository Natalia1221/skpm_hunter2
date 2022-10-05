<?php
// include database connection file
include_once("../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_GURU = $_POST['ID_GURU'];
    $USERNAME_GURU = $_POST['USERNAME_GURU'];
    $PASSWORD_GURU = $_POST['PASSWORD_GURU'];
    $NAMA_GURU = $_POST['NAMA_GURU'];
    $JK_GURU = $_POST['JK_GURU'];
    $HP_GURU = $_POST['HP_GURU'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE users SET USERNAME_GURU='$USERNAME_GURU',PASSWORD_GURU='$PASSWORD_GURU',NAMA_GURU='$NAMA_GURU',JK_GURU='$JK_GURU',HP_GURU='$HP_GURU' WHERE ID_GURU=$ID_GURU");
    
    // Redirect to homepage to display updated user in list
    header("Location: dashboard.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_GURU = $_GET['ID_GURU'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM guru WHERE ID_GURU=$ID_GURU");
 
while($user_data = mysqli_fetch_array($result))
{
    $USERNAME_GURU = $user_data['USERNAME_GURU'];
    $PASSWORD_GURU = $user_data['PASSWORD_GURU'];
    $NAMA_GURU = $user_data['NAMA_GURU'];
    $JK_GURU = $user_data['JK_GURU'];
    $HP_GURU = $user_data['HP_GURU'];
}
?>
<html>
<head>	
    <title>Ubah Data Guru</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
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
                <td><input type="hidden" name="ID_GURU" value=<?php echo $_GET['ID_GURU'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
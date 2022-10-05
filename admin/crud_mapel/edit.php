<?php
// include database connection file
include_once("../../config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $ID_MAPEL = $_POST['ID_MAPEL'];
    $MAPEL = $_POST['MAPEL'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE mapel SET MAPEL='$MAPEL' WHERE ID_MAPEL='$ID_MAPEL'");
    
    // Redirect to homepage to display updated user in list
    header("Location: crud_mapel.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$ID_MAPEL = $_GET['ID_MAPEL'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mapel WHERE ID_MAPEL = '$ID_MAPEL'");
 
while($user_data = mysqli_fetch_array($result))
{
    $MAPEL = $user_data['MAPEL'];
}
?>
<html>
<head>	
    <title>Ubah Data Mapel</title>
</head>
 
<body>
    <a href="crud_mapel.php">Kembali</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php">
        <table border="0">
        <tr> 
                <td>Mapel</td>
                <td><input type="text" name="MAPEL"></td>
            </tr>
            
            <tr>
                <td><input type="hidden" name="ID_MAPEL" value=<?php echo $_GET['ID_MAPEL'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
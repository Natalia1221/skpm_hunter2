<html>
<head>
    <title>Tambah Mapel</title>
</head>
 
<body>
    <a href="crud_mapel.php">Kembali</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Id Mapel</td>
                <td><input type="text" name="ID_MAPEL"></td>
            </tr>
            <tr> 
                <td>Mapel</td>
                <td><input type="text" name="MAPEL"></td>
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
        $ID_MAPEL = $_POST['ID_MAPEL'];
        $MAPEL = $_POST['MAPEL'];
        // include database connection file
        include_once("../../config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO mapel(ID_MAPEL,MAPEL) VALUES('$ID_MAPEL','$MAPEL')");
        
        // Show message when user added
        echo "User added successfully. <a href='crud_mapel.php'>View Users</a>";
    }
    ?>
</body>
</html>
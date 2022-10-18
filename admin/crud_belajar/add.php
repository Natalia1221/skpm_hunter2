
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tambah Pembelajaran</title>
</head>
 
<body>
<div class="container mx-auto my-3 mx-2">
		<a class="btn btn-success btn-lg " href="crud_belajar.php">Kembali</a><br/><br/>
		
		<form action="add.php" method="post" name="form1">
		<div class="row gy-5">
	    		<div class="col-6">
					<div class="row g-0">
					<div class="col-sm-6">ID Kelas</div>
					<div class="col-6"><input class="form-control my-1" type="text" name="ID_KELAS"></div>
					</div>
	                <div class="row g-0">
	  					<div class="col-sm-6">ID Mapel</div>
	  					<div class="col-6"><input class="form-control my-1" type="text" name="ID_MAPEL"></div>
					</div>
	
	                
					<div class="row  col-6 mx-auto">
	  					<div  class="col-12"><input class="btn btn-primary mt-2 w-100"  type="submit" name="Submit" value="Add"></div>
					</div>
	    		</div>	
	  		</div>
		</form>
	</div>	
    
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $ID_KELAS = $_POST['ID_KELAS'];
        $ID_MAPEL = $_POST['ID_MAPEL'];
        // include database connection file
        include_once("../../config/config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO BELAJAR(ID_KELAS,ID_MAPEL) VALUES('$ID_KELAS','$ID_MAPEL')");
        
        // Show message when user added
        echo "<div class='alert alert-success' role='alert'>
				Mapel Berhasil Ditambah. <a href='crud_belajar.php'>Kembali</a>
	  		</div>";
    }
    ?>
</body>
</html>
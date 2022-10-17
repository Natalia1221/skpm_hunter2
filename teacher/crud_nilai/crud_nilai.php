<?php
// Create database connection using config file
include_once("../../config/config.php");
session_start();
$ID_KELAS = $_GET["ID_KELAS"];
$ID_MAPEL = $_GET["ID_MAPEL"];
$JENIS = $_GET["JENIS"];
$CRUD = $_GET["CRUD"];

$ID_SEMESTER = $_SESSION['ID_SEMESTER'];
// Fetch all users data from database
$kelas = mysqli_query($mysqli, "SELECT * FROM `kelas` WHERE ID_KELAS = '$ID_KELAS'");
$KELAS = mysqli_fetch_array($kelas);
$siswa = mysqli_query($mysqli, "SELECT NISN, NAMA_SISWA FROM `siswa` WHERE siswa.ID_KELAS = '$ID_KELAS'");

$data_found= mysqli_query($mysqli, "SELECT nilai.ID_NILAI, nilai.NISN, siswa.NAMA_SISWA, nilai.NILAI FROM `nilai` INNER JOIN siswa ON nilai.NISN = siswa.NISN WHERE siswa.ID_KELAS = '$ID_KELAS' && nilai.JENIS ='$JENIS'&& nilai.ID_MAPEL ='$ID_MAPEL'&& nilai.ID_SEMESTER = '$ID_SEMESTER'");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../assets/dashboard_teacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Dashboard Guru</title>
</head>
<body>
	<section class="sidebar close">
		<!-- Judul Sidebar -->
		<section class="click-close">
			<i class="fas fa-bars"></i><p>Guru</p>
		</section>

		<!-- Menu Sidebar -->
		<ul class="list-menu">
			<li>
				<a href="../dashboard_teacher.php"><i class="fas fa-home"></i><p>Home</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Home</a></li>
        		</ul>
			</li>

			<li>
				<a href="../daftar_siswa/daftar_semester.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="../crud_absen/semester.php"><i class="fas fa-book"></i><p>Daftar Absen</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Absen</a></li>
        		</ul>
			</li>

			<li>
				<a href="semester.php"><i class="fas fa-mail-bulk"></i><p>Input Nilai</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Input Nilai</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-book-open"></i><p >Edit Absensi</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Edit Absensi</a></li>
        		</ul>
			</li>

			<li>
				<a href="../login_teacher.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
		
		<div class="content">
			<div class="d-flex align-items-center justify-content-center">
				<a class="btn btn-primary " href="mapel.php?ID_SEMESTER=<?php echo$ID_SEMESTER;?>&CRUD=<?php echo$CRUD;?>" role="button"><</a>
				<h2 class="my-auto">Daftar Nilai kelas <?php echo $KELAS['KELAS']?></h2>
			</div>

			<div class="container mx-auto my-3 mx-2" >
        		<div class="table-responsive col-md-12 my-3 mx-2" style="overflow-x: auto">
					<form action="crud_nilai.php?<?php echo "ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&JENIS=$JENIS" ?>" method="post" name="form1">
					<table class="table table-striped table-hover table-bordered">

					<tr>
	 					<th class="col-4">NISN</th> 
						<th class="col-4">Nama Siswa</th> 
						<th class="col-2">Nilai</th>
 					</tr>
					 <?php
					 	$ada=mysqli_num_rows($data_found);
						if($ada>0){
							while($user_data = mysqli_fetch_array($data_found)) {         
								echo "<tr>";
								echo "<td class='col-4'>".$user_data['NISN']."</td>";
								echo "<td class='col-4'>".$user_data['NAMA_SISWA']."</td>";
								echo "<td class='col-4'>".$user_data['NILAI']."</td></tr>";  
							}

						}else{
							
                        	
 							while($user_data = mysqli_fetch_array($siswa)) {         
								 echo "<tr>";
								 echo "<td class='col-4'>".$user_data['NISN']."</td>";
                        	     echo "<td class='col-4'>".$user_data['NAMA_SISWA']."</td>";
								 echo "<td class='col-2'>0</td></tr>";

							 

 							}

							 $siswa = mysqli_query($mysqli, "SELECT NISN, NAMA_SISWA FROM `siswa` WHERE siswa.ID_KELAS = '$ID_KELAS'");

							 $i =0;
							 $value = '';
							 while($user_data = mysqli_fetch_array($siswa)) {
								 $NISN = $user_data['NISN'];
								 $NILAI = 0;
								 $value = $value."('$ID_SEMESTER','$ID_MAPEL', '$NISN', $NILAI, '$JENIS'),";
								 $i +=1;
							 }
					 
				 
							 $value = rtrim($value, ",");
							  // Insert user data into table
							 $result = mysqli_query($mysqli, "INSERT INTO `nilai` (ID_SEMESTER, ID_MAPEL, NISN, NILAI, JENIS) VALUES $value;");
						}
					 	
 					?>
        		    </table>

					<div class="row  col-6 mx-auto">
						
	  					<div  class="col-12">
							<a class='btn btn-primary mt-2 w-100' href='edit.php?<?php echo "ID_KELAS=$ID_KELAS&ID_MAPEL=$ID_MAPEL&JENIS=$JENIS&CRUD=1" ?>'>Edit Nilai</a>
						</div>
					</div>

					</form>
        		</div>
					
    		</div>
	
    	</div>

	</section>
	
	<script>
  	let arrow = document.querySelectorAll(".arrow");
  	for (var i = 0; i < arrow.length; i++) { 
  		arrow[i].addEventListener("click", (e)=>{
  			let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   			arrowParent.classList.toggle("showMenu");
    		});
  	}
  	let sidebar = document.querySelector(".sidebar");
  	let sidebarBtn = document.querySelector(".fa-bars");
  	console.log(sidebarBtn);
  	sidebarBtn.addEventListener("click", ()=>{
    	sidebar.classList.toggle("close");
  	});
  </script>
		
</body>
</html>
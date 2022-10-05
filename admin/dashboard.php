<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM guru ORDER BY ID_GURU DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/dashboard.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>Dashboard Admin</title>
</head>
<body>
	<section class="sidebar close">
		<!-- Judul Sidebar -->
		<section class="click-close">
			<i class="fas fa-bars"></i><p>Admin</p>
		</section>

		<!-- Menu Sidebar -->
		<ul class="list-menu">
			<li>
				<a href="#"><i class="fas fa-home"></i><p>Home</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Home</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-user-check"></i><p>Daftar Guru</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Guru</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-school"></i><p>Daftar Kelas</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Kelas</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-book-open"></i><p>Daftar Nilai</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Nilai</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-book"></i><p>Daftar Ujian</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Ujian</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-award"></i><p>Jadwal Raport</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Jadwal Raport</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-hand-holding-usd"></i><p >Pembayaran SPP</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Pembayaran SPP</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
		<div class="content">
      		<h2>Selamat datang admin</h2>

			  	<a href="add.php">Tambah Guru</a><br/><br/>
 
 				<table width='80%' border=1>

 					<tr>
	 					<th>Id Guru</th> <th>Username</th> <th>Password</th> <th>Nama</th> <th>Kelamin</th> <th>No. Hp</th> <th>Update</th>
 					</tr>
 					<?php  
 					while($user_data = mysqli_fetch_array($result)) {         
						 echo "<tr>";
						 echo "<td>".$user_data['ID_GURU']."</td>";
						 echo "<td>".$user_data['USERNAME_GURU']."</td>";
						 echo "<td>".$user_data['PASSWORD_GURU']."</td>";
						 echo "<td>".$user_data['NAMA_GURU']."</td>";
						 echo "<td>".$user_data['JK_GURU']."</td>";
						 echo "<td>".$user_data['HP_GURU']."</td>";     
						 echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
 					}
 					?>
 				</table>
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
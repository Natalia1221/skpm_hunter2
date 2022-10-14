<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD:admin/dashboard_admin.php
	 <link rel="stylesheet" href="assets/dashboard_admin.css">
=======
	 <link rel="stylesheet" href="assets/dashboard_student.css">
>>>>>>> student:admin/dashboard_student.php
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
				<a href="crud_siswa/crud_siswa.php"><i class="fas fa-user-check"></i><p>Daftar Siswa</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Siswa</a></li>
        		</ul>
			</li>

			<li>
				<a href="crud_guru/crud_guru.php"><i class="fas fa-user-check"></i><p>Daftar Guru</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Guru</a></li>
        		</ul>
			</li>

			<li>
				<a href="crud_kelas/crud_kelas.php"><i class="fas fa-school"></i><p>Daftar Kelas</p></a>
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
				<a href="crud_mapel/crud_mapel.php"><i class="fas fa-book"></i><p>Daftar Mapel</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Mapel</a></li>
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
<<<<<<< HEAD:admin/dashboard_admin.php
<<<<<<< HEAD:admin/dashboard.php
				<a href="../login/login_admin.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
=======
				<a href="login_admin"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
>>>>>>> admin:admin/dashboard_admin.php
=======
				<a href="login_student.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
>>>>>>> student:admin/dashboard_student.php
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
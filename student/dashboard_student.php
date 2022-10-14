<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="assets/dashboard_student.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>Dashboard Siswa</title>
</head>
<body>
	<section class="sidebar close">
		<!-- Judul Sidebar -->
		<section class="click-close">
			<i class="fas fa-bars"></i><p>Siswa</p>
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
				<a href="#"><i class="fas fa-calendar-check"></i><p>Absensi</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Absensi</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-book"></i><p>Daftar Ujian</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Daftar Ujian</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-award"></i><p>Lihat Rapor</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Lihat Rapor</a></li>
        		</ul>
			</li>

			<li>
				<a href="#"><i class="fas fa-hand-holding-usd"></i><p >Pembayaran SPP</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">Pembayaran SPP</a></li>
        		</ul>
			</li>

			<li>
				<a href="login_student.php"><i class="fas fa-sign-out-alt"></i><p>LogOut</p></a>
				<ul class="sub-menu hint">
          		<li><a class="link_name" href="#">LogOut</a></li>
        		</ul>
			</li>
			
		</ul>
	</section>	

	<!-- Halaman Utama -->
	<section class="home">
		<div class="content">
      		<h2>Selamat datang siswa</h2>
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
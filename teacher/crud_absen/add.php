<?php
 include_once("../../config/config.php");
 session_start();
 $ID_KELAS = $_GET["ID_KELAS"];
 $ID_MAPEL = $_GET["ID_MAPEL"];
 
 $ID_SEMESTER = $_SESSION['ID_SEMESTER'];
 // Fetch all users data from database

 $siswa = mysqli_query($mysqli, "SELECT NISN, NAMA_SISWA FROM `siswa` WHERE siswa.ID_KELAS = '$ID_KELAS'");
 
 
if(!empty($_POST))
{
 $output = '';
	$TANGGAL_ABSEN = mysqli_real_escape_string($mysqli, $_POST["tanggal"]);

    $value = '';
    while($user_data = mysqli_fetch_array($siswa)) {
        $NISN = $user_data['NISN'];
        $value = $value."('$NISN', '$ID_MAPEL', '$TANGGAL_ABSEN', 'HADIR', '$ID_SEMESTER'),";
        
    }
    $value = rtrim($value, ",");

    $query = "
    INSERT INTO absen (NISN, ID_MAPEL, TANGGAL_ABSEN, KETERANGAN, ID_SEMESTER)  
     VALUES".$value;
    if(mysqli_query($mysqli, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Masuk</label>';
     
     $data_found= mysqli_query($mysqli, "SELECT absen.ID_ABSEN, absen.NISN, siswa.NAMA_SISWA, absen.KETERANGAN, absen.TANGGAL_ABSEN FROM `absen` INNER JOIN siswa ON absen.NISN = siswa.NISN WHERE siswa.ID_KELAS = '$ID_KELAS' && absen.ID_MAPEL ='$ID_MAPEL'&& absen.ID_SEMESTER = '$ID_SEMESTER' GROUP BY absen.TANGGAL_ABSEN");
 
     $output .= '
        <tr>
            <th class="col-4">Tanggal</th>
            <th class="col-2">Keterangan</th>
        </tr>
     ';
     while($row = mysqli_fetch_array($data_found))
     {
      $output .= '
            <tr>;
            <td class="col-4">'.$user_data['TANGGAL_ABSEN'].'</td>;'.
            '<td><a class="btn btn-success" href="crud_absen.php?ID_KELAS='.$ID_KELAS.'&ID_MAPEL='.$ID_MAPEL.'&TANGGAL_ABSEN='.$user_data["TANGGAL_ABSEN"].'>Lihat Absen</a></td>
            </tr>;
        
      ';
     }
     
    }else{
		$output .= mysqli_error($mysqli);
	}
    echo $output;
}
?>
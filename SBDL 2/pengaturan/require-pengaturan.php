<?php
   require '../proses/koneksi-pros.php';
   
   $id = $_SESSION['userId'];
   $sql = mysqli_query($conn, "select * from karyawan where id_karyawan='$id'");
   $row = mysqli_fetch_array($sql);

   function option($value,$input){
      $result =  $value==$input?'checked':'';
      return $result;
   }
?>

<!doctype html>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
      <meta name="keywords" content="Sistem Pakar, Sistem, Pakar, Palawija, Universitas, Majalengka">
      <meta name="author" content="Sindi Andriana">
      <title>Home</title>
      <link rel="stylesheet" type="text/css" href="css/w3.css">
      <link rel="stylesheet" type="text/css" href="css/index.css">
      <script src="script/script.js"></script>
      <script src="script/jquery.min.js"></script>
   </head>
   <body>
      <section id="pengaturan">
	 <h2>Perhatian!!</h2>
	 <h4>
	    Untuk bisa mengakses pitur lainya di website ini harap isi Profile dibawah ini
	 </h4>
	 <form action="../proses/pengaturan-pros.php" method="post" accept-charset="utf-8">
	    <input type="hidden" value="<?php echo $row['id_karyawan']; ?>" name="userId">
	    <table>
	       <tr>
	          <td>Nama Depan</td>
	          <td><input type="text" value="<?php echo $row['nama_depan']; ?>" name="nama-depan"></td>
	       </tr>
	          <td>Nama Belakang</td>
	          <td><input type="text" value="<?php echo $row['nama_belakang']; ?>" name="nama-belakang"></td>
	       </tr>
	          <td>Tempat Lahir</td>
	          <td><input type="text" value="<?php echo $row['tempat_lahir']; ?>" name="tempat-lahir"></td>
	       </tr>
	          <td>Tanggal Lahir</td>
	          <td><input type="date" value="<?php echo $row['tanggal_lahir']; ?>" name="tanggal-lahir"></td>
	       </tr>
	          <td>Pendidikan Terakhir</td>
	          <td><input type="text" value="<?php echo $row['pendidikan_terakhir']; ?>" name="pendidikan-terakhir"></td>
	       </tr>
	          <td>Nomor Telepon</td>
	          <td><input type="number" value="<?php echo $row['no_telepon']; ?>" name="nomor-telepon"></td>
	       </tr>
	          <td>Alamat</td>
	          <td><input type="text" value="<?php echo $row['alamat']; ?>" name="alamat"></td>
	       </tr>
	          <td>Jenis Kelamin</td>
		  <td>
		  <select>
		     <option value="1" <?php echo option("1", $row['id_kelamin']) ?> name="kelamin">Laki-laki</option>
		     <option value="2" <?php echo option("2", $row['id_kelamin']) ?> name="kelamin">Perempuan</option>
		  </select></td>
	       </tr>
		  <td>Status Pernikahan</td>
		  <td><select>
		     <option value="1" <?php echo option("1", $row['id_status']) ?> name="status">Kawin</option>
		     <option value="2" <?php echo option("2", $row['id_status']) ?> name="status">Bercerai</option>
		     <option value="3" <?php echo option("3", $row['id_status']) ?> name="status">Lajang</option>
		  </select></td>
	       </tr>
	          <td>Agama</td>
		  <td><select>
		     <option value="1" <?php echo option("1", $row['id_agama']) ?> name="agama">Islam</option>
		     <option value="2" <?php echo option("2", $row['id_agama']) ?> name="agama">Kristen</option>
		     <option value="3" <?php echo option("3", $row['id_agama']) ?> name="agama">Hindu</option>
		     <option value="4" <?php echo option("4", $row['id_agama']) ?> name="agama">Budha</option>
		     <option value="5" <?php echo option("5", $row['id_agama']) ?> name="agama">Protestan</option>
		  </select></td>
	       </tr>
	       <tr>
	          <td colspan="2"><button type="submit" name="simpan">SIMPAN PERUBAHAN</button></td>
	       </tr>
	    </table>
	 </form>
      </section>
   </body>
</html>

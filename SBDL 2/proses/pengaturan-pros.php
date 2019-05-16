<?php

if (isset($_POST['simpan'])) {
   require '../proses/koneksi-pros.php';

   $id		= $_POST['userId'];
   $namad	= $_POST['nama-depan'];
   $namab	= $_POST['nama-belakang'];
   $tempat	= $_POST['tempat-lahir'];
   $tanggal	= $_POST['tanggal-lahir'];
   $pendidikan	= $_POST['pendidikan-terakhir'];
   $telp	= $_POST['nomor-telepon'];
   $alamat	= $_POST['alamat'];
   $kelamin	= $_POST['kelamin'];
   $status	= $_POST['status'];
   $agama	= $_POST['agama'];

   $sql="UPDATE karyawan SET nama_depan='$namad', nama_belakang='$namab',
      tempat_lahir='$tempat', tanggal_lahir='$tanggal',
      pendidikan_terakhir='$pendidikan', no_telepon='$telp',
      alamat='$alamat', id_kelamin='$kelamin', id_status='$status',
      id_agama='$agama' where id_karyawan='$id'";
   mysqli_query($conn, $sql);

   header("location:../");
   }
?>

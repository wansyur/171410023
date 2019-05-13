<?php
if (isset($_POST['tombol-daftar'])) {

   require "koneksi-pros.php";

   $namad = $_POST['nama-depan'];
   $namab = $_POST['nama-belakang'];
   $user = $_POST['username'];
   $mail = $_POST['email'];
   $pass = $_POST['password'];
   $pwdr = $_POST['password-ulangi'];
   $tgl = date('Y-m-d H:i:s');

   if (empty($user) || empty($mail) || empty($pass) || empty($pwdr)) {
      header("Location: ../?error=emptyfields&username=".$user."&mail=".$mail);
      exit();
   }
   else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user)) {
      header("Location: ../?error=invalidmailid");
      exit();
   }
   else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../?error=invalidmail&username=".$user);
      exit();
   }
   else if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
      header("Location: ../?error=invalidid&email=".$mail);
      exit();
   }
   else if ($pass !== $pwdr) {
      header("Location: ../?error=passwordcek&username=".$user."&email=".$mail);
      exit();
   }
   else {
      $sql = "SELECT id_karyawan FROM karyawan WHERE id_karyawan=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $cekberhasil = mysqli_stmt_num_rows($stmt);
        if ($cekberhasil > 0) {
          header("Location: ../?error=userterdaftar&email=".$mail);
          exit();
        }
        else {
          $sql = "INSERT INTO karyawan (username, email, password, nama_depan, nama_belakang, dibuat_pada) VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../?error=sqlerror-43");
            exit();
          }
          else {
            $enkripsipass = password_hash($pass, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssssss", $user, $mail, $enkripsipass, $namad, $namab, $tgl);
            mysqli_stmt_execute($stmt);
            header("Location: ../?daftar=berhasil");
            exit();
          }
        }
      }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else {
  header("Location: ../");
  exit();
}

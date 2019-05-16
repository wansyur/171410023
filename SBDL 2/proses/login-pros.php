<?php

if (isset($_POST['tombol-login'])) {

  require "koneksi-pros.php";

  $user = $_POST['username'];
  $pass = $_POST['password'];

  if (empty($user) || empty($pass)) {
    header("Location: ../?error=emptyfields");
    exit();
  }
  $sql = "SELECT * FROM karyawan WHERE username=? OR email=?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "ss", $user, $user);
    mysqli_stmt_execute($stmt);
    $berhasil = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($berhasil)) {
      $passcek = password_verify($pass, $row['password']);
      if ($passcek == false) {
        header("Location: ../?error=passwordsalah");
        exit();
      }
      else if ($passcek == true) {
        session_start();
        $_SESSION['userId'] = $row['id_karyawan'];
        $_SESSION['nickname'] = $row['nama_depan'];
        header("Location: ../");
        exit();
      }
      else {
        header("Location: ../?error=passwordsalah");
        exit();
      }
    }
    else {
      header("Location: ../?error=tidakadauser");
      exit();
    }
  }
}
else {
  header("Location: ../");
  exit();
}

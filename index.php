<?php
session_start();

$kalender = CAL_GREGORIAN;
$bulan = date('m');
$tahun = date('y');

$hari = cal_days_in_month($kalender, $bulan, $tahun);

echo 'Pada bulan ini terdapat ' .$hari. ' hari.';

if (isset($_SESSION['userId'])) {
   echo '
   <section id="menu">
      <nav>
         <ul>
            <li>
	       <a href="../perusahaan">Beranda</a>
	    </li>
            <li>
	       <a href="../perusahaan/tugas/">Tugas</a>
	    </li>
            <li>
	       <a href="../perusahaan/pengaturan/">Pengaturan</a>
	    </li>
            <li>
	       <a href="../perusahaan/proses/logout-pros.php">Logout</a>
	    </li>
	 </ul>
      </nav>
   </section>
';
}
else {
   echo '
   <section id="session">
      <h2>Selamat Datang Kembali</h2>
      <form action="proses/login-pros.php" method="post" accept-charset="utf-8">
	 <label>Username</label> <input type="text" name="username" placeholder="Masukan Username | Email">
	 <label>Password</label> <input type="password" name="password" placeholder="Masukan Password">
	 <button type="submit" name="tombol-login">Login</button>
      </form>
      <br>
      <h2>Daftar</h2>
      <form action="proses/daftar-pros.php" method="post" accept-charset="utf-8">
	 <label>Nama Depan</label> <input type="text" name="nama-depan" placeholder="Masukan Nama Depan">
	 <label>Nama Belakang</label> <input type="text" name="nama-belakang" placeholder="Masukan Nama Belakang">
	 <label>Username</label> <input type="text" name="username" placeholder="Masukan Username">
	 <label>Email</label> <input type="email" name="email" placeholder="Masukan Username | Email">
	 <label>Password</label> <input type="password" name="password" placeholder="Masukan Password">
	 <label>Ulangi Password</label> <input type="password" name="password-ulangi" placeholder="Ulangi Password">
	 <button type="submit" name="tombol-login">Login</button>
      </form>
   </section>
';
}

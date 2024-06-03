<?php
  $baglanti = @ mysql_connect('localhost','root','') or die("MySQL Bağlantısı Sağlanamadı.");  // Veritabanı ile projemizin bağlantısını sağlayan kısım
  mysql_select_db('uyelik_sistemi',$baglanti) or die("Veritabanı Bağlantısı Sağlanamadı.");
?>
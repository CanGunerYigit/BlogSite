<?php

//PHPMailer kullanabilmek için bunları dahil etmeliyiz

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//phpmailer dosyasında bulunan gerekli dosyaları çağırdık
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if (isset($_POST["send"])) {  //Email göndereceğimiz için buradaki POST metodumuz diğer sayfalardan farklı olarak send

  $mail = new PHPMailer(true); //Yeni mail gönderiliyorsa

    //Mail bilgileri
    $mail->isSMTP();                              
    $mail->Host       = 'smtp.gmail.com';       //SMTP serverini kullanmalıyız
    $mail->SMTPAuth   = true;             
    $mail->Username   = 'cangnryigit@gmail.com';   //Kendi mail adresimiz
    $mail->Password   = 'lmcodqxbptxtwlss';      //Mail adresimizin SMTP şifresi
    $mail->SMTPSecure = 'ssl';            
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); //Emaili gönderen kişinin mail adresi ve ismi
    $mail->addAddress('cangnryigit@gmail.com');     //Email kime gidecek  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    
    $mail->isHTML(true);               //Email formatını HTML'e çevirdim
    $mail->Subject = $_POST["subject"];   //Email konu başlığı
    $mail->Body    = $_POST["message"]; //Email mesaj içeriği

    // Mesajın başarıyla gönderilmesi durumunda
    $mail->send();
    echo
    " 
    <script> 
     alert('Mesajınız başarıyla gönderilmiştir!');  //Ekrana bunu yazdırsın
     document.location.href = 'iletisim.php'; // ve bizi bu sayfaya geri yönlendirsin
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Sayfası</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')">
     <nav class="bg-zinc-900 py-4 rounded-3xl mx-auto md:w-[1400px] flex justify-center">
        <a href="anasayfa.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Anasayfa</a>  <!-- Her sayfada bulunan navbar içeriği  -->
        <a href="hakkımda.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl ">Hakkımda</a>
        <a href="iletisim.php"class="text-white pr-4 font-bold text-lg md:text-xl underline underline-offset-8">İletişim</a>  <!-- Bulunduğumuz sayfa -->
        <a href="projelerim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Projelerim</a>
        <a href="forum.php" class="text-yellow-400 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Forum</a>
    </nav>
    <div class="container mx-auto max-w-sm bg-zinc-900  sm:w-full sm:h-full">
    <form id="contact" action="iletisim.php" method="post" class=  "bg-zinc-900  p-6 mt-12 rounded "> <!-- Form bölümü  -->
      <h1 class="text-3xl mb-6 text-white font-bold">Benimle İletişime Geçin</h1> <!-- Ana başlık  -->

      <fieldset class="mb-4">
        <input placeholder="Adınızı Girin" name="name" type="text" tabindex="1" class="w-full p-2 border border-gray-300 rounded"> <!-- Email için gireceğimiz adın input alanı  -->
      </fieldset>
      <fieldset class="mb-4">
        <input placeholder="Mail Adresiniz" name="email" type="email" tabindex="2"class="w-full p-2 border border-gray-300 rounded"> <!-- Email için gireceğimiz mail adresinin input alanı  -->
      </fieldset>
      <fieldset class="mb-4">
        <input placeholder="Konu" type="text" name="subject" tabindex="4" class="w-full p-2 border border-gray-300 rounded"> <!-- Email için gireceğimiz konunun input alanı -->
      </fieldset>
      <fieldset class="mb-4">
        <textarea name="message" placeholder="Mesajınız" tabindex="5" class="w-full p-2 border border-gray-300 rounded h-24 resize-none"></textarea> <!-- Email için gireceğimiz mesajın input alanı -->
      </fieldset>

      <fieldset>
        <button type="submit" name="send" id="contact-submit"
          class="w-full p-2 text-white text-xl font-bold bg-yellow-400 rounded hover:bg-yellow-300">Gönder</button> <!-- Maili göndermek için buton -->
      </fieldset>
    </form>
  </div>

    
</body>
</html>
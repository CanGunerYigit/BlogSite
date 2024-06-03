<?php
session_start(); //php oturumunu başlatır


if (isset($_SESSION["Hesap"])) {
    header("Location: anasayfa.php");  // Kullanıcı zaten giriş yapmışsa, anasayfaya yönlendir
    exit();
}
$error_message=""; // Hata mesajını ekrana yazdırmak için bir değişken tanımladım

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Host = "localhost";
    $dbname = "uyelik";
    $Name = "root";                                // Veritabanına bağlanma çalışmaları
    $Pass = "";

    try {
        $db = new PDO("mysql:host=$Host;dbname=$dbname", $Name, $Pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Veritabanı bağlantı hatası: " . $e->getMessage(); // Bağlanamadıysa ekrana hata yazdıracak
        die();
    }

    $Username = $_POST["Username"];
    $Password = $_POST["Password"];   // Bilgileri alıp bu alanlara atayacak
    
    $Control = $db->prepare("SELECT * FROM kullanicilar WHERE Username = :username AND Password = :password"); //SQL sorgusu hazırlar
    $Control->bindParam(':username', $Username); // Yukarıdaki SQL sorgusundaki değişkenleri $Username ve $Password değişkenleri ile değiştirir
    $Control->bindParam(':password', $Password);   
    $Control->execute(); //Hazırlanmış olan SQL sorgusunu çalıştırır
    

    if ($Control->rowCount() >= 1) {  //Satır sayısını kontrol edecek
        $_SESSION["Hesap"] = $Username;
        header("Location: anasayfa.php");  // Girilen bilgiler doğruysa kullanıcıyı anasayfaya atacak
        exit();
    } else {
        $error_message= "Yanlış Bilgiler Girdiniz";  // Doğru değilse yukarda tanımladığım değişkenin içine hata mesajı girecek
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Hesap Girişi</title>
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')"> <!-- Sayfanın arkaplanı -->
    <div class="flex justify-center items-center h-[100vh]">
        <div class="bg-zinc-900 w-[800px] h-[540px]"> <!-- Formun arkaplanındaki siyah çerçeve kısmı -->
            <a class="text-yellow-400 pl-4 font-extrabold text-2xl" href="kayıt.php">&lt; Geri</a> <!-- Kullanıcıyı kayıt sayfasına geri gönderecek buton -->
            <h3 class="justify-center flex text-white font-bold text-6xl mt-4">Hesabınıza Giriş Yapın</h3>
            <?php if ($error_message): ?>  <!-- php kodunda tanımladığımız ve içine mesaj atadığımız değişkeni olası bir hatalı giriş durumunda ekrana bastıracak -->
                <div class=" text-white px-4 " role="alert">
                    <strong class="font-bold">Hata!</strong>
                    <span class="block sm:inline "><?php echo $error_message; ?></span> <!-- Tanımladığımız mesaj tam buradan çıkacak -->
                    </div>
            <?php endif; ?>
            <div class="justify-center flex">
                <form class="flex mt-6 flex-col" action="giris.php" method="POST">   <!-- Yukarıda yazdığım php kodunun da dahil edilmiş olduğu form alanı --> 
                    <label class="text-yellow-400 justify-center text-lg font-semibold flex mt-[50px]" for="username">Hesabınızın Kullanıcı Adı</label> <!--Kullanıcı Adının labeli -->
                    <input name="Username" class="mt-4 outline-none w-[350px] h-[40px] rounded-md pl-4 font-bold text-xs" type="text" placeholder="Hesabınızın Kullanıcı Adını buraya girmelisiniz..." id="username"> <!-- İçinde Kullanıcı Adı girmemizi gerektiği yazan Kullanıcı Adı input alanı -->
                    <label class="text-yellow-400 justify-center text-lg font-semibold flex mt-[50px]" for="password">Hesabınızın Şifresi</label> <!-- Şifre alanının labeli -->
                    <input name="Password" class="mt-4 outline-none w-[350px] h-[40px] rounded-md pl-4 font-bold text-xs" type="password" placeholder="Hesabınızın Şifresini buraya girmelisiniz..." id="password"> <!-- İçinde Şifre girmemizi gerektiği yazan Şifre girme input alanı kayıt sayfasındaki gibi şifre gizlidir -->
                    <div class="flex justify-center"> <!-- Buton Çerçevesi -->
                        <button name="button" class="mt-[50px] h-[50px] w-[200px] text-white text-2xl font-semibold rounded-full bg-yellow-400">Giriş Yap</button> <!-- Eğer girdiğimiz bilgiler veritabanında kayıtlıysa bizi anasayfaya atacak  -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
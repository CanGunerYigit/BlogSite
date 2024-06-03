<?php 
ini_set('display_errors', 1); //oluşan hataları gösterecek
ini_set('display_startup_errors', 1); //başlangıçta oluşan hataları ekrana bastıracak
error_reporting(E_ALL); //hata raporlarını gösterir
session_start(); //php oturumunu başlatır

if (isset($_SESSION["Hesap"])) {
    header("Location: anasayfa.php"); // Giriş zaten önceden yapıldıysa geriye dönemeyeceğiz
    exit;
}

$Host = "localhost";
$dbname = "uyelik";
$Name = "root";
$Pass = "";

try {
    // Veritabanı hazırlıkları
    $db = new PDO("mysql:host=$Host;dbname=$dbname", $Name, $Pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());  //Veritabanına bağlanamazsa 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Giriş alınacak 
    $Username = !empty($_POST["Username"]) ? trim($_POST["Username"]) : null; //empty() fonksiyonun boş olup olmadığını kontrol ederken trim() bu değişkenleri düzeltir
    $Password = !empty($_POST["Password"]) ? trim($_POST["Password"]) : null;
    $Email = !empty($_POST["Email"]) ? trim($_POST["Email"]) : null;

    if ($Username && $Password && $Email) {
        try {
            $hashedPassword = $Password; // Passwordu bir değişkene atadım

            // Veritabanına bilgileri gönderecek
            $Add = $db->prepare("INSERT INTO kullanicilar (Username, Password, Email) VALUES (?, ?, ?)");
            $Add->execute([$Username, $hashedPassword, $Email]);

            $_SESSION["Hesap"] = $Username; // Username oturum değişkenine atanıyor
            header("Location: anasayfa.php"); // Üye bilgilerini veritabanına kaydedip anasayfaya yönlendirecek 
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Bir hata oluşması sonucu hatayı yazdıracak
        }
    } else {
        echo "All fields are required."; // Tüm alanlar doldurulmadıysa hata verecek
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Kayıt Ol</title>
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')"> <!-- Arkaplan görseli -->
<div class="justify-center flex mt-10 items-center">
    <div class="flex flex-col">
        <div class="bg-zinc-900 w-[800px] h-[540px] flex justify-center items-center"> <!-- Form bölümünün siyah arkaplanı -->
            <div class="flex flex-col items-center">
                <h1 class="text-6xl font-bold text-white flex items-center mt-4">Kayıt Oluşturun</h1>
                <form class="flex flex-col" action="kayıt.php" method="POST">
                    <label class="mt-5 text-yellow-400 text-lg font-semibold" for="username">Kullanıcı Adınız</label> <!-- Kullanıcı adı labeli -->
                    <input name="Username" class="mt-2 outline-none w-[300px] h-[30px] rounded-md pl-4 font-bold" type="text" placeholder="Adınızı buraya giriniz..." id="username"> <!-- Kullanıcı Adı input alanı -->
                    <label class="mt-5 text-yellow-400 text-lg font-semibold" for="email">Mail Adresiniz</label> <!-- Mail adresi labeli -->
                    <input name="Email" class="mt-2 outline-none w-[300px] h-[30px] rounded-md pl-4 font-bold" type="email" placeholder="Mail Adresinizi buraya giriniz..." id="email"><!-- Mail girmek için input alanı(başka formatı kabul etmez) -->
                    <label class="mt-5 text-yellow-400 text-lg font-semibold" for="password">Şifreniz</label> <!-- Şifre girme labeli -->
                    <input name="Password" class="mt-2 outline-none w-[300px] h-[30px] rounded-md pl-4 font-bold" type="password" placeholder="Şifrenizi buraya giriniz..." id="password"><!-- Şifre girmek için input alanı şifreyi gizli gösterir -->
                  <div class=" justify-center flex">
                    <button name="button" type="submit" class="mt-6 h-[50px] w-[200px] text-white text-2xl font-semibold rounded-full bg-yellow-400">Kayıt Ol</button> <!-- Kayıt açma butonu -->
                    </div>  
                </form>
            </div>
        </div>
        <div class="bg-zinc-900 mt-4 h-[60px] justify-center flex items-center"> <!-- Yukarıdaki form kısmından ayrık başka bir siyah arkaplanlı bölüm -->
            <div class="text-white font-semibold text-lg">
                Zaten hesabınız var mı? <a class="font-semibold text-lg text-yellow-400" href="giris.php">Hemen Giriş Yapın</a> <!-- Zaten hesabınız varsa sizi giriş sayfasına yönlendirecek -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
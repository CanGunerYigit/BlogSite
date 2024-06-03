<?php
ini_set('display_errors', 1); //oluşan hataları gösterecek
ini_set('display_startup_errors', 1); //başlangıçta oluşan hataları ekrana bastıracak
error_reporting(E_ALL); //hata raporlarını gösterir
session_start(); //php oturumunu başlatır

if (!isset($_SESSION["Hesap"])) {
    header("Location: giris.php"); // Kullanıcı giriş yapmamışsa giriş sayfasına yönlendirilir
    exit;
}

$Username = $_SESSION["Hesap"]; //Kayıt sayfasındaki kullanıcı adı
$host = 'localhost';
$dbname = 'uyelik';
$dbusername = 'root'; // Veritabanı kullanıcı adı
$dbpassword = ''; // Veritabanı şifresi

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword); // Veritabanına bağlanır
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage()); // Bağlanamazsa hata mesajı verir
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['icerik'])) { // İçerik boş değilse
    $icerik = htmlspecialchars($_POST['icerik']);

    $stmt = $pdo->prepare("INSERT INTO yorumlar (username, icerik) VALUES (:username, :icerik)"); // İçerik ve username alanlarını ve değerlerini ekler
    $stmt->execute(['username' => $Username, 'icerik' => $icerik]);

    header("Location: forum.php"); // İşlemler başarılıysa forum.php sayfasına yönlendirir
    exit;
}

$stmt = $pdo->query("SELECT * FROM yorumlar"); //veritabanındaki yorumları sıraya koyacak
$yorumlar = $stmt->fetchAll(PDO::FETCH_ASSOC); //veritabanından yorumları döndürecek
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Yorum Sistemi</title>
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')"> <!-- Sayfanın arkaplanı -->
<nav class="bg-zinc-900 py-4 rounded-3xl mx-auto md:w-[1400px] flex justify-center"> 
    <a href="anasayfa.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Anasayfa</a>
    <a href="hakkımda.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Hakkımda </a> <!-- Navbar alanı -->
    <a href="iletisim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">İletişim </a>
    <a href="projelerim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Projelerim</a>
    <a href="forum.php" class="text-white pr-4 font-bold text-lg md:text-xl underline underline-offset-8">Forum</a>
</nav>

<div class="container mx-auto mt-10 ">
    <h1 class="text-3xl font-bold mb-5 text-white mx-10">Yorumlar</h1>  <!-- Forum içeriği -->
    <form action="forum.php" method="post" class="mb-8 mx-10"> <!-- Yukarıdaki php kodununda dahil olduğu form alanı -->
        <div class="flex flex-col mb-4">         
            <label for="icerik" class="mb-2 text-white">Yorum:</label> <!-- Yorum yazmamızı söyleyen label -->
            <textarea id="icerik" name="icerik" required rows="4" class="py-2 px-4 bg-gray-200 rounded-lg"></textarea> <!-- Göndermek istediğimiz mesajı gireceğimiz alan -->
        </div>
        <div class="flex justify-center">
            <button type="submit" class="bg-yellow-400 text-white py-2 px-4 rounded-lg font-bold ">Gönder</button>  <!-- Yorum gönderme butonu -->
        </div>
    </form>

    <h2 class="text-2xl font-bold mb-4 text-white mx-10">Yorumlar</h2>  <!-- Önceden yapılmış olan yorumları görüntüleyebildiğimiz alan -->
    <div class="yorumlar">
        <?php foreach ($yorumlar as $yorum): ?> <!--Veritabanında varolan her bir yorum için aşağıdaki tasarımı kullanacak -->
            <div class="bg-white p-4 rounded-lg mb-4 mx-10">
                <h3 class="text-lg font-semibold mb-2"><?php echo htmlspecialchars($yorum['username']); ?></h3>  <!-- Yorum yapan kişinin Kullanıcı Adı -->
                <p class="mb-2"><?php echo nl2br(htmlspecialchars($yorum['icerik'])); ?></p>  <!-- Yapılan yorumun içeriği -->
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
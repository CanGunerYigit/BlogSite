<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "uyelik";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT baslik, aciklama, link FROM projelerim"; //SQL sorgusu
$result = $conn->query($sql); //Sonuçları bir değişkene atar

$projeler = []; //Projeleri eklemek için bir array
if ($result->num_rows > 0) {  //Veritabanında ekli veriler varsa (sonuçlar 0'dan büyük mü diye kontrol eder) diziye ekleyecek
    while($row = $result->fetch_assoc()) {
        $projeler[] = $row;
    }
} else {
    echo "0 sonuç";  //Veritabanında ekli veriler yoksa ekrana bu mesajı bastıracak
}
$conn->close();  // İşlemler sonlandıktan sonra bağlantıyı sonlandıracak
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')">
    <nav class="bg-zinc-900 py-4 rounded-3xl mx-auto md:w-[1400px] flex justify-center">
        <a href="anasayfa.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Anasayfa</a>
        <a href="hakkımda.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Hakkımda</a> <!-- Navbar -->
        <a href="iletisim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">İletişim </a>
        <a href="projelerim.php" class="text-white pr-4 font-bold text-lg md:text-xl underline underline-offset-8 ">Projelerim</a>
        <a href="forum.php" class="text-yellow-400 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Forum</a>
    </nav>
   
    <div class="mt-10 mx-auto md:w-[1400px]">
        <h1 class="text-white font-bold text-3xl text-center mb-10 md:text-4xl">Belirli Projelerim</h1>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-1"> <!-- Grid yapısını kullanarak ilginç bir görünüm  -->
            <?php foreach ($projeler as $proje): ?> <!-- Yukarıda diziye eklediğimiz proje verilerini sırasıyla aşağıdaki tasarım içerikleriyle ekrana verecek  -->
                <div class="bg-zinc-900 rounded-3xl p-6 flex justify-center"><!-- Proje görseli, metni ve linki kapsayan çerçeve -->
                    <div class="flex-col"> <!-- İçeriğin alt alta gelmesi için bu özelliği bir div kullanarak verdim -->
                     <img class="h-56 rounded-3xl" src="img/proje.jpg" alt=""> <!-- Daha iyi gözükmesi için her bir projeye  görsel ekledim -->
                     <h2 class="text-white font-semibold text-xl md:text-2xl"><?= $proje['baslik'] ?></h2> <!-- Veritabanına kayıtlı olan başlık bilgisini ekrana bastıracak -->
                     <p class="text-white text-sm md:text-base mt-2"><?= $proje['aciklama'] ?></p> <!-- Veritabanında kayıtlı olan açıklamayı ekrana yazdıracak -->
                     <a href="<?= $proje['link'] ?>" target="_blank" class="text-white text-sm md:text-base underline mt-2 block">Kaynak Kodunu Görüntüle</a> <!-- Veritabanına eklemiş olduğum linkler yardımıyla bizi yeni bir sayfada kaynak koda yönlendirecek olan link -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

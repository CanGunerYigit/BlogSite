<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-cover bg-center bg-fixed" style="background-image: url('background.jpg')"> <!-- Arkaplan resmi  -->
    <div class="container mx-auto p-4">
     <nav class="bg-zinc-900 py-4 rounded-3xl mx-auto md:w-[1400px] flex justify-center"> 
       <a href="anasayfa.php" class="text-white pr-4 font-bold text-lg md:text-xl underline underline-offset-8">Anasayfa</a> <!-- Seçili olan sayfayı farklı font ve yazı rengiyle belirtir -->
       <a href="hakkımda.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Hakkımda </a> <!-- Navbar alanı -->
       <a href="iletisim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">İletişim </a> <!-- Navbar alanı -->

       <a href="projelerim.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Projelerim</a>
       <a href="forum.php" class="text-yellow-400 pr-4 font-bold text-lg md:text-2xl hover:underline underline-offset-8 hover:text-xl">Forum</a>
     </nav>
        <form action="cikis.php" method="post" class="absolute flex justify-center  top-3 right-3 py-4"> <!-- cikis.php dosyasında kodunu yazdım ve buraya dahil ettim kısaca kayıtlı kullanıcının çıkış yapmasını sağlar -->
            <button type="submit" class="h-[100px] w-[500px] text-white text-2xl font-semibold rounded-full sm:text-xl xl:text-2xl">Çıkış Yap</button>
        </form> 
        <div class="text-white text-3xl font-semibold mt-10">
            <h1 class="pl-4">İlginizi Çekebilecek Videolar</h1>
            <div class="bg-zinc-900 rounded-3xl p-4 mt-4 grid gap-4 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4"> <!-- Videolar bölümü -->
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">  <!-- Videoyu ve metni kapsayacak çerçeve -->
                    <iframe width="302" height="224" src="https://www.youtube.com/embed/iA7XCf78ITU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> <!-- Genişlik ve Yüksekliği ayarlanmış Youtube Linki -->
                    <p class="px-4 text-sm pt-4">3 Farklı Ülkede McDonald's'ları Test Ettik</p> <!-- Video Açıklaması -->
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <iframe width="302" height="224" src="https://www.youtube.com/embed/XzxOjaA-tgE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="px-4 text-sm pt-4">Letting AI Destroy GTA San Andreas</p>
                </div>
              
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <iframe width="302" height="224" src="https://www.youtube.com/embed/6VtfEZJtpZ8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="px-4 text-sm pt-4">POV: You hear a noise downstairs</p>
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <iframe width="302" height="224" src="https://www.youtube.com/embed/VjiWpGR82t0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="px-4 text-sm pt-4">Web Developer Portfolio</p>
                </div>
            </div>
        </div>
        <div class="text-white text-3xl font-semibold mt-10">
            <h1 class="pl-4">İlginizi Çekebilecek Makaleler</h1>
            <div class="bg-zinc-900 rounded-3xl p-4 mt-4 grid gap-4 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4"> <!--Makaleler bölümü -->
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4"> <!-- Makale fotoğrafını ve metnini kapsayacak çerçeve -->
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/gorsel1.png" alt=""> <!--Yuvarlatılmış boyut verilmiş ortalanmış Makale görseli -->
                    <h2 class="text-center mt-2">İlk Hristiyan İmparator Konstantin’in Hayatı</h2> <!-- Makale metni -->
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.saglamtemel.com/ilk-hristiyan-imparator-konstantinin-hayati/" target="_blank">Makaleyi Oku</a> <!-- Tıklandığında yeni bir sayfada açılacak makale linki -->
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/gorsel2.jpg" alt="">
                    <h2 class="text-center mt-2">2019'un En Çok Dikkat Çeken Ev Tasarımları</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.arkitektuel.com/yil-biterken-2019un-en-cok-dikkat-ceken-ev-tasarimlari/" target="_blank">Makaleyi Oku</a>
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/gorsel3.jpeg" alt="">
                    <h2 class="text-center mt-2">Ajanslara özel yapay zeka rehberi</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.thinkwithgoogle.com/intl/tr-tr/pazarlama-stratejileri/otomasyon/ajans-ai-rehber/" target="_blank">Makaleyi Oku</a>
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/gorsel4.jpg" alt="">
                    <h2 class="text-center mt-2">Uygulama kullanıcı tabanını artırma ipuçları</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.thinkwithgoogle.com/intl/tr-tr/pazarlama-stratejileri/uygulama-ve-mobil/uygulama-kullanici-tabanini-artirma-ipuclari/" target="_blank">Makaleyi Oku</a>
                </div>
            </div>
        </div>
        <div class="text-white text-3xl font-semibold mt-10">
            <h1 class="pl-4">Türkiye'de Gezilebilecek Güzel Yerler</h1>
            <div class="bg-zinc-900 rounded-3xl p-4 mt-4 grid gap-4 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4"> <!-- Gezilebilecek Yerler bölümü -->
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4"> <!-- Gezilebilecek yerlerin görselleri, metinleri ve linklerini kapsayan çerçeve -->
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/yerler1.jpg" alt=""> <!-- Mekan resmi -->
                    <h2 class="text-center mt-2">Yerebatan Sarnıcı</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://yerebatan.com/" target="_blank">Hakkında Bilgi Edinin</a> <!-- Tıklandığında yeni bir sayfada açılacak olan link -->
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/yerler2.jpg" alt="">
                    <h2 class="text-center mt-2">Gökçeada</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.ntv.com.tr/galeri/n-life/gezi/gokceadada-gezilecek-yerler-gunesin-en-yavas-battigi-yer-gokceada,qNcHHlFbOkug9qqogvjkSA/j-ygk396pEmMV8sDtYxasQ" target="_blank">Hakkında Bilgi Edinin</a>
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/yerler3.jpg" alt="">
                    <h2 class="text-center mt-2">Amasya</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.ntv.com.tr/seyahat/sehzadeler-sehri-amasya-750-bin-turist-hedefliyor,9u0dLdbN8UKkX5FTMe6lRQ" target="_blank">Hakkında Bilgi Edinin</a>
                </div>
                <div class="flex flex-col items-center bg-zinc-900 rounded-3xl p-4">
                    <img class="h-56 w-full object-cover rounded-2xl" src="img/yerler4.jpg" alt="">
                    <h2 class="text-center mt-2">İshak Paşa Sarayı</h2>
                    <a class="font-thin text-lg justify-center flex underline mt-2" href="https://www.ntv.com.tr/seyahat/ishak-pasa-sarayi-yeni-yuzuyle-ziyaretcilerini-buyuleyecek,VHwQSBkyYUuZHyZKDQmB1w" target="_blank">Hakkında Bilgi Edinin</a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>

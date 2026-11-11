<?php
// Lacivert tema: ana sayfa. İçerik bölümlerden oluşur: Görünüm > Özelleştir > Ana sayfa bölümleri
// (sürükle-bırak ile sıralanır). Bu temanın bölümleri: app/Themes/Lacivert/sections/
?>
<?= Section::render('home', ['moduleSections' => $sections]) ?>

<?php
return [
    'name'        => 'Giriş (koyu)',
    'description' => 'Büyük başlık, açıklama, iki düğme ve eğik görsel kartı.',
    'icon'        => 'sparkles',
    'fields'      => [
        'title'      => ['label' => 'Başlık', 'type' => 'text', 'default' => 'İşinizi *otomatiğe* alın!', 'help' => '*yıldız* arasındaki kelime vurgu rengiyle yazılır.'],
        'text'       => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'Modüler yapısıyla büyük ekiplerden bireysel kullanıcılara kadar herkese uçtan uca çözüm sunuyoruz. Siz işinize odaklanın, gerisini biz halledelim.'],
        'btn1_text'  => ['label' => '1. düğme yazısı', 'type' => 'text', 'default' => 'Hemen deneyin'],
        'btn1_link'  => ['label' => '1. düğme bağlantısı', 'type' => 'link', 'default' => '#paketler'],
        'btn2_text'  => ['label' => '2. düğme yazısı', 'type' => 'text', 'default' => 'Özellikleri inceleyin'],
        'btn2_link'  => ['label' => '2. düğme bağlantısı', 'type' => 'link', 'default' => '#ozellikler'],
        'image'      => ['label' => 'Görsel', 'type' => 'image', 'help' => 'Boşsa hazır panel çizimi gösterilir.'],
        'card_title' => ['label' => 'Görsel üstü kart başlığı', 'type' => 'text', 'default' => 'Yeni nesil'],
        'card_text'  => ['label' => 'Görsel üstü kart yazısı', 'type' => 'text', 'default' => 'Hızlı ve güvenli'],
    ],
];

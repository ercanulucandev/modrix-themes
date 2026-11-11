<?php
return [
    'name'        => 'Giriş (görselli)',
    'description' => 'Arka plan görselli büyük giriş: etiket, başlık, açıklama, iki düğme.',
    'icon'        => 'sparkles',
    'fields'      => [
        'image'     => ['label' => 'Arka plan görseli', 'type' => 'image', 'help' => 'Geniş, yatay fotoğraf (1920×1080). Yoksa renk geçişi.'],
        'overlay'   => ['label' => 'Görsel üstü karartma', 'type' => 'select', 'default' => '70', 'options' => ['30' => 'Hafif', '50' => 'Orta', '70' => 'Koyu', '85' => 'Çok koyu']],
        'badge'     => ['label' => 'Üstteki küçük yazı', 'type' => 'text', 'default' => 'Güvenilir çözüm ortağınız'],
        'title'     => ['label' => 'Başlık', 'type' => 'text', 'default' => 'İşinizi bir üst seviyeye taşıyoruz'],
        'text'      => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'Deneyimli ekibimiz ve şeffaf çalışma anlayışımızla, işletmenize özel çözümler üretiyoruz.'],
        'btn1_text' => ['label' => '1. düğme yazısı', 'type' => 'text', 'default' => 'Hizmetlerimiz'],
        'btn1_link' => ['label' => '1. düğme bağlantısı', 'type' => 'link', 'default' => '#hizmetler'],
        'btn2_text' => ['label' => '2. düğme yazısı', 'type' => 'text', 'default' => 'Bize ulaşın'],
        'btn2_link' => ['label' => '2. düğme bağlantısı', 'type' => 'link', 'default' => '#iletisim'],
    ],
];

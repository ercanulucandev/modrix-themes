<?php
return [
    'name'        => 'Fiyat paketleri',
    'description' => 'Paket kartları; biri "Önerilen" olarak öne çıkar.',
    'icon'        => 'tag',
    'fields'      => [
        'anchor'    => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'paketler'],
        'title'     => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Paketler'],
        'text'      => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'İhtiyacınıza uygun paketi seçin, istediğiniz zaman yükseltin.'],
        'highlight' => ['label' => 'Öne çıkan paket sırası', 'type' => 'number', 'default' => 2, 'min' => 0, 'max' => 6, 'help' => '0: yok, 2: ikinci paket.'],
        'plans'     => ['label' => 'Paketler', 'type' => 'repeater', 'item_name' => 'Paket', 'item_label' => 'name', 'max' => 6,
            'fields' => [
                'name'        => ['label' => 'Paket adı', 'type' => 'text', 'default' => 'Yeni paket'],
                'subtitle'    => ['label' => 'Alt başlık', 'type' => 'text', 'default' => ''],
                'price'       => ['label' => 'Fiyat', 'type' => 'text', 'default' => '₺0', 'placeholder' => '₺299 / ay'],
                'features'    => ['label' => 'Özellikler', 'type' => 'textarea', 'rows' => 5, 'default' => '', 'help' => 'Her satır bir özellik. "10 adet | Site ekleme" yazarsanız değer kutucukta gösterilir.'],
                'button_text' => ['label' => 'Düğme yazısı', 'type' => 'text', 'default' => 'Satın al'],
                'button_link' => ['label' => 'Düğme bağlantısı', 'type' => 'link', 'default' => '#iletisim'],
            ],
            'default' => [
                ['name' => 'Ücretsiz', 'subtitle' => 'Hemen deneyin', 'price' => '₺0', 'features' => "1 adet | Site ekleme\n1 adet | Zamanlama\n10 adet | Günlük işlem\nE-posta desteği", 'button_text' => 'Ücretsiz başla', 'button_link' => '#iletisim'],
                ['name' => 'Profesyonel', 'subtitle' => 'Büyüyen işler için', 'price' => '₺299 / ay', 'features' => "5 adet | Site ekleme\n10 adet | Zamanlama\n500 adet | Günlük işlem\nÖncelikli destek", 'button_text' => 'Satın al', 'button_link' => '#iletisim'],
                ['name' => 'Kurumsal', 'subtitle' => 'Sınırsız kullanım', 'price' => '₺899 / ay', 'features' => "Sınırsız | Site ekleme\nSınırsız | Zamanlama\nSınırsız | Günlük işlem\n7/24 telefon desteği", 'button_text' => 'Satın al', 'button_link' => '#iletisim'],
            ]],
    ],
];

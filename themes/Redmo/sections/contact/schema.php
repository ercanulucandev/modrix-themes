<?php
return [
    'name'        => 'İletişim (koyu)',
    'description' => 'Koyu bant: başlık ve telefon, e-posta, adres kartları (Ayarlar > İletişim).',
    'icon'        => 'phone',
    'fields'      => [
        'anchor' => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'iletisim'],
        'title'  => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Projenizi konuşalım'],
        'text'   => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'Bir telefon ya da e-posta uzağınızdayız. En geç bir iş günü içinde dönüş yapıyoruz.'],
    ],
];

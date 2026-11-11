<?php
return [
    'name'        => 'İletişim kartları',
    'description' => 'Telefon, e-posta ve adres kartları (Ayarlar > İletişim\'den).',
    'icon'        => 'phone',
    'fields'      => [
        'anchor' => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'iletisim'],
        'title'  => ['label' => 'Başlık', 'type' => 'text', 'default' => 'İletişim'],
        'text'   => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'Sorularınız için bize her zaman ulaşabilirsiniz.'],
    ],
];

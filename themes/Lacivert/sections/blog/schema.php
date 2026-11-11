<?php
return [
    'name'        => 'Blog (dergi düzeni)',
    'description' => 'Son 5 yazı: solda büyük, sağda dört küçük kart. Kapak: yazıdaki ilk görsel.',
    'icon'        => 'doc',
    'requires'    => 'Blog',
    'fields'      => [
        'title'     => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Blog'],
        'text'      => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'En son haberler, güncellemeler ve rehberler.'],
        'link_text' => ['label' => 'Tümü bağlantısı', 'type' => 'text', 'default' => 'Tüm yazılar'],
    ],
];

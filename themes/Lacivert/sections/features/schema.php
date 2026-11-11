<?php
return [
    'name'        => 'Özellik kartları',
    'description' => 'Simgeli kartlar; isteğe bağlı büyük görsel ve alt düğme.',
    'icon'        => 'grid',
    'fields'      => [
        'anchor'      => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'ozellikler', 'help' => 'Menüden bu bölüme gitmek için: #ozellikler'],
        'title'       => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Özellikler'],
        'text'        => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'Öne çıkan özelliklerimiz hakkında kısa bilgiler.'],
        'image'       => ['label' => 'Öne çıkan görsel', 'type' => 'image', 'help' => 'Kartların başında geniş bir kart olarak.'],
        'items'       => ['label' => 'Kartlar', 'type' => 'repeater', 'item_name' => 'Kart', 'item_label' => 'title', 'max' => 12,
            'fields' => [
                'icon'  => ['label' => 'Simge', 'type' => 'icon', 'default' => 'bolt'],
                'title' => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Yeni özellik'],
                'text'  => ['label' => 'Yazı', 'type' => 'textarea', 'default' => 'Kısa açıklama.'],
            ],
            'default' => [
                ['icon' => 'bolt', 'title' => 'Hızlı kurulum', 'text' => 'Dakikalar içinde hazır. Karmaşık ayarlarla uğraşmadan hemen kullanmaya başlayın.'],
                ['icon' => 'calendar', 'title' => 'Zamanlama', 'text' => 'İşlerinizi planlayın, sistem sizin yerinize 7/24 çalışsın.'],
                ['icon' => 'search', 'title' => 'Akıllı arama', 'text' => 'Aradığınızı anında bulun; filtrelerle sonuçları daraltın.'],
                ['icon' => 'layers', 'title' => 'Modüler yapı', 'text' => 'İhtiyacınız olan modülü ekleyin, gerekmeyeni kapatın.'],
                ['icon' => 'shield', 'title' => 'Güvenlik', 'text' => 'Verileriniz şifreli saklanır, düzenli yedeklenir.'],
                ['icon' => 'sparkles', 'title' => 'Yapay zekâ desteği', 'text' => 'İçerik üretiminden analize kadar akıllı yardımcılar.'],
            ]],
        'button_text' => ['label' => 'Alt düğme yazısı', 'type' => 'text', 'default' => ''],
        'button_link' => ['label' => 'Alt düğme bağlantısı', 'type' => 'link', 'default' => ''],
    ],
];

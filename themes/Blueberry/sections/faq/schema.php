<?php
return [
    'name'        => 'Sıkça sorulanlar',
    'description' => 'Açılır kapanır sorular; isteğe bağlı solda görsel.',
    'icon'        => 'help',
    'fields'      => [
        'anchor' => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'sss'],
        'title'  => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Sıkça sorulanlar'],
        'text'   => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'Merak edilen bazı soruların cevapları.'],
        'image'  => ['label' => 'Görsel', 'type' => 'image'],
        'items'  => ['label' => 'Sorular', 'type' => 'repeater', 'item_name' => 'Soru', 'item_label' => 'question', 'max' => 30,
            'fields' => [
                'question' => ['label' => 'Soru', 'type' => 'text', 'default' => 'Yeni soru?'],
                'answer'   => ['label' => 'Cevap', 'type' => 'textarea', 'default' => 'Cevap.'],
            ],
            'default' => [
                ['question' => 'Nasıl başlarım?', 'answer' => 'Ücretsiz paketle hemen hesabınızı oluşturun; kurulum birkaç dakika sürer.'],
                ['question' => 'Paketimi sonradan değiştirebilir miyim?', 'answer' => 'Evet. İstediğiniz zaman yükseltebilir ya da düşürebilirsiniz.'],
                ['question' => 'Verilerim güvende mi?', 'answer' => 'Tüm veriler şifreli bağlantıyla taşınır ve düzenli olarak yedeklenir.'],
                ['question' => 'Destek nasıl alırım?', 'answer' => 'Paketinize göre e-posta, canlı destek ya da telefonla bize ulaşabilirsiniz.'],
            ]],
    ],
];

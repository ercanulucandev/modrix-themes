<?php
return [
    'name'        => 'Hakkımızda ve rakamlar',
    'description' => 'Başlık, yazı, görsel ve rakamlar.',
    'icon'        => 'users',
    'fields'      => [
        'anchor' => ['label' => 'Bölüm adresi (#)', 'type' => 'text', 'default' => 'hakkimizda'],
        'badge'  => ['label' => 'Üst etiket', 'type' => 'text', 'default' => 'Hakkımızda'],
        'title'  => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Neden bizi seçmelisiniz?'],
        'text'   => ['label' => 'Yazı', 'type' => 'textarea', 'rows' => 5, 'default' => "Yılların deneyimiyle onlarca işletmeye hizmet verdik.\nHer projede aynı özeni gösteriyor, sonuç odaklı çalışıyoruz."],
        'image'  => ['label' => 'Görsel', 'type' => 'image', 'help' => 'Yoksa rakamlar büyük kutular halinde sağda gösterilir.'],
        'stats'  => ['label' => 'Rakamlar', 'type' => 'repeater', 'item_name' => 'Rakam', 'item_label' => 'label', 'max' => 4,
            'fields' => [
                'value' => ['label' => 'Rakam', 'type' => 'text', 'default' => '10+'],
                'label' => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'Yeni rakam'],
            ],
            'default' => [['value' => '12+', 'label' => 'Yıllık deneyim'], ['value' => '350+', 'label' => 'Tamamlanan proje'], ['value' => '%98', 'label' => 'Müşteri memnuniyeti']]],
    ],
];

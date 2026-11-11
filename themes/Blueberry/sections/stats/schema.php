<?php
return [
    'name'        => 'Rakamlar bandı',
    'description' => 'Açık koyu bant: solda başlık, sağda rakam kutuları.',
    'icon'        => 'chart',
    'fields'      => [
        'title' => ['label' => 'Başlık', 'type' => 'text', 'default' => 'Rakamlarla biz'],
        'text'  => ['label' => 'Açıklama', 'type' => 'textarea', 'default' => 'Her gün binlerce işlemi sorunsuz yürütüyoruz. Güveniniz için teşekkürler.'],
        'items' => ['label' => 'Rakamlar', 'type' => 'repeater', 'item_name' => 'Rakam', 'item_label' => 'label', 'max' => 8,
            'fields' => [
                'value' => ['label' => 'Rakam', 'type' => 'text', 'default' => '100+'],
                'label' => ['label' => 'Açıklama', 'type' => 'text', 'default' => 'Yeni rakam'],
            ],
            'default' => [
                ['value' => '38.100', 'label' => 'Son 24 saatte'],
                ['value' => '1.251.125', 'label' => 'Son 30 günde'],
                ['value' => '12.500+', 'label' => 'Mutlu kullanıcı'],
                ['value' => '%99,9', 'label' => 'Çalışma süresi'],
            ]],
    ],
];
